<?php
function my_theme_enqueue_styles() {
    $parent_handle = "parent-style";
    $child_handle = "child-style";
    /**
     * NOTE: cette fonction intérieur (dessous), "wp_enqueue_style" est utilisée pour inclure un fichier css particulier 
     * on utilise cette fonction pour ajouter est activer le fichier css qui vient de notre thème parent: twentynineteen
     * QUESTION: "parent-style" c'est quoi? Il dit que c'est le nom; le nom de quoi?
     * 
     * get_template_directory_uri() charge notre thème parent
     * ensuite, l'appendage "/style.css" trouve ce fichier-ci dans notre thème parent
     * voici comment charger et applique les styles venant du thème parent
     */
    wp_enqueue_style($parent_handle, get_template_directory_uri() . "/style.css");
    /**
     * NOTE: cette deuxième fonction nous permet d'écrire nos propre styles pour notre thème d'enfant
     * QUESTION: À nouveau, c'est quoi "child-style"
     * 
     * en plus, ce code dessous est écrit pour que le fichier css du thème parent se charge AVANT celui de notre thème enfant
     * l'argument array("$parent_handle") est responsable pour cette foncionalité
     * 
     * et enfin, l'argument wp_get_theme()->get("Version") et utilisé pour gérer les issus potential des mise en cache
     */
    wp_enqueue_style($child_handle, get_stylesheet_directory_uri() . "/style.css", array($parent_handle), wp_get_theme()->get("Version"));
}

add_action("wp_enqueue_scripts", "my_theme_enqueue_styles");