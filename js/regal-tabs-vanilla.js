var RegalTabs = function(selector, options){
	var plugin = this;
	//console.log("RegalTabs init");
	plugin.el = (typeof(selector) === 'object') ? selector : (selector.indexOf('#') >= 0) ? document.getElementById(selector.replace('#', '')) : document.querySelector(selector);
	
	var defaults = {
		active: (plugin.el.getAttribute('data-active') && plugin.el.getAttribute('data-active') !== '') ? plugin.el.getAttribute('data-active') : 0 ,
		start: (plugin.el.getAttribute('data-start') && plugin.el.getAttribute('data-start') !== '') ? plugin.el.getAttribute('data-start') : 0
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
	var reqId = window.document.location.hash.replace('#', '');
	var reqEl = (reqId !== '') ? document.getElementById(reqId) : false;
	if(reqEl){
		//make sure reqEl is inside the RegalTabs
		reqEl = elt.contains(document.getElementById(reqId)) ? document.getElementById(reqId) : false;
	}
	//open-close action
	nav.forEach(function(el, index){
		el.index = index;
		el.addEventListener('click', openClose);
	});
	
	function openClose(e){
		e.preventDefault();
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
	//activetab = tab[plugin.o.active];
	function defaultState(){
		if(reqEl){ 
			defaultNav = document.getElementById(reqId + '-nav');
		}
		triggerEvent(defaultNav, 'click');
	};
	defaultState();
	
	function windowLoad(){
		setTimeout(function(){
			//to make sure everything is loaded, especially images
			defaultState();
		}, 500);
	};
	
	function resize(){
		var h = parseFloat(getComputedStyle(activetab, null).height);
		tabsCont.style.minHeight = h + 'px';
	};
	
	//public
	plugin.resize = function(){
		resize();
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
	
	return plugin;
};