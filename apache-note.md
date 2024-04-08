### Apache Installation:

### Apache Management Frequently Used Commands:
`systemctl status httpd`
`systemctl start/stop/reload/restart httpd`
`systemctl enable/disable httpd` to enable/disable auto start on system boot
`netstat -tupan | grep -i http` check if apache httpd process is listening on a port
`netstat -tupan | grep -i '80\|443`
`ps aux | grep -i [h]ttp`
`httpd -t` check syntax if there is any error in the config file before restarting apache server
`httpd -v` check apache version

### Apache's important files:
Configuration files
`/etc/httpd/conf/httpd.conf` is the main config file

`/etc/httpd/conf.d/*.conf`, any file in this `conf.d` directory with `.conf` extension will be pulled by the main config file. Usually `php.conf`, `ssl.conf`, etc are there.

Log files
`/var/run/httpd/httpd.pid`

Startup Script
`/usr/lib/systemd/system/httpd.service`
`/etc/init.d/httpd`

### Config directives:
`ServerRoot` => Define the root, ex `/etc/httpd`
`Listen` => Listening Port
`Include` => To include other config files
`ServerToken` => Specify what info to return with 404/500 error information, like Apache Server Name, Version, etc. Recommended to stick with `ProductOnly`
`ServerSignature` => Specify Expose/Hide Os info, WebMaster's email from Error messages
`Directory` => Sets permission on per directory
`DocumentRoot` => Specify default directory to server web content, ex `/var/www/html`. Is will be concatenated with `ServerRoot`
`IfModule` => define default file to load, ie `index.html` if no file specified on the requested url path
`Files` => to restrict/allowed specified file to server, like restricting `.htaccess` 

### VirtualHost:
Virtual Host refers to the practice of running more than one web site (such as company1.example.com and company2.example.com) on a single machine. This can be ip or name based.

* defining a virtual host in `/etc/apache2/sites-available/your_domain.conf file

```conf
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    ServerName new_domain
    ServerAlias www.new_domain
    DocumentRoot /var/www/new_domain
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

To enable the newly created config, run `sudo a2ensite new_domain.conf`
To disable the default site on the server, run `sudo a2dissite 000-default.conf`


### Enable gzip in `.htaccess`:
For gzip-ing there are 2 apache mods `mod_deflate` (most widely supported) and `mod_gzip`. Either can be used inside .htaccess file

* Using mod_deflate
```.htaccess
<IfModule mod_deflate.c>
  # Compress HTML, CSS, JavaScript, Text, XML and fonts
  AddOutputFilterByType DEFLATE application/javascript
  AddOutputFilterByType DEFLATE application/rss+xml
  AddOutputFilterByType DEFLATE application/vnd.ms-fontobject
  AddOutputFilterByType DEFLATE application/x-font
  AddOutputFilterByType DEFLATE application/x-font-opentype
  AddOutputFilterByType DEFLATE application/x-font-otf
  AddOutputFilterByType DEFLATE application/x-font-truetype
  AddOutputFilterByType DEFLATE application/x-font-ttf
  AddOutputFilterByType DEFLATE application/x-javascript
  AddOutputFilterByType DEFLATE application/xhtml+xml
  AddOutputFilterByType DEFLATE application/xml
  AddOutputFilterByType DEFLATE font/opentype
  AddOutputFilterByType DEFLATE font/otf
  AddOutputFilterByType DEFLATE font/ttf
  AddOutputFilterByType DEFLATE image/svg+xml
  AddOutputFilterByType DEFLATE image/x-icon
  AddOutputFilterByType DEFLATE text/css
  AddOutputFilterByType DEFLATE text/html
  AddOutputFilterByType DEFLATE text/javascript
  AddOutputFilterByType DEFLATE text/plain
  AddOutputFilterByType DEFLATE text/xml

  # Remove browser bugs (only needed for really old browsers)
  BrowserMatch ^Mozilla/4 gzip-only-text/html
  BrowserMatch ^Mozilla/4\.0[678] no-gzip
  BrowserMatch \bMSIE !no-gzip !gzip-only-text/html
  Header append Vary User-Agent
</IfModule>
```

* Using `mod_gzip`

```.htaccess
<ifModule mod_gzip.c>
mod_gzip_on Yes
mod_gzip_dechunk Yes
mod_gzip_item_include file \.(html?|txt|css|js|php|pl)$
mod_gzip_item_include mime ^application/x-javascript.*
mod_gzip_item_include mime ^text/.*
mod_gzip_item_exclude rspheader ^Content-Encoding:.*gzip.*
mod_gzip_item_exclude mime ^image/.*
mod_gzip_item_include handler ^cgi-script$
</ifModule>
```