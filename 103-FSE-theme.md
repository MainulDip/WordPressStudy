### FSE Theming (Full Site Editing):
My thinking is derailed 🤪 I'm tied up to the tracks 
The train of consequences 💀 There ain't no turning back
### `theme.json` Configuration file | Optional but foundational:
it's a configuration file for enabling certain wordpress settings, style specific elements and blocks, and which templates and template parts to register.

`theme.json` configuration will be reflected in places like the `post`, `template`, and `site editors` in the WordPress admin. Custom styles, in particular, will be reflected in the Styles interface

Some of the things you can do with theme.json are:

- Enable or disable features like drop caps, padding, margin, and line-height.
- Add a color palette, gradients, duotones, and shadows.
- Configure typographical features like font families, sizes, and more.
- Add CSS custom properties.......
- Register custom templates and assign parts to template part areas.

### hierarchy of different `theme.json`, low to high:
- WordPress default theme.json
- Theme's theme.json will overrides the defaults
- Child theme theme.json: If active, will override parent's theme.json
- User configuration: Users can further customize how their site works under Appearance > Editor in the WordPress admin, and the JSON data is saved in their site’s database. Their choice takes priority over all other levels in the hierarchy.......

There are also filter hooks available that let plugin and theme authors override the values dynamically. https://developer.wordpress.org/news/2023/07/05/how-to-modify-theme-json-data-using-server-side-filters/.......