<?php
function my_theme_enqueue_styles() {
    $parent_handle = "parent-style";
    $child_handle = "child-style";
    wp_enqueue_style($parent_handle, get_template_directory_uri() . "/style.css");
    wp_enqueue_style($child_handle, get_stylesheet_directory_uri() . "/style.css", array($parent_handle), wp_get_theme()->get("Version"));
}

add_action("wp_enqueue_scripts", "my_theme_enqueue_styles");

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
 
function custom_french_titles($title, $id = null) {
    if (in_category("francais", $id)) $title = "Français: ". $title;
    return $title;
}

add_filter("the_title", "custom_french_titles", 10, 2);

function twentynineteen_child_theme_setup() {
    register_nav_menus(
        array(
            'menu-2' => __( 'Secondary Menu', 'twentynineteen' ),
        )
    );
}

add_action("after_setup_theme", "twentynineteen_child_theme_setup");

function twentynineteen_posted_by() {

    $dynamic_post_by_text = "";

    if (in_category("francais")) {
        $dynamic_post_by_text = "l'œuvre de ". get_the_author();
    }
    else {
        $dynamic_post_by_text = "the work of " . get_the_author();
    }

    printf(
        /* translators: 1: SVG icon. 2: Post author, only visible to screen readers. 3: Author link. */
        '<span class="byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>',
        twentynineteen_get_social_icon_svg( 'github', 20 ),
        __( 'Posted by', 'twentynineteen' ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_html($dynamic_post_by_text)
    );
}