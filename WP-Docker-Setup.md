### Local Dev Env For WordPress in Linux machine:
Use Dockerfile for image configuration and docker-compose for setting everything.
Inside Dockerfile use the below config to solve permission issues while developing theme or plugin.
```sh
# assign userid 1000 to the user named `www-data`
RUN usermod -u 1000 www-data 

RUN usermod -G staff www-data
```

https://stackoverflow.com/questions/29245216/write-in-shared-volumes-docker/29251160#29251160

### Docker WordPress Advanced Guide:
https://ashishjain-95034.medium.com/mastering-local-wordpress-development-with-docker-a-quick-step-by-step-guide-5a5c9d83b071

### WordPress Docker Complete Dev Setup:
- install necessary plugins and themes
- mysql database dump and sync | local volume
- wp-content directory dump and sync | local volume
- install necessary php extension
- add custom domain and map to the port
- Enable HTTPS
- WordPress Multisite (Local and Production)

```sh
FROM php:7.4-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
```

