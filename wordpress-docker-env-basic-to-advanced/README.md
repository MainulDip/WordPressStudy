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

### Dockerfile
```sh
FROM php:7.4-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
```