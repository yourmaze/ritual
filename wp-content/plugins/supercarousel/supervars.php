<?php
global $targets, $supereasings, $superalign, $superdirection, $supereffect, $superdbkeys, $supernavstyle;
$targets = array('_self', '_new', '_parent');

$supereasings = array('swing', 'linear','easeInQuad','easeOutQuad','easeInOutQuad','easeInCubic','easeOutCubic','easeInOutCubic','easeInQuart','easeOutQuart','easeInOutQuart','easeInQuint','easeOutQuint','easeInOutQuint','easeInSine','easeOutSine','easeInOutSine','easeInExpo','easeOutExpo','easeInOutExpo','easeInCirc','easeOutCirc','easeInOutCirc','easeInElastic','easeOutElastic','easeInOutElastic','easeInBack','easeOutBack','easeInOutBack','easeInBounce','easeOutBounce','easeInOutBounce');

$superalign = array('center', 'left', 'right');

$superdirection = array('left', 'right', 'up', 'down');

$supereffect = array("slide", "focus", "fade");

$supernavstyle = array();

for($i=1;$i<=8;$i++) {
	$supernavstyle[] = "style$i-black";
	$supernavstyle[] = "style$i-white";
}

$superdbkeys = array('source'=>'', 'contentoption'=>'', 'contentlink'=>'0', 'contenttitle'=>'0', 'contentexcerptrm'=>'0', 'contenttemplate'=>'', 'superids'=>'', 'visible'=>'', 'itemWidth'=>'', 'itemHeight'=>'', 'mobileVisible'=>'1', 'mobileWidth'=>'480', 'tabletVisible'=>'2', 'tabletWidth'=>'768', 'direction'=>'left', 'effect'=>'slide', 'easing'=>'swing', 'easingTime'=>'1000', 'step'=>'1', 'auto'=>'0', 'pauseTime'=>'1000', 'pauseOver'=>'1', 'autoHeight'=>'0', 'slideGap'=>'4', 'nextPrev'=>'', 'paging'=>'', 'circular'=>'0', 'mouseWheel'=>'0', 'swipe'=>'1', 'keys'=>'0', 'superrandom'=>'', 'smallbut'=>'', 'navpadding'=>'', 'navstyle'=>'', 'customclass'=>'', 'autoscroll'=>'', 'scrollspeed'=>'', 'superhidden'=>'', 'mobileItemWidth'=>'', 'mobileItemHeight'=>'', 'tabletItemWidth'=>'', 'tabletItemHeight'=>'', 'imageSize'=>'full', 'caption'=>'always', 'slideHover'=>'disable');
?>