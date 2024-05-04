### Minimum Theme Requirement:

* style.css | `Theme Name` is the only required

```css
/*
Theme Name: Name of the theme.
Author: The name of the individual or organization who developed the theme.
Description: A short description of the theme.
Version: The version, written in X.X or X.X.X format.
Requires at least: The oldest main WordPress version supported, written in X.X format. 
Tested up to: The last main WordPress version the theme has been tested up to, i.e. 6.4. Write only the number.
Requires PHP: The oldest PHP version supported, in X.X format, only the number.
License: The license of the theme.
License URI: The URL of the theme license.
Text Domain: The string used for textdomain for translation. The theme slug.
*/
```
### Minimal Working State:
1. Create a style.css file
2. Create two new folders inside the theme folder: templates and parts.
3. a header.html in `parts` folder with only `<!-- wp:site-title /-->` content
4. a index.html in `templates` folder with the following content | this ensures the theme has support for FSE

```html
<!-- wp:template-part {"slug": "header"} /-->

<!-- wp:query {"queryId":0, "query": {"perPage": 3, "pages": 0, "offset": 0, "postType": "post", "order":"desc", "orderBy": "date", "author": "", "search": "", "exclude": [], "sticky": "", "inherit": true, "taxQuery": null, "parents": []}, "displayLayout": {"type": "list"}} -->

    <div class="wp-block-query"></div>

    <!-- wp:post-template -->
        <!-- wp:post-title /-->
        <!-- wp:post-date /-->
        <!-- wp:post-content /-->
    <!-- /wp:post-template -->

<!-- /wp:query /-->
```
5. Add theme.json
6. for more customization control optionally add `functions.php`

### Template Hierarchy in new FSE theme:
The new block theme replaces `.php` with `.html` files (and the addition of `templates` dir). So `index.php` becomes `/templates/index.html` and `404.php` becomes `/templates/404.html`

- index
- 404
- archive
- author
- category
- tag
- taxonomy
- date
- embed
- home
- front-page
- privacy-policy
- page
- search
- single
- singular
- attachment

### `theme.json` file:
theme.json (inside theme root) is a configuration file for enabling and disabling block settings and for applying styles to blocks (along with other style files, ie, style.css, build/style.css, etc)
```json
{
    "version": 2,
    "settings": {
        "layout": {
            "contentSize": "840px",
            "wideSize": "1100px"
        }
    }
}
```