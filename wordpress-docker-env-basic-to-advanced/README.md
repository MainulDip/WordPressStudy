### Overviews:
Apps in this directory are initialized by docker.

### Setup theme, plugins and all other things with dockerfile and docker-compose
We need 2 files
1. Dockerfile 
2. docker-compose

Mission
- theme and plugin sync
- media and db sync
- php extension
- default theme and plugins
- https and multi site

### Step by Step work:
- 101 docker-compose only
- 102 dockerfile + docker-compose + use docker secrets
- 103 102 + install php extensions
- 104 using wp-cli from dockerfile and/or docker-compose
- 105 install default theme, plugins while running a container
- 106 wp modular setup with theme, plugins, wp-content, mysql sync with local drive
- 107 play with https

### Dockerfile
```sh
FROM php:7.4-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
```