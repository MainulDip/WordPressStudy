### Overviews:
Here are some common practice and workflow regarding Block Theme and Full Site Editing. Most of these are coming from `` and some other places.

### Development Setup:
Dockerfile is used to initialize WordPress image and Clean-up default themes and plugins inside `wp-content` directory. We're mounting our own `wp-content` with empty or pre-defined theme and plugin directory.

At some point, Dockerfile will call the `docker-entrypoint-override.sh` shell script, which will check and print if our `wp-content` is mounted or not. This will also call the `docker-entrypoint.sh` to do the rest of the task

Finally `docker-compose.yml` will build the wordpress image (with our predefined env), mysql and php-my-admin.