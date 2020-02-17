<!DOCTYPE html>
<html lang="en">
	<head>
		<!--
		replace XXX_description_XXX by final description text
		replace XXX_url_XXX by final production URL
		replace XXX_thumb_XXX by final production URL of the thumb image for social networks
		-->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>RegalTabs</title>
		<meta name="description" content="Un constructeur Javascript Vanilla pour présentation en mode onglets.">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="favicon.png">
		<link href="css/styles.css" rel="stylesheet" type="text/css">
		
		<meta property="og:url" content="http://www.regaloeb.com/pages/regal-tabs-vanilla">
		<meta property="og:title" content="RegalTabs">
		<meta property="og:description" content="Un constructeur Javascript Vanilla pour présentation en mode onglets.">
		<meta property="og:image" content="http://www.regaloeb.com/pages/regal-tabs-vanilla/fb-thumb.png">
		<meta property="og:site_name" content="regaloeb.com">
		<meta property="og:type" content="website">
		<meta property="fb:admins" content="595624305">
		<meta property="fb:app_id" content="217293022051519">
		
		<link rel="canonical" href="http://www.regaloeb.com/pages/regal-tabs-vanilla">
	</head>
	<body>
		<main class="page-content">
			
			<div class="section-inner">
				<h1>RegalTabs</h1>
				<p>
					La présentation de contenu par onglets revient régulièrement alors voici un petit constructeur Javascript Vanilla qui permet de la générer facilement.<br><br>
					<a href="https://github.com/regaloeb/regal-tabs-vanilla" target="_blank">Github repository</a>
				</p>
				<h2>HTML</h2>
				<p>
					Conteneur principal avec classe <strong>.tabs</strong><br>
					Attribut <strong>data-default</strong> détermine l'onglet affiché par défaut&nbsp;: "0": le premier, "1": le deuxième, etc.<br>
					Avec la classe <strong>.vertical</strong> la navigation sera placée à gauche des onglets, les liens les uns en dessous des autres..<br>
					Avec la classe <strong>.horizontal</strong> la navigation sera placée au dessus des onglets, les liens les uns à côté des autres..<br>
					Pour les mobiles, la navigation est toujours au dessus des onglets et les liens sont placés les uns sous les autres.
					&nbsp;&nbsp;&nbsp;&nbsp;Un enfant avec classe <strong>.tabs-nav</strong>.<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chaque enfant de ce bloc .tabs-nav est un lien vers un onglet et doit avoir la classe <strong>.tabs-nav-item</strong>.&nbsp;:<br>
					&nbsp;&nbsp;&nbsp;&nbsp;Un enfant avec classe <strong>.tabs-cont</strong> qui va contenir les onglets.<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chaque onglet doit avoir la classe <strong>.tab</strong>.
					<div class="code">
&lt;div class="tabs vertical" data-default="0"><br>
&nbsp;&nbsp;&nbsp;&nbsp;&lt;nav class="tabs-nav"><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;a href="<strong>#onglet1</strong>" class="tabs-nav-item"><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Onglet 1<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/a><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;a href="#onglet2" class="tabs-nav-item"><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Onglet 2<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/a><br>
&nbsp;&nbsp;&nbsp;&nbsp;&lt;/nav><br>
&nbsp;&nbsp;&nbsp;&nbsp;&lt;div class="tabs-cont"><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div id="<strong>onglet-1</strong>" class="tab"><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&lt;h3 class="hide">Onglet 1&lt;/h3></strong><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ne inani labitur est....<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/p><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div id="onglet-2" class="tab"><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&lt;h3 class="hide">Onglet 1&lt;/h3></strong><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sea cu inimicus salutandi...<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/p><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div><br>
&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div><br>
&lt;/div><br>
					</div>
					L'attribut <strong>href</strong> des <strong>.tabs-nav-item</strong> doit contenir un lien vers l'onglet correspondant sous forme d'ancre. Il permet au javascript de retrouver l'onglet et aux utilisateurs non-javascript d'aller vers l'onglet directement.<br><br>
					Comme la navigation contenant les titres des onglets est dans un bloc séparé des onglets, pour des raisons d'accessibilité, on place des balise <strong>&lt;hN class="hide"></strong> dans les onglets.
					<span class="code">
