## Overview:
This is a personalized mini Docs or guide for day to day used wordpress development.
### WordPress Dev Environment Setup (Official):
https://github.com/WordPress/wordpress-develop

After Node.js and Docker install, download the repo by `git clone https://github.com/WordPress/wordpress-develop.git` and use node.js to manage everything (Docker Container, ect). After running all these (for the first time), WordPress will be available at `http://localhost:8889`. Also change the dev mode in wp-config.php to `define( 'WP_DEVELOPMENT_MODE', 'theme' );` for theme development.
```sh
npm install
npm run build:dev
npm run env:start # may need sudo as docker is involved
npm run env:install # may need sudo as docker is involved
```

`npm run dev` to start dev server

`npm run env:cli -- <command>` to run WP-cli commands or `npm run env:cli -- help` to see available commands


Environment management commands
```sh
npm run env:restart # restart the dev env with modified docker-compose.yml
npm run env:stop # stop dev env
npm run env:start # start dev env, docker containers
npm run env:reset # will reset everything, including docker mysql db
```

Running Tests
```sh
npm run test:php
npm run test:e2e

npm run test:php -- --filter <test name>
npm run test:php -- --group <group name or ticket number>
```

### WordPress Dev Workflows:
Start coding
```sh
npm run env:start # start everything necessary, hop into localhost:8889
npm run dev # to compile all and run all the npm packages (parsing js, minify, and watch mode)
```

### install latest version of Gutenberg:
From plugin directory `git clone https://github.com/WordPress/gutenberg`
and then
```sh
cd gutenberg
npm install
npm run build
```

### Theme Development:
Theme can be Classic or Block Based. Block Based theme can support full site editing. 

### Plugin Development:

### Wordpress With Apache

### Wordpress with Nginx:

### Linux process state by `top` command:
get info by running `man top` command.
D = uninterruptible sleep
I = idle
R = running
S = sleeping
T = stopped by job control signal
t = stopped by debugger during trace
Z = zombie

### CGI vs FastCGI vs PHP-FPM:
CGI stands for “Common Gateway Interface.” It is a standard and old protocol that defines how web servers can interact with external applications or scripts to process HTTP requests and generate dynamic web content. 

FastCGI is the improved version. And `PHP-FPM` (php firstCGI Process Manager) is performance optimized version for PHP based applications.


https://medium.com/@miladev95/cgi-vs-fastcgi-vs-php-fpm-afbc5a886d6d

### Next Following:
=> Linux Networking (https://youtu.be/2doSoMN2xvI?si=wmPz9jPjGgnjLTx-)
=> Docker Networking
=> Linux Security
=> Docker Security
=> Docker Production Workflow (Shell script to Install docker, docker-compose, build image and run).
=> Backing Up Live WordPress To External Source (possibly DB).