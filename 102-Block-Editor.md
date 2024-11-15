### Overviews:
`wp-env` is the official recommendation by Block-Editor (Gutenberg) Project for setting up dev env

`@wordpress/create-block` package is an officially supported tool to scaffold the structure of files needed to create and register a block. 

`wp-scripts` is for node.js dev server, build setups and maintaining library compatibility. Comes default with `create-block`. 

### When Docker needs `sudo`:
add group `this` and `sudo usermod -aG docker $USER`
then run `npx wp-env start`


If you installed Docker Desktop first, then removed it and installed the Docker Engine, you may need to switch the Docker context with this command: `docker context use default`


### Docker Management Commands:
Show all processes `docker ps`


### `wp-env | @wordpress/env`:
Requires `Docker` to be installed. Then install the wp-env package globally `npm -g install @wordpress/env`

Alternative use `npx` to avoid global installation like `npx wp-env start`. Or use locally by `npm i @wordpress/env --save-dev`.

For local dev dependency, use `npm init` on plugin's directory and install `wp-env` locally.
Also, for block plugin `npx @wordpress/create-block@latest <block-plugin-name>` will create a boilerplate block plugin.

Then navigate to an existing plugin directory, theme directory, or a new working directory in the terminal and run
- `wp-env start` or `npm run start wp-env` and `wp-env stop` to stop

after completion, access the local environment at: http://localhost:8888. Log into the WordPress dashboard using username `admin` and password `password`.

For custom env config use `.wp-env.json`, details on `@wordpress/env package`

To reset and clean the wp database `wp-env clean all`
To remove the local env for a specific project, run `wp-env destroy`
To uninstall wp-env `npm -g uninstall @wordpress/env`

### Creation of Custom Block:
Custom blocks for the Block Editor in WordPress are typically registered using plugins. 

To create a block plugin use `npx @wordpress/create-block@latest <block-plugin-name>` command, check/populate `.wp-env.json` for targeted configuration

Then
`npx wp-env start` from `theme` or `plugin` directory
`npx wp-env start` to clean everything `wp-env clean all`
`docker rm -v -f $(docker ps -qa)` // to remove all docker container

Then `npm run start` to start the dev server and hop into localhost:<port>


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