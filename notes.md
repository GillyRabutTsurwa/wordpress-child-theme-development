[wordpress-hooks-link]: https://developer.wordpress.org/plugins/hooks/
[wordpress-actions-link]: https://developer.wordpress.org/plugins/hooks/actions/
[wordpress-filters-link]: https://developer.wordpress.org/plugins/hooks/filters/
## Ce que j'ai appris

for my info: this commit covers the 3 lessons labeled: *Hooks, filters and action*, *Filter a function*, and *Hooking functions*.

To summarise, I learnt about 3 important subjects: [hooks][wordpress-hooks-link], [actions][wordpress-actions-link], and [filters][wordpress-filters-link]:

- wrote code for a filter that takes modifies a post title of a particular category (more details in child theme [functions.php file](themes/twentynineteen-child/functions.php))
  - importantly, i learnt that filters, as a result of what they do, must **always** return a value
- wrote code for an action that removes the parent functionality that displays widgets at the footer of each post
  - also importantly, i learnt that you need to add an action in order to remove it
  - removing the action is done in our custom function, but in order to call that custom function (responsible for removing the action), we need to add an action, using an appropriate action hook

<!-- NOTES DONE: commit changes after walk -->