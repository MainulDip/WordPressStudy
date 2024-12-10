### FSE Theming (Full Site Editing):
My thinking is derailed 🤪 I'm tied up to the tracks 
The train of consequences 💀 There ain't no turning back


### Generating Block Theme:
2 most suggested methods are `using latest wordpress official theme` and/or using `Create Block Theme` official plugin.

The `Create Block Theme` plugin is an official, first-party plugin that WordPress contributors maintain. The plugin is more robust and it has many more options for exporting theme. One thing it does not support yet is uploading a custom screenshot. 

### Data & Plugins for theme development (official):
Data - xml dummy data for import https://codex.wordpress.org/Theme_Unit_Test

Plugins to aid theme development https://developer.wordpress.org/themes/getting-started/tools-and-setup/#plugins

`Theme Check` Tests theme for compliance with the latest WordPress standards and practices
`Debug Bar` Adds an admin bar to the WordPress admin and provides a central location for debugging
`Query Monitor` Allows debugging of database queries, API requests, and AJAX used to generate theme pages and functionality
`Log Deprecated Notices` Logs incorrect function usage, deprecated file usage, and deprecated function usage 
`Monster Widget` (classic themes only) Consolidates the core WordPress widgets into a single widget, making it easier to test them all at once 


### `theme.json` Configuration file | Optional but vvi:
it's a configuration file for enabling certain wordpress settings, style specific elements and blocks, and which templates and template parts to register.

`theme.json` configuration will be reflected in places like the `post`, `template`, & `site editors` in the WordPress admin dashboard. Custom styles, in particular, will be reflected in the Styles interface

Some of the things you can do with theme.json are:

- Enable or disable features like drop caps, padding, margin, and line-height.......
- Add a color palette, gradients, duotones, and shadows.
- Configure typographical features like font families, sizes, and more.
- Add CSS custom properties.......
- Register custom templates and assign parts to template part areas.

### hierarchy of different `theme.json`, low to high:
- WordPress default theme.json
- Theme's theme.json will overrides the defaults
- Child theme theme.json: If active, will override parent's theme.json
- User configuration: Users can further customize how their site works under Appearance > Editor in the WordPress admin, and the JSON data is saved in their site’s database. Their choice takes priority over all other levels in the hierarchy

There are also filter hooks available that let plugin and theme authors override the values dynamically. https://developer.wordpress.org/news/2023/07/05/how-to-modify-theme-json-data-using-server-side-filters/.......