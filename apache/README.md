Reference this file in the Apache config:

	Include /path/to/this/folder/httpd.conf

Include macros from the `internal/dist/macros` to the Apache config (copy the folder to `/etc/apache2/`).

	IncludeOptional macros/*.conf
