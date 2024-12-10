### Overviews:
Apps in this directory are initialized by docker.

### Setup theme, plugins and all other things with dockerfile and docker-compose
We need 2 files
1. Dockerfile 
2. docker-compose

### Dockerfile
```sh
FROM php:7.4-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
```