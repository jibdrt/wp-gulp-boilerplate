<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset='<?php bloginfo('charset'); ?>'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='profile' href='https://gmpg.org/xfn/11'>
    <?php if (function_exists('wp_get_document_title')): ?>
        <title><?php echo wp_get_document_title(); ?></title>
    <?php else: ?>
        <title><?php bloginfo('name'); ?><?php wp_title('|', true, 'left'); ?></title>
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open();
    $logo_id = get_theme_mod('custom_logo');
    $logo_url = wp_get_attachment_image_url($logo_id, 'full');
    ?>
    <div id='page'>