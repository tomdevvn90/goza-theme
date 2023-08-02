<?php

// create id attribute for specific styling
$id = 'be-give-form-box-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
$bgImage = (!empty(__get_field('be_background_form'))) ? __get_field('be_background_form') : '';
$is_style = isset($block['className']) ? $block['className'] : "is-style-default";
//var_dump($be_donation_form);
?>
<div id="<?php echo $id; ?>" class="be-give-form-box-block <?php echo $align_class; ?> <?php echo $is_style ?>">
   <div class="be-give-form-box-block-inner" style="background-image: url('<?php echo $bgImage ?>')">
      <?php if (is_plugin_active('the-events-calendar/the-events-calendar.php')) { ?>
         <?php be_item_give_form_box($block) ?>
      <?php } else {
         echo '<div class="required-text" style="padding: 30px 0;">This block require The Events Calendar plugin. Please install follow link <a href="https://wordpress.org/plugins/the-events-calendar/" target="_blank">here</div>';
      } ?>
   </div>
</div>