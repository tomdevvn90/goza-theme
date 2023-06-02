<?php

// create id attribute for specific styling
$id = 'be-give-form-box-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

//ACF field variables
$be_donation_form = get_field('be_donation_form');
$be_sub_heading = get_field('be_sub_heading');
$be_heading_form = get_field('be_heading_form');
$be_description_form = get_field('be_description_form');
$be_background_form = get_field('be_background_form');

$goal_option = get_post_meta( $be_donation_form, '_give_goal_option', true );
$form        = new Give_Donate_Form( $be_donation_form );
$goal        = $form->goal;
$goal_format = get_post_meta( $be_donation_form, '_give_goal_format', true );
$income      = $form->get_earnings();
$color       = get_post_meta( $be_donation_form, '_give_goal_color', true );
$give_forms_category = (wp_get_post_terms( $be_donation_form, 'give_forms_category'));

foreach($give_forms_category as $give_forms_category1) {
    $give_forms_category_name = $give_forms_category1->name; //do something here
    $give_forms_category_link = get_term_link($give_forms_category1->slug, 'give_forms_category'); //do something here
        //var_dump($give_forms_category_link );
}
if (empty($give_forms_category_name)) {
    $give_forms_category_name = '';
}
// set color if empty
if(empty($color)) $color = '#01FFCC';
$progress = ($goal === 0) ? 0 : round( ( $income / $goal ) * 100, 2 );

if ( $income >= $goal ) { $progress = 100; }
$class_none = '';
if ( $goal_option == 'disabled' ) { $class_none = 'class-none'; }
// Get formatted amount.
$income = give_human_format_large_amount( give_format_amount( $income ) );
$goal = give_human_format_large_amount( give_format_amount( $goal ) );

//var_dump($be_donation_form);
?>
<section id="<?php echo $id; ?>" class="give-form-box <?php echo $align_class; ?>" style="background-image: url(<?php echo $be_background_form; ?>);">
    <div class="give-box-content">
        <div class="give-box-content-left">
            <h4 class="give-box-sub-heading"><?php echo $be_sub_heading; ?></h4>
            <h2 class="give-box-heading"><?php echo $be_heading_form; ?></h4>
            <p class="give-box-description"><?php echo $be_description_form; ?></p>
        </div>
        <div class="give-box-content-right">
            <div class="progress">
                <div class="form-percent" style="right: calc(100% - <?php echo $progress ?>%);"><span class="bt-arrow"></span><?php echo $progress ?>%</div>
                <div class="bar" style="width: <?php echo $progress ?>%;" ></div>     
            </div>
            <div class="entry-bot">
                <div class="give-price-raised"><span><?php echo __( 'Raised Donation', 'goza'); ?></span>$<?php echo $income ?></div>
                <div class="give-price-goal"><span><?php echo __( 'Donation Goal', 'goza'); ?></span>$<?php echo $goal ?></div>
            </div>
        </div>
    </div>
    <div class="give-box-button">
        <div class="give-box-button-popup">
            <?php
            $atts = array(
                'id' => $be_donation_form,  // integer.
                'show_title' => false, // boolean.
                'show_goal' => false, // boolean.
                'show_content' => 'none', //above, below, or none
                'display_style' => 'button', //modal, button, and reveal
                'continue_button_title' => '' //string

            );
            echo give_get_donation_form( $atts );
            ?>
        </div>
        <div class="give-box-button-social">
            <span><?php echo __( 'Share Us At:', 'goza'); ?></span>
            <?php
            $be_form_social_share = get_field('be_form_social_share');
            if( $be_form_social_share ): ?>
            <ul class="list-social-share">
                <?php foreach( $be_form_social_share as $social ): ?>
                    <li><a href="#!"><i class="<?php echo $social; ?>"></i></a></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
    
</section>