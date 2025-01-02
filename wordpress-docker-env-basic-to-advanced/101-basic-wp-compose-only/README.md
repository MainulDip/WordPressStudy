### Step by Step
Build an image and run the image as container
`docker-compose -f docker-compose-wp-1.yaml up -d`
and to stop `docker-compose -f docker-compose-wp-1.yaml stop`

### Notes:
To `depends-on` prop is important so that mysql will be setup first and wordpress can query that
To store the live wordpress into the local directory use `./wordpress:/var/www/html` structure for volume mounting
To store db locally use `./db:/var/lib/mysql`

Database Error : https://stackoverflow.com/questions/52186125/moving-wordpress-site-to-docker-error-establishing-db-connection