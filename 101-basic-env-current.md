### Development Packages:
`wp-env | @wordpress/env` for setting up a local WordPress environment and recommended tool for Gutenberg development. https://developer.wordpress.org/block-editor/getting-started/devenv/get-started-with-wp-env/

`wp-now` lightweight tool for quickly testing WordPress releases, plugins, and themes locally. Its powered by `WordPress Playground` and still experimental.

`local` for local development setup with GUI, by WP Engine, https://localwp.com/
`WP Studio` local alternative, maintained by Automatic, https://developer.wordpress.com/studio/

### Node version manager (NVM):

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

### Docker for wp-env:
Start docker `sudo systemctl start docker.service`, to troubleshoot https://developer.wordpress.org/block-editor/getting-started/devenv/get-started-with-wp-env/#ubuntu-docker-setup

`ps -ef | grep docker` to check docker process is running or not


### `wp-env` configuration `.wp-env.json` for `plugin`, `theme`:
For plugin development touch a `.wp-env.json` file with the following values in the plugin's directory
```json
{
    // "core": "WordPress/WordPress#master", // for latest wp
    "core": null,
    "plugins": [ "." ]
}
```


- the key `env` is available to override aforementioned state for individual environment (development & tests)

- ports can be set with environment variables WP_ENV_PORT, WP_ENV_TESTS_PORT, WP_ENV_MYSQL_PORT and WP_ENV_TESTS_MYSQL_PORT.

https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/#wp-env-json
```json
{
    "plugins": [ "." ],
    "port": 4013, // custom port
    "config": {
        "KEY_1": true,
        "KEY_2": false
    },
    "env": {
        "development": {
            "themes": [ "./one-theme" ]
        },
        "tests": {
            "config": {
                "KEY_1": false
            },
            "port": 3000,
            "mysqlPort": 13306
        }
    }
}
```