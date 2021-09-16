[get-attachment-img]: https://developer.wordpress.org/reference/functions/wp_get_attachment_image
[get-attachment-img-url]: https://developer.wordpress.org/reference/functions/wp_get_attachment_image_url
[get-attachment-src]: https://developer.wordpress.org/reference/functions/wp_get_attachment_image_src
[header-template-file]: themes/twentynineteen-child/header.php
## Custom 404 Page
- this is very cool: i figured out how to assign dynamic classes on elements using PHP. not as cool as it is using VueJS or Svelte, but still neat nonetheless
  - i use this often in the child theme [header.php][header-template-file] template file
  - this is very useful in changing changing styles of universal elements depending on what template file is currently active
  - also consequently, i have a better understanding on template files and what you can do with them once you've copied them directly or indirectly (meaning if we have to use another file if the exact file doesn't exist) from the parent theme to the child theme
  - also, i am starting to understand the difference between templates and template parts. although they are both files, templates import template parts. think of a template as a parent component which imports a child component
- i learnt how to display an image from the media library using PHP
- effectivement, there are multiple ways to do this
  - i did this using the [**wp_get_attachment_image()**][get-attachment-img]. it was the most convenient solution for me
  - this can also be done with [**wp_get_attachment_image_url()**][get-attachment-img-url] and [**wp_get_attachment_image_src()**][get-attachment-src] (of which i don't quite understand)
- added some styles to the error page; very minimal. nothing noteworthy
  
