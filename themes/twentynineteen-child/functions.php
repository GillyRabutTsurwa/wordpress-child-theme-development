<?php
function my_theme_enqueue_styles() {
    $parent_handle = "parent-style";
    $child_handle = "child-style";
    wp_enqueue_style($parent_handle, get_template_directory_uri() . "/style.css");
    wp_enqueue_style($child_handle, get_stylesheet_directory_uri() . "/style.css", array($parent_handle), wp_get_theme()->get("Version"));
}

add_action("wp_enqueue_scripts", "my_theme_enqueue_styles");

//NEW: 
/**
 * this function was that we are targetting is found in twentynineteen/inc/template-tags.php
 * 1 - this type of function is one we can copy to our child theme, and the declaration of that very same function in the child theme will overwrite the original declaration of it in the parent theme
 * 2- for the function in the parent theme, its existance is verified by an if statement.
 * these are two very important things to keep in mind when it comes to working with the functions.php file
 * such functions are known as pluggable functions
 * link for more information on them will be on my notes.md file
 */

/**
 * NOTE:
 * so, to clarify: even though this same function is in our parent theme
 * ...this one here, in the child theme, will be the one that gets used
 * the one in the parent theme will get overwritten
 */

/**
 * for this function, i'm just changing the pagination text of the post page
 * i'm changing from "New Posts" and "Older Posts" to "Vipya" and "Vya Zamani"
 */
function twentynineteen_the_posts_navigation() {
    the_posts_pagination(
        array(
            'mid_size'  => 2,
            'prev_text' => sprintf(
                '%s <span class="nav-prev-text">%s</span>',
                twentynineteen_get_icon_svg( 'chevron_left', 22 ),
                __( 'Vipya', 'twentynineteen' )
            ),
            'next_text' => sprintf(
                '<span class="nav-next-text">%s</span> %s',
                __( 'Vya Zamani', 'twentynineteen' ),
                twentynineteen_get_icon_svg( 'chevron_right', 22 )
            ),
        )
    );
}
 