.hide{	position: absolute;	left: -100000px; top: -10000px;}
					</span>
				</p>
				
				<h2>CSS</h2>
				<p>
					La CSS de base ne contient que le positionnement des blocs en mode horizontal/vertical et mobile/desktop.<br>
					L'habillage graphique sera à ajouter pour chaque cas.<br>
					SCSS: <a href="scss/components/_tabs.scss" download>scss/components/_tabs.scss</a><br>
					CSS: <a href="css/tabs.css" target="_blank">css/tabs.css</a><br>
					HABILLAGE DE BASE CSS: <a href="css/tabs-habillage.css" target="_blank">css/tabs-habillage.css</a>
				</p>
				
				<h2>JAVASCRIPT</h2>
				<p>
					Inclure le constructeur en bas de page avant la fermeture du body&nbsp;:
					<span class="code">
&lt;script src="js/regal-tabs-vanilla.js">&lt;/script>
					</span>
					Déclarer les objets&nbsp;:
					<span class="code">
var tabs = document.querySelectorAll('.tabs');<br>
if(tabs){<br>
&nbsp;&nbsp;&nbsp;&nbsp;tabs.forEach(function(elt){<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(!elt.tab){<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>elt.tab</strong> = new RegalTabs(elt);<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
&nbsp;&nbsp;&nbsp;&nbsp;});<br>
}<br>
					</span>
					On stocke l'objet RegalTab dans l'élément HTML (<strong>elt.tab</strong>) de façon à pouvoir facilement faire appel aux méthodes publiques du constructeur.
				</p>
				<h3>Méthodes publiques</h3>
				<p>
					Pour détruire l'objet&nbsp;:
					<span class="code">
if(elt.tab){<br>
&nbsp;&nbsp;&nbsp;&nbsp;<strong>elt.tab.destroy();</strong><br>
&nbsp;&nbsp;&nbsp;&nbsp;elt.tab = false;<br>
}<br>
					</span>
					Pour updater la hauteur du bloc si jamais son contenu change&nbsp;:
					<span class="code">
if(elt.tab){<br>
&nbsp;&nbsp;&nbsp;&nbsp;<strong>elt.tab.resize();</strong><br>
}<br>
					</span>
					<a href="js/regal-tabs-vanilla.js" download>js/regal-tabs-vanilla.js</a>
				</p>
			</div>
		
			<section class="section tabs-demo">
				<div class="section-inner">
					<h2>Démo en mode vertical</h2>
					<div class="tabs vertical" data-default="0"> <!-- class horizontal/vertical, data-default=indice onglet actif par défaut -->
						<nav class="tabs-nav">
							<a href="#pages" class="tabs-nav-item">
								<span>Onglet 1</span>
							</a>
							<a href="#events" class="tabs-nav-item">
								<span>Onglet 2</span>
							</a>
							<a href="#docs" class="tabs-nav-item">
								<span>Onglet3</span>
							</a>
						</nav>
						<div class="tabs-cont">
							<div id="pages" class="tab">
								<h3 class="hide">Onglet 1</h3>
								<p>
									Ne inani labitur est. Sea cu inimicus salutandi. Invidunt definiebas no mea, viderer legimus reformidans vix ne. Ut sea quando pertinax partiendo, in ius cibo posse invenire, sit alii dico ea. Tempor euismod petentium at sit, et quo posse errem persius. Ignota salutatus dissentiunt pri ei, nostrud tacimates ne vix.
								</p>
								<p>
									Putent platonem contentiones has id, usu choro antiopam ut, ut autem nostrud expetendis nec. Mentitum erroribus et eam, est ei animal efficiantur. Mutat aliquip volutpat pro ad, ei fabulas delenit has. Id mea probo antiopam efficiantur. Ad nam timeam corpora, te pri etiam graeco disputationi, in modo iriure inermis nec. Sea in offendit sensibus laboramus.
								</p>
								<p>
									Laudem aliquip eum ei. Ad lorem numquam sed, eos cu facer vitae fastidii. Audiam accusamus gubergren per ad. Duo ea tollit labore civibus, mel tota minimum consequat at. Vel ea lorem tantas. In cum alienum scaevola.
								</p>
							</div>
							<div id="events" class="tab">
								<h3 class="hide">Onglet 2</h3>
								<p>
									Ad eos quaeque tacimates. An sea odio animal pericula. Mundi admodum sadipscing in eum, pro cu incorrupte sadipscing. Lucilius recusabo ei nec. Nam accusamus efficiantur ad. Est soluta mediocritatem ea, mel molestie erroribus te, no pro fabulas molestie similique.
								</p>
								<p>
									Iudico dolores honestatis in mei, has ut iudico admodum sensibus. Te case labore assentior vel, duo quando nominati salutandi at, possim melius diceret mea ad. Id tamquam fuisset perpetua vim, cu eam equidem oporteat antiopam, tantas dicunt perfecto ei vis. Ut modo natum audiam est, doming iuvaret voluptatibus ex usu. Ut nostro persecuti mei, cu vel dicta deserunt dissentiunt. Te pro reprimique delicatissimi, ea vix timeam tincidunt assueverit.
								</p>
								<p>
									Duo eu tantas dolores cotidieque, ne duo quod facilisi intellegat. Ex has prima mandamus dissentias, ullum prompta iuvaret cu eos, nonumes cotidieque eos ne. Sea ad nobis partem putent, ea aliquid imperdiet mea. Mea vocent scribentur cu, cum iuvaret accusamus ex, quo in habeo alienum. Sonet ridens cu mea.
								</p>
							</div>
							<div id="docs" class="tab">
								<h3 class="hide">Onglet 3</h3>
								<p>
									Has graecis dolores an, natum suavitate incorrupte id eos. Duo modus consulatu hendrerit no, vix nisl aliquid commune in, est ut minim movet. Id nec ceteros fastidii invidunt. Illum integre consectetuer cu vix, eu tollit dicant delenit quo, id viderer imperdiet evertitur vix. Enim tollit numquam pri no, ex pri accumsan periculis, eum brute aeque verear ei.
								</p>
								<p>
									Prompta detraxit adipiscing ut vis, mea at quidam accommodare consequuntur. Vim utinam fastidii deleniti ea, ex eos dicat urbanitas incorrupte. Est dicit solet cu, cum ut affert dolorum interesset, eu mel verterem indoctum postulant. Pri reque platonem maiestatis ea, te ius postea accusata abhorreant. Te est ferri dicit exerci, offendit appareat ut his. Cum agam facer essent te, eum ut solet imperdiet.
								</p>
								<p>
									Cum te stet corpora epicurei. Quo aperiam iuvaret an. Nam wisi voluptaria voluptatum in, epicuri quaestio iracundia ad qui. Eu oratio pertinax sed, ea ignota habemus cum. Ea vix assum adolescens, sit no tation pertinax argumentum.
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<section class="section tabs-demo">
				<div class="section-inner">
				<h2>Démo en mode horizontal</h2>
					<div class="tabs horizontal" data-default="0"> <!-- class horizontal/vertical, data-default=indice onglet actif par défaut -->
						<nav class="tabs-nav">
							<a href="#pages-1" class="tabs-nav-item" id="nav-tab1-1">
								<span>Onglet 1</span>
							</a>
							<a href="#events-1" class="tabs-nav-item" id="nav-tab2-1">
								<span>Onglet 2</span>
							</a>
							<a href="#docs-1" class="tabs-nav-item" id="nav-tab3-1">
								<span>Onglet 3</span>
							</a>
						</nav>
						<div class="tabs-cont">
							<div id="pages-1" class="tab">
								<h3 class="hide">Onglet 1</h3>
								<p>
									Has graecis dolores an, natum suavitate incorrupte id eos. Duo modus consulatu hendrerit no, vix nisl aliquid commune in, est ut minim movet. Id nec ceteros fastidii invidunt. Illum integre consectetuer cu vix, eu tollit dicant delenit quo, id viderer imperdiet evertitur vix. Enim tollit numquam pri no, ex pri accumsan periculis, eum brute aeque verear ei.
								</p>
								<p>
									Prompta detraxit adipiscing ut vis, mea at quidam accommodare consequuntur. Vim utinam fastidii deleniti ea, ex eos dicat urbanitas incorrupte. Est dicit solet cu, cum ut affert dolorum interesset, eu mel verterem indoctum postulant. Pri reque platonem maiestatis ea, te ius postea accusata abhorreant. Te est ferri dicit exerci, offendit appareat ut his. Cum agam facer essent te, eum ut solet imperdiet.
								</p>
								<p>
									Cum te stet corpora epicurei. Quo aperiam iuvaret an. Nam wisi voluptaria voluptatum in, epicuri quaestio iracundia ad qui. Eu oratio pertinax sed, ea ignota habemus cum. Ea vix assum adolescens, sit no tation pertinax argumentum.
								</p>
							</div>
							<div id="events-1" class="tab">
								<h3 class="hide">Onglet 2</h3>
								
								<p>
									Ad eos quaeque tacimates. An sea odio animal pericula. Mundi admodum sadipscing in eum, pro cu incorrupte sadipscing. Lucilius recusabo ei nec. Nam accusamus efficiantur ad. Est soluta mediocritatem ea, mel molestie erroribus te, no pro fabulas molestie similique.
								</p>
								<p>
									Iudico dolores honestatis in mei, has ut iudico admodum sensibus. Te case labore assentior vel, duo quando nominati salutandi at, possim melius diceret mea ad. Id tamquam fuisset perpetua vim, cu eam equidem oporteat antiopam, tantas dicunt perfecto ei vis. Ut modo natum audiam est, doming iuvaret voluptatibus ex usu. Ut nostro persecuti mei, cu vel dicta deserunt dissentiunt. Te pro reprimique delicatissimi, ea vix timeam tincidunt assueverit.
								</p>
								<p>
									Duo eu tantas dolores cotidieque, ne duo quod facilisi intellegat. Ex has prima mandamus dissentias, ullum prompta iuvaret cu eos, nonumes cotidieque eos ne. Sea ad nobis partem putent, ea aliquid imperdiet mea. Mea vocent scribentur cu, cum iuvaret accusamus ex, quo in habeo alienum. Sonet ridens cu mea.
								</p>
							</div>
							<div id="docs-1" class="tab">
								<h3 class="hide">Onglet 3</h3>
								
								<p>
									Ne inani labitur est. Sea cu inimicus salutandi. Invidunt definiebas no mea, viderer legimus reformidans vix ne. Ut sea quando pertinax partiendo, in ius cibo posse invenire, sit alii dico ea. Tempor euismod petentium at sit, et quo posse errem persius. Ignota salutatus dissentiunt pri ei, nostrud tacimates ne vix.
								</p>
								<p>
									Putent platonem contentiones has id, usu choro antiopam ut, ut autem nostrud expetendis nec. Mentitum erroribus et eam, est ei animal efficiantur. Mutat aliquip volutpat pro ad, ei fabulas delenit has. Id mea probo antiopam efficiantur. Ad nam timeam corpora, te pri etiam graeco disputationi, in modo iriure inermis nec. Sea in offendit sensibus laboramus.
								</p>
								<p>
									Laudem aliquip eum ei. Ad lorem numquam sed, eos cu facer vitae fastidii. Audiam accusamus gubergren per ad. Duo ea tollit labore civibus, mel tota minimum consequat at. Vel ea lorem tantas. In cum alienum scaevola.
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<script src="js/regal-tabs-vanilla.js"></script>
		<script>
			var tabs = document.querySelectorAll('.tabs');
			if(tabs){
				tabs.forEach(function(elt){
					if(!elt.tab){
						elt.tab = new RegalTabs(elt);
					}
				});
				
				//close playing videos when opening or closing a tab
				var openCloz = document.querySelectorAll('.tabs-nav-item');
				if(openCloz.length){
					openCloz.forEach(function(el){
						el.addEventListener('click', function(e){
							if(isMobileContext){
								var videoplaying = document.querySelector('.videoplaying');
								if(videoplaying){
									triggerEvent(videoplaying.querySelector('.close'), 'click');
								}
							}
						});
					});
				}
			}
		</script>
	</body>
</html>