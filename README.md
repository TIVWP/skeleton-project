# skeleton-project
►►► PLEASE DO NOT TRY USING IT YET. WAIT FOR THIS LINE TO DISAPPEAR ! ◄◄◄

# Usage Example

    cd /var/www
    composer create-project tivwp/skeleton-project www.my-site.com

Composer will install the project and then will run the configuration script:

    > tivwp_composer::post_create_project
    Please enter the configuration values:
    DB_NAME [my-site] :
    DB_USER [my-site] :
    DB_PASSWORD :mysecretpassword
    Domain name [my-site.com] :
    Array
    (
        [{{DB_NAME}}] => my-site
        [{{DB_USER}}] => my-site
        [{{DB_PASSWORD}}] => mysecretpassword
        [{{SITE_NAME}}] => my-site.com
        [{{PROJECT_ROOT}}] => /var/www/www.my-site.com
    )
    
    OK [Y/n]?
    Processing files:
    internal/dist/dbcreate.sql => internal/dbcreate.sql
    internal/dist/wp-config.php => public/wp-config.php
    internal/dist/dbdump-config.inc.sh => dbdump-config.inc.sh
    internal/dist/httpd.conf => apache/httpd.conf

Go to the project folder:

    cd /var/www/www.my-site.com

Run `mysql` to create the database and the user:

    mysql -u root -p < internal/dbcreate.sql
    Enter password: **********

Edit the `public/wp-config.php` file and replace the "Authentication Unique Keys and Salts" section with the content of https://api.wordpress.org/secret-key/1.1/salt/.

Edit the `.gitignore` file in the project root and uncomment the line:

    /public/tivwp-local-config.inc.php

If you already have the SSL certificate files, put them to the SSL folder:

    /var/www/www.my-site.com/ssl/

instead of the self-signed certificates found there. Then, edit the Apache configuration file:
 
    /var/www/www.my-site.com/apache/httpd.conf

Edit the Apache server configuration (eq. on Ubuntu, create a new file in the `sites-available` folder) and write the following line there:
 
    Include /var/www/www.my-site.com/apache/httpd.conf
    
Reload Apache. On Ubuntu do this:

    a2ensite www.my-site.com
    service apache2 reload

If on development server, edit the `/etc/hosts` file and put the following line there:

    127.0.0.1 www.my-site.com

Open the site in browser to let WordPress setup the database tables:

https://www.my-site.com/wp/wp-admin/install.php

Note that if you did not install the real SSL certificate, your browser will issue a warning.

Complete the WordPress installation, login to the admin and then go to the General Settings:

https://www.my-site.com/wp/wp-admin/options-general.php

and change the `Site Address (URL)` so that it does not end with `wp`:

    https://www.my-site.com

Keep the above part, `WordPress Address (URL)` as-is.

### Clean-up

Edit the `composer.json` file:

- Change these lines:

```
"name": "tivwp/skeleton-project",
"description": "Skeleton project for WordPress applications",
```

- Remove these lines:

```
"scripts": {
    "post-create-project-cmd": [
      "tivwp_composer::post_create_project"
    ]
},
"autoload": {
    "classmap": [
      "internal"
    ]
},
```

- Note these lines:

```
"require-unused":{
    "wpackagist-plugin/woocommerce": "^2.",
    "wpackagist-plugin/wordpress-seo": "^3.",
    "end-of-list": "nothing"
}
```

You can use this space to temporarily add-remove components. For instance, if you move the `woocommerce` line to the `require:` section and then run `composer update`, WooCommerce plugin will be installed in the `plugins` folder.

### That's All

The site is ready. Make a Git repo for it, commit and push.

## Author

Gregory Karpinsky
[TIV.NET INC.](http://www.tiv.net/) / [WPGlobus](http://www.wpglobus.com/)
