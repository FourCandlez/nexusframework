/*  
	Name: Framework
	Version: 2.2.0
	Author: Nexus Studios
	Author URI: http://www.nexusthemes.com/ 
	
	DESCRIPTION: 
	Each theme comes equipped with default frontend styling which is optionally
	overridden in the style.css file in the root of the specific theme. 
	
*/

/* GENERAL FRONTEND STYLES
------------------------------------------------------------------------------------------ */
html, body, div, span, applet, object, input, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, 
dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, 
table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, 
ruby, section, summary, time, mark, audio, video, textarea { border-color: white; }

/* vertical alignment */
html, 
body														{ height: 100%; }
#nxs-container {
	/* the "overflow: auto; property is necessary to prevent parent div's to move when a margin is set on the child div */
	overflow: auto; 
	/* all containing div's including this one need to have a height set to 100% to support vertical relative positioning 
	height: 100%; */
} 
.nxs-dragging #nxs-container {
	/* overflow should be visible in order to draggable items to elements below the visible area */
	overflow: visible;
}
a { 
	/* overriding default browser colorization */
	color: inherit; 
}

/* FALLBACK MODERNIZR TOGGLE
---------------------------------------------------------------------------------------------------- */

/* transitions */
.nxs-m-csstransitions .transition.nxs-default				{ display: block; }
.nxs-m-csstransitions .transition.nxs-fallback 				{ display: none; }
.nxs-m-no-csstransitions .transition.nxs-fallback			{ display: block; }
.nxs-m-no-csstransitions .transition.nxs-default			{ display: none; }

/* 3d transforms */
.nxs-m-csstransforms3d .transform.nxs-default				{ display: block; }
.nxs-m-csstransforms3d .transform.nxs-fallback 				{ display: none; }
.nxs-m-no-csstransforms3d .transform.nxs-fallback			{ display: block; }
.nxs-m-no-csstransforms3d .transform.nxs-default			{ display: none; }

/* touchdevices */
.nxs-m-touch .nxs-default									{ display: none !important; }
.nxs-m-touch .nxs-fallback									{ display: block !important; }
/* align the fallback content to the left */
.nxs-m-touch .nxs-fallback .nxs-title,
.nxs-m-touch .nxs-fallback p,
.nxs-m-touch .nxs-fallback .nxs-button,
.nxs-m-no-csstransitions .nxs-fallback .nxs-title,
.nxs-m-no-csstransitions .nxs-fallback p,
.nxs-m-no-csstransitions .nxs-fallback .nxs-button,
.nxs-m-no-csstransforms3d .nxs-fallback .nxs-title,
.nxs-m-no-csstransforms3d .nxs-fallback p,
.nxs-m-no-csstransforms3d .nxs-fallback .nxs-button 		{ text-align: left !important; }

/* DEFAULT IMAGE STYLING */
.nxs-shadow 												{ box-shadow: 0 2px 6px rgba(10, 10, 10, 0.6); }
.nxs-image-wrapper											{ width: 100%; height: 100%; top: 0px; left: 0px; overflow: hidden; }
.nxs-stretch img,
.nxs-stretch												{ width: 100% !important; height: auto !important; }
.nxs-stretch.nxs-icon-left									{ float: none; }
.nxs-size-contain { max-width: 100%; }
.nxs-ratio-original { width: auto !important; height: auto !important; }
.nxs-img-width-1-0 { width: 40px !important; }
.nxs-img-width-2-0 { width: 80px !important; }
.nxs-img-width-3-0 { width: 120px !important; }
.nxs-img-width-4-0 { width: 160px !important; }
.nxs-img-width-5-0 { width: 200px !important; }
.nxs-img-width-6-0 { width: 240px !important; }
.nxs-img-width-7-0 { width: 280px !important; }
.nxs-img-width-8-0 { width: 320px !important; }
.nxs-img-width-9-0 { width: 360px !important; }
.nxs-img-width-10-0 { width: 400px !important; }
.nxs-img-width-15-0 { width: 600px !important; }
.nxs-img-width-22-0 { width: 880px !important; }

/* backface visibility */
.backface {
/* http://stackoverflow.com/questions/16208851/images-wiggles-when-hover-scale-effect */
	-webkit-backface-visibility: hidden;
	-moz-backface-visibility:    hidden;
	-ms-backface-visibility:     hidden;
}

/* IOS background cover fix */
html.nxs-touchdevice										{ background-size: auto !important; height: 100% !important; }
.nxs-m-touch #supersized li a img 							{ width: auto !important; height: 100% !important; }

/* grayscale transition */
img.nxs-grayscale { 
	filter: 		grayscale(100%);
	-webkit-filter: grayscale(100%);
	-webkit-transition: all .6s ease;
	filter: gray;
	
	/* http://stackoverflow.com/questions/16208851/images-wiggles-when-hover-scale-effect */
	-webkit-backface-visibility: hidden;
	-moz-backface-visibility:    hidden;
	-ms-backface-visibility:     hidden;
}
img.nxs-grayscale:hover,
.nxs-m-touch img.nxs-grayscale { 
	filter: 		grayscale(0%);
	-webkit-filter: grayscale(0%);
	filter: none;
}

/* enlarge transition */
img.nxs-enlarge { 	
	transition: 		all 0.2s linear;
	-o-transition: 		all 0.2s linear; 
	-moz-transition: 	all 0.2s linear;
	-webkit-transition: all 0.2s linear; 
	
	/* http://stackoverflow.com/questions/16208851/images-wiggles-when-hover-scale-effect */
	-webkit-backface-visibility: hidden;
	-moz-backface-visibility:    hidden;
	-ms-backface-visibility:     hidden;
}
img.nxs-enlarge:hover { 
	transform: 			scale(1.1);
	-o-transform: 		scale(1.1);
	-moz-transform: 	scale(1.1);
	-webkit-transform: 	scale(1.1); 
}
.nxs-m-touch img.nxs-enlarge:hover {
	transform: 			none;
	-o-transform: 		none;
	-moz-transform: 	none;
	-webkit-transform: 	none;
}

/* DEFAULT BACKGROUND IMAGE */
.image-background {
	background-size: 	 	 cover !important;
	-o-background-size: 	 cover !important;
	-moz-background-size: 	 cover !important;
	-webkit-background-size: cover !important;
}

/* DEFAULT HOVER STYLING */
a.nxs-button,
a .nxs-title,
.nxs-blog a,
.nxs-default-p a { 
	opacity: 1;
	transition: 		opacity 0.1s linear;
	-o-transition: 		opacity 0.1s linear; 
	-moz-transition: 	opacity 0.1s linear;
	-webkit-transition: opacity 0.1s linear;
}
a.nxs-button:hover,
a:hover .nxs-title,
.nxs-blog a:hover,
.nxs-default-p a:hover										{ opacity: 0.8; }

/* DEFAULT FORM STYLING */
.nxs-form label,
.nxs-form input,
.nxs-form textarea											{ width: 100%; line-height: 1.625em; font-size: 15px; }
.nxs-form input												{ height: 30px; line-height: 30px; text-indent: 10px; margin-bottom: 10px; }
.nxs-form textarea											{ min-height: 200px; width: 98%; padding: 1%; }
.nxs-form .invalidcontent									{ background-color: red; }
.nxs-form select { 
	font-size: 15px; 
	padding: .4em; 
	background-color: #fff; 
	box-shadow: 0px 0px 0px 1px gray inset; 
	position: relative;
	display: inline-block;
	border: 0;
	border-radius: 3px;
	-webkit-appearance: none;
	-moz-appearance: 	none;
	appearance: 		none;
}

/* DEFAULT FILLER */
.nxs-filler													{ padding: 5px 0; }

/* OLD-SKOOL FRONTEND BUTTON */
.nxs-datepicker a.ui-datepicker-prev,
.nxs-datepicker a.ui-datepicker-next,
a.nxs-frontendbutton2 {
	padding: 0 10px;
	display: block;
	float: left;
	line-height: 2em;
	font-weight: bold;
	font-size: 11px;
	height: 2em;
	-webkit-border-radius: 	3px;
	-moz-border-radius: 	3px;
	border-radius: 			3px;
}

/* DEFAULT ICON FONT LIST */
ul.icon-font-list li { 
	float: left; 
	text-align: center;
	transition: 		all 0.1s linear;
	-o-transition: 		all 0.1s linear; 
	-moz-transition: 	all 0.1s linear;
	-webkit-transition: all 0.1s linear;
	font-size: 24px; 
	width: 36px;
	line-height: 36px;
	height: 36px;
}
ul.icon-font-list.comments li,
ul.icon-font-list li:hover 									{ font-size: 32px; }
ul.icon-font-list .nxs-comments-count						{ position: absolute; color: white; width: 35px; font-size: 12px; left: 0px; top: 2px; text-shadow: none; }

/* DEFAULT DATE */
.nxs-date		 											{ width: 80px; float: left; margin: 0 20px 10px 0; }
.nxs-date .month { 
	border-bottom-width: 0px;
	width: 100%; 
	text-align: center; 
	text-transform: uppercase; 
	font-size: 16px; 
	line-height: 24px; 
	height: 24px; 
	border-top-left-radius: 3px;
	border-top-right-radius: 3px;
}
.nxs-date .day {
	border-top-width: 1px; 
	width: 100%; 
	text-align: center; 
	font-size: 28px; 
	line-height: 44px; 
	height: 44px; 
	border-bottom-left-radius: 3px;
	border-bottom-right-radius: 3px;
}
.nxs-date.nxs-date-size-0-75								{ width: 60px; }
.nxs-date.nxs-date-size-0-75 .month 						{ font-size: 12px; line-height: 18px; height: 18px; }
.nxs-date.nxs-date-size-0-75 .day 							{ font-size: 21px; line-height: 33px; height: 33px; }


/* DEFAULT LIST */
ul.nxs-default-list				 							{ margin-bottom: 20px; }
ul.nxs-default-list											{ line-height: 1.625em; font-size: 15px; margin-top: 10px; }

/* HIDE DOWNLOAD ICON ON TOUCHDEVICES*/
.nxs-m-touch ul.icon-font-list li.download,
.nxs-m-touch ul.icon-font-list li.download 					{ display: none; }

/* DEFAULT BUTTONS */
.nxs-button													{ display: inline-block; line-height: 1 !important; border-style: solid; border-width: 1px; border-radius: 3px; }
.nxs-button span											{ margin-left: 0.5em; }

/* WIDGET ACCORDION */
.nxs-widget	.nxs-title a span { 
	font-size: 20px; 
	margin-right: 8px; 
	transition: 		all 0.1s linear;
	-o-transition: 		all 0.1s linear; 
	-moz-transition: 	all 0.1s linear;
	-webkit-transition: all 0.1s linear;
}
.nxs-widget	.nxs-title a:hover span 						{ opacity: 0.5; }

/* CLASSIC WP STYLING */
.alignleft													{ float: left; }
.alignright													{ float: right; }
.wp-caption 												{ border: 1px solid #ddd; text-align: center; background-color: #f3f3f3; padding-top: 4px; margin: 10px; max-width: 96.5%; border-radius: 3px; }

/* TRANSITION / TRANSFORM FEATURES
---------------------------------------------------------------------------------------------------- */

/* BLINKING FEATURE */
@keyframes blink {  
	0% 		{ opacity: 0.2; }
	50%		{ opacity: 1; }
	100% 	{ opacity: 0.2; }
}
@-webkit-keyframes blink {
	0% 		{ opacity: 0.2; }
	50%		{ opacity: 1; }
	100% 	{ opacity: 0.2; }
}
.blink {
	-webkit-animation: 	blink 2s linear infinite;
	animation: 			blink 2s linear infinite;
}

/* BLINKING FEATURE (supersized metadata) */
@keyframes blink2 {  
	0% 		{ opacity: 0; }
	15%		{ opacity: 1; }
	85%		{ opacity: 1; }
	100% 	{ opacity: 0; }
}
@-webkit-keyframes blink2 {
	0% 		{ opacity: 0; }
	15%		{ opacity: 1; }
	85%		{ opacity: 1; }
	100% 	{ opacity: 0; }
}
.blink3-3 	{ -webkit-animation: blink2 3.3s linear infinite; animation: blink2 3.3s linear infinite; }
.blink4-3 	{ -webkit-animation: blink2 4.3s linear infinite; animation: blink2 4.3s linear infinite; }
.blink5-3 	{ -webkit-animation: blink2 5.3s linear infinite; animation: blink2 5.3s linear infinite; }
.blink6-3 	{ -webkit-animation: blink2 6.3s linear infinite; animation: blink2 6.3s linear infinite; }

/* ROTATING FEATURE */
@keyframes rotating {
from 		{ transform: rotate(0deg); }
to 			{ transform: rotate(360deg); }
}
@-webkit-keyframes rotating {
from 		{ -webkit-transform: rotate(0deg); }
to 			{ -webkit-transform: rotate(360deg); }
}
.rotate {
	-webkit-animation: 	rotating 1s linear infinite;
	animation: 			rotating 1s linear infinite;
}

/* http://coding.smashingmagazine.com/2011/09/14/the-guide-to-css-animation-principles-and-examples/ */
@-webkit-keyframes kenburns {
   from 	{ -webkit-transform: scale(1.0); }
   to   	{ -webkit-transform: scale(1.3); }
}

/* This is the element that we apply the animation to. */
.kenburns ul#supersized li {
   -webkit-animation-name: kenburns;
   -webkit-animation-duration: 60s;
   -webkit-animation-timing-function: lineair; 	/* ease is the default */
   -webkit-animation-delay: 0s;             	/* 0 is the default */
   -webkit-animation-iteration-count: infinite; /* 1 is the default */
   -webkit-animation-direction: alternate;  	/* normal is the default */
   animation-name: kenburns;
   animation-duration: 60s;
   animation-timing-function: lineair; 	/* ease is the default */
   animation-delay: 0s;             	/* 0 is the default */
   animation-iteration-count: infinite; /* 1 is the default */
   animation-direction: alternate;  	/* normal is the default */
}



/* GENERAL LAYOUT STYLING
----------------------------------------------------------------------------------------------------*/

/* 
	Each sitewide element has a "widescreen" version. The widescreen version triggers a fullwidth mode (100%)
	on the parent container (header, content, footer). It also set's a width on each accompanying child element,
	effectively creating a new container which can then be aligned to the center
*/

.nxs-sitewide-element										{ width: 960px; margin: 0 auto; }
.nxs-sitewide-element.nxs-widescreen						{ width: 100% !important; }
.nxs-sitewide-element.nxs-widescreen .nxs-cursor			{ width: 100%; }
#nxs-sidebaredit-container .nxs-sitewide-element			{ width: auto; }

#nxs-content-container,
#nxs-header,
#nxs-content 												{ position: relative; }

.nxs-main 													{ float: left; width: 652px; }
.nxs-sidebar1 												{ float: right;	width: 308px; }

.nxs-widescreen #nxs-content-container.has-sidebar  		{ width: 960px; margin: 0 auto; }
.nxs-widescreen .nxs-row-container	 						{ width: 924px; margin: 0 auto; }
.nxs-widescreen .nxs-main									{ width: 616px; }
.nxs-widescreen .nxs-sidebar1,
.nxs-widescreen .nxs-sidebar1 .nxs-row-container			{ width: 272px; }

.nxs-filler2												{ clear: both; }

.nxs-row1 													{ background: transparant; border-left: 36px solid transparent; position: relative; }
.nxs-row2													{ border: 0px; position: relative; }

/* default margin bottom */
.stack-item,
.nxs-placeholder											{ position: relative; margin-bottom: 30px; }

.nxs-list-container .nxs-row1,
.nxs-menu-container .nxs-row1,
.nxs-slideset-container .nxs-row1,
#admin-container .nxs-sitewide-element .nxs-row1			{ border-left: 0px; }
.nxs-list-container .nxs-one-whole,
.nxs-menu-container .nxs-one-whole,
.nxs-slideset-container .nxs-one-whole,
#admin-container .nxs-sitewide-element .nxs-one-whole 		{ width: 958px !important; }
.nxs-list-container .nxs-placeholder,
.nxs-menu-container .nxs-placeholder,
.nxs-slideset-container .nxs-placeholder					{ border-right: 0 !important; }

.nxs-sidebar1 .nxs-row1 									{ border-left: 0px; }
.nxs-fullwidth 												{ width: 960px; }
.nxs-placeholder 											{ background: transparant;	border-right: 36px solid transparent; position: relative; float: left; }
.nxs-fullwidth .nxs-one-whole								{ width: 960px !important; }
.nxs-fullwidth .nxs-placeholder 							{ border-right: none !important; } 
.nxs-fullwidth .nxs-placeholder-container 					{ border-right: 0px; }

