<?php

/**
 * Header template
 */

$classes = [
   'site-header',
   'site-header-search',
   'site-header-water',
];

$logo = goza_get_logo_header_site();
$header_btn = __get_field('goza_header_button', 'option');
$goza_header_search = __get_field('goza_header_search', 'option');
$goza_button_type = __get_field('goza_button_type', 'option');
$goza_form_donation = __get_field('goza_form_donation', 'option');
?>
<header class="<?php echo implode(' ', $classes) ?>">
   <div class="container">
      <div class="d-flex justify-content-between align-items-center goza-header-main">
         <div class="goza-header-main--logo">
            <?php
            if ($logo) {
               echo '<a href="/"><img src="' . esc_url($logo) . '" alt="' . get_bloginfo('name') . '"></a>';
            } else {
               echo '<h1><a href="' . get_site_url() . '">' . get_bloginfo('name') . '</a></h1>';
            }
            ?>
         </div>
         <div class="d-flex justify-content-between align-items-center goza-header-main--menus">
            <div class="d-none d-lg-block goza-header-main--menu">
               <?php
               wp_nav_menu([
                  'theme_location' => 'main-menu',
                  'menu_class' => 'main-menu',
                  'container_class' => 'menu-container',
                  'items_wrap' => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                  'bootstrap' => false
               ]);
               ?>
            </div>
            <div class="d-flex justify-content-between align-items-center goza-header-main--cta">               
               <div class="goza-header-button-donate"> 
                  <?php if ($goza_button_type == 'df_link') { ?>
                     <a class="d-none d-lg-block goza-header-button btn btn-general" href="<?= esc_attr($header_btn['url']) ?>" target="<?= ($header_btn['target']) ? $header_btn['target'] : '' ?>"><?= esc_attr($header_btn['title']) ?></a>
                  <?php } else { 
                     $atts = array(
                        'id' => $goza_form_donation->ID,  // integer.
                        'show_title' => false, // boolean.
                        'show_goal' => false, // boolean.
                        'show_content' => 'none', //above, below, or none
                        'display_style' => 'button', //modal, button, and reveal
                        'continue_button_title' => '' //string

                     );
                     echo give_get_donation_form( $atts );
                  } ?>
               </div>

               <?php if (isset($goza_header_search) && $goza_header_search) { ?>
                  <a class="goza-header-search" href="javascript:void(0)"><i class="fa fa-search"></i></a>
               <?php } ?>
               
               <div id="goza-hamberger" class="d-flex d-lg-none"><i class="fa fa-reorder"></i></div>
            </div>
         </div>
      </div>
   </div>
</header> <!-- #site-header -->