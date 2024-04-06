### Removing Category/Tag/Author Prefix:

```php
// problem
<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
// this code returns the title of the archive with prefix of the archive type

// only the title 
single_term_title();

// or declaring filter
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});
```