# skeleton-project
> FOR TIV.NET PROJECTS ONLY

# Usage Example

    cd /var/www
    composer create-project tivwp/skeleton-project my-site.com

Composer will install the project and then will run the configuration script:

    > tivwp_composer::post_create_project
    Please enter the configuration values:
    DB_NAME [my-site] :
    DB_USER [my-site] (max. 16 chars) :
    DB_PASSWORD :mysecretpassword
    Domain name [my-site.com] :
    Array
    (
        [{{DB_NAME}}] => my-site
        [{{DB_USER}}] => my-site
        [{{DB_PASSWORD}}] => mysecretpassword
        [{{SITE_NAME}}] => my-site.com
        [{{PROJECT_ROOT}}] => /var/www/my-site.com
    )
    
    OK [Y/n]?
    Processing files:
    internal/dist/dbcreate.sql => internal/dbcreate.sql
    internal/dist/wp-config.php => public/wp-config.php
    internal/dist/httpd.conf => apache/httpd.conf

Go to the project folder:

    cd /var/www/my-site.com

Run `mysql` to create the database and the user:

    mysql -u root -p < internal/dbcreate.sql
    Enter password: **********

Edit the `public/wp-config.php` file and replace the "Authentication Unique Keys and Salts" section with the content of https://api.wordpress.org/secret-key/1.1/salt/.

Edit the `.gitignore` file in the project root and uncomment the line:

    /public/tivwp-local-config.inc.php

If on development server, edit the `/etc/hosts` file and put the following line there:

    127.0.0.1 my-site.com www.my-site.com

Open the site in a browser to let WordPress set up the database tables:

https://my-site.com/wp/wp-admin/install.php

Note that if you did not install the real SSL certificate, your browser will issue a warning.

Complete the WordPress installation, login to the admin and then go to the General Settings:

https://my-site.com/wp/wp-admin/options-general.php

and change the `Site Address (URL)` so that it does not end with `wp`:

    https://my-site.com

Keep the above part, `WordPress Address (URL)` as-is.

Alternatively, if you have `WP-CLI` installed, you can use it:

    wp option update home 'https://my-site.com'

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

- Remove the `internal` folder.
- Remove or modify `README.md` file in the project root folder.

### That's All

The site is ready. Make a Git repo for it, commit and push.

## Author

Gregory Karpinsky
[TIV.NET INC.](https://www.tiv.net/)
 
- [WPGlobus](https://wpglobus.com/) - Multilingual WordPress and WooCommerce.
- [Paywall for WooCommerce](https://woocommerce.com/products/paywall-for-woocommerce/?aff=28186&cid=2822492) - sell pay-per-view videos and other restricted content.
 - [WooCommerce Multi-currency](https://woocommerce.com/products/multi-currency/?aff=28186&cid=2822492) - let the customer pay in the currency of their choice.
 
