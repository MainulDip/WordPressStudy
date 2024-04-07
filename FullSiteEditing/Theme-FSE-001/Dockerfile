FROM wordpress:5.8.1

# Production image #
# 1. Embed content
# 2. Add custom entrypoint to re-ensure init of /var/www/html
# 3. Drop wp-admin

# Cleanout built-in themes and plugins.
RUN  rm -R $(ls -1 -d /usr/src/wordpress/wp-content/plugins/*) \
  && rm -R $(ls -1 -d /usr/src/wordpress/wp-content/themes/*)

# Inject our Plugins, themes, etc. into the image.
COPY wp-content/ /usr/src/wordpress/wp-content
COPY .htaccess /usr/src/wordpress/.htaccess
COPY docker/docker-entrypoint-override.sh /usr/local/bin

HEALTHCHECK --interval=30s --timeout=10s --retries=3 CMD curl -o /dev/null -s --fail http://localhost/health
ENTRYPOINT ["/usr/local/bin/docker-entrypoint-override.sh"]
CMD ["apache2-foreground"]