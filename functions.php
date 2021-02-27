<?php

// adding the CSS and JS files

function gt_setup() {
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Raleway:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap');
    wp_enqueue_style('style', get_stylesheet_uri('style.css'), NULL, microtime(), 'all');
    wp_enqueue_script('main', get_theme_file_uri('/js/main.js'), NULL, microtime(), true);
}

add_action('wp_enqueue_scripts', 'gt_setup');

// theme support, post thumbnails

function gt_init() {
    add_theme_support('post-thumbnails');
    // title based on the page and General Settings
    add_theme_support('title-tag');
    // HTML support
    add_theme_support('html5', 
    array('comment-list', 'comment-form', 'search-form'));
}

add_action('after_setup_theme', 'gt_init');



// Sidebar

function gt_widgets() {
    register_sidebar(
    array(
        "name" => "Main Sidebar",
        "id" => "main_sidebar",
        "before_title" => "<h3>",
        "after_title" => "</h3>"
    )
    );
}

add_action("widgets_init", "gt_widgets");


?>