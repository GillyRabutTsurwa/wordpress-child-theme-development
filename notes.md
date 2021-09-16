[footer-widgets-template-file]: themes/twentynineteen/template-parts/footer/footer-widgets.php
[footer-template-file]: themes/twentynineteen/footer.php
[footer-template-file-child]: themes/twentynineteen-child/footer.php
[wordpress-conditional-tags-link]: https://developer.wordpress.org/themes/references/list-of-conditional-tags/
## Conditional Widgetised Area
- in this challenge, i was to render the widgetised area (that we took out earlier) conditionally
- to do this, i found out how the widgetised area was being displayed:
  - the widgetised area is a template part found in the [footer-widgets.php][footer-widgets-template-file] template file that is being included (or used, to be more appropriate) in the [footer.php][footer-template-file] file
  - therefore, i duplicated this footer.php file from the parent theme to the child theme
  - and then i wrote code in the [footer.php][footer-template-file-child] (the one in child theme) to conditionally display the widget as desired. in this case, i am displaying it only on the front and error pages
  - according to the instructor, this can be apparently done by writing code in the functions.php file, although this is the way he recommended doing it (using template files)
  - i will attempt to use functions.php in the next commit
  - finally, this is a good list of conditionals you can use to conditionally display widgets, among many other things
  