#nxs-support 												{ font-family: 'Droid Sans', sans-serif; font-size: 16px; }

/* DEFAULT PLACEHOLDER CONTAINER WIDTH */
.nxs-one-fourth												{ width: 195px; }
.nxs-one-third												{ width: 272px; }
.nxs-one-half												{ width: 426px; }
.nxs-two-third												{ width: 580px; }
.nxs-one-whole												{ width: 888px; }

.nxs-main .nxs-one-fourth 									{ width: 118px; }
.nxs-main .nxs-one-third									{ width: 169px; }
.nxs-main .nxs-one-half 									{ width: 272px; }
.nxs-main .nxs-two-third									{ width: 374px; }
.nxs-main .nxs-one-whole									{ width: 580px; }

.nxs-sidebar-container .nxs-one-whole 						{ width: 272px; }	/* 308 = total width sidebar - 36 pixels border right */

/* GENERAL CSS STYLING
----------------------------------------------------------------------------------------------------*/

/* HEIGHT */
.nxs-height100												{ height: 100%; }

/* max-height */
.nxs-max-height-100											{ max-height: 100% !important; }
.nxs-max-height-90											{ max-height: 90% !important; }
.nxs-max-height-80											{ max-height: 80% !important; }
.nxs-max-height-70											{ max-height: 70% !important; }
/* margin */
.nxs-margin10												{ margin: 10px; }
.nxs-margin20												{ margin: 20px; }
.nxs-margin30												{ margin: 30px; }
/* top */
.nxs-margin-top-10											{ margin-top: -10px; }
.nxs-margin-top-20											{ margin-top: -20px; }
.nxs-margin-top-30											{ margin-top: -30px; }
.nxs-margin-top-40											{ margin-top: -40px; }
.nxs-margin-top-50											{ margin-top: -50px; }
.nxs-margin-top-0											{ margin-top: 0px !important; }
.nxs-margin-top5 											{ margin-top: 5px !important; }
.nxs-margin													{ margin-top: 10px; }
.nxs-margin-top20 											{ margin-top: 20px; }
.nxs-margin-top30 											{ margin-top: 30px; }
.nxs-margin-top40 											{ margin-top: 40px; }
.nxs-margin-top60 											{ margin-top: 60px; }
/* bottom */
.nxs-margin-bottom0											{ margin-bottom: 0px !important; }
.nxs-margin-bottom10										{ margin-bottom: 10px; }
.nxs-margin-bottom15										{ margin-bottom: 15px; }
.nxs-margin-bottom20										{ margin-bottom: 20px; }
.nxs-margin-bottom30										{ margin-bottom: 30px; }
.nxs-margin-bottom40										{ margin-bottom: 40px; }
.nxs-margin-bottom50										{ margin-bottom: 50px; }
/* right */
.nxs-margin-right10											{ margin-right: 10px; }
.nxs-margin-right15											{ margin-right: 15px; }
/* left */
.nxs-margin-left5											{ margin-left: 5px; }
.nxs-margin-left10											{ margin-left: 10px; }
.nxs-margin-left15											{ margin-left: 15px; }
.nxs-margin-left30											{ margin-left: 30px; }
.nxs-margin-left36											{ margin-left: 36px; }
.nxs-margin-left50											{ margin-left: 50px !important; } /* Topbar */
.nxs-margin-left60											{ margin-left: 60px; }
.nxs-margin-left90											{ margin-left: 90px; }
.nxs-margin-left120											{ margin-left: 120px; }
.nxs-margin-left150											{ margin-left: 150px; }
.nxs-margin-left180											{ margin-left: 180px; }
.nxs-margin-left210											{ margin-left: 210px; }
.nxs-margin-left240											{ margin-left: 240px; }
.nxs-margin-left270											{ margin-left: 270px; }
.nxs-margin-left300											{ margin-left: 300px; }
.nxs-margin-left330											{ margin-left: 330px; }
.nxs-margin-left360											{ margin-left: 360px; }
.nxs-margin-left390											{ margin-left: 390px; }
.nxs-margin-tabs											{ margin-left: 112px; }

/* PADDING */
/* top */
.padding,
.nxs-padding,
.nxs-padding-top10											{ padding-top: 10px; }
.nxs-padding-top15											{ padding-top: 15px; }
.nxs-padding-top20											{ padding-top: 20px; }
.nxs-padding-top30											{ padding-top: 30px; }
.nxs-padding-top40											{ padding-top: 40px; }
.nxs-padding-top50											{ padding-top: 50px; }
/* bottom */
.nxs-padding-bottom0										{ padding-bottom: 0px !important; }
.nxs-padding-bottom10										{ padding-bottom: 10px !important; }
.nxs-padding-bottom20										{ padding-bottom: 20px; }
.nxs-padding-bottom30										{ padding-bottom: 30px; }
.nxs-padding-bottom40										{ padding-bottom: 40px; }
.nxs-padding-bottom50										{ padding-bottom: 50px; }
/* right */
.nxs-padding-right100										{ padding-right: 100px; }
.nxs-padding10												{ padding: 10px; }
/* left */
.nxs-padding-left10											{ padding-left: 10px !important; }

/* MIN HEIGHT */
.nxs-min-height100											{ min-height: 100px }
.nxs-min-height200											{ min-height: 200px }
.nxs-min-height300											{ min-height: 300px }

/* ALIGNMENT */
.nxs-align-left												{ text-align: left; }
.nxs-align-center											{ text-align: center; }
.nxs-align-right											{ text-align: right; }

/* MARGIN PERCENTAGE */
.nxs-margin-5-percent										{ margin: 0 5%; }
.nxs-margin-10-percent										{ margin: 0 10%; }
.nxs-margin-15-percent										{ margin: 0 15%; }
.nxs-margin-20-percent										{ margin: 0 20%; }

/* WIDTH PERCENTAGE */
.nxs-width5													{ width: 5%; }
.nxs-width10												{ width: 10% !important; }
.nxs-width20												{ width: 20% !important; }
.nxs-width30												{ width: 30% !important; }
.nxs-width40 												{ width: 40% !important; }
.nxs-width50 												{ width: 50% !important; } 
.nxs-width60 												{ width: 60% !important; }
.nxs-width70 												{ width: 70% !important; }
.nxs-width80												{ width: 80% !important; }
.nxs-width90												{ width: 90% !important; }
.nxs-width97 												{ width: 97%; }
.nxs-width100 												{ width: 100%; }
.nxs-width200 												{ width: 200px; }

/* PADDING */
.bg-padding-large											{ padding: 30px; }
.bg-padding-medium											{ padding: 20px; }
.bg-padding-small											{ padding: 10px; }
.bg-padding-mini											{ padding: 5px; }

/* BORDER RADIUS */
.nxs-border-radius5											{ border-radius: 5px; }
.border-radius-mini											{ border-radius: 3px; }
.border-radius-small										{ border-radius: 5px; }
.border-radius-medium										{ border-radius: 8px; }
.border-radius-large										{ border-radius: 10px; }

/* FLOAT */
.nxs-float-right 											{ float: right; }
.nxs-float-left												{ float: left; }
.nxs-center													{ display: table; margin: 0 auto; }

/* ABSOLUTE */
.nxs-right													{ right: 0px; }

