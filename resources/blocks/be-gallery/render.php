<?php
// create id attribute for specific styling
$id = 'be-gallery-' . $block['id'];

$align_class = $block['align'] ? 'align' . $block['align'] : '';
$classes     = isset($block['className']) ? $block['className'] : "is-style-ngo-dark";

// ACF field
$gallerys   = get_field('items_gallery_bl') ? : '';
$full_width = get_field('full_width_gallery_bl') ? 'full-width' : '';
$gap_column = get_field('gap_column_gallery_bl') ? : '0';
$gap_row    = get_field('gap_row_gallery_bl') ? : '0';

?>

<div id="<?php echo $id; ?>" class="be-gallery-block <?= $align_class; ?> <?= $classes ?> <?= $full_width ?>">
   <?php
   if(!empty($gallerys) && isset($gallerys)): ?>
        <div id="<?= $block['id'] ?>" class="be-gallery-block--inner" data-aos="fade-up" data-light-gallery style="grid-row-gap:<?= $gap_row ?>px; grid-column-gap:<?= $gap_column ?>px" >      
            <?php load_template_gallerys($classes) ?>
        </div>

   <?php else: ?>
        <div class="be-gallery-block--not-post"> 
            <h3> Please choose image </h3>
        </div>
   <?php endif; ?> 
</div>