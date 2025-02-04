<?php
/**
 *  sitename functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sitename
 */

if (!defined('sitename_VERSION')) {
    // Replace the version number of the theme on each release.
    define('sitename_VERSION', '1.0.0');
}


function sitename_scripts()
{
    wp_enqueue_style('sitename-style', get_stylesheet_uri(), array(), sitename_VERSION);
    wp_enqueue_script('sitename-script', get_template_directory_uri() . '/assets/js/global.js', array(), sitename_VERSION, true);
    wp_enqueue_script('iconify', 'https://code.iconify.design/2/2.1.2/iconify.min.js', array(), true);
    wp_enqueue_script('imagesloaded-js', 'https://cdn.jsdelivr.net/npm/imagesloaded@5.0.0/imagesloaded.pkgd.min.js', array(), sitename_VERSION, true);
}

add_action('wp_enqueue_scripts', 'sitename_scripts');



if (!function_exists('setupsitename')):
    function setupsitename()
    {
        add_theme_support('post-thumbnails');
        add_post_type_support('page', 'excerpt');
        add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));

        add_theme_support(
            'custom-logo',
            array(
                'height' => 400,
                'width' => 400,
                'flex-height' => true,
                'flex-width' => true,
            )
        );
        register_nav_menus(
            array(
                'Primary' => esc_html__('Menu principal', 'sitename'),
                'Secondary' => esc_html__('Menu mobile', 'sitename'),
                'Footer' => esc_html__('Menu footer', 'sitename')
            )
        );
    }
endif;

add_action('after_setup_theme', 'setupsitename');


function custom_excerpt_length($excerpt, $charlength)
{
    $charlength++;
    if (mb_strlen($excerpt) > $charlength) {
        $subex = mb_substr($excerpt, 0, $charlength - 3);
        $exwords = explode(' ', $subex);
        $excut = -(mb_strlen($exwords[count($exwords) - 1]));
        if ($excut < 0) {
            return mb_substr($subex, 0, $excut) . '...';
        } else {
            return $subex . '...';
        }
    } else {
        return $excerpt;
    }
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Informations',
        'menu_title' => 'Informations',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

// Custom post Types below


// Copy everything below this line //
add_filter('kses_allowed_protocols', 'my_allowed_protocols');
/**
 *  Description
 *
 *  @since 1.0.0
 *
 *  @param $protocols
 *
 *  @return array
 */
function my_allowed_protocols($protocols)
{
    $protocols[] = "javascript";
    return $protocols;
}