/* KITCHEN SINK */
.nxs-clear 													{ clear: both; }
.nxs-font-80												{ font-size: 80%; }
.nxs-drop-area												{ background: #E0E0E0; box-shadow: none; }
.nxs-padding-list-item,
.nxs-padding-menu-item 										{ padding: 5px 10px; }
.absolute,
.nxs-absolute 												{ position: absolute; }
.nxs-relative 												{ position: relative; }
.nxs-visible												{ visibility: visible; }
.nxs-small-caps												{ font-variant: small-caps; }
.nxs-margin-auto											{ margin: 0 auto; }
.nxs-margin-auto-right										{ margin: 0 0 0 auto; }
.nxs-inline													{ display: inline !important; }
.nxs-table													{ display: table; }
.nxs-table-cell												{ display: table-cell; vertical-align: middle; }
.nxs-overflow												{ overflow: hidden; }
.nxs-display-none											{ display: none; }

/* Used to delineate an undefined. Styling taken over by the unistyle styling
.nxs-border-dash											{ border: 1px dashed #666666; }*/


/* FONT STYLING & MISCELLANEOUS
----------------------------------------------------------------------------------------------------*/
.nxs-slide-description p,
#nxs-header .nxs-menu.nav a 								{ font-size: 16px; line-height: 2em; }

/* DEFAULT PARAGRAPHS */
.nxs-slide-description-content p,
.nxs-text span,
.nxs-text p,
.nxs-blog p,
.nxs-default-p												{ line-height: 1.625em; font-size: 15px; padding-bottom: 1.625em; /*display: block;*/ }
.nxs-text span												{ padding-bottom: 0px; }

.twtr-widget p,
p.small 													{ font-size: 12px; line-height: 1.8em; }

/* MISCELLANEOUS */
span.nxs-dropcap p:first-child:first-letter 				{ font-size: 48px; line-height: 1em; } 
p#nxs-copyright												{ font-size: 9px; padding-bottom: 30px; text-align: center; width: 100%; }
html.nxs-pageslider p#nxs-copyright												{ padding-bottom: 60px; }

.nxs-content-archive h3 a									{ background: url('../images/text-icon-medium.png') no-repeat top left; padding-left: 30px; }

/* ORDERED- UN-ORDERED LISTS */,
.nxs-blog ul 												{ list-style: none; }
.nxs-menu-vertical ul li									{ margin-top: 10px }

/* BOLD */
#nxs-container b,
#nxs-container strong										{ font-weight: bold; }

/* ITALIC */
#nxs-container cite, 
#nxs-container em, 
#nxs-container i 											{ font-style: italic; }

/* TABLES & DATEPICKER
----------------------------------------------------------------------------------------------------*/
#nxs-container table,
.nxs-datepicker table 										{ border: 1px solid #DFDFDF !important; background-color: #F9F9F9; width: 100%; border-collapse: separate !important; }
#nxs-container table th,
.nxs-datepicker th 											{ color: #333333; text-shadow: rgba(255, 255, 255, 0.8) 0 1px 0; overflow: hidden; text-align: left; line-height: 36px; font-size: 15px; }
#nxs-container thead,
.nxs-datepicker thead,
#nxs-container table td.header 								{ font-weight: bold; }
#nxs-container thead,
.nxs-datepicker thead {
	background-color: #F1F1F1;
	background: 						   -o-linear-gradient(#F9F9F9,     #ECECEC);
	background:    						 -moz-linear-gradient(#F9F9F9,     #ECECEC);
	background: 					  -webkit-linear-gradient(#F9F9F9,     #ECECEC);
	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#F9F9F9), to(#ECECEC));
	filter: progid:DXImageTransform.Microsoft.Gradient(GradientType=0,StartColorStr=#F9F9F9,EndColorStr=#ECECEC);
}
#nxs-container table tr.highlight td						{ font-weight: bold; }
#nxs-container table th										{ padding: 0 15px; }
#nxs-container table td,
.nxs-datepicker table th,
.nxs-datepicker table td 									{ border-top: 1px solid white;  padding: 0 15px; }
#nxs-container table td,
.nxs-datepicker table td									{ line-height: 1.5em; padding: 8px 15px; font-size: 15px; }
#nxs-container table a,
.nxs-datepicker table a 									{ text-decoration: none; line-height: 30px; }
#nxs-container table tr:nth-child(even),
.nxs-datepicker table tr:nth-child(even) 					{ background: #F6F6F6; } 

/* WIDGETS
------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------ */

/* GENERAL IMAGE STYLING 
---------------------------------------------------------------------------------------------------- */
.nxs-icon-left 												{ float: left; margin: 0 20px 10px 0; }
.nxs-icon-right												{ float: right; margin-left: 20px; }

/* HORIZONTAL NAVIGATION 
---------------------------------------------------------------------------------------------------- */
div.nxs-menu-minified										{ display: none; }
.right ul.nxs-menu.nxs-menu-minified             			{ float: left; }

.nxs-menu .nxs-active > a                           		{ cursor: default; }
.nxs-menu .nxs-inactive > a                         		{ cursor: pointer; }
.nxs-menu a.nxs-menuitemnolink                      		{ cursor: default; }

/* Enabling center alignment */
.nxs-menu-aligner.nxs-menu-center							{ position: relative; left: 50%; }
.nxs-menu-aligner.nxs-menu-center .nxs-menu					{ position: relative; right: 50%; }

/* Enabling left / right alignment */
ul.nxs-menu.nxs-float-left li a								{ padding-right: 20px; }
ul.nxs-menu.nxs-float-right li a							{ margin-left: 20px; }
ul.nxs-menu.nxs-float-left li a:last-child 					{ margin-right: 0px; }

/* menu item height */
ul.nxs-menu li.height20 a									{ line-height: 100px; }
ul.nxs-menu li.height15 a									{ line-height: 75px; }
ul.nxs-menu li.height14 a									{ line-height: 70px; }
ul.nxs-menu li.height13 a									{ line-height: 65px; }
ul.nxs-menu li.height12 a									{ line-height: 60px; }
ul.nxs-menu li.height11 a									{ line-height: 55px; }
ul.nxs-menu li.height10 a									{ line-height: 50px; }
ul.nxs-menu li.height09 a									{ line-height: 45px; }
ul.nxs-menu li.height08 a									{ line-height: 40px; }
ul.nxs-menu li.height20 ul.nxs-sub-menu						{ top: 100px; }
ul.nxs-menu li.height15 ul.nxs-sub-menu						{ top: 75px; }
ul.nxs-menu li.height14 ul.nxs-sub-menu						{ top: 70px; }
ul.nxs-menu li.height13 ul.nxs-sub-menu						{ top: 65px; }
ul.nxs-menu li.height12 ul.nxs-sub-menu						{ top: 60px; }
ul.nxs-menu li.height11 ul.nxs-sub-menu						{ top: 55px; }
ul.nxs-menu li.height10 ul.nxs-sub-menu						{ top: 50px; }
ul.nxs-menu li.height09 ul.nxs-sub-menu						{ top: 45px; }
ul.nxs-menu li.height08 ul.nxs-sub-menu						{ top: 40px; }
ul.nxs-menu li:hover ul li.height20							{ height: 100px; }
ul.nxs-menu li:hover ul li.height15							{ height: 75px; }
ul.nxs-menu li:hover ul li.height14							{ height: 70px; }
ul.nxs-menu li:hover ul li.height13							{ height: 65px; }
ul.nxs-menu li:hover ul li.height12							{ height: 60px; }
ul.nxs-menu li:hover ul li.height11							{ height: 55px; }
ul.nxs-menu li:hover ul li.height10							{ height: 50px; }
ul.nxs-menu li:hover ul li.height09							{ height: 45px; }
ul.nxs-menu li:hover ul li.height08							{ height: 40px; }

ul.nxs-menu li ul { 
	opacity: 0; 
	padding: 0px; 
	position: absolute; 
	left: 0px; 
	z-index: 100; 
	width: 230px;
	box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.1);
	visibility: hidden; /* using "visibility" to negate triggering invisible anchors */
}
ul.nxs-menu li:hover ul 									{ opacity: 1; visibility: visible; }

ul.nxs-menu li 												{ list-style: none; float: left; position: relative; }
ul.nxs-menu li a 											{ display: block; padding: 0 1.2125em ; font-size: 16px; }

ul.nxs-menu li ul li 										{ float: none; /* disabling sub menu's to huddle up directly against parent anchor text */ }
ul.nxs-menu li ul li:first-child 							{ margin-left: 0em; }
ul.nxs-menu li ul li a 										{ padding: 0px; /* disabling sub anchors inheriting extra padding */ }

ul.nxs-menu li ul li ul 									{ left: 100%; top: 0px !important; }

ul.nxs-menu li:hover > ul									{ z-index: 1000; }
ul.nxs-menu li:hover > ul > ul								{ z-index: 1001; }
ul.nxs-menu li:hover > ul > ul > ul							{ z-index: 1002; }

/* transitions */
ul.nxs-menu li ul {	
	-webkit-transition: all .25s ease .1s;
	-moz-transition: 	all .25s ease .1s;
	-o-transition: 		all .25s ease .1s;
	transition: 		all .25s ease .1s;
}
ul.nxs-menu li ul li { 
	height: 0;
	padding: 0;
	padding-left: 20px;
	
	-webkit-transition: height .25s ease .1s;
	-moz-transition: 	height .25s ease .1s;
	-o-transition: 		height .25s ease .1s;
	transition: 		height .25s ease .1s;
}

/* but no transitions for ipad menu's */
.nxs-m-touch ul.nxs-menu li ul li,
.nxs-m-touch ul.nxs-menu li ul 								{ -webkit-transition: none; -moz-transition: none; -o-transition: none; transition: none; }

.nxs-m-csstransitions ul.nxs-menu li ul li ul 				{ opacity: 0; }
.nxs-m-csstransitions ul.nxs-menu li ul li:hover ul 		{ opacity: 1; }

/* IE8 opacity fallback */
.nxs-ie-8 ul.nxs-menu li ul li ul li ul 					{ display: none !important; }
.nxs-ie-8 ul.nxs-menu li ul li ul li:hover ul 				{ display: block !important; }
.nxs-ie-8 ul.nxs-menu li ul li ul 							{ display: none; }
.nxs-ie-8 ul.nxs-menu li ul li:hover ul 					{ display: block; }

/* Menu item font sizes */
ul.item-fontsize12 li a										{ font-size: 20px; }
ul.item-fontsize11 li a										{ font-size: 18px; }
ul.item-fontsize10 li a										{ font-size: 16px; }
ul.item-fontsize09 li a										{ font-size: 14px; }
ul.item-fontsize08 li a										{ font-size: 12px; }

/* Minified anchor */
div.nxs-menu-minified > a									{ line-height: 53px; font-size: 20px; display: block; }
div.nxs-menu-minified .nxs-expand							{ display: block !important; }
div.nxs-menu-minified .nxs-expand ul						{ display: block; }
div.nxs-menu-minified .nxs-expand ul li						{ width: 100%; }

/* Enabling drop down menu's for touch devices */
ul.nxs-menu li.nxs-touched > ul								{ z-index: 1000; }
ul.nxs-menu li.nxs-touched > ul > ul						{ z-index: 1001; }
ul.nxs-menu li.nxs-touched > ul > ul > ul					{ z-index: 1002; }

ul.nxs-menu li ul											{ opacity: 0; visibility: hidden; }
ul.nxs-menu li.nxs-touched > ul								{ opacity: 1; visibility: visible; }
ul.nxs-menu li ul li ul li.nxs-touched > ul					{ opacity: 1; }

ul.nxs-menu li.nxs-touched ul li.height13					{ height: 65px; }
ul.nxs-menu li.nxs-touched ul li.height12					{ height: 60px; }
ul.nxs-menu li.nxs-touched ul li.height11					{ height: 55px; }
ul.nxs-menu li.nxs-touched ul li.height10					{ height: 50px; }
ul.nxs-menu li.nxs-touched ul li.height09					{ height: 45px; }
ul.nxs-menu li.nxs-touched ul li.height08					{ height: 40px; }

/* WORDPRESS NATIVE MENU 
---------------------------------------------------------------------------------------------------- */

.nxs-native-menu ul.menu li.menu-item-has-children > a		{ cursor: default; }

/* Enabling center aligment 
http://css-tricks.com/centering-list-items-horizontally-slightly-trickier-than-you-might-think/ */
.right ul.nxs-menu	 										{ float: right; }
.center ul.nxs-menu											{ display: table; margin: 0 auto; }
.center ul.nxs-menu > li									{ display: inline; }

/* Responsive menu */
.responsive ul li											{ line-height: 40px; }
.responsive ul.nxs-sub-menu > li							{ text-indent: 30px; }
.responsive ul.nxs-sub-menu > li ul li						{ text-indent: 60px; }


/* SOCIAL ICONS 
---------------------------------------------------------------------------------------------------- */
.nxs-sharing .nxs-share										{ margin: 0 15px 10px 0; ; float: left; height: 62px; }
#nxs-social-icons img 										{ float: left; margin-right: 5px; width: 20px; height: 20px; }
.nxs-sharing .nxs-share.nxs-pinterest						{ margin-top: 30px; height: 30px; }


/* SLIDESHOW 
---------------------------------------------------------------------------------------------------- */
.nxs-slide 													{ position: relative; /*opacity: 0;*/ }	
.nxs-slide-img { 
	/*position: absolute;*/ 
	background-size: 		 cover !important;
	-o-background-size: 	 cover !important;
	-moz-background-size: 	 cover !important;
	-webkit-background-size: cover !important;
}
.nxs-ie-8 .nxs-slide-img									{ position: relative; }
.nxs-slider-prev span,
.nxs-slider-next span,
a.nxs-slider-prev, 
a.nxs-slider-next 											{ position: absolute; width: 37px; height: 37px; z-index: 40; }
.nxs-slider-prev 											{ left: -18px; }	
.nxs-slider-next 											{ right: -18px; }
.nxs-slider-prev span 										{ background: url('../images/l-arrow.png') 9px 7px no-repeat; border-radius: 20px; }
.nxs-slider-next span 										{ background: url('../images/r-arrow.png') 12px 7px no-repeat; border-radius: 20px; }
.nxs-slider-prev span,
.nxs-slider-next span 										{ width: 37px; height: 38px; cursor: pointer; box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.3); }
.nxs-slide-description-content 								{ position: absolute; width: 270px; top: 0px; right: 0px; bottom: 0px; padding: 35px 35px 45px; }
.nxs-slide-description-content .nxs-default-p				{ padding-bottom: 0px; }

/* Main controllers */
.nxs-slider-controller 										{ text-align: center; position: absolute; z-index: 100; background: none !important; width: 340px; right: 0px; }
.nxs-slider-controller a { 
	background: url('../images/controller1.png') no-repeat; 
	display: block; 
	height: 14px; 
	margin-right: 4px; 
	text-indent: 100px; 
	width: 14px; 
	display: inline-block; 
	overflow: hidden;
}
.nxs-slider-controller a.activeSlide, 
.nxs-slider-controller a:hover 								{ background: url('../images/controller2.png') no-repeat; }

.main-controllers-bg										{ height: 50px; width: 100%; position: absolute; bottom: 0px; z-index: 70; }
.nxs-slider-controller.fullwidth							{ width: 88.8em; bottom: 16px; }

.slide-wrapper {
	/* clicking through the absolute positioned layer with pointer-events to reach the anchor underneath 
	http://stackoverflow.com/questions/3680429/click-through-a-div-to-underlying-elements. */
	pointer-events:none; 
	position: absolute;
	height: 788px;
	width: 100%;
	z-index: 80;
}

/* width's */
.nxs-slideset,
.nxs-slide 													{ width: 100% !important; margin: 0 auto; }
.nxs-slide-description-background,
.nxs-slider-controller										{ width: 22.8em; padding-left: 35px; padding-right: 35px; }
.nxs-slide-description-content 								{ width: 22.8em; }

/* widescreen slider */
.widescreen-row .nxs-placeholder							{ border-right: 0px; }
.widescreen-row .nxs-row1 									{ width: 100% !important; border-left: 0px; }
.widescreen-row .nxs-row1 .nxs-one-whole 					{ width: 100% !important; }
.widescreen-row .nxs-slider-controller.fullwidth			{ width: 100%; }

/* metadata layout */
.center .nxs-slide-description-content						{ display: table; width: 100%; padding: 0px; }
.center .text-container										{ display: table-cell; vertical-align: middle; text-align: center; }

/* YOUTUBE & VIMEO 
---------------------------------------------------------------------------------------------------- */
.video-container											{ position: relative; padding-bottom: 56.25%; padding-top: 30px; height: 0; overflow: hidden; }
.video-container iframe 									{ position: absolute; top: 0; left: 0; width: 100%;	height: 100%; }

/* TEXT 
---------------------------------------------------------------------------------------------------- */
.nxs-text .nxs-default-p a									{ font-weight: bold; }
.nxs-text p:last-child										{ padding-bottom: 0px; }
.nxs-text .nxs-liftnote p:first-child 						{ font-weight: bold; letter-spacing: 1px; }
.nxs-text span.nxs-dropcap p:first-child:first-letter 		{ float: left; display: block; margin: 0 7px 0 0; font-weight: normal; text-transform: uppercase; }
.nxs-text ul, 
.nxs-text ol 												{ margin: 0 0 16px 25px; }
.nxs-text ul li,
.nxs-text ol li 											{ margin-top: 10px; line-height: 1.5em; }
.nxs-text ul li:first-child,
.nxs-text ol li:first-child 								{ margin-top: 0px; }
.nxs-text ul 												{ list-style: square; }

/* Callout banner */
.callout-banner {
	padding: 5px;
	text-align: center;
	transform:			rotate(45deg);
	-ms-transform:		rotate(45deg);
	-webkit-transform:	rotate(45deg);
	position: absolute;
	z-index: 100;
	width: 100%;
	top: 10%;
	right: -37%;
	box-shadow: 0 2px 6px rgba(10, 10, 10, 0.4);
	pointer-events:none;
}
.callout-cropper 											{ position: relative; overflow: hidden; }

/* TWITTER FEED 
---------------------------------------------------------------------------------------------------- */
.nxs-tweets .twitter-content								{ margin-left: 58px; margin-top: 20px; position: relative; }
.nxs-tweets .twitter-content:first-child					{ margin-top: 0px; }
.nxs-tweets .twitter-content img							{ position: absolute; left: -58px; border-radius: 5px; }
.nxs-tweets .twitter-content .nxs-twitter-name				{ font-weight: bold; }
.nxs-tweets .twitter-content .nxs-twitter-name,
.nxs-tweets .twitter-content .nxs-twitter-screenname		{ float: left; }
.nxs-tweets .twitter-content .nxs-twitter-date				{ float: right; }

/* COMMENTS 
---------------------------------------------------------------------------------------------------- */
.nxs-comments .nxs-image-wrapper          					{ margin-right: 20px; float: left; }
.nxs-comments .avatar-wrapper            					{ border-style: solid; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block; }
.nxs-comments .avatar                						{ height: auto !important; }
.nxs-comments .reply-instance								{ margin-bottom: 30px; }
.nxs-comments .metadata span								{ display: block; }
.nxs-comments .nxs-button									{ float: left; margin-right: 15px; }
.nxs-comments .nxs-title									{ margin-bottom: 10px; }
.nxs-comments .reply-container								{ margin-top: 20px; }

/* QUOTE
---------------------------------------------------------------------------------------------------- */
.nxs-quote .nxs-icon-quotes-left							{ font-size: 80px; top: -20px; left: -10px; position: absolute; opacity: 0.08; }
.nxs-quote span.quote 										{ font-size: 15px; line-height: 1.625; font-style: italic; text-align: center; }
.nxs-quote p span.source									{ float: right; }
.nxs-quote p span.nxs-icon-star,
.nxs-quote p span.nxs-icon-star2,
.nxs-quote p span.nxs-icon-star3							{ font-size: 16px; color: #f3671c; }

/* DEFINITION LISTS 
---------------------------------------------------------------------------------------------------- */
.nxs-list ul 												{ list-style: square; }
.nxs-list ol,
.nxs-list ul 												{ list-style-position: outside !important; padding: 0 0 20px 35px !important; font-style: italic; font-family: Georgia, Times, serif; font-size: 24px; }
.nxs-list ol li span,
.nxs-list ul li span 										{ padding: 8px; font-style:normal; font-family: Arial; font-size:13px; border-left: 1px solid #DDDDDD; display: block; line-height: 26px; }
.nxs-list ol li span em,
.nxs-list ul li span em										{ display: block; line-height: 26px; font-weight: bold; }

/* CATEGORIES 
---------------------------------------------------------------------------------------------------- */
.nxs-categories ul li 										{ margin-top: 10px; line-height: 1.625em; font-size: 15px; }
.nxs-categories ul li span									{ font-size: 16px; margin-right: 5px; }
.nxs-categories ul.children { padding-left: 20px; }

/* SIDEBAR & WORDPRESS WIDGETS 
---------------------------------------------------------------------------------------------------- */
.nxs-wordpress-sidebar ul 									{ list-style-type: none; }
.nxs-wordpress-sidebar li ul 								{ font-size: 13px; list-style: square; margin-bottom: 2.2em; margin-left: 16px; }
.nxs-sidebar-container ul li a 								{ line-height: 0px;  }
.nxs-wordpress-sidebar ul li a 								{ line-height: 21px;  }
.nxs-wordpress-sidebar ul li a:hover 						{ text-decoration: underline; }

/* SIDEBAR & WORDPRESS WIDGETS 
---------------------------------------------------------------------------------------------------- */
.nxs-wordpress-title .nxs-title								{ line-height: 1em; }


/* SUPERSIZED SLIDER 
---------------------------------------------------------------------------------------------------- */
#nxs-supersized 											{ position: relative; }
#nxs-supersized.nxs-sitewide-element						{ width: 100% !important; }

#nxs-supersized .caption-aligner 							{ display: table; }
#nxs-supersized .caption-aligner #slidecaption 				{ text-align: center; display: table-cell; vertical-align: middle; list-style: none; }
#nxs-supersized .caption-aligner .nxs-placeholder			{ float: none; border-right: 0px; margin-bottom: 0px; }

.remove-thumbnail-navigation #controls-wrapper,
.remove-thumbnail-navigation #thumb-tray,
.remove-thumbnail-navigation #progress-back 				{ display: none !important; }

/* Commented out because height is set incorrectly 
#nxs-supersized .nxs-supersized-container			{ height: 100%; }*/

/* SUPERSIZED CAPTIONS */
.slidecaption-container 									{ border-radius: 5px; line-height: 42px; } 
#slidecaption h2											{ font-size: 45px; line-height: 1em; margin-bottom: 20px; }
#slidecaption p 											{ font-size: 18px; line-height: 1.5em; }
#slidecaption a												{ float: none; display: inline; padding: 5px 10px; }
#controls-wrapper #slidecaption 							{ display: none; }

/* SUPERSIZED NAVIGATION BUTTONS */
.slide-nav													{ position: absolute; width: 39px; top: 35%; }
.slide-nav .general-nav										{ margin: 0px; top: 0px; }
.slide-nav .general-nav 									{ margin: 0px; top: 0px; }
#prevslide													{ left: 8px; }
#nextslide 													{ right: 8px;  }

/* PLAY/PAUSE BUTTON */
.general-ui-styling {
	font-size: 16px; 
	color: #999; 
	line-height: 35px !important;
	transition: 		all 0.1s linear;
	-o-transition: 		all 0.1s linear; 
	-moz-transition: 	all 0.1s linear;
	-webkit-transition: all 0.1s linear;
}
.general-nav:hover .general-ui-styling						{ color: white; font-size: 24px; }
#controls-wrapper .nxs-toggle 								{ float: left; line-height: 42px !important; border-right: 1px solid #1c1c1c; width: 55px; text-align: center; }

/* THUMBNAILS */
.general-nav { 
	position: absolute; 
	z-index: 5; 
	top: 25px; 
	width: 35px; 
	margin: 0 8px; 
	background: black; 
	height: 35px; 
	border-radius: 20px; 
	background-color: rgb(0, 0, 0);
	background-color: rgba(0, 0, 0, 0.6 );
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
	border: 2px solid #777;
	text-align: center;
	transition: 		all 0.1s linear;
	-o-transition: 		all 0.1s linear; 
	-moz-transition: 	all 0.1s linear;
	-webkit-transition: all 0.1s linear;
}
.general-nav:hover											{ background-color: rgba(0, 0, 0, 1); border: 2px solid white; }
#thumb-forward 												{ right: 0px; }


/* THIRD PARTY SUPERSIZED CODE */
#supersized-loader { 
	position: absolute; 
	top: 50%; 
	left: 50%; 
	z-index: 0; 
	width: 60px; 
	height: 60px; 
	margin: -30px 0 0 -30px; 
	text-indent: -999em; 
	background: url(../images/supersized/progress.gif) no-repeat center center;
}
	
#supersized 												{ display: block; position: fixed; left: 0; top: 0; overflow: hidden; z-index: -999; height: 100%; width: 100%; }
#supersized img 											{ width:auto; height:auto; position:relative; display:none; outline:none; border:none; }
#supersized.speed img 										{ -ms-interpolation-mode:nearest-neighbor; image-rendering: -moz-crisp-edges; }	/*Speed*/
#supersized.quality img 									{ -ms-interpolation-mode:bicubic; image-rendering: optimizeQuality; }			/*Quality*/

#supersized li 												{ display:block; list-style:none; z-index:-30; position:fixed; overflow:hidden; top:0; left:0; width:100%; height:100%; background:#111; }
#supersized a 												{ width:100%; height:100%; display:block; }
#supersized li.prevslide 									{ z-index:-20; }
#supersized li.activeslide 									{ z-index:-10; }
#supersized li.image-loading 								{ background:#111 url(../images/supersized/progress.gif) no-repeat center center; width:100%; height:100%; }
#supersized li.image-loading img							{ visibility:hidden; }
#supersized li.prevslide img, 
#supersized li.activeslide img								{ display:inline; }

/* Controls Bar
----------------------------*/
#controls-wrapper 											{ margin: 0 auto; height: 42px; width: 100%; bottom: 0px; left: 0; z-index: 100; background: url(../images/supersized/nav-bg.png) repeat-x; position: fixed; }
#controls 													{ overflow: hidden; height: 100%; position: relative; text-align: left; z-index: 101; }
#slidecounter 												{ float: left; color: #999; font: 14px "Helvetica Neue", Helvetica, Arial, sans-serif; text-shadow: #000 0 -1px 0; margin: 0px 10px 0 15px; line-height: 42px; }

#navigation 												{ float: right; margin: 0px 20px 0 0; }
#play-button												{ float: left; margin-top: 1px; border-right: 1px solid #333; background:url('../images/supersized/bg-hover.png') repeat-x 0 44px; }
#play-button:hover											{ background-position: 0 1px; cursor: pointer; }


ul#slide-list												{ padding: 15px 0; float: left; position: absolute; left: 50%; }
ul#slide-list li											{ list-style: none; width: 12px; height: 12px; float: left; margin: 0 5px 0 0; }
ul#slide-list li.current-slide a, 
ul#slide-list li.current-slide a:hover						{ background-position: 0 0px; }
ul#slide-list li a											{ display: block; width: 12px; height: 12px; background: url('../images/supersized/nav-dot.png') no-repeat 0 -24px; }
ul#slide-list li a:hover									{ background-position: 0 -12px; cursor: pointer; }

#tray-button												{ float: right; margin-top: 1px; border-left: 1px solid #333; background: url('../images/supersized/bg-hover.png') repeat-x 0 44px; }
#tray-button:hover											{ background-position: 0 1px; cursor: pointer; }

/* Progress Bar
----------------------------*/					
#progress-back												{ z-index:101; position:fixed; bottom:42px; left:0; height:8px; width:100%; background:url('../images/supersized/progress-back.png') repeat-x; }
#progress-bar												{ position:relative; height:8px; width:100%; background:url('../images/supersized/progress-bar.png') repeat-x; }

/* Thumbnail Navigation
----------------------------*/	
#nextthumb,
#prevthumb { 
	z-index:2; 
	display:none; 
	position:fixed; 
	bottom:61px; 
	height:75px; 
	width:100px; 
	overflow:hidden; 
	background:#ddd; 
	border:1px solid #fff; 
	box-shadow:0 0 5px #000; 
}
#nextthumb 													{ right:12px; }
#prevthumb 													{ left:12px; }
#nextthumb img, 
#prevthumb img 												{ width:150px; height:auto;  }
#nextthumb:active, 
#prevthumb:active 											{ bottom:59px; }
#nextthumb:hover, 
#prevthumb:hover 											{ cursor:pointer; }

/* Thumbnail Tray
----------------------------*/			
#thumb-tray{ 
	position: fixed; 
	z-index: 99; 
	bottom: 0; 
	left: 0; 
	background: url(../images/supersized/bg-black.png); 
	height: 135px; 
	width: 100%; 
	overflow: hidden; 
	text-align: center; 
	box-shadow: 		0px 0px 4px #000; 
	-moz-box-shadow: 	0px 0px 4px #000; 
	-webkit-box-shadow: 0px 0px 4px #000; 
	
}

ul#thumb-list												{ display:inline-block; list-style:none; position:relative; left:0px; padding:0 0px; }
ul#thumb-list li											{ list-style:none; display:inline; width:150px; height: 85px; overflow:hidden; float:left; margin:0; }
ul#thumb-list li img { 
	width: 200px; 
	height: auto; 
	opacity: 0.5; 
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=60)"; 
	filter: alpha(opacity=60); 
	-webkit-transition: all 100ms ease-in-out; 
	-moz-transition: 	all 100ms ease-in-out; 
	-ms-transition: 	all 100ms ease-in-out; 
	-o-transition: 		all 100ms ease-in-out; 
	transition: 		all 100ms ease-in-out; 
}
ul#thumb-list li.current-thumb img, 
ul#thumb-list li:hover img									{ opacity:1; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter:alpha(opacity=100); }
ul#thumb-list li:hover										{ cursor:pointer; }

/* GALLERY 
---------------------------------------------------------------------------------------------------- */
.nxs-gallery .nxs-title										{ margin-bottom: 15px; }
.nxs-gallery .nxs-galleryitem								{ display: inline; float: left; margin-bottom: 30px; }
.nxs-gallery .title-wrapper									{ margin-bottom: 10px; height: auto !important; }
.nxs-gallery .description-wrapper							{ height: auto !important; }
.multi-step-divider 										{ display: none; }

.nxs-gallery .nxs-galleryitem								{ margin-left: 36px; }
.nxs-gallery .nxs-galleryitem.firstinrow					{ margin-left: 0; }

.nxs-gallery .image-wrapper									{ position: relative; float: left; overflow: hidden; }
.nxs-gallery .image-cropper,
.nxs-gallery .image-border									{ z-index: 20; overflow: hidden; }
.nxs-gallery img { 
	z-index: 10; 
	opacity: 1;
	
	transition: 		all 0.2s linear;
	-o-transition: 		all 0.2s linear; 
	-moz-transition: 	all 0.2s linear;
	-webkit-transition: all 0.2s linear; 
	
	/* http://stackoverflow.com/questions/16208851/images-wiggles-when-hover-scale-effect */
	-webkit-backface-visibility: hidden;
	-moz-backface-visibility:    hidden;
	-ms-backface-visibility:     hidden;
}
.nxs-gallery .image-wrapper img:hover { 
	opacity: 0.6;
	transform: 			scale(1.1);
	-o-transform: 		scale(1.1);
	-moz-transform: 	scale(1.1);
	-webkit-transform: 	scale(1.1); 
}
.nxs-gallery .image-container { 
	overflow: hidden; 
	border-style: solid; 
	border-color: white; 
	position: absolute;
	top: 0px;
	bottom: 0px;
	left: 0px;
	right: 0px;
}
/* Touch devices transition removal */
.nxs-m-touch .nxs-gallery img { 
	transition: 		none;
	-o-transition: 		none;
	-moz-transition: 	none;
	-webkit-transition: none; 
}
.nxs-m-touch .nxs-gallery img:hover { 
	opacity: 1;
	transform: 			none; 
	-o-transform: 		none; 
	-moz-transform: 	none; 
	-webkit-transform: 	none; 
}

.nxs-gallery-image:hover									{ opacity: 1 !important; }

.nxs-gallery .nxs-one-fourth,
.nxs-gallery .nxs-one-fourth .image-wrapper,
.nxs-gallery .nxs-one-fourth .image-border,
.nxs-gallery .nxs-one-fourth .image-cropper,
.nxs-gallery .nxs-one-fourth img			  				{ width: 195px; height: 117px; }

.nxs-gallery .nxs-one-third,
.nxs-gallery .nxs-one-third .image-wrapper,
.nxs-gallery .nxs-one-third .image-border,
.nxs-gallery .nxs-one-third .image-cropper,
.nxs-gallery .nxs-one-third img			  					{ width: 272px; height: 164px; }

.nxs-gallery .nxs-one-half,
.nxs-gallery .nxs-one-half .image-wrapper,
.nxs-gallery .nxs-one-half .image-border,
.nxs-gallery .nxs-one-half .image-cropper,
.nxs-gallery .nxs-one-half img			  					{ width: 426px; height: 256px; }

.nxs-main .nxs-gallery .nxs-one-fourth,
.nxs-main .nxs-gallery .nxs-one-fourth .image-wrapper,
.nxs-main .nxs-gallery .nxs-one-fourth .image-border,
.nxs-main .nxs-gallery .nxs-one-fourth .image-cropper,
.nxs-main .nxs-gallery .nxs-one-fourth img					{ width: 118px; height: 70px; }

.nxs-main .nxs-gallery .nxs-one-third,
.nxs-main .nxs-gallery .nxs-one-third .image-wrapper,
.nxs-main .nxs-gallery .nxs-one-third .image-border,
.nxs-main .nxs-gallery .nxs-one-third .image-cropper,
.nxs-main .nxs-gallery .nxs-one-third img					{ width: 169px; height: 101px; }

.nxs-main .nxs-gallery .nxs-one-half,
.nxs-main .nxs-gallery .nxs-one-half .image-wrapper,
.nxs-main .nxs-gallery .nxs-one-half .image-border,
.nxs-main .nxs-gallery .nxs-one-half .image-cropper,
.nxs-main .nxs-gallery .nxs-one-half img					{ width: 272px; height: 164px; }

/* CALLOUT
------------------------------------------------------------------------------------------ */
.nxs-callout .nxs-title { 
	font-weight: normal !important; 
	text-transform: none !important; 
	margin-bottom: 0.1em; /* prevent baseline cuts */
}
.nxs-callout .nxs-subtitle									{ line-height: 1.5em !important; }
.nxs-callout a.nxs-button									{ display: inline-block; font-weight: normal !important; }
.nxs-callout .nxs-filler									{ padding: 10px 0; }
.nxs-callout a:hover .nxs-title								{ opacity: 1; }

/* LOGO 
------------------------------------------------------------------------------------------ */
.nxs-logo .image-background									{ overflow: auto; width: 100%; } /* the "overflow: auto; property is necessary to prevent parent div's to move when a margin is set on the child div */
.nxs-logo .nxs-table,
.nxs-logo .wrapper											{ width: 100%; }
.nxs-logo a													{ display: block; z-index: 100; }
.nxs-logo .logo-image										{ margin: 0 auto; }
.nxs-logo .title-wrapper 									{ margin-left: 0px; margin-right: 0px; }
.nxs-logo .logo-image img									{ 
	display: block; 

	/* http://stackoverflow.com/questions/16208851/images-wiggles-when-hover-scale-effect */
	-webkit-backface-visibility: hidden;
	-moz-backface-visibility:    hidden;
	-ms-backface-visibility:     hidden;
}
.nxs-logo span.title 										{ font-size: 30px; line-height: 1.5em; display: block; }
.nxs-logo span.subtitle 									{ font-size: 20px; line-height: 1.2em; display: block; }

/* BIO 
------------------------------------------------------------------------------------------ */
.nxs-bio .image-wrapper										{ right: 0; left: 0; top: 0; bottom: 0; border-style: solid; }
.nxs-bio .image-wrapper img									{ width: 100%; height: 100%; }
.nxs-bio .wrapper											{ display: table; }
.nxs-bio .wrapper-container 								{ display: table-cell; vertical-align: middle; width: 100%; }
.nxs-bio .nxs-title a										{ font-weight: normal !important; }
.nxs-bio ul.nxs-social-list a								{ margin: 5px 10px 0px 0 !important; }
.nxs-bio ul.nxs-social-list a:last-child 					{ margin-right: 0px !important; }


.nxs-one-fourth .nxs-bio .nxs-icon-left						{ float: none !important; } 
.nxs-one-fourth .nxs-bio .wrapper 							{ height: auto !important; }

.nxs-main .nxs-one-third .nxs-bio .nxs-icon-left,
.nxs-main .nxs-one-half .nxs-bio .nxs-icon-left				{ float: none !important; } 
.nxs-main .nxs-one-third .nxs-bio .wrapper,
.nxs-main .nxs-one-half .nxs-bio .wrapper 					{ height: auto !important; }

@media only screen and ( max-width: 1439px ) 				{ 
.nxs-one-third .nxs-bio .nxs-icon-left						{ float: none !important; } 
.nxs-one-third .nxs-bio .wrapper 							{ height: auto !important; }
}

@media only screen and ( max-width: 1199px ) 				{ 
.nxs-one-half .nxs-bio .nxs-icon-left						{ float: none !important; } 
.nxs-one-half .nxs-bio .wrapper 							{ height: auto !important; }
}

/* SOCIAL
------------------------------------------------------------------------------------------ */
.nxs-social	.nxs-title										{ margin-bottom: 10px; }
ul.nxs-social-list a										{ float: left; width: 32px; height: 32px; margin: 5px 0 5px 10px; }
ul.nxs-social-list a:first-child 							{ margin-left: 0px; }

.nxs-social-rss												{ background: url('../images/icon-rss.png') no-repeat center; }
.nxs-social-website											{ background: url('../images/icon-website.png') no-repeat center; }
.nxs-social-facebook										{ background: url('../images/icon-facebook.png') no-repeat center; }
.nxs-social-twitter											{ background: url('../images/icon-twitter.png') no-repeat center; }
.nxs-social-linkedin										{ background: url('../images/icon-linkedin.png') no-repeat center; }
.nxs-social-google											{ background: url('../images/icon-google.png') no-repeat center; }
.nxs-social-youtube											{ background: url('../images/icon-youtube.png') no-repeat center; }
.nxs-social-skypechat										{ background: url('../images/icon-skype.png') no-repeat center; }
.nxs-social-emailaddress									{ background: url('../images/icon-email.png') no-repeat center; }

/* SIGNPOST 
------------------------------------------------------------------------------------------ */
.nxs-signpost .nxs-default									{ position: relative; text-align: center; cursor: default; overflow: hidden; box-shadow: 0 2px 6px rgba(10, 10, 10, 0.6); }
.nxs-signpost .border { 
	border-style: solid; 
	border-color: white; 
	position: absolute; 
	top: 0px; 
	left: 0px; 
	bottom: 0px; 
	right: 0px; 
	z-index: 40; 
}
.nxs-signpost .mask-color, 
.nxs-signpost .mask											{ position: absolute; overflow: hidden; top: 0; left: 0; display: table; }
.nxs-signpost .mask-container								{ display: table-cell; vertical-align: middle; }
.nxs-signpost .mask-container .title-positioner				{ position: absolute; height: auto; width: 100%; }
.nxs-signpost .nxs-default .image { 
	display: block; 
	position: relative; 
	
	background-size: 	 	 cover !important;
	-o-background-size: 	 cover !important;
	-moz-background-size: 	 cover !important;
	-webkit-background-size: cover !important;
	
	/* http://stackoverflow.com/questions/16208851/images-wiggles-when-hover-scale-effect */
	-webkit-backface-visibility: hidden;
	-moz-backface-visibility:    hidden;
	-ms-backface-visibility:     hidden;
}
.nxs-signpost .nxs-default .title-wrapper					{ position: absolute; width: 100%; padding: 10px 0; bottom: 15%; }
.nxs-signpost .nxs-default .nxs-title 						{ text-align: center; }
.nxs-signpost .nxs-default p								{ position: relative; padding: 0 20px; text-align: center; }
.nxs-signpost .nxs-default .nxs-title,
.nxs-signpost .image { 
	transition: 		all 0.2s linear;
	-o-transition: 		all 0.2s linear; 
	-moz-transition: 	all 0.2s linear;
	-webkit-transition: all 0.2s linear; 
}
.nxs-signpost .mask-color,
.nxs-signpost .mask { 
	height: 100%; 
	width: 100%; 
	opacity: 0;	 
	
	transition: 		all 0.4s ease-in-out;
	-o-transition: 		all 0.4s ease-in-out; 
	-moz-transition: 	all 0.4s ease-in-out;
	-webkit-transition: all 0.4s ease-in-out; 
}
.nxs-signpost .mask 										{ opacity: 1; }
.nxs-signpost .nxs-default p { 
	opacity: 0;
	
	transform: 			translateY(-100px);
	-o-transform: 		translateY(-100px);
	-moz-transform: 	translateY(-100px);
	-webkit-transform: 	translateY(-100px);
	
	transition: 		all 0.2s linear;
	-o-transition: 		all 0.2s linear; 
	-moz-transition: 	all 0.2s linear;
	-webkit-transition: all 0.2s linear; 
}
.nxs-signpost .nxs-default a.nxs-button { 
	opacity: 0;
		
	transition: 		all 0.2s ease-in-out;
	-o-transition: 		all 0.2s ease-in-out; 
	-moz-transition: 	all 0.2s ease-in-out;
	-webkit-transition: all 0.2s ease-in-out; 
}
.nxs-signpost:hover .nxs-default p {
	transform: 			translateY(0px);
	-o-transform: 		translateY(0px);
	-moz-transform: 	translateY(0px);
	-webkit-transform: 	translateY(0px);
}
.nxs-signpost:hover .nxs-default .image { 
	transform: 			scale(1.1);
	-o-transform: 		scale(1.1);
	-moz-transform: 	scale(1.1);
	-webkit-transform: 	scale(1.1); 
} 
.nxs-signpost:hover .nxs-default .title-wrapper				{ opacity: 0; }
.nxs-signpost:hover .mask-color								{ opacity: 1; }
.nxs-signpost:hover .mask									{ opacity: 1; }
.nxs-signpost:hover .nxs-default p,
.nxs-signpost:hover .nxs-default a.nxs-button { 
	opacity: 1; 
		
	transition: 		translateY(0px);
	-o-transition: 		translateY(0px); 
	-moz-transition: 	translateY(0px);
	-webkit-transform:  translateY(0px); 
}
.nxs-signpost:hover .nxs-default p { 
	transition-delay: 		  0.1s;
	-o-transition-delay: 	  0.1s; 
	-moz-transition-delay: 	  0.1s;
	-webkit-transition-delay: 0.1s; 
}
.nxs-signpost:hover .nxs-default a.nxs-button { 
	transition-delay: 		  0.2s;
	-o-transition-delay: 	  0.2s; 
	-moz-transition-delay: 	  0.2s;
	-webkit-transition-delay: 0.2s; 
}
.nxs-signpost .nxs-default a.nxs-button:hover 				{ transition: none; }

/* SIGNPOST Modernizr fallback */

.nxs-m-touch .nxs-signpost,
.nxs-m-no-csstransitions .nxs-signpost 						{ box-shadow: none; }

/* TUMBLER
------------------------------------------------------------------------------------------ */
.nxs-tumbler .wrapper { 
	display: inline-block; 
	width: 100%; 
	vertical-align: top;  
	position: relative;
	
	perspective: 		 8000px;
	-o-perspective: 	 8000px; 
	-moz-perspective: 	 8000px;
	-webkit-perspective: 8000px; 
}   
.nxs-tumbler .item { 
	transition: 		        transform .6s;
	-o-transition: 		     -o-transform .6s; 
	-moz-transition: 	   -moz-transform .6s;
	-webkit-transition: -webkit-transform .6s;
	
	transform-style: 		 preserve-3d;
	-o-transform-style: 	 preserve-3d;
	-moz-transform-style:	 preserve-3d;
	-webkit-transform-style: preserve-3d;    
}
.nxs-tumbler .item .image-wrapper, 
.nxs-tumbler .item .image,
.nxs-tumbler .item .content { 
	display: block; 
	position: absolute; 
	top: 0; 
	width: 100%;
	box-shadow: 0 2px 6px rgba(10, 10, 10, 0.6); 
	 
	transition:			translateZ(20px);
	-o-transition: 	   	translateZ(20px); 
	-moz-transition:   	translateZ(20px);
	-webkit-transform: 	translateZ(20px);
	
	transition: 		all .6s;
	-o-transition: 		all .6s;
	-moz-transition:    all .6s;
	-webkit-transition: all .6s;
	
	-webkit-backface-visibility: hidden;
	-moz-backface-visibility:    hidden;
	-ms-backface-visibility:     hidden;
}
.nxs-tumbler .item .image-wrapper, 
.nxs-tumbler .item .image {
	background-size: 	 	 cover !important;
	-o-background-size: 	 cover !important;
	-moz-background-size: 	 cover !important;
	-webkit-background-size: cover !important;     
}
.nxs-tumbler .item .content-wrapper 						{ display: table; width: 100%; }
.nxs-tumbler .item .content-container 						{ text-align: center; padding: 0px 25px; display: table-cell; vertical-align: middle; }
.nxs-tumbler .nxs-default .title-wrapper					{ position: absolute; width: 100%; padding: 10px 0; bottom: 15%; }
.nxs-tumbler .nxs-default .nxs-title						{ padding: 0px 10px; }
.nxs-tumbler .item:hover {  
	transform: 			translateZ(-50px) rotateX(90deg);
	-o-transform: 		translateZ(-50px) rotateX(90deg);
	-moz-transform: 	translateZ(-50px) rotateX(90deg);
	-webkit-transform: 	translateZ(-50px) rotateX(90deg);
}
.nxs-tumbler .item:hover .image-wrapper,    
.nxs-tumbler .item:hover .image { 
	transform: 			translateY(-50px);
	-o-transform: 		translateY(-50px);
	-moz-transform: 	translateY(-50px);
	-webkit-transform: 	translateY(-50px);
}

/* fallback triggers */
.nxs-ie .nxs-tumbler .nxs-default							{ display: none; }
.nxs-ie .nxs-tumbler .nxs-fallback 							{ display: block; }

/* BLOG
------------------------------------------------------------------------------------------ */
.nxs-blog													{ overflow: hidden; }
.nxs-blog .nxs-title										{ margin-bottom: 0px; }
.nxs-blog .nxs-blogentry .nxs-button						{ margin-top: 15px; }
.nxs-blog .nxs-pagination .nxs-button span					{ margin-left: 0px; }
.nxs-blog .nxs-button.load-more								{ width: 100%; text-align: center; padding-left: 0px; padding-right: 0px; }
.nxs-blog .nxs-meta											{ margin-right: 15px; }
.nxs-blog .nxs-image-wrapper								{ float: left; margin: 0 20px 10px 0; }
.nxs-blog .nxs-image-wrapper.nxs-stretch					{ float: none; margin-bottom: 15px; }

/* minimal icon */
.nxs-blog .nxs-blog-minimal ul li 							{ line-height: 1.625em; font-size: 15px; margin-top: 10px; }
.nxs-blog .nxs-blog-minimal ul li span.font-icon			{ font-size: 16px !important; margin-right: 5px; }

/* minimal image */
.nxs-blog .minimal-image-entry								{ margin-bottom: 10px; }

/* share counters */
.nxs-blog .nxs-blogentry.sharecounters-on					{ padding-right: 80px; }
.nxs-blog .sharecounters									{ position: absolute; right: 0px; top: 0px; }
.nxs-blog .sharecounter										{ margin-bottom: 10px; }


/* date highlight */
.nxs-blog-extended.date-highlight .nxs-separator.first + .nxs-categories,
.nxs-searchresults-extended.date-highlight .nxs-separator.first + .nxs-categories,
.nxs-blog-extended.date-highlight .nxs-blogentry .nxs-title,
.nxs-searchresults-extended.date-highlight .nxs-blogentry .nxs-title       { margin-left: 100px; }

.date-highlight .nxs-blog-meta .nxs-separator.first			{ display: none; }
.date-highlight .info-wrapper	       						{ min-height: 80px; }
.date-highlight .nxs-date		       						{ position: absolute; top: 0px; }

.nxs-blog-meta												{ margin-bottom: 15px; font-size: 15px; float: left; line-height: 36px; }
.nxs-blog-sharing											{ font-size: 18px; }

/* TEXT
---------------------------------------------------------------------------------------------------- */
.nxs-text .nxs-liftnote > p:first-child 					{ font-weight: bold; letter-spacing: 1px; }
.nxs-text .nxs-dropcap > p:first-child:first-letter {
	font-size: 40px;
	line-height: 1em;
	float: left;
	display: block;
	margin: 0 7px 0 0;
	font-weight: normal;
	text-transform: uppercase;
}

/* SEARCH
---------------------------------------------------------------------------------------------------- */
.nxs-search .nxs-title										{ margin-bottom: 10px; }
.nxs-search .search-container								{ padding-right: 45px; }
.nxs-search input		 									{ float: left; margin-bottom: 0px; }
.nxs-search a.nxs-button 									{ height: 24px; padding: 2px; float: right; }
.nxs-search a span											{ font-size: 16px; margin-left: 0px; }
.nxs-search a span:hover									{ font-size: 32px; }
.nxs-search a span.nxs-icon-search							{ line-height: 24px; font-size: 20px; padding: 0 5px; }

/* RADIAL
------------------------------------------------------------------------------------------ */
.nxs-radial .transition.nxs-default,
.nxs-radial .radial 										{ height: 100%; }
.nxs-radial .radial {
	position: absolute;
	width: 100%;
	border-radius: 50%;
	overflow: hidden;
	display: table;
	z-index: 10;
	background-size: 	 	 cover !important;
	-o-background-size: 	 cover !important;
	-moz-background-size: 	 cover !important;
	-webkit-background-size: cover !important;
}
.nxs-radial .text-wrapper	 								{ display: table-cell; vertical-align: middle; }
.nxs-radial .title-wrapper									{ text-align: center; padding: 10px 0; position: absolute; width: 100%; bottom: 15%; }
.nxs-radial .transition.nxs-default p						{ text-align: center; width: 70%;  margin: 0 auto; }

/* transitions */
.nxs-radial .transition.nxs-default .radial:first-child { 
	opacity: 0;
	-webkit-transition: all 0.3s;
	-moz-transition: 	all 0.3s;
	-o-transition: 		all 0.3s;
	-ms-transition: 	all 0.3s;
	transition: 		all 0.3s;
}
.nxs-radial:hover .transition.nxs-default .radial:first-child 		{ opacity: 1; z-index: 30; }
.nxs-radial .nxs-button { 
	-webkit-transition: none;
	-moz-transition: 	none;
	-o-transition: 		none;
	-ms-transition: 	none;
	transition: 		none;
} 

.nxs-one-fourth .nxs-radial .nxs-default						{ height: 195px; }
.nxs-one-third .nxs-radial .nxs-default							{ height: 272px; }
.nxs-one-half .nxs-radial .nxs-default							{ height: 426px; }
.nxs-two-third .nxs-radial .nxs-default							{ height: 580px; }
.nxs-one-whole .nxs-radial .nxs-default							{ height: 888px; }

.nxs-main .nxs-one-fourth .nxs-radial .nxs-default				{ height: 118px; }
.nxs-main .nxs-one-third .nxs-radial .nxs-default				{ height: 169px; }
.nxs-main .nxs-one-half .nxs-radial .nxs-default 				{ height: 272px; }
.nxs-main .nxs-two-third .nxs-radial .nxs-default				{ height: 374px; }
.nxs-main .nxs-one-whole .nxs-radial .nxs-default				{ height: 580px; }

.nxs-sidebar-container .nxs-one-whole .nxs-radial .nxs-default 	{	height: 272px; }

/* fallback triggers */
.nxs-ie .nxs-radial .nxs-default,
.nxs-vendor-mozilla .nxs-radial .nxs-default,
.nxs-vendor-o .nxs-radial .nxs-default							{ display: none; }
.nxs-ie .nxs-radial .nxs-fallback,
.nxs-vendor-mozilla .nxs-radial .nxs-fallback,
.nxs-vendor-o .nxs-radial .nxs-fallback 						{ display: block; }
.nxs-radial .nxs-fallback .nxs-title							{ text-align: left; }

/* SQUEEZEBOX
------------------------------------------------------------------------------------------ */
.nxs-squeezebox .wrapper									{ display: table; }
.nxs-squeezebox .wrapped-element							{ display: table-cell; vertical-align: middle; }
.nxs-squeezebox .nxs-input-wrapper 							{ padding: 5px 0; margin: 0 auto; }
.nxs-squeezebox label 										{ float: left; line-height: 30px; font-size: 15px; }
.nxs-squeezebox input[type=text],
.nxs-squeezebox input[type=email] 							{ border: 1px solid #DFDFDF; font-size: 15px; text-indent: 10px; line-height: 30px; height: 30px; width: 70%; float: right; }
/*.nxs-squeezebox input[type=submit] 							{ display: none; }*/
.nxs-squeezebox .nxs-center 								{ margin-left: auto !important; margin-right: auto !important; }
.nxs-squeezebox .nxs-right 									{ margin-left: auto !important; }

/* SERVER GALLERY
------------------------------------------------------------------------------------------ */
.nxs-server-gallery ul.series li  							{ width: 15%; margin-right: 2%; margin-bottom: 26px; float: left; }
.nxs-server-gallery ul.series li img 						{ width: 100%; box-shadow: 0 2px 6px rgba(10, 10, 10, 0.6); }
.nxs-server-gallery ul.series li:nth-child(6n)				{ margin-right: 0%; }

@media only screen and ( max-width: 1439px ) 				{ .nxs-server-gallery ul.series li { margin-bottom: 22px; } }
@media only screen and ( max-width: 1199px ) 				{ .nxs-server-gallery ul.series li { margin-bottom: 17px; } }
@media only screen and ( max-width: 959px )  				{ .nxs-server-gallery ul.series li { margin-bottom: 12px; } }
@media only screen and ( max-width: 719px )	 				{ .nxs-server-gallery ul.series li { margin-bottom: 8px; } }
@media only screen and ( max-width: 479px )	 				{ .nxs-server-gallery ul.series li { margin-bottom: 12px; } }

/* sidebar version */
.nxs-main .nxs-server-gallery ul.series li  				{ width: 22%; margin-right: 4%; margin-bottom: 34px; }
.nxs-main .nxs-server-gallery ul.series li:nth-child(6n)	{ margin-right: 4%; }
.nxs-main .nxs-server-gallery ul.series li:nth-child(4n)	{ margin-right: 0%; }

@media only screen and ( max-width: 1439px ) 				{ .nxs-main .nxs-server-gallery ul.series li { margin-bottom: 29px; } }
@media only screen and ( max-width: 1199px ) 				{ .nxs-main .nxs-server-gallery ul.series li { margin-bottom: 24px; } }
@media only screen and ( max-width: 959px )  				{ .nxs-main .nxs-server-gallery ul.series li { margin-bottom: 19px; } }
@media only screen and ( max-width: 719px )	 				{ .nxs-main .nxs-server-gallery ul.series li { margin-bottom: 8px; } }
@media only screen and ( max-width: 479px )	 				{ .nxs-main .nxs-server-gallery ul.series li { margin-bottom: 12px; } }

@media only screen and ( max-width: 719px )	{ 
.nxs-main .nxs-server-gallery ul.series li 					{ width: 15%; margin-right: 2%; } 
.nxs-main .nxs-server-gallery ul.series li:nth-child(4n)	{ margin-right: 2%; }
.nxs-main .nxs-server-gallery ul.series li:nth-child(6n)	{ margin-right: 0%; }
}
@media only screen and ( max-width: 479px )	{
.nxs-server-gallery ul.series li,
.nxs-main .nxs-server-gallery ul.series li  				{ width: 22%; margin-right: 4%; }
.nxs-server-gallery ul.series li:nth-child(6n),
.nxs-main .nxs-server-gallery ul.series li:nth-child(6n)	{ margin-right: 4%; }
.nxs-server-gallery ul.series li:nth-child(4n),
.nxs-main .nxs-server-gallery ul.series li:nth-child(4n)	{ margin-right: 0%; }
}

/* Datepickers (used in popups, note datepicker is not child of nxsbox_window */
table.ui-datepicker-calendar .ui-datepicker-current-day
{
	border-color: blue;
	border-width: 3px;
	border-style: solid;
}

/* Server gallery popup */
.nxs-gallerypopup											{  }
.nxs-gallerypopup #nxsbox_ajaxContent { 
	position: relative !important; 
	left: 0px; 
	top: 0px; 
}
.nxs-gallerypopup .nxs-popup-dyncontentcontainer,
.nxs-gallerypopup .nxs-popup-content-canvas-cropper,
.nxs-gallerypopup .nxs-popup-content-canvas 				{  }
.nxs-gallerypopup .nxs-table								{ margin: 0 auto; }
.nxs-gallerypopup .nxs-table-cell							{  }
.nxs-gallerypopup img										{ 
	max-height: 80%; 
	display: block; 
	margin: 0 auto; 
	border: 3px solid white; 
	box-shadow: 		rgba(0,0,0,1) 0 4px 30px;
	-moz-box-shadow: 	rgba(0,0,0,1) 0 4px 30px;
	-khtml-box-shadow: 	rgba(0,0,0,1) 0 4px 30px;
	-webkit-box-shadow: rgba(0,0,0,1) 0 4px 30px;
}
.nxs-gallerypopup ul.icon-font-list 						{ margin-top: 10px; }
.nxs-gallerypopup ul.icon-font-list li a					{ color: white; text-shadow: 1px 1px 1px black; }

/* Server gallery lazyload spinner */
.nxs-spinner span											{ font-size: 64px; color: white; text-shadow: 0px 0px 10px gray; }
.nxs-spinner.absolute										{ position: fixed; top: 50%; z-index: 1000; width: 100%; text-align: center; }

/* MAIN GALLERY IMAGE
------------------------------------------------------------------------------------------ */
.nxs-maingalleryimage img									{ display: block; margin: 0 auto; }
.nxs-maingalleryimage ul.icon-font-list						{ margin-top: 10px; }

/* ICON COLOR */
.pep-icon													{ color: #e32219 !important; }

/* EVENTS
------------------------------------------------------------------------------------------ */
.nxs-events .nxs-evententry									{ margin-top: 20px; }
.nxs-events .nxs-evententry:first-child						{ margin-top: 0px; }
.nxs-events .nxs-title,
.nxs-events .title											{ margin-bottom: 10px !important; }
.nxs-events .subtitle										{ font-size: 15px; line-height: 1.625em; }

/* SQUEEZEBOX
------------------------------------------------------------------------------------------ */
.nxs-disqus-comments a,
.nxs-disqus-comments .dsq-widget-comment					{ display: block; font-size: 15px; line-height: 1.625em; margin-bottom: 15px; }
.nxs-disqus-comments .dsq-widget-comment:before,
.nxs-disqus-comments .dsq-widget-comment:after				{ content: '"'; font-size: 15px; }

/* CSV
---------------------------------------------------------------------------------------------------- */
.top-wrapper												{ display: block; border-radius: 3px; }
.top-wrapper .nxs-table										{ display: table; }
.top-wrapper a,
.top-wrapper .nxs-title										{ display: table-cell; vertical-align: middle; }
.top-wrapper span											{ display: table-cell; vertical-align: middle; padding-right: 10px; line-height: 1; }
.top-wrapper span.accordion									{ position: absolute; right: 15px; line-height: 27px; }

/* TARGET
---------------------------------------------------------------------------------------------------- */
.nxs-target {
	position: relative;
	
	-webkit-transition: background 300ms linear;
	-moz-transition: 	background 300ms linear;
	-ms-transition: 	background 300ms linear;
	-o-transition: 		background 300ms linear;
	transition: 		background 300ms linear;
}
.nxs-target .content,
.nxs-target .main 											{ display: block;  }
.nxs-target .nxs-button										{ display: inline-block; }
.nxs-target .icon {
	float: left;
	text-align: center;
	-webkit-transition: font-size 300ms linear;
	-moz-transition: 	font-size 300ms linear;
	-ms-transition: 	font-size 300ms linear;
	-o-transition: 		font-size 300ms linear;
	transition: 		font-size 300ms linear;
}

/* If icon is colored */
.nxs-target .icon.colored 									{ padding: 10px; }

/* transitions */
.nxs-target:hover .hover .main	{ 
	opacity: 1;
	-webkit-animation: 	moveFromTop 300ms ease-in-out;
	-moz-animation: 	moveFromTop 300ms ease-in-out;
	-ms-animation: 		moveFromTop 300ms ease-in-out;
}
.nxs-target:hover .hover .sub,
.nxs-target:hover .hover .nxs-button {
	opacity: 1;
	-webkit-animation: 	moveFromBottom 300ms ease-in-out;
	-moz-animation: 	moveFromBottom 300ms ease-in-out;
	-ms-animation: 		moveFromBottom 300ms ease-in-out;
}

@-webkit-keyframes moveFromBottom {
from	{ opacity: 0; -webkit-transform: translateY(200%); }
to 		{ opacity: 1; -webkit-transform: translateY(0%); }
}
@-moz-keyframes moveFromBottom {
from 	{ opacity: 0; -moz-transform: translateY(200%); }
to 		{ opacity: 1; -moz-transform: translateY(0%); }
}
@-ms-keyframes moveFromBottom {
from 	{ opacity: 0; -ms-transform: translateY(200%); }
to 		{ opacity: 1; -ms-transform: translateY(0%); }
}
@-webkit-keyframes moveFromTop {
from 	{ opacity: 0; -webkit-transform: translateY(-200%); }
to		{ opacity: 1; -webkit-transform: translateY(0%); }
}
@-moz-keyframes moveFromTop {
from 	{ opacity: 0; -moz-transform: translateY(-200%); }
to 		{ opacity: 1; -moz-transform: translateY(0%); }
}
@-ms-keyframes moveFromTop {
from 	{ opacity: 0; -ms-transform: translateY(-200%); }
to 		{ opacity: 1; -ms-transform: translateY(0%); }
}

/* Layout */
.nxs-target .icon-top-left .icon,
.nxs-target .icon-top .icon 								{ margin-bottom: 20px; }

.nxs-target .icon-top .content,
.nxs-target .icon-top-left .content,
.nxs-target .icon-top-center .content		 				{ margin-left: 0px !important; }

.nxs-target .icon-top .icon		 							{ padding: 10px; width: 99% !important; padding-left: 0px; padding-right: 0px; }
.nxs-target .icon-top-left .icon		 					{ display: block; clear: both; float: none; }
.nxs-target .icon-top-center .icon		 					{ display: block; clear: both; float: none; margin: 0 auto 20px; }

/* size */
.nxs-target 	  	.icon-size-1-0 .icon 					{ font-size: 32px; width: 48px; line-height: 48px; }
.nxs-target:hover 	.hover.icon-size-1-0 .icon 				{ font-size: 48px; }
.nxs-target 	  	.icon-size-1-0 .content 				{ margin-left: 58px; }
.nxs-target 		.icon-size-1-0 .content.colored 		{ margin-left: 83px; }
.nxs-target 		.icon-size-1-0.icon-top-left .icon,
.nxs-target 		.icon-size-1-0.icon-top-center .icon	{ height: 48px; width: 48px; }

.nxs-target 	  	.icon-size-2-0 .icon 					{ font-size: 64px; width: 96px; line-height: 96px; }
.nxs-target:hover 	.hover.icon-size-2-0 .icon 				{ font-size: 96px; }
.nxs-target 	  	.icon-size-2-0 .content 				{ margin-left: 116px; }
.nxs-target 		.icon-size-2-0 .content.colored 		{ margin-left: 136px; }
.nxs-target 		.icon-size-2-0.icon-top-left .icon,
.nxs-target 		.icon-size-2-0.icon-top-center .icon	{ height: 96px; width: 96px; }

.nxs-target 	  	.icon-size-3-0 .icon 					{ font-size: 96px; width: 144px; line-height: 144px; }
.nxs-target:hover 	.hover.icon-size-3-0 .icon 				{ font-size: 144px; }
.nxs-target 	  	.icon-size-3-0 .content 				{ margin-left: 164px; }
.nxs-target 		.icon-size-3-0 .content.colored 		{ margin-left: 184px; }
.nxs-target 		.icon-size-3-0.icon-top-left .icon,
.nxs-target 		.icon-size-3-0.icon-top-center .icon	{ height: 144px; width: 144px; }

.nxs-target 	  	.icon-size-4-0 .icon 					{ font-size: 128px; width: 192px; line-height: 192px; }
.nxs-target:hover 	.hover.icon-size-4-0 .icon 				{ font-size: 192px; }
.nxs-target 	  	.icon-size-4-0 .content 				{ margin-left: 212px; }
.nxs-target 		.icon-size-4-0 .content.colored 		{ margin-left: 232px; }
.nxs-target 		.icon-size-4-0.icon-top-left .icon,
.nxs-target 		.icon-size-4-0.icon-top-center .icon	{ height: 192px; width: 192px; }

.nxs-target 	  	.icon-size-5-0 .icon 					{ font-size: 160px; width: 240px; line-height: 240px; }
.nxs-target:hover 	.hover.icon-size-5-0 .icon 				{ font-size: 240px; }
.nxs-target 	  	.icon-size-5-0 .content 				{ margin-left: 260px; }
.nxs-target 		.icon-size-5-0 .content.colored 		{ margin-left: 280px; }
.nxs-target 		.icon-size-5-0.icon-top-left .icon,
.nxs-target 		.icon-size-5-0.icon-top-center .icon	{ height: 240px; width: 240px; }


/* no transition */
.nxs-m-touch .nxs-target,
.nxs-target .no-transition,
.nxs-m-touch .nxs-target .icon,
.nxs-target .no-transition .icon {	
	-webkit-transition: none;
	-moz-transition: 	none;
	-ms-transition: 	none;
	-o-transition: 		none;
	transition: 		none;
}
.nxs-m-touch .nxs-target:hover .icon,
.nxs-target:hover .no-transition .icon 						{ font-size: 32px; }
.nxs-m-touch .nxs-target:hover .main,
.nxs-target:hover .no-transition .main,
.nxs-m-touch .nxs-target:hover .sub,
.nxs-target:hover .no-transition .sub,
.nxs-m-touch .nxs-target:hover .nxs-button,
.nxs-target:hover .no-transition .nxs-button { 
	-webkit-animation: 	none;
	-moz-animation: 	none;
	-ms-animation: 		none;
}

/* FACEBOOK LIKE BOX
---------------------------------------------------------------------------------------------------- */
.fb-like-box, 
.fb-like-box > span,
.fb-like-box iframe 										{ width: 100% !important; }

/* GOOGLE DOCS
---------------------------------------------------------------------------------------------------- */
.nxs-googledoc > iframe										{ width: 100% !important; }

/* FLICKR
---------------------------------------------------------------------------------------------------- */
.nxs-flickr iframe											{ width: 100% !important; }

/* CAROUSEL
---------------------------------------------------------------------------------------------------- */
.nxs-carousel .logo-wrapper									{ width: 100%; height: 100%; overflow: hidden; z-index: 15; pointer-events: none; }
/* 
The problem is display: inline. This respects whitespaces like line breaks in your code.
http://stackoverflow.com/questions/16494468/what-is-this-random-extra-space-between-these-two-elementsli 
*/
.nxs-carousel .carousel-wrapper img							{ display: block; }

/* http://cssdeck.com/labs/responsive-image */
.nxs-carousel .logo-wrapper img								{ top: 50%; pointer-events: none; }
.nxs-carousel .logo-wrapper img.center {
	left: 50%;
	-webkit-transform: 	translate(-50%, -50%);
	-moz-transform: 	translate(-50%, -50%);
	-ms-transform: 		translate(-50%, -50%);
	-o-transform: 		translate(-50%, -50%);
	transform: 			translate(-50%, -50%);
}
.nxs-carousel .logo-wrapper img.left,
.nxs-carousel .logo-wrapper img.right {
	-webkit-transform: 	translate(0%, -50%);
	-moz-transform: 	translate(0%, -50%);
	-ms-transform: 		translate(0%, -50%);
	-o-transform: 		translate(0%, -50%);
	transform: 			translate(0%, -50%);
}
.nxs-carousel .logo-wrapper img.left 						{ left: 0; }
.nxs-carousel .logo-wrapper img.right 						{ right: 0; }

/* object left */
.nxs-carousel .color-wrapper 								{ width: 100%; height: 100%; z-index: 12; overflow: hidden; }
.nxs-carousel .color-wrapper .object1 						{ width: 12%; left: -5%;  height: 120%; top: -10%; z-index: 10; }
.nxs-carousel .color-wrapper .object2 						{ width: 7%;  left:  5%;  height: 120%; top: -10%; z-index: 11; opacity: 0.5; }
.nxs-carousel .color-wrapper .object3 						{ width: 9%;  left:  7%;  height: 120%; top: -10%; z-index: 9;  opacity: 0.3; }

/* object right */
.nxs-carousel .color-wrapper .object4 						{ width: 38%; right: -4%; height: 140%; top: -15%; z-index: 10; }
.nxs-carousel .color-wrapper .object5 						{ width: 10%; right: 5%;  height: 120%; top: -10%; z-index: 11; opacity: 0.5; }
.nxs-carousel .color-wrapper .object6 						{ width: 9%;  right: 29%; height: 120%; top: -10%; z-index: 11; opacity: 0.5; }
.nxs-carousel .color-wrapper .object7 						{ width: 11%; right: 32%; height: 140%; top: -20%; z-index: 9;  opacity: 0.3; }

/* object rotation */
.nxs-carousel .color-wrapper .object1,
.nxs-carousel .color-wrapper .object2,
.nxs-carousel .color-wrapper .object3,
.nxs-carousel .color-wrapper .object4 { 
	transform:rotate(17deg);
	-ms-transform:rotate(17deg);
	-webkit-transform:rotate(17deg);
}
.nxs-carousel .color-wrapper .object5,
.nxs-carousel .color-wrapper .object6,
.nxs-carousel .color-wrapper .object7 { 
	transform:rotate(197deg);
	-ms-transform:rotate(197deg);
	-webkit-transform:rotate(197deg);
}

/* BANNER
---------------------------------------------------------------------------------------------------- */
.nxs-banner .image-wrapper 									{ height: 11.8em; max-width: 11.8em; margin-bottom: 30px; border-right: 3.6em solid transparent; float: left; }
.nxs-banner .image-wrapper .nxs-table						{ height: 11.8em; margin: 0 auto; }
.nxs-banner .image-wrapper img	 							{ max-height: 100%; width: 100%; }
.nxs-banner .image-wrapper.placeinrow5,
.nxs-main .nxs-banner .image-wrapper.placeinrow3,
.nxs-sidebar-container .nxs-banner .image-wrapper.placeinrow1,
.nxs-sidebar-container .nxs-banner .image-wrapper.placeinrow3 { border-right: 0; }
.nxs-banner .image-wrapper.last								{ border-right: 0; }

.nxs-main .nxs-banner .image-wrapper.placeinrow5			{ border-right: 3.6em solid transparent !important; }

/* WOOCOMMERCE
---------------------------------------------------------------------------------------------------- */
.woocommerce p.form-row  									{ clear: both; font-size: 15px; }
.woocommerce p.form-row label 								{ width: 20%; display: block; float: left; line-height: 30px; }
.woocommerce p.form-row select								{ margin-bottom: 20px; }
.woocommerce p.form-row input 								{ width: 80%; float: right; line-height: 30px; box-shadow: 0px 0px 0px 1px gray inset; -webkit-appearance: none; text-indent: 10px; }

.woocommerce ul.woocommerce-error li						{ color: red; line-height: 30px; }
.woocommerce table td,
.woocommerce table th,
.woocommerce table td span,
.woocommerce table th span									{ font-size: 15px; }
.woocommerce ul.payment_methods,
.woocommerce .cart_totals h2,
.woocommerce .checkout h3,
h3#order_review_heading,
#order_review h3
.woocommerce ul.woocommerce-error							{ margin-bottom: 10px; }
.woocommerce .payment_box									{ margin-top: 5px; }


/* DEFAULT NT BUTTONS
---------------------------------------------------------------------------------------------------- */
.button-container {
	display: inline-block;
	box-shadow: inset 0 0 0 1px #DFDFDF;
	height: 48px;
	padding-left: 10px;
	margin-right: 20px;
	border-radius: 3px;
	background-color: #F1F1F1;
	background-image: linear-gradient(top,#F9F9F9,#ECECEC);
	background-image: -o-linear-gradient(top,#F9F9F9,#ECECEC);
	background-image: -ms-linear-gradient(top,#F9F9F9,#ECECEC);
	background-image: -moz-linear-gradient(top,#F9F9F9,#ECECEC);
	background-image: -webkit-linear-gradient(top,#F9F9F9,#ECECEC);
	background-image: -webkit-gradient(linear,left top,left bottom,from(#F9F9F9),to(#ECECEC));
}
.icon-container 											{ width: 48px; height: 48px; text-align: center; }
.button-container span { 
	font-size: 32px !important; 
	line-height: 48px; 
	-webkit-transition: all 0.2s; 
	-moz-transition: 	all 0.2s; 	
	-o-transition: 		all 0.2s;	
	transition: 		all 0.2s;
}
.button-container:hover,
.button-container:hover input								{ cursor: pointer; }
.button-container:hover span								{ font-size: 48px !important; }
.button-container input										{ line-height: 48px; background: none; }

.button-container.main 										{ background: #72B12F; box-shadow: inset 0 0 0 1px #3e601a; }
.button-container.main input,
.button-container.main span									{ color: white; text-shadow: 1px 1px 1px #3e601a; }
.button-container.main:hover								{ background: white; box-shadow: inset 0 0 0 1px #DFDFDF; }
.button-container.main:hover input,
.button-container.main:hover span							{ color: #72B12F; text-shadow: none; }


/* THEMESELECTOR
---------------------------------------------------------------------------------------------------- */
.nxs-themeselector img {  
	z-index: 1;
	transition: 		z-index 0.2s linear;
	-o-transition: 		z-index 0.2s linear; 
	-moz-transition: 	z-index 0.2s linear;
	-webkit-transition: z-index 0.2s linear;
}
.nxs-themeselector .color-palettes { 
	position: absolute; 
	height: 0px;
	width: 100%; 
	bottom: 0px; 
	background-color: rgb(0, 0, 0);
	background-color: rgba(0, 0, 0, 0.6);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
	z-index: 100;
	-webkit-transition: all .25s ease;
	-moz-transition: 	all .25s ease;
	-o-transition: 		all .25s ease;
	transition: 		all .25s ease;
}
.nxs-themeselector:hover .color-palettes 					{ height: 86px; padding: 5px 0; }
.nxs-themeselector .color-palettes ul { 
	float: left;
	padding: 5px; 
	border-radius: 2px; 
	background-color: none;
	transition: 		background-color 0.2s linear;
	-o-transition: 		background-color 0.2s linear; 
	-moz-transition: 	background-color 0.2s linear;
	-webkit-transition: background-color 0.2s linear;
}
.nxs-themeselector:hover .color-palettes ul.nxs-activepalette,
.nxs-themeselector .color-palettes ul:hover					{ background-color: #BBB; cursor: pointer; }
.nxs-themeselector li.miniColors-trigger { 
	display: block; 
	margin: 5px 0 0; 
	height: 0px;
	-webkit-transition: all .25s ease;
	-moz-transition: 	all .25s ease;
	-o-transition: 		all .25s ease;
	transition: 		all .25s ease;
}
.nxs-themeselector:hover li.miniColors-trigger 				{ height: 22px; }
.nxs-themeselector li.miniColors-trigger:first-child 		{ margin-top: 0px; }
.nxs-themeselector .nxs-button						 		{ display: none; margin: 4px 0; width: 150px; text-align: center; position: absolute; right: 7px; }
.nxs-themeselector .specs .nxs-button						{ bottom: 7px; }
.nxs-themeselector:hover .nxs-button						{ display: inline-block; }

/* COLOR STYLING
---------------------------------------------------------------------------------------------------- */

/* CONTACT */
.nxs-form input,
.nxs-form textarea											{ box-shadow: 0px 0px 0px 1px gray inset; -webkit-appearance: none; }
/* Modernizr fallback */
.nxs-m-no-boxshadow .nxs-form input,
.nxs-m-no-boxshadow .nxs-form textarea						{ border: 1px solid gray; }

.nxs-form input[type=checkbox]					{ box-shadow: none; -webkit-appearance: checkbox; }


/* WORDPRESS DEFAULT HTML ELEMENTS
---------------------------------------------------------------------------------------------------- */
.entry-content abbr[title] 									{ border-bottom: 1px dotted #2b2b2b; cursor: help; }
.entry-content hr 											{ background-color: rgba(0, 0, 0, 0.1); border: 0; height: 1px; margin-bottom: 23px; }
.entry-content p, .entry-content ul, .entry-content ol, .entry-content dd, .entry-content pre, .entry-content hr, .entry-content table { margin-bottom: 24px; }
.entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5, .entry-content h6 { clear: both; font-weight: 700; margin: 36px 0 12px; }
.entry-content h1 											{ font-size: 26px; line-height: 1.3846153846; }
.entry-content h2 											{ font-size: 24px; line-height: 1; }
.entry-content h3 											{ font-size: 22px; line-height: 1.0909090909; }
.entry-content h4 											{ font-size: 20px; line-height: 1.2; }
.entry-content h5 											{ font-size: 18px; line-height: 1.3333333333; }
.entry-content h6 											{ font-size: 16px; line-height: 1.5; }
.entry-content address 										{ font-style: italic; margin-bottom: 24px; }
.entry-content abbr[title] 									{ border-bottom: 1px dotted #2b2b2b; cursor: help; }
.entry-content b, .entry-content strong 					{ font-weight: 700; }
.entry-content cite, .entry-content dfn, .entry-content em, .entry-content i { font-style: italic; } 
.entry-content mark, .entry-content ins						{ background: #fff9c0; text-decoration: none; }
.entry-content p 											{ line-height: 24px; font-size: 16px; padding-bottom: 0; margin-bottom: 24px; }
.entry-content code, .entry-content kbd, .entry-content tt, .entry-content var, .entry-content samp, .entry-content pre {
	font-family: monospace, serif;
	font-size: 15px;
	-webkit-hyphens: none;
	-moz-hyphens:    none;
	-ms-hyphens:     none;
	hyphens:         none;
	line-height: 1.6;
}
.entry-content pre {
	border: 1px solid rgba(0, 0, 0, 0.1);
	-webkit-box-sizing: border-box;
	-moz-box-sizing:    border-box;
	box-sizing:         border-box;
	margin-bottom: 24px;
	max-width: 100%;
	overflow: auto;
	padding: 12px;
	white-space: pre;
	white-space: pre-wrap;
	word-wrap: break-word;
}
.entry-content blockquote,
.entry-content q {
	-webkit-hyphens: none;
	-moz-hyphens:    none;
	-ms-hyphens:     none;
	hyphens:         none;
	quotes: none;
}
.entry-content blockquote:before, .entry-content blockquote:after, .entry-content q:before, .entry-content q:after { content: ""; content: none; }
.entry-content blockquote 									{ color: #767676; font-size: 19px; font-style: italic; font-weight: 300; line-height: 1.2631578947; margin-bottom: 24px; position: relative; }

.entry-content blockquote cite, .entry-content blockquote small { color: #2b2b2b; font-size: 16px; font-weight: 400; line-height: 1.5; }
.entry-content blockquote em, .entry-content blockquote i, .entry-content blockquote cite { font-style: normal; }
.entry-content blockquote strong, .entry-content blockquote b { font-weight: 400; }
.entry-content small 										{ font-size: smaller; }
.entry-content big 											{ font-size: 125%; }
.entry-content sup,
.entry-content sub 											{ font-size: 75%; height: 0; line-height: 0; position: relative; vertical-align: baseline; }
.entry-content sup 											{ bottom: 1ex; }
.entry-content sub 											{ top: .5ex; }
.entry-content dl 											{ margin-bottom: 24px; }
.entry-content dt 											{ font-weight: bold; }
.entry-content dd 											{ margin-bottom: 24px; } 
.entry-content li > ul, 
.entry-content li > ol 										{ margin: 10px 0 0 20px; }

/* custom styling */
.entry-content blockquote:before 							{ content: "\e64c"; position: absolute; font-family: 'nexus'; font-size: 200%; top: -6px; }
.entry-content blockquote p									{ margin-left: 60px; font-style: italic; }

/* ICON FONTS
----------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------- */

/* Glyphs */
@font-face {
  font-family: 'nexus';
  src: url('../fonts/nexus-Regular.eot'); /* IE9 Compat Modes */
  src: url('../fonts/nexus-Regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
       url('../fonts/nexus-Regular.woff') format('woff'), /* Modern Browsers */
       url('../fonts/nexus-Regular.ttf')  format('truetype'), /* Safari, Android, iOS */
       url('../fonts/nexus-Regular.svg#b1292a846b0a94b56dc51653540907a2') format('svg'); /* Legacy iOS */
       
  font-style:   normal;
  font-weight:  400;
}
[class*="nxs-icon-"] {
	font-family: 'nexus';
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;
	display: inline-block;

	/* Better Font Rendering =========== */ 
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}

/* ICON FONT 2.0
---------------------------------------------------------------------------------------------------- */

/* Icomoon */
.nxs-icon-home:before 				{ content: "\e000"; }
.nxs-icon-office:before 			{ content: "\e001"; }
.nxs-icon-newspaper:before 			{ content: "\e002"; }
.nxs-icon-pencil2:before 			{ content: "\e003"; }
.nxs-icon-pencil:before 			{ content: "\e004"; }
.nxs-icon-quill:before 				{ content: "\e005"; }
.nxs-icon-pen:before 				{ content: "\e006"; }
.nxs-icon-blog:before 				{ content: "\e007"; }
.nxs-icon-droplet:before 			{ content: "\e008"; }
.nxs-icon-pagedecorator:before 		{ content: "\e009"; }
.nxs-icon-image:before 				{ content: "\e010"; }
.nxs-icon-sliderbox:before 			{ content: "\e011"; }
.nxs-icon-gallerybox:before 		{ content: "\e012"; }
.nxs-icon-music:before 				{ content: "\e013"; }
.nxs-icon-film:before 				{ content: "\e014"; }
.nxs-icon-camera-2:before 			{ content: "\e015"; }
.nxs-icon-dice:before 				{ content: "\e016"; }
.nxs-icon-pacman:before 			{ content: "\e017"; }
.nxs-icon-spades:before 			{ content: "\e018"; }
.nxs-icon-clubs:before 				{ content: "\e019"; }
.nxs-icon-diamonds:before 			{ content: "\e020"; }
.nxs-icon-callout:before 			{ content: "\e021"; }
.nxs-icon-connection:before 		{ content: "\e022"; }
.nxs-icon-book:before 				{ content: "\e023"; }
.nxs-icon-books:before 				{ content: "\e024"; }
.nxs-icon-library:before 			{ content: "\e025"; }
.nxs-icon-text:before 				{ content: "\e026"; }
.nxs-icon-profile:before,
.nxs-icon-bio:before 				{ content: "\e027"; }
.nxs-icon-bug:before 				{ content: "\e028"; }
.nxs-icon-stack:before 				{ content: "\e029"; }
.nxs-icon-folder:before 			{ content: "\e030"; }
.nxs-icon-tag:before 				{ content: "\e031"; }
.nxs-icon-tags:before 				{ content: "\e032"; }
.nxs-icon-qrcode:before 			{ content: "\e033"; }
.nxs-icon-ticket:before 			{ content: "\e034"; }
.nxs-icon-cart:before 				{ content: "\e035"; }
.nxs-icon-credit:before 			{ content: "\e036"; }
.nxs-icon-support:before 			{ content: "\e037"; }
.nxs-icon-phone:before 				{ content: "\e038"; }
.nxs-icon-address-book:before 		{ content: "\e039"; }
.nxs-icon-notebook:before 			{ content: "\e040"; }
.nxs-icon-contact:before 			{ content: "\e041"; }
.nxs-icon-pushpin:before 			{ content: "\e042"; }
.nxs-icon-googlemap:before 			{ content: "\e043"; }
.nxs-icon-compass:before 			{ content: "\e044"; }
.nxs-icon-map:before 				{ content: "\e045"; }
.nxs-icon-history:before 			{ content: "\e046"; }
.nxs-icon-alarm:before 				{ content: "\e047"; }
.nxs-icon-bell:before 				{ content: "\e048"; }
.nxs-icon-stopwatch1:before 		{ content: "\e049"; }
.nxs-icon-calendar-2:before 		{ content: "\e050"; }
.nxs-icon-calendar:before 			{ content: "\e051"; }
.nxs-icon-print:before 				{ content: "\e052"; }
.nxs-icon-keyboard:before 			{ content: "\e053"; }
.nxs-icon-screen:before 			{ content: "\e054"; }
.nxs-icon-laptop:before 			{ content: "\e055"; }
.nxs-icon-mobile:before 			{ content: "\e056"; }
.nxs-icon-tablet:before 			{ content: "\e057"; }
.nxs-icon-tv:before 				{ content: "\e058"; }
.nxs-icon-cabinet:before 			{ content: "\e059"; }
.nxs-icon-drawer:before 			{ content: "\e060"; }
.nxs-icon-drawer2:before 			{ content: "\e061"; }
.nxs-icon-box-add:before 			{ content: "\e062"; }
.nxs-icon-box-remove:before 		{ content: "\e063"; }
.nxs-icon-undefined:before 			{ content: "\e064"; }
.nxs-icon-upload:before 			{ content: "\e065"; }
.nxs-icon-undo:before 				{ content: "\e066"; }
.nxs-icon-redo:before 				{ content: "\e067"; }
.nxs-icon-undo2:before 				{ content: "\e068"; }
.nxs-icon-redo2:before 				{ content: "\e069"; }
.nxs-icon-forward:before 			{ content: "\e070"; }
.nxs-icon-reply:before 				{ content: "\e071"; }
.nxs-icon-quote:before 				{ content: "\e072"; }
.nxs-icon-comments:before 			{ content: "\e073"; }
.nxs-icon-user:before 				{ content: "\e074"; }
.nxs-icon-users:before 				{ content: "\e075"; }
.nxs-icon-quotes-left:before 		{ content: "\e076"; }
.nxs-icon-busy:before 				{ content: "\e077"; }
.nxs-icon-binoculars:before 		{ content: "\e078"; }
.nxs-icon-search:before 			{ content: "\e079"; }
.nxs-icon-zoom-out:before 			{ content: "\e080"; }
.nxs-icon-zoom-in:before 			{ content: "\e081"; }
.nxs-icon-expand:before 			{ content: "\e082"; }
.nxs-icon-contract:before 			{ content: "\e083"; }
.nxs-icon-expand2:before 			{ content: "\e084"; }
.nxs-icon-contract2:before 			{ content: "\e085"; }
.nxs-icon-key:before 				{ content: "\e086"; }
.nxs-icon-lock2:before 				{ content: "\e087"; }
.nxs-icon-lock:before 				{ content: "\e088"; }
.nxs-icon-unlocked:before 			{ content: "\e089"; }
.nxs-icon-equalizer:before 			{ content: "\e090"; }
.nxs-icon-cog:before 				{ content: "\e091"; }
.nxs-icon-wand:before 				{ content: "\e092"; }
.nxs-icon-aid:before 				{ content: "\e093"; }
.nxs-icon-pie:before 				{ content: "\e094"; }
.nxs-icon-stats:before 				{ content: "\e095"; }
.nxs-icon-bars:before 				{ content: "\e096"; }
.nxs-icon-gift:before 				{ content: "\e097"; }
.nxs-icon-trophy:before 			{ content: "\e098"; }
.nxs-icon-glass:before 				{ content: "\e099"; }

.nxs-icon-food:before 				{ content: "\e100"; }
.nxs-icon-leaf:before 				{ content: "\e101"; }
.nxs-icon-rocket:before 			{ content: "\e102"; }
.nxs-icon-dashboard2:before 		{ content: "\e103"; }
.nxs-icon-hammer:before,
.nxs-icon-hammer2:before 			{ content: "\e104"; }
.nxs-icon-fire:before 				{ content: "\e105"; }
.nxs-icon-lab:before 				{ content: "\e106"; }
.nxs-icon-magnet:before 			{ content: "\e107"; }
.nxs-icon-trash:before 				{ content: "\e108"; }
.nxs-icon-briefcase:before 			{ content: "\e109"; }
.nxs-icon-airplane:before 			{ content: "\e110"; }
.nxs-icon-truck:before 				{ content: "\e111"; }
.nxs-icon-road:before 				{ content: "\e112"; }
.nxs-icon-accessibility:before 		{ content: "\e113"; }
.nxs-icon-target:before 			{ content: "\e114"; }
.nxs-icon-shield:before 			{ content: "\e115"; }
.nxs-icon-lightning:before 			{ content: "\e116"; }
.nxs-icon-switch:before 			{ content: "\e117"; }
.nxs-icon-plug:before 				{ content: "\e118"; }
.nxs-icon-signup:before 			{ content: "\e119"; }
.nxs-icon-list:before 				{ content: "\e120"; }
.nxs-icon-list2:before 				{ content: "\e121"; }
.nxs-icon-numbered-list:before 		{ content: "\e122"; }
.nxs-icon-tree:before 				{ content: "\e123"; }
.nxs-icon-cloud:before 				{ content: "\e124"; }
.nxs-icon-cloud-download:before 	{ content: "\e125"; }
.nxs-icon-cloud-upload:before 		{ content: "\e126"; }
.nxs-icon-network:before 			{ content: "\e127"; }
.nxs-icon-earth:before 				{ content: "\e128"; }
.nxs-icon-link:before 				{ content: "\e129"; }
.nxs-icon-flag:before 				{ content: "\e130"; }
.nxs-icon-attachment:before 		{ content: "\e131"; }
.nxs-icon-eye:before 				{ content: "\e132"; }
.nxs-icon-brightness-medium:before  { content: "\e133"; }
.nxs-icon-brightness-contrast:before{ content: "\e134"; }
.nxs-icon-star:before 				{ content: "\e135"; }
.nxs-icon-star3:before 				{ content: "\e136"; }
.nxs-icon-star2:before 				{ content: "\e137"; }
.nxs-icon-heart:before 				{ content: "\e138"; }
.nxs-icon-socialsharing:before 		{ content: "\e139"; }
.nxs-icon-heart-broken:before 		{ content: "\e140"; }
.nxs-icon-thumbs-up:before 			{ content: "\e141"; }
.nxs-icon-thumbs-up2:before 		{ content: "\e142"; }
.nxs-icon-happy:before 				{ content: "\e143"; }
.nxs-icon-smiley:before 			{ content: "\e144"; }
.nxs-icon-tongue:before 			{ content: "\e145"; }
.nxs-icon-sad:before 				{ content: "\e146"; }
.nxs-icon-wink:before 				{ content: "\e147"; }
.nxs-icon-grin:before 				{ content: "\e148"; }
.nxs-icon-cool:before 				{ content: "\e149"; }
.nxs-icon-angry:before 				{ content: "\e150"; }
.nxs-icon-evil:before 				{ content: "\e151"; }
.nxs-icon-shocked:before 			{ content: "\e152"; }
.nxs-icon-confused:before 			{ content: "\e153"; }
.nxs-icon-neutral:before 			{ content: "\e154"; }
.nxs-icon-wondering:before 			{ content: "\e155"; }
.nxs-icon-point-up:before 			{ content: "\e156"; }
.nxs-icon-point-down:before 		{ content: "\e157"; }
.nxs-icon-point-right:before 		{ content: "\e158"; }
.nxs-icon-point-left:before 		{ content: "\e159"; }
.nxs-icon-warning:before 			{ content: "\e160"; }
.nxs-icon-notification:before 		{ content: "\e161"; }
.nxs-icon-question:before 			{ content: "\e162"; }
.nxs-icon-info:before 				{ content: "\e163"; }
.nxs-icon-blocked:before 			{ content: "\e164"; }
.nxs-icon-cancel-circle:before 		{ content: "\e165"; }
.nxs-icon-checkmark-circle:before 	{ content: "\e166"; }
.nxs-icon-close:before 				{ content: "\e167"; }
.nxs-icon-checkmark:before 			{ content: "\e168"; }
.nxs-icon-minus:before 				{ content: "\e169"; }
.nxs-icon-plus:before 				{ content: "\e170"; }
.nxs-icon-enter:before 				{ content: "\e171"; }
.nxs-icon-exit:before,
.nxs-icon-logout:before  			{ content: "\e172"; }
.nxs-icon-play:before 				{ content: "\e173"; }
.nxs-icon-pause:before 				{ content: "\e174"; }
.nxs-icon-stop:before 				{ content: "\e175"; }
.nxs-icon-backward:before 			{ content: "\e176"; }
.nxs-icon-forward2:before 			{ content: "\e177"; }
.nxs-icon-play2:before 				{ content: "\e178"; }
.nxs-icon-pause2:before 			{ content: "\e179"; }
.nxs-icon-stop2:before 				{ content: "\e180"; }
.nxs-icon-backward2:before 			{ content: "\e181"; }
.nxs-icon-forward2:before,
.nxs-icon-forward3:before 			{ content: "\e182"; }
.nxs-icon-first:before 				{ content: "\e183"; }
.nxs-icon-last:before 				{ content: "\e184"; }
.nxs-icon-previous:before 			{ content: "\e185"; }
.nxs-icon-next:before 				{ content: "\e186"; }
.nxs-icon-eject:before 				{ content: "\e187"; }
.nxs-icon-volume-high:before 		{ content: "\e188"; }
.nxs-icon-volume-medium:before 		{ content: "\e189"; }
.nxs-icon-volume-low:before 		{ content: "\e190"; }
.nxs-icon-volume-mute:before 		{ content: "\e191"; }
.nxs-icon-volume-mute2:before 		{ content: "\e192"; }
.nxs-icon-volume-decrease:before 	{ content: "\e193"; }
.nxs-icon-volume-increase:before 	{ content: "\e194"; }
.nxs-icon-disk:before 				{ content: "\e195"; }
.nxs-icon-wrench:before,
.nxs-icon-page-settings:before 		{ content: "\e196"; }
.nxs-icon-shuffle:before 			{ content: "\e197"; }
.nxs-icon-arrow-up-left:before 		{ content: "\e198"; }
.nxs-icon-arrow-up:before 			{ content: "\e199"; }

.nxs-icon-arrow-up-right:before 	{ content: "\e200"; }
.nxs-icon-arrow-right:before		{ content: "\e201"; }
.nxs-icon-arrow-down-right:before 	{ content: "\e202"; }
.nxs-icon-arrow-down:before 		{ content: "\e203"; }
.nxs-icon-arrow-down-left:before 	{ content: "\e204"; }
.nxs-icon-arrow-left:before 		{ content: "\e205"; }
.nxs-icon-arrow-up-left2:before		{ content: "\e206"; }
.nxs-icon-arrow-up2:before 			{ content: "\e207"; }
.nxs-icon-arrow-up-right2:before 	{ content: "\e208"; }
.nxs-icon-arrow-right2:before 		{ content: "\e209"; }
.nxs-icon-arrow-down-right2:before 	{ content: "\e210"; }
.nxs-icon-arrow-down2:before 		{ content: "\e211"; }
.nxs-icon-arrow-down-left2:before 	{ content: "\e212"; }
.nxs-icon-arrow-left2:before 		{ content: "\e213"; }
.nxs-icon-arrow-up-left3:before 	{ content: "\e214"; }
.nxs-icon-arrow-up3:before 			{ content: "\e215"; }
.nxs-icon-arrow-up-right3:before 	{ content: "\e216"; }
.nxs-icon-arrow-right3:before 		{ content: "\e217"; }
.nxs-icon-arrow-down-right3:before 	{ content: "\e218"; }
.nxs-icon-arrow-down3:before 		{ content: "\e219"; }
.nxs-icon-arrow-down-left3:before 	{ content: "\e220"; }
.nxs-icon-arrow-left3:before 		{ content: "\e221"; }
.nxs-icon-radio-checked:before 		{ content: "\e222"; }
.nxs-icon-radio-unchecked:before,
.nxs-icon-radial:before 			{ content: "\e223"; }
.nxs-icon-crop:before 				{ content: "\e224"; }
.nxs-icon-scissors:before 			{ content: "\e225"; }
.nxs-icon-filer:before,
.nxs-icon-squeezebox:before			{ content: "\e226"; }
.nxs-icon-template:before 			{ content: "\e227"; }
.nxs-icon-new-tab:before 			{ content: "\e228"; }
.nxs-icon-embed:before 				{ content: "\e229"; }
.nxs-icon-share:before,
.nxs-icon-social:before 			{ content: "\e230"; }
.nxs-icon-google:before 			{ content: "\e231"; }
.nxs-icon-google-plus:before 		{ content: "\e232"; }
.nxs-icon-facebook:before 			{ content: "\e233"; }
.nxs-icon-instagram:before 			{ content: "\e234"; }
.nxs-icon-twitter:before,
.nxs-icon-twittertweets:before 		{ content: "\e235"; }
.nxs-icon-twitter-2:before 			{ content: "\e236"; }
.nxs-icon-feed:before,
.nxs-icon-rss:before 				{ content: "\e237"; }
.nxs-icon-youtube:before 			{ content: "\e238"; }
.nxs-icon-vimeo:before 				{ content: "\e239"; }
.nxs-icon-vimeo2:before 			{ content: "\e240"; }
.nxs-icon-flickr:before 			{ content: "\e241"; }
.nxs-icon-wordpress:before,
.nxs-icon-wordpresssidebar:before 	{ content: "\e242"; }
.nxs-icon-apple:before 				{ content: "\e243"; }
.nxs-icon-windows8:before 			{ content: "\e244"; }
.nxs-icon-soundcloud:before 		{ content: "\e245"; }
.nxs-icon-skype:before 				{ content: "\e246"; }
.nxs-icon-linkedin:before 			{ content: "\e247"; }
.nxs-icon-pinterest:before 			{ content: "\e248"; }
.nxs-icon-file-pdf:before 			{ content: "\e249"; }
.nxs-icon-clock:before 				{ content: "\e250"; }
.nxs-icon-headphones:before 		{ content: "\e251"; }
.nxs-icon-loop:before 				{ content: "\e252"; }
.nxs-icon-loop2:before 				{ content: "\e253"; }
.nxs-icon-loop3:before 				{ content: "\e254"; }
.nxs-icon-bubble:before 			{ content: "\e255"; }
.nxs-icon-copy:before 				{ content: "\e256"; }
.nxs-icon-copy2:before 				{ content: "\e257"; }
.nxs-icon-copy3:before 				{ content: "\e258"; }
.nxs-icon-paste:before 				{ content: "\e259"; }
.nxs-icon-mobile2:before 			{ content: "\e260"; }
.nxs-icon-bars2:before 				{ content: "\e261"; }
.nxs-icon-eye-blocked:before 		{ content: "\e262"; }
.nxs-icon-contrast:before 			{ content: "\e262"; }
.nxs-icon-google-drive:before 		{ content: "\e264"; }

/* Custom */
.nxs-icon-header:before 			{ content: "\e300"; }
.nxs-icon-sidebar:before 			{ content: "\e301"; }
.nxs-icon-footer:before 			{ content: "\e302"; }
.nxs-icon-subfooter:before 			{ content: "\e303"; }
.nxs-icon-subheader:before 			{ content: "\e304"; }
.nxs-icon-construction:before 		{ content: "\e305"; }
.nxs-icon-dashboard:before			{ content: "\e306"; }
.nxs-icon-article-new:before		{ content: "\e307"; }
.nxs-icon-article-overview:before 	{ content: "\e308"; }
.nxs-icon-arrow-down-light:before 				{ content: "\e309"; }
.nxs-icon-arrow-left-light:before,
.nxs-icon-arrow-left-2:before 					{ content: "\e310"; }
.nxs-icon-arrow-up-light:before 				{ content: "\e311"; }
.nxs-icon-arrow-right-light:before 				{ content: "\e312"; }
.nxs-icon-arrow-double-left-light:before,
.nxs-icon-arrow-left-double:before 				{ content: "\e313"; }
.nxs-icon-arrow-double-right-light:before,
.nxs-icon-arrow-right-double:before 			{ content: "\e314"; }
.nxs-icon-dollar:before 			{ content: "\e315"; }
.nxs-icon-euro:before 				{ content: "\e316"; }
.nxs-icon-pound:before 				{ content: "\e317"; }
.nxs-icon-menucontainer:before 		{ content: "\e318"; }
.nxs-icon-carousel:before 			{ content: "\e319"; }
.nxs-icon-csv:before 				{ content: "\e320"; }
.nxs-icon-htmlcustom:before 		{ content: "\e321"; }
.nxs-icon-logo:before 				{ content: "\e322"; }
.nxs-icon-signpost:before 			{ content: "\e323"; }
.nxs-icon-wordpresstitle:before 	{ content: "\e324"; }
.nxs-icon-bus:before 				{ content: "\e325"; }
.nxs-icon-car:before 				{ content: "\e326"; }
.nxs-icon-train1:before 			{ content: "\e327"; }
.nxs-icon-company:before 			{ content: "\e328"; }
.nxs-icon-faucet:before 			{ content: "\e329"; }
.nxs-icon-hardhat:before 			{ content: "\e330"; }
.nxs-icon-herring:before 			{ content: "\e331"; }
.nxs-icon-horseshoe:before 			{ content: "\e332"; }
.nxs-icon-hospital:before 			{ content: "\e333"; }
.nxs-icon-matchresults:before 		{ content: "\e334"; }
.nxs-icon-mug:before 				{ content: "\e335"; }
.nxs-icon-oven:before 				{ content: "\e336"; }
.nxs-icon-palette:before 			{ content: "\e337"; }
.nxs-icon-paw:before 				{ content: "\e338"; }
.nxs-icon-plunger:before 			{ content: "\e339"; }
.nxs-icon-safe:before 				{ content: "\e340"; }
.nxs-icon-referee:before 			{ content: "\e341"; }
.nxs-icon-searchresults:before 		{ content: "\e342"; }
.nxs-icon-vacuum-cleaner:before 	{ content: "\e343"; }
.nxs-icon-warehouse:before 			{ content: "\e344"; }
.nxs-icon-window:before 			{ content: "\e345"; }
.nxs-icon-yoga:before 				{ content: "\e346"; }
.nxs-icon-zen:before 				{ content: "\e347"; }
.nxs-icon-security-camera:before 	{ content: "\e348"; }
.nxs-icon-dry-van:before 			{ content: "\e349"; }
.nxs-icon-snowflake:before,
.nxs-icon-snowflake1:before 		{ content: "\e350"; }
.nxs-icon-flat-bed:before 			{ content: "\e351"; }
.nxs-icon-truck3:before 			{ content: "\e352"; }
.nxs-icon-trolley:before 			{ content: "\e353"; }
.nxs-icon-spray-can:before 			{ content: "\e354"; }
.nxs-icon-sofa:before 				{ content: "\e355"; }
.nxs-icon-sewerage:before 			{ content: "\e356"; }
.nxs-icon-toilet:before 			{ content: "\e357"; }
.nxs-icon-tooth:before 				{ content: "\e358"; }
.nxs-icon-shirt:before 				{ content: "\e359"; }
.nxs-icon-commission:before 		{ content: "\e360"; }
.nxs-icon-birthdaycake:before 		{ content: "\e361"; }
.nxs-icon-blowtorch:before 			{ content: "\e362"; }
.nxs-icon-fan:before 				{ content: "\e363"; }
.nxs-icon-cat:before 				{ content: "\e364"; }
.nxs-icon-dog:before 				{ content: "\e365"; }
.nxs-icon-mole:before 				{ content: "\e366"; }
.nxs-icon-mouse:before 				{ content: "\e367"; }
.nxs-icon-fox:before 				{ content: "\e368"; }
.nxs-icon-pigeon:before 			{ content: "\e369"; }
.nxs-icon-rabbit:before 			{ content: "\e370"; }
.nxs-icon-rat:before 				{ content: "\e371"; }
.nxs-icon-squirrel:before 			{ content: "\e372"; }
.nxs-icon-categories:before 		{ content: "\e373"; }
.nxs-icon-tumbler:before 			{ content: "\e374"; }
.nxs-icon-remove-sign:before 		{ content: "\e375"; }
.nxs-icon-disabled:before 			{ content: "\e376"; }
.nxs-icon-file2:before 				{ content: "\e377"; }
.nxs-icon-apartment:before 			{ content: "\e378"; }
.nxs-icon-move:before 				{ content: "\e379"; }
.nxs-icon-ribbon:before 			{ content: "\e380"; }
.nxs-icon-headset:before 			{ content: "\e381"; }
.nxs-icon-mobilelove:before 		{ content: "\e382"; }
.nxs-icon-rocket:before 			{ content: "\e383"; }
.nxs-icon-hands:before 				{ content: "\e384"; }
.nxs-icon-joint:before 				{ content: "\e385"; }
.nxs-icon-pelvis:before 			{ content: "\e386"; }
.nxs-icon-ear:before 				{ content: "\e387"; }
.nxs-icon-spinal:before 			{ content: "\e388"; }
.nxs-icon-changecontent:before 		{ content: "\e389"; }
.nxs-icon-firework:before 			{ content: "\e390"; }
.nxs-icon-buildingblock:before 		{ content: "\e391"; }
.nxs-icon-brakes:before	 			{ content: "\e392"; }
.nxs-icon-tire:before 				{ content: "\e393"; }
.nxs-icon-brokenglass:before 		{ content: "\e394"; }
.nxs-icon-steeringwheel:before 		{ content: "\e395"; }

/* Crappicons */
.nxs-icon-cockroach:before 			{ content: "\e900"; }
.nxs-icon-flea:before 				{ content: "\e901"; }
.nxs-icon-fly:before 				{ content: "\e902"; }
.nxs-icon-moth:before 				{ content: "\e903"; }
.nxs-icon-termite:before 			{ content: "\e904"; }
.nxs-icon-wasp:before 				{ content: "\e905"; }
.nxs-icon-landrover:before 			{ content: "\e906"; }
.nxs-icon-mustang:before 			{ content: "\e907"; }
.nxs-icon-toyota:before 			{ content: "\e908"; }
.nxs-icon-truck2:before 			{ content: "\e909"; }

.nxs-icon-aries:before 				{ content: "\2648"; }
.nxs-icon-taurus:before 			{ content: "\2649"; }
.nxs-icon-gemini:before 			{ content: "\264a"; }
.nxs-icon-cancer:before 			{ content: "\264b"; }
.nxs-icon-leo:before 				{ content: "\264c"; }
.nxs-icon-virgo:before 				{ content: "\264d"; }
.nxs-icon-libra:before 				{ content: "\264e"; }
.nxs-icon-scorpio:before 			{ content: "\264f"; }
.nxs-icon-sagittarius:before 		{ content: "\2650"; }
.nxs-icon-capricorn:before 			{ content: "\2651"; }
.nxs-icon-aquarius:before 			{ content: "\2652"; }
.nxs-icon-pisces:before 			{ content: "\2653"; }
