#!/bin/bash

#
# For remote operations (ssh, copy dumps from-to server)
#
# Note: REMOTE_ADDR must be an IP, to work regardless the /etc/hosts settings
#
declare -r REMOTE_ADDR="x.x.x.x"
declare -r REMOTE_USER="www-data"

# Must be the same on all machines
declare -r DOCUMENT_ROOT="{{PROJECT_ROOT}}/public"
declare -r WP_CONTENT_DIR="${DOCUMENT_ROOT}/wp-content"
declare -r DIR_DUMP="{{PROJECT_ROOT}}/dbdump-data/sql"

# These are the MySQL connection settings, same as in the WordPress config file
declare -r DB_NAME="{{DB_NAME}}"
declare -r DB_USER="{{DB_USER}}"
# For MySQL 5.5-
declare -r DB_PASSWORD="{{DB_PASSWORD}}"
# For MySQL 5.6+ (you will be asked to type in the above password for the first time)
declare -r DB_LOGIN_PATH=${DB_NAME}

# --- EOF
