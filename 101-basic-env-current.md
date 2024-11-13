### Development Packages:
`wp-env | @wordpress/env` for setting up a local WordPress environment and recommended tool for Gutenberg development. https://developer.wordpress.org/block-editor/getting-started/devenv/get-started-with-wp-env/

`wp-now` lightweight tool for quickly testing WordPress releases, plugins, and themes locally. Its powered by `WordPress Playground` and still experimental.

`local` for local development setup with GUI, by WP Engine, https://localwp.com/
`WP Studio` local alternative, maintained by Automatic, https://developer.wordpress.com/studio/

### Node version manager (NVM):

### `wp-env | @wordpress/env`:
Requires `Docker` to be installed. Then install the wp-env package globally
- `npm -g install @wordpress/env`

Then navigate to an existing plugin directory, theme directory, or a new working directory in the terminal and run
- `wp-env start` or `npm run start wp-env`

after completion, access the local environment at: http://localhost:8888. Log into the WordPress dashboard using username `admin` and password `password`.

For custom env config use `.wp-env.json`, details on `@wordpress/env package`

To reset and clean the wp database `wp-env clean all`
To remove the local env for a specific project, run `wp-env destroy`
To uninstall wp-env `npm -g uninstall @wordpress/env`

### Docker for wp-env:
Start docker `sudo systemctl start docker.service`, to troubleshoot https://developer.wordpress.org/block-editor/getting-started/devenv/get-started-with-wp-env/#ubuntu-docker-setup