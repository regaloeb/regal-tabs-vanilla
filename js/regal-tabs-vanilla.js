//regalTabs
var RegalTabs = function(selector, options){
	var plugin = this;
	//console.log("RegalTabs init");
	plugin.el = (typeof(selector) === 'object') ? selector : (selector.indexOf('#') >= 0) ? document.getElementById(selector.replace('#', '')) : document.querySelector(selector);
	
	var defaults = {
		active: (plugin.el.getAttribute('data-active') && plugin.el.getAttribute('data-active') !== '') ? plugin.el.getAttribute('data-active') : 0 ,
		activeHistory: (plugin.el.getAttribute('data-history') && plugin.el.getAttribute('data-history') !== '') ? parseInt(plugin.el.getAttribute('data-history')) : 0
	};
	if (typeof Object.assign != 'function') {
	  Object.assign = function(target, varArgs) { // .length of function is 2
		'use strict';
		if (target == null) { // TypeError if undefined or null
		  throw new TypeError('Cannot convert undefined or null to object');
		}
		var to = Object(target);
		for (var index = 1; index < arguments.length; index++) {
		  var nextSource = arguments[index];
		  if (nextSource != null) { // Skip over if undefined or null
			for (var nextKey in nextSource) {
			  // Avoid bugs when hasOwnProperty is shadowed
			  if (Object.prototype.hasOwnProperty.call(nextSource, nextKey)) {
				to[nextKey] = nextSource[nextKey];
			  }
			}
		  }
		}
		return to;
	  };
	}
	plugin.o = Object.assign({}, defaults, options);
	
	var elt = plugin.el;
	var nav = elt.querySelectorAll('.tabs-nav-item');
	var tabsCont = elt.querySelector('.tabs-cont');
	var tab = elt.querySelectorAll('.tab');
	var activetab;
	
	//une ancre prend le dessus sur le js default
	var reqId, reqEl;
	function setReqEl(){
		reqId = window.document.location.hash;
		reqEl = (reqId !== '') ? document.querySelector(reqId) : false;
		if(reqEl){
			//make sure reqEl is inside the RegalTabs
			reqEl = elt.contains(document.querySelector(reqId)) ? document.querySelector(reqId) : false;
		}
	}
	setReqEl();
	//open-close action
	nav.forEach(function(el, index){
		el.index = index;
		el.addEventListener('click', openClose);
	});
	var userClick = false;
	function openClose(e){
		e.preventDefault();
		//history.pushState({page: e.currentTarget.textContent}, e.currentTarget.textContent, e.currentTarget.href);
		if(plugin.o.activeHistory){
			userClick = true;
			var poy = window.pageYOffset;
			window.document.location.hash = e.currentTarget.href.split('#')[1];
			//avoid scroll to anchor
			window.scrollTo(0, poy);         // execute it straight away
			setTimeout(function() {
				window.scrollTo(0, poy);     // run it a bit later also for browser compatibility
			}, 1);
		}
		nav.forEach(function(elem, index){
			if(index != e.currentTarget.index){
				elem.classList.remove('active');
			}
			else{
				elem.classList.add('active');
			}
		});
		e.currentTarget.classList.add('active');
		tab.forEach(function(elem, index){
			if(index != e.currentTarget.index){
				elem.classList.remove('active');
			}
			else{
				elem.classList.add('active');
				activetab = elem;
				resize(); 
			}
		});
	}
	
	//triggerEvent
	function triggerEvent(el, type){
	   if ('createEvent' in document) {
			var e = document.createEvent('HTMLEvents');
			e.initEvent(type, false, true);
			el.dispatchEvent(e);
		}
		else {
			var e = document.createEventObject();
			e.eventType = type;
			el.fireEvent('on' + e.eventType, e);
		}
	}
	
	//default-state
	var defaultNav = nav[plugin.o.active];
	function defaultState(){
		if(reqEl){
			defaultNav = document.querySelector(reqId + '-nav');
		}
		if(defaultNav){
			triggerEvent(defaultNav, 'click');
		}
	};
	defaultState();
	
	function windowLoad(){
		setTimeout(function(){
			//tresize when everything is loaded, especially images
			//defaultState();
			resize();
		}, 500);
	};
	
	function resize(ht){
		var h = (ht) ? ht : Math.round(parseFloat(getComputedStyle(activetab, null).height));
		tabsCont.style.minHeight = h + 'px';
	};
	
	//public
	plugin.resize = function(ht){
		var h = (ht) ? ht : null;
		resize(h);
	};
	
	plugin.destroy = function(){
		nav.forEach(function(el){
			el.removeEventListener('click', openClose);
			el.classList.remove('active');
		});
		tab.forEach(function(elem, index){
			elem.classList.remove('active');
		});
		window.removeEventListener('resizeEnd', resize);
		window.removeEventListener('load', windowLoad);
		tabsCont.style.minHeight = '0px';
	};
	
	//eventListeners
	//wait until resize is done
	window.addEventListener('resize', function() {
		if(this.resizeTO) clearTimeout(this.resizeTO);
		this.resizeTO = setTimeout(function() { 
			triggerEvent(this, 'resizeEnd');
		}, 500);
	});
	window.addEventListener('load', windowLoad);
	window.addEventListener('resizeEnd', resize);
	
	if(plugin.o.activeHistory){
		window.onpopstate = function(e){
			if(!userClick){
				setReqEl();
				defaultState();
			}
			userClick = false;
		}
	}
	
	return plugin;
};