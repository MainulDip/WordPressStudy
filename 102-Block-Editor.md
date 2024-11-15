### Overviews:
`wp-env` is the official recommendation by Block-Editor (Gutenberg) Project for setting up dev env

`@wordpress/create-block` package is an officially supported tool to scaffold the structure of files needed to create and register a block. 

`wp-scripts` is for node.js dev server, build setups and maintaining library compatibility. Comes default with `create-block`. 

### When Docker needs `sudo`:
add group `this` and `sudo usermod -aG docker $USER`
then run `npx wp-env start`


If you installed Docker Desktop first, then removed it and installed the Docker Engine, you may need to switch the Docker context with this command: `docker context use default`

### Creation of Custom Block:
Custom blocks for the Block Editor in WordPress are typically registered using plugins. 

To create a block plugin use `npx @wordpress/create-block@latest <block-plugin-name>` command

Then
`npx wp-env start` from `theme` or `plugin` directory
`npx wp-env start` to clean everything `wp-env clean all`
`docker rm -v -f $(docker ps -qa)` // to remove all docker container


### `@wordpress/create-block` package:
To scaffold a block plugin with default config
- `npx @wordpress/create-block@latest <custom-name>`

To scaffold with interactive mode
- `npx @wordpress/create-block@latest`

With other options, a dynamic block will be created named "my-plugin"
- `npx @wordpress/create-block@latest --namespace="my-plugin" --slug="my-block" --variant="dynamic"`

External/Local template as npm package can also be used to scaffold
- `npx @wordpress/create-block@latest --template my-template-package`
- `npx @wordpress/create-block@latest --template ./path/to/template-directory`

Docs https://developer.wordpress.org/block-editor/reference-guides/packages/packages-create-block/#template

### `@wordpress/scripts` package: 
This package abstracts away much of the initial setup, configuration, and boilerplate code associated with JavaScript development for modern WordPress.

`wp-scripts` comes automatically when initialized with `create-block`. But to manually setup ensure the directory contains a package.json file, a build folder, and an src folder. The src folder should also include an index.js file.

To setup using npm
- `npm init` a project & set entry point `build/index.js`
- `npm install @wordpress/scripts --save-dev`

Then add scripts to use on dev and build
```json
{
    "scripts": {
        "start": "wp-scripts start",
        "build": "wp-scripts build"
    }
}
```
Upon build a `build/index.asset.php` will also be created for dependencies, version and cache busting.

Docs https://developer.wordpress.org/block-editor/getting-started/devenv/get-started-with-wp-scripts/

### Enqueuing assets | block.json & extra scripts:
If block is registered via `register_block_type` in `<plugin-name>.php` file, the scripts defined in `block.json` will be automatically enqueued

A example `block.json` file, all assets are being enqueued at the bottom

```json
{
  "$schema": "https://schemas.wp.org/trunk/block.json",
  "apiVersion": 3,
  "name": "create-block/todo-list",
  "version": "0.1.0",
  "title": "Todo List",
  "category": "widgets",
  "icon": "smiley",
  "description": "Example block scaffolded with Create Block tool.",
  "example": {},
  "supports": {
    "html": false
  },
  "textdomain": "todo-list",
  "editorScript": "file:./index.js",
  "editorStyle": "file:./index.css",
  "style": "file:./style-index.css",
  "viewScript": "file:./view.js"
}
```

To manually enqueue files in the editor, in any other context, use the `<plugin-name>.php` file, like

```php
/**
 * Enqueue Editor assets.
 */
function example_project_enqueue_editor_assets() {
    $asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');

    wp_enqueue_script(
        'example-editor-scripts',
        plugins_url( 'build/index.js', __FILE__ ),
        $asset_file['dependencies'],
        $asset_file['version']
    );
}
add_action( 'enqueue_block_editor_assets', 'example_project_enqueue_editor_assets' );

```

Docs: https://developer.wordpress.org/block-editor/how-to-guides/enqueueing-assets-in-the-editor/

### Code Quality and Tests:
Use `wp-scripts` to setup linters and test

```json
{
    "scripts": {
        "format": "wp-scripts format",
        "lint:css": "wp-scripts lint-style",
        "lint:js": "wp-scripts lint-js",
        "test:e2e": "wp-scripts test-e2e",
        "test:unit": "wp-scripts test-unit-js"
    }
}
```