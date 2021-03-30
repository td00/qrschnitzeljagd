# QR-Code Schnitzeljagd
### A quick and dirty page to generate unique QR-Codes to hide and embed a message on the page.

## Requirements:
- PHP 
- Webserver
- MySQL Server

### Tested on fresh Ubuntu 20.04 server with:
- php 7.3.24
- nginx 1.19.8
- mysql-server 8.0.23

Shouldn't use anything special or soon to be deprecated stuff.

Maybe you wanna check the bootstrap & jquery js foo...

## Install

- $ apt update && apt install git nginx php php-fpm phpqrcode php-mysql mariadb-server mariadb-client -y
- $ apt install certbot python3-certbot-nginx -y
- $ cd /var/www/html
- $ rm index.nginx-debian.html
- $ git clone https://github.com/td00/qrschnitzeljagd .
- $ vim /etc/nginx/sites-enabled/default
- Activate PHP!
- $ nginx -s reload