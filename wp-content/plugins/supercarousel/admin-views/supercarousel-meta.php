<?php
global $targets, $supereasings, $superalign, $superdirection, $supereffect, $superdbkeys, $supernavstyle;

include(dirname(plugin_dir_path(__FILE__)) . "/supervars.php");

if (isset($_REQUEST['post']) && is_numeric($_REQUEST['post'])) {

    $post = (int) $_REQUEST['post'];

    $post = get_post($post);

    $supersettings = stripslashes(get_post_meta($post->ID, 'supersettings', true));

    $supersettings = json_decode($supersettings);

    foreach ($superdbkeys as $keyx => $row) {

        $$keyx = isset($supersettings->$keyx) ? $supersettings->$keyx : '';
    }
} else {

    foreach ($superdbkeys as $keyx => $row) {

        $$keyx = $row;
    }
}

$sourcetypearr = explode(':', $source);

$sourcetype = $sourcetypearr[0];

$cats = get_terms('super_category', 'hide_empty=0');

$args = array('post_type' => 'superimage', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'DESC');

$loop = new WP_Query($args);

//supershow($loop->posts);
?>

<ul class="sprcrsl-admin">
    <li class="w2 sainput"><b>Carousel Source</b></li>
    <li class="w8">
        <select name="super[source]" id="supersource" onchange="check_carousel_source(this);" style="width: 200px;">

            <option value="">None</option>

            <?php
            foreach ($loop->posts as $row) {
                ?>

                <option value="image:<?php echo $row->ID; ?>"<?php echo ("image:" . $row->ID == $source) ? ' selected="selected"' : ''; ?>>Image-<?php echo $row->post_title; ?></option>

                <?php
            }



            foreach ($cats as $row) {
                ?>

                <option value="content:<?php echo $row->term_id; ?>"<?php echo ('content:' . $row->term_id == $source) ? ' selected="selected"' : ''; ?>>Content-<?php echo $row->name; ?></option>

                <?php
            }

            $wpcats = get_terms('category', 'hide_empty=0');

            foreach ($wpcats as $row) {
                ?>

                <option value="category:<?php echo $row->term_id; ?>"<?php echo ('category:' . $row->term_id == $source) ? ' selected="selected"' : ''; ?>>Category-<?php echo $row->name; ?></option>

                <?php
            }

            $wptags = get_terms('post_tag', 'hide_empty=0');

            foreach ($wptags as $row) {
                ?>

                <option value="tag:<?php echo $row->term_id; ?>"<?php echo ('tag:' . $row->term_id == $source) ? ' selected="selected"' : ''; ?>>Tag-<?php echo $row->name; ?></option>

                <?php
            }
            ?>

            <option value="custom"<?php echo ('custom' == $source) ? ' selected="selected"' : ''; ?>>Custom</option>
            <option value="latestpost"<?php echo ('latestpost' == $source) ? ' selected="selected"' : ''; ?>>Latest Post</option>
            <option value="popularpost"<?php echo ('popularpost' == $source) ? ' selected="selected"' : ''; ?>>Popular Post</option>
            <?php
            $cargs = array(
                '_builtin' => false
            );
            $cpost_types = get_post_types($cargs);
            foreach ($cpost_types as $cpost_type) {
                if (in_array($cpost_type, array('supercarousel', 'supercontent', 'superimage'))) {
                    continue;
                }
                $twpcats = get_object_taxonomies($cpost_type);

                if (!count($twpcats)) {
                    ?>

                    <option value="custom_post_type:<?php echo $cpost_type; ?>"<?php echo ('custom_post_type:' . $cpost_type == $source) ? ' selected="selected"' : ''; ?>>All-<?php echo $cpost_type; ?></option>

                    <?php
                    continue;
                }

                foreach ($twpcats as $wtx) {
                    $twterms = get_terms($wtx, 'hide_empty=0');
                    foreach ($twterms as $row) {
                        ?>

                        <option value="custom_post_type:<?php echo $cpost_type . ':' . $wtx . ':' . $row->term_id; ?>"<?php echo ('custom_post_type:' . $cpost_type . ':' . $wtx . ':' . $row->term_id == $source) ? ' selected="selected"' : ''; ?>><?php echo $cpost_type . '-' . $row->name; ?></option>

                        <?php
                    }
                }
            }
            ?>
        </select>
        <span id="supercustomidsdiv"<?php echo ($source != 'custom') ? ' style="display: none;"' : ''; ?>>
            <input type="text" name="super[superids]" id="supercustomids" value="<?php echo $superids; ?>" />
            <br />
            <span class="note">Note: Post Ids or Page Ids Comma Separated.</span>
        </span>

        <span id="supercontentcarouseldiv"<?php echo (in_array($sourcetype, array('image', ''))) ? ' style="display: none;"' : ''; ?>>
            <select name="super[contentoption]" id="contentoption" onchange="check_content_excerpt(this);">
                <option value="">Content</option>
                <option value="fi"<?php echo ($contentoption == 'fi') ? ' selected="selected"' : ''; ?>>Feature Image</option>
            </select>
            <span class="contentexcerptrmspan"<?php echo ($contentoption == 'fi') ? ' style="display: none;"' : ''; ?>>
                <?php
                $contenttemplatearr = array('Template - None' => '', 'Template - Featured Post' => 'tfp', 'Template - Team' => 'tt', 'Template - Blog Style 1' => 'tbs1', 'Template - Blog Style 2' => 'tbs2');
                ?>
                <select name="super[contenttemplate]" id="contenttemplate" onchange="content_template_changed();">
                    <?php
                    foreach ($contenttemplatearr as $clab => $cval) {
                        ?>
                        <option value="<?php echo $cval; ?>"<?php echo ($cval == $contenttemplate) ? ' selected="selected"' : ''; ?>><?php echo $clab; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </span>
            <br /><br />
            <input type="checkbox" name="super[contentlink]"<?php echo ($contentlink == '1') ? ' checked="checked"' : ''; ?> id="contentlink" value="1" /> <label for="contentlink">Permalink</label>
            <input type="checkbox" name="super[contenttitle]"<?php echo ($contenttitle == '1') ? ' checked="checked"' : ''; ?> id="contenttitle" value="1" /> <label for="contenttitle">Title</label>
            <span class="contentexcerptrmspan"<?php echo ($contentoption == 'fi') ? ' style="display: none;"' : ''; ?>><input type="checkbox" name="super[contentexcerptrm]"<?php echo ($contentexcerptrm == '1') ? ' checked="checked"' : ''; ?> id="contentexcerptrm" value="1" /> <label for="contentexcerptrm">Read More</label></span>
        </span>
    </li>
</ul>

<ul class="sprcrsl-admin">
    <li class="w10 satitle">
        <strong>Размеры слайдов</strong>
        <span class="note">Примечание. Заполните любое из приведенных ниже значений.</span>
    </li>

    <li class="w1 sainput clearL txt-right">
        <label for="visible">Видимы</label>
    </li>
    <li class="w2">
        <input type="text" id="visible" class="smallip" name="super[visible]" value="<?php echo $visible; ?>" />
        <span class="bigtxt">или</span>
    </li>

    <li class="w15 sainput txt-right">
        <label for="itemwidth">Ширина элемента</label>
    </li>
    <li class="w2">
        <input type="text" id="itemwidth" class="smallip" value="<?php echo $itemWidth; ?>" name="super[itemWidth]" />px
        <span class="bigtxt">или</span>
    </li>

</li>
<li class="w15 sainput txt-right">
    <label for="itemheight">Высота элемента</label>
</li>
<li class="w2">
    <input type="text" id="itemheight" class="smallip" value="<?php echo $itemHeight; ?>" name="super[itemHeight]"<?php echo ($contentoption == '' and ! in_array($sourcetype, array('image', ''))) ? ' disabled="disabled"' : ''; ?> />px
</li>
</ul>

<ul class="sprcrsl-admin">
    <li class="w10 satitle">
        <strong>Размеры слайдов на планшетах/телефонах </strong>
    </li>
    <li class="w2 sainput clearL">
        <label for="mobilewidth">Ширина мобильного</label>
    </li>
    <li class="w1">
        <input type="text" id="mobilewidth" class="smallip" value="<?php echo $mobileWidth; ?>" name="super[mobileWidth]" />
    </li>
    <li class="w2 sainput clearL">
        <label for="mobilevisible">Видимы</label>
    </li>
    <li class="w1">
        <input type="text" id="mobilevisible" class="smallip" value="<?php echo $mobileVisible; ?>" name="super[mobileVisible]" />
    </li>
    <li class="w2 sainput">
        <label for="mobileitemwidth">Ширина элемента</label>
    </li>
    <li class="w1">
        <input type="text" id="mobileitemwidth" class="smallip" value="<?php echo $mobileItemWidth; ?>" name="super[mobileItemWidth]" />
    </li>
    <li class="w2 sainput">
        <label for="mobileitemheight">Высота элемента</label>
    </li>
    <li class="w1">
        <input type="text" id="mobileitemheight" class="smallip" value="<?php echo $mobileItemHeight; ?>" name="super[mobileItemHeight]" />
    </li>
    <li class="w2 sainput clearL">
        <label for="tabletwidth">Tablet Width</label> 
    </li>
    <li class="w2">
        <input type="text" id="tabletwidth" class="smallip" value="<?php echo $tabletWidth; ?>" name="super[tabletWidth]" />
    </li>
    <li class="w2 sainput clearL">
        <label for="tabletvisible">Tablet Visible</label>
    </li>
    <li class="w1">
        <input type="text" id="tabletvisible" class="smallip" value="<?php echo $tabletVisible; ?>" name="super[tabletVisible]" />
    </li>
    <li class="w2 sainput">
        <label for="tabletitemwidth">Tablet Item Width</label> 
    </li>
    <li class="w1">
        <input type="text" id="tabletitemwidth" class="smallip" value="<?php echo $tabletItemWidth; ?>" name="super[tabletItemWidth]" />
    </li>
    <li class="w2 sainput">
        <label for="tabletitemheight">Tablet Item Height</label> 
    </li>
    <li class="w1">
        <input type="text" id="tabletitemheight" class="smallip" value="<?php echo $tabletItemHeight; ?>" name="super[tabletItemHeight]" />
    </li>
</ul>

<ul class="sprcrsl-admin">
    <li class="w10 satitle">
        <strong>Slide Settings</strong>
        <span class="note">Note: Slide Hover Colors may not work on all browsers</span>
    </li>
    <li class="w1 sainput clearL">
        <label for="imagesize">Image Size</label> 
    </li>
    <li class="w2">
        <select id="imagesize" name="super[imageSize]">
            <option value="full"<?php echo ($imageSize == 'full') ? ' selected="selected"' : ''; ?>>Full</option>
            <option value="large"<?php echo ($imageSize == 'large') ? ' selected="selected"' : ''; ?>>Large</option>
            <option value="medium"<?php echo ($imageSize == 'medium') ? ' selected="selected"' : ''; ?>>Medium</option>
            <option value="thumbnail"<?php echo ($imageSize == 'thumbnail') ? ' selected="selected"' : ''; ?>>Thumbnail</option>
        </select>
    </li>
    <li class="w1 sainput">
        <label for="caption">Caption</label> 
    </li>
    <li class="w2">
        <select id="caption" name="super[caption]">
            <option value="always"<?php echo ($caption == 'always') ? ' selected="selected"' : ''; ?>>Always</option>
            <option value="onover"<?php echo ($caption == 'onover') ? ' selected="selected"' : ''; ?>>Hover</option>
            <option value="onoverfull"<?php echo ($caption == 'onoverfull') ? ' selected="selected"' : ''; ?>>Hover Full</option>
            <option value="disable"<?php echo ($caption == 'disable') ? ' selected="selected"' : ''; ?>>Disable</option>
        </select>
    </li>
    <li class="w1 sainput txt-right">
        <label for="slidehover">Slide Hover</label> 
    </li>
    <li class="w2">
        <select id="slidehover" name="super[slideHover]">
            <option value="disable"<?php echo ($slideHover == 'disable') ? ' selected="selected"' : ''; ?>>Disable</option>
            <option value="zoom"<?php echo ($slideHover == 'zoom') ? ' selected="selected"' : ''; ?>>Zoom</option>
            <option value="fadein"<?php echo ($slideHover == 'fadein') ? ' selected="selected"' : ''; ?>>Fade In</option>
            <option value="fadeout"<?php echo ($slideHover == 'fadeout') ? ' selected="selected"' : ''; ?>>Fade Out</option>
            <option value="color"<?php echo ($slideHover == 'color') ? ' selected="selected"' : ''; ?>>Color</option>
        </select>
    </li>
</ul>

<ul class="sprcrsl-admin">
    <li class="w10 satitle clearL">
        <strong>Animation Settings</strong>
        <span class="note">Note:Easing Time is calculated in miliseconds, Step is the number of slides it will move in one go. If you want full-width scroll, just put "0" in Step(s) box
        </span>
    </li>

    <li class="w1 sainput">
        <label for="direction">Direction</label> 
    </li>
    <li class="w2">
        <select id="direction" class="sel1" name="super[direction]">
            <?php
            foreach ($superdirection as $row) {
                ?>
                <option value="<?php echo $row; ?>"<?php echo ($row == $direction) ? ' selected="selected"' : ''; ?>><?php echo $row; ?></option>
                <?php
            }
            ?>
        </select> 
    </li>
    <li class="w1 sainput">
        <label for="effect">Effect</label> 
    </li>
    <li class="w2">
        <select id="effect" class="sel1" onchange="effect_changed();" name="super[effect]">
            <?php
            foreach ($supereffect as $row) {
                ?>
                <option value="<?php echo $row; ?>"<?php echo ($row == $effect) ? ' selected="selected"' : ''; ?>><?php echo $row; ?></option>
                <?php
            }
            ?>
        </select> 
    </li>

    <li class="w1 sainput">
        <label for="easing">Easing</label> 
    </li>

    <li class="w3">
        <select id="easing" name="super[easing]">
            <?php foreach ($supereasings as $row) { ?>
                <option value="<?php echo $row; ?>"<?php echo ($row == $easing) ? ' selected="selected"' : ''; ?>><?php echo $row; ?></option>
            <?php } ?>
        </select>
    </li>
    <li class="w1 sainput clearL">
        <label for="easingtime">Easing Time</label> 
    </li>
    <li class="w2">
        <input id="easingtime" type="text" class="smallip" value="<?php echo $easingTime; ?>" name="super[easingTime]" /> 
    </li>
    <li class="w1 sainput">
        <label for="step">Step(s)</label> 
    </li>
    <li class="w1 sainput">
        <input id="step" type="text" class="smallip" value="<?php echo $step; ?>" name="super[step]" />
    </li>
</ul>



<ul class="sprcrsl-admin">
    <li class="w10 satitle clearL">
        <strong>Automatic Settings</strong>
        <span class="note">Note:Pause Time is calculated in miliseconds. Slide Gap is calculated in pixels.
            <br />
            Pause time must always greater than easing time. Continuous Scroll overwrites autoplay settings.
        </span>
    </li>

    <li class="w15 sainput clearL">
        <label for="autoplay">Auto Play</label> 
        <input id="autoplay" type="checkbox" class="smallip ck"<?php echo ($auto == '1') ? ' checked="checked"' : ''; ?> value="1" name="super[auto]" /> 
    </li>
    <li class="w15 sainput">
        <label for="pausetime">Pause Time</label>
    </li>
    <li class="w1">
        <input id="pausetime" type="text" class="smallip" value="<?php echo $pauseTime; ?>" name="super[pauseTime]" /> 
    </li>
    <li class="w2">
        <label for="continuous_scroll">Continuous Scroll</label>
        <input id="continuous_scroll" type="checkbox" class="smallip ck"<?php echo ($autoscroll == '1') ? ' checked="checked"' : ''; ?> value="1" name="super[autoscroll]" /> 
    </li>
    <li class="w2">
        <label for="scroll_speed">Scroll Speed</label>
        <select id="scroll_speed" name="super[scrollspeed]">
            <?php
            for ($j = 1; $j <= 16; $j++) {
                ?>
                <option<?php echo ($scrollspeed == ($j / 4)) ? ' selected="selected"' : ''; ?> value="<?php echo $j / 4; ?>"><?php echo $j; ?></option>    
                <?php
            }
            ?>
        </select>
    </li>

    <li class="w2 sainput clearL">
        <label for="pauseover">Pause Over</label> 
        <input id="pauseover" type="checkbox" class="smallip ck"<?php echo ($pauseOver == '1') ? ' checked="checked"' : ''; ?> value="1" name="super[pauseOver]" /> 
    </li>

    <li class="w2 sainput">
        <label for="autoheight">Auto Height</label> 
        <input id="autoheight" type="checkbox" class="smallip ck"<?php echo ($autoHeight == '1') ? ' checked="checked"' : ''; ?> value="1" name="super[autoHeight]" />
    </li>

    <li class="w2 sainput">
        <label for="superrandom">Random</label> 
        <input id="superrandom" type="checkbox" class="smallip ck"<?php echo ($superrandom == '1') ? ' checked="checked"' : ''; ?> value="1" name="super[superrandom]" />
    </li>

    <li class="w3 sainput">
        <label for="slidegap">Slide Gap</label> 
        <input id="slidegap" type="text" class="smallip" value="<?php echo $slideGap; ?>" name="super[slideGap]" /> 
    </li>
    <li class="w10">
        <label for="superhidden">I am using this carousel inside hidden element</label> 
        <input id="superhidden" type="checkbox" class="smallip ck"<?php echo ($superhidden == '1') ? ' checked="checked"' : ''; ?> value="1" name="super[superhidden]" />
        <span class="note">(Hidden Element: e.g. Tabs)</span>
    </li>
</ul>

<ul class="sprcrsl-admin no-brdr">
    <li class="w10 satitle">
        <strong>Navigation Settings</strong>
        <span class="note">Note:Keyboard enables next/prev/up/down arrow keys and numeric keys.</span>
    </li>

    <li class="w3 sainput clearL">
        <label for="nextprev">Next / Prev</label> 
        <input id="nextprev" type="checkbox" class="smallip ck"<?php echo ($nextPrev == '1') ? ' checked="checked"' : ''; ?> value="1" name="super[nextPrev]" />
    </li>

    <li class="w3 sainput">
        <label for="navstyle">Nav Style</label> 
        <select id="navstyle" name="super[navstyle]">
            <option value="">Select</option>
            <?php
            foreach ($supernavstyle as $row) {
                ?>
                <option value="<?php echo $row ?>"<?php echo ($row == $navstyle) ? ' selected="selected"' : ''; ?>><?php echo $row; ?></option>
                <?php
            }
            ?>
        </select> 
    </li>

    <li class="w3 sainput">
        <label for="customclass">Custom Class</label> 
        <input id="customclass" type="text" class="smallip" value="<?php echo $customclass; ?>" name="super[customclass]" /> 
    </li>

    <li class="w3 sainput clearL">
        <label for="pagination">Pagination</label> 
        <input id="pagination" type="checkbox" class="smallip ck"<?php echo ($paging == '1') ? ' checked="checked"' : ''; ?> value="1" name="super[paging]" /> 
    </li>

    <li class="w3 sainput">
        <label for="circular">Circular</label> 
        <input id="circular" type="checkbox" class="smallip ck" value="1"<?php echo ($circular == '1') ? ' checked="checked"' : ''; ?> name="super[circular]" /> 
    </li>

    <li class="w3 sainput">
        <label for="mousewheel">Mouse Wheel</label> 
        <input id="mousewheel" type="checkbox" class="smallip ck" value="1"<?php echo ($mouseWheel == '1') ? ' checked="checked"' : ''; ?> name="super[mouseWheel]" /> 
    </li>

    <li class="w3 sainput clearL">
        <label for="touchswipe">Touch Swipe</label> 
        <input id="touchswipe" type="checkbox" class="smallip ck" value="1"<?php echo ($swipe == '1') ? ' checked="checked"' : ''; ?> name="super[swipe]" /> 
    </li>

    <li class="w3 sainput">
        <label for="keyboard">Keyboard</label> 
        <input id="keyboard" type="checkbox" class="smallip ck" value="1"<?php echo ($keys == '1') ? ' checked="checked"' : ''; ?> name="super[keys]" /> 
    </li>

    <li class="w3 sainput">
        <label for="smallbut">Small Buttons</label> 
        <input id="smallbut" type="checkbox" class="smallip ck" value="1"<?php echo ($smallbut == '1') ? ' checked="checked"' : ''; ?> name="super[smallbut]" /> 
    </li>

    <li class="w3 sainput clearL">
        <label for="navpadding">Next/Prev Padding</label> 
        <input id="navpadding" type="checkbox" class="smallip ck" value="1"<?php echo ($navpadding == '1') ? ' checked="checked"' : ''; ?> name="super[navpadding]" /> 
    </li>
</ul>