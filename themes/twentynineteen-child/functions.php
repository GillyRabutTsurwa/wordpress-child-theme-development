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

function remove_parent_functionality() {
    remove_action( 'widgets_init', 'twentynineteen_widgets_init' );

}

add_action("after_setup_theme", "remove_parent_functionality");

// NEW: modify the posted by metadata
function twentynineteen_posted_by() {

    $dynamic_post_by_text = "";
    /**
     * NOTE: 
     * doing something different from the challenge, which removes this piece of metadata altogether
     * instead, i am modifying it a little bit
     * i am changing the icon as well as modifying the text, by prepending some other text before the original
     */

    //  NOTE: I like this here: if our post has the category "francais" (we've seen this before)...
    if (in_category("francais")) {
        // give this variable this value
        $dynamic_post_by_text = "l'œuvre de ". get_the_author();
    }
    else {
        // ...else, give the same variable this other value...
        $dynamic_post_by_text = "the work of " . get_the_author();
    }

    printf(
        /* translators: 1: SVG icon. 2: Post author, only visible to screen readers. 3: Author link. */
        '<span class="byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>',
        twentynineteen_get_social_icon_svg( 'github', 20 ),
        __( 'Posted by', 'twentynineteen' ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        // ...that we use right here to render the appropriate posted-by metadata text 
        esc_html($dynamic_post_by_text)
        
    );
}