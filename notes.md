[template-tags-file]: themes/twentynineteen/inc/template-tags.php/
## Modifying Posted By Metadata
- this challenge was an easier one, that I actually did towards the beginning of the course. the task was to customise the "posted by" metadata
- i used the inspector tool to figure out what element(s) i will be dealing with based on the elements and class specifications of the metadata section
- i found that the metadata is being rendered in a pluggable function named ```twentynineteen_posted_by()``` that is found in the [template-tags.php][template-tags-file] file in the parent theme
- i then copied this function into my functions.php file and modified it as desired, including the metadata text and icons to change dynamically depending on post categories (this was just to practise some of the PHP fundamentals)