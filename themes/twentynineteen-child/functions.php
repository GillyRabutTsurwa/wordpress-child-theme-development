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
 
// NEW: 

/**
 * NOTE:
 * this function is responsible for posts; only those that have the category francais
 * and prepends the string "Francais: " to what is already in the title
 * this new string value has to be returned so that it can be used in the filter hook
 * this value will replace the original value
 */
function custom_french_titles($title, $id = null) {
    if (in_category("francais", $id)) $title = "Français: ". $title;
    // IMPORTANTNOTE: souviens-toi qu'une fonction qui gère un filtre doit toujours renvoyer une valeur
    return $title;
}

/**
 * NOTE:
 * now, i use add_filter(), to run our custom_french_titles() whenever the_title filter hook is applied
 * whenever wordpress is printing post titles throughout our site, our function will run, and the post title will be modified as necessaryf
 */
add_filter("the_title", "custom_french_titles", 10, 2);

// function to remove widgets display on the footer. this is functionality from the parent
function remove_parent_functionality() {
    /**
     * NOTE: 
     * found this code in the parent theme's function.php file
     * and changing the add_action declaration to remove_actio
     */
    remove_action( 'widgets_init', 'twentynineteen_widgets_init' );

}

// NOTE: and then adding an action hook at a particular point in the wordpress cycle that will call our function that initiates the remove_action functionality
add_action("after_setup_theme", "remove_parent_functionality");