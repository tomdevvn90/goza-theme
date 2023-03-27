<?php
function be_item_icon_box($block){
    $is_style = isset($block['className']) ? $block['className'] : "is-style-default";

    // ACF field variables
    $heading = get_field('heading_icon_box');
    $content = get_field('content_icon_box');
    $icon    = (!empty(get_field('icon__icon_box'))) ? get_field('icon__icon_box') : get_template_directory_uri(). '/resources/assets/images/icon-box-default.svg' ;
    $button  = get_field('button_icon_box');
   
    
    switch ($is_style) {
        case "is-style-2":
            be_template_icon_box_style_2($heading, $content, $icon, $button);
            break;

        case "is-style-3":
            be_template_icon_box_style_3($heading, $content, $icon, $button);
            break; 

        default:
            be_template_icon_box_default($heading, $content, $icon, $button);
            break; 
    } 

}

function be_template_icon_box_style_3($heading, $content, $icon, $button){

}

function be_template_icon_box_style_2($heading, $content, $icon, $button){

}

function be_template_icon_box_default($heading, $content, $icon, $button){ ?>
    <div class="be-icon-box-block-warp"> 
            <div class="be-icon-box-block--icon"> 
                <img src="<?php echo $icon ?>" alt="icon">
            </div>

            <?php if(!empty($heading)): ?>
                <h3 class="be-icon-box-block--heading"> <?php echo $heading ?> </h3>
            <?php endif; ?>    
    </div> 

    <div class="be-icon-box-block-hover"> 
        <?php if(!empty($button['text']) && !empty($button['link'])): ?>
            <div class="be-icon-box-block--button"> 
                <a href="<?php echo $button['link'] ?>"> <?php echo $button['text'] ?> </a>
            </div>
        <?php endif; ?>
    </div>
<?php }