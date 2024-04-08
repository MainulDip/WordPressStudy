### Setting gzip:
Inside `nginx.conf`, `http` block is the recommended place for enabling gzip. `server` or `location` can also be used
```conf
gzip on;
gzip_types text/plain text/css text/javascript image/svg+xml image/x-icon application/javascript application/x-javascript;
gzip_min_length 1000;
gzip_vary on;
gzip_proxied no-cache no-store private expired auth;
gzip_diable “MSIE [1-6];
```