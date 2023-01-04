<?php
$id = $block['id'];
$classes = 'block block-full-width-image';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}

$image = get_field('image');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>" style="background-image: url(<?php echo $image['url']; ?>);"></div>