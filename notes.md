[site-branding-template-file]: themes/twentynineteen-child/template-parts/header/site-branding.php
[functions-php-file]: themes/twentynineteen-child/functions.php
[css-file]: themes/twentynineteen-child/style.css
## Ce que j'ai appris
- in this commit, i learnt how to add a menu to the child theme by duplicating an existing template file to display the newly made menu (menu needs to somewhere, after all)
- in [site-branding.php][site-branding-template-file], which i copied from the parent theme, i added code for our new (secondary) menu
  - it was just a copy/paste of the menu above (menu-1) and changed the menu name (menu-2), and added a class name (secondary-menu)
- then in [functions.php][functions-php-file] i register the menu in the function: 
 ```php 
  twentynineteen_child_theme_setup()
 ```
- then finally in [styles.css][css-file], i styled our new menu mainly to test if the styles would apply. they do successfully
  
