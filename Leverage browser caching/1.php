######### my post
######### http://www.magentocommerce.com/boards/viewthread/291083/
######### http://frobert.com/en/2010/12/10/wordpress-widget-tutorial/
######### http://pro-questions.com/wordpress-plugin-tutorial.php

#Password of offer1  5e03920ab76a8c6738e16cd278a95f82
Options +FollowSymlinks
RewriteEngine on
RewriteRule ^index.html$ index.php [NC]
RewriteRule ^contact_us.html$ contact_us.php [NC]


RewriteRule ^((post/ebook))$ ebook_post.php
RewriteRule ^((categories)/([a-zA-Z0-9-]+)?)$ categories.php?catdetail=$3

<!----------------------Magento script--------------------------------->

Options +FollowSymLinks
DirectoryIndex index.php
 
RewriteEngine On
RewriteBase /
RewriteCond %{THE_REQUEST} ^[A-Z]{3,9}\ /index\.php/\ HTTP/
RewriteRule ^index\.php/$ http://www.medicam.ca/ [R=301,L]
 
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]

<!----------------------www or non www script--------------------------------->

#If you want to have www part:
RewriteEngine on
RewriteCond %{HTTP_HOST} !^www\.yourdomain\.com$ [NC]
RewriteRule ^(.*)$ http://www.yourdomain.com/$1 [R=301,L]


#If you don�t want to have www part:
RewriteEngine on
RewriteCond %{HTTP_HOST} !^yourdomain\.com$ [NC]
RewriteRule ^(.*)$ http://yourdomain.com/$1 [R=301,L]

<!----------------------Remove Index.php script--------------------------------->

RewriteCond $1 !\.(gif|jpe?g|png)$ [NC]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ /index.php?/$1 [L]

RewriteCond %{THE_REQUEST} ^[^/]*/index\.php [NC]
RewriteRule ^index\.php(.+) $1 [R=301,L]

<!----------------------leverage browser caching--------------------------------->

##### leverage browser caching
## EXPIRES CACHING ##
<IfModule mod_mime.c>
    AddType text/css .css
    AddType application/x-javascript .js
    AddType text/x-component .htc
    AddType text/html .html .htm
    AddType text/richtext .rtf .rtx
    AddType image/svg+xml .svg .svgz
    AddType text/plain .txt
    AddType text/xsd .xsd
    AddType text/xsl .xsl
    AddType text/xml .xml
    AddType video/asf .asf .asx .wax .wmv .wmx
    AddType video/avi .avi
    AddType image/bmp .bmp
    AddType application/java .class
    AddType video/divx .divx
    AddType application/msword .doc .docx
    AddType application/vnd.ms-fontobject .eot
    AddType application/x-msdownload .exe
    AddType image/gif .gif
    AddType application/x-gzip .gz .gzip
    AddType image/x-icon .ico
    AddType image/jpeg .jpg .jpeg .jpe
    AddType application/vnd.ms-access .mdb
    AddType audio/midi .mid .midi
    AddType video/quicktime .mov .qt
    AddType audio/mpeg .mp3 .m4a
    AddType video/mp4 .mp4 .m4v
    AddType video/mpeg .mpeg .mpg .mpe
    AddType application/vnd.ms-project .mpp
    AddType application/x-font-otf .otf
    AddType application/vnd.oasis.opendocument.database .odb
    AddType application/vnd.oasis.opendocument.chart .odc
    AddType application/vnd.oasis.opendocument.formula .odf
    AddType application/vnd.oasis.opendocument.graphics .odg
    AddType application/vnd.oasis.opendocument.presentation .odp
    AddType application/vnd.oasis.opendocument.spreadsheet .ods
    AddType application/vnd.oasis.opendocument.text .odt
    AddType audio/ogg .ogg
    AddType application/pdf .pdf
    AddType image/png .png
    AddType application/vnd.ms-powerpoint .pot .pps .ppt .pptx
    AddType audio/x-realaudio .ra .ram
    AddType application/x-shockwave-flash .swf
    AddType application/x-tar .tar
    AddType image/tiff .tif .tiff
    AddType application/x-font-ttf .ttf .ttc
    AddType audio/wav .wav
    AddType audio/wma .wma
    AddType application/vnd.ms-write .wri
    AddType application/vnd.ms-excel .xla .xls .xlsx .xlt .xlw
    AddType application/zip .zip
</IfModule>
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType text/css A31536000
    ExpiresByType application/x-javascript A31536000
    ExpiresByType text/x-component A31536000
    ExpiresByType text/html A3600
    ExpiresByType text/richtext A3600
    ExpiresByType image/svg+xml A3600
    ExpiresByType text/plain A3600
    ExpiresByType text/xsd A3600
    ExpiresByType text/xsl A3600
    ExpiresByType text/xml A3600
    ExpiresByType video/asf A31536000
    ExpiresByType video/avi A31536000
    ExpiresByType image/bmp A31536000
    ExpiresByType application/java A31536000
    ExpiresByType video/divx A31536000
    ExpiresByType application/msword A31536000
    ExpiresByType application/vnd.ms-fontobject A31536000
    ExpiresByType application/x-msdownload A31536000
    ExpiresByType image/gif A31536000
    ExpiresByType application/x-gzip A31536000
    ExpiresByType image/x-icon A31536000
    ExpiresByType image/jpeg A31536000
    ExpiresByType application/vnd.ms-access A31536000
    ExpiresByType audio/midi A31536000
    ExpiresByType video/quicktime A31536000
    ExpiresByType audio/mpeg A31536000
    ExpiresByType video/mp4 A31536000
    ExpiresByType video/mpeg A31536000
    ExpiresByType application/vnd.ms-project A31536000
    ExpiresByType application/x-font-otf A31536000
    ExpiresByType application/vnd.oasis.opendocument.database A31536000
    ExpiresByType application/vnd.oasis.opendocument.chart A31536000
    ExpiresByType application/vnd.oasis.opendocument.formula A31536000
    ExpiresByType application/vnd.oasis.opendocument.graphics A31536000
    ExpiresByType application/vnd.oasis.opendocument.presentation A31536000
    ExpiresByType application/vnd.oasis.opendocument.spreadsheet A31536000
    ExpiresByType application/vnd.oasis.opendocument.text A31536000
    ExpiresByType audio/ogg A31536000
    ExpiresByType application/pdf A31536000
    ExpiresByType image/png A31536000

    ExpiresByType application/vnd.ms-powerpoint A31536000
    ExpiresByType audio/x-realaudio A31536000
    ExpiresByType image/svg+xml A31536000
    ExpiresByType application/x-shockwave-flash A31536000
    ExpiresByType application/x-tar A31536000
    ExpiresByType image/tiff A31536000
    ExpiresByType application/x-font-ttf A31536000
    ExpiresByType audio/wav A31536000
    ExpiresByType audio/wma A31536000
    ExpiresByType application/vnd.ms-write A31536000
    ExpiresByType application/vnd.ms-excel A31536000
    ExpiresByType application/zip A31536000
</IfModule>

## EXPIRES CACHING ##

<!----------------------leverage browser caching--------------------------------->






































RewriteCond %{REQUEST_URI}  !^/?menu=$piano 
##RewriteRule ^(demenagement-piano)$  /?menu=piano  [L,R=301]
RewriteRule ^([a-zA-Z0-9_-]+)$ index.php?menu=piano [L,R=301]

##RewriteEngine On
##RewriteRule ^/?menu=piano$ demenagement-piano [R=301] 
##RewriteRule /?menu=piano http://www.bretonsavard.com/demenagement-piano
##RewriteRule ^([a-zA-Z0-9_-]+)$ index.php?menu=$1
##RewriteRule ^([a-zA-Z0-9_-]+)/$ user.php?username=$1
##RewriteCond %{HTTP_HOST} ^www.domain.com$ RewriteRule ^category/([0-9]+)$ category.php?id=$1 

##RewriteRule http://www.bretonsavard.com/?menu=piano  http://www.bretonsavard.com/demenagement-piano
##http://www.bretonsavard.com/?menu=sentr  http://www.bretonsavard.com/entreposage-services
##http://www.bretonsavard.com/?menu=accue&lang=0  1. http://www.bretonsavard.com/en







































RewriteEngine on
RewriteBase /
#Options +FollowSymLinks
RewriteCond %{THE_REQUEST} ^.*/index.php
RewriteRule ^(.*)index.php$ http://%{HTTP_HOST}/$1 [R=301,L] 
#RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
#RewriteCond %{request_method} ^GET$
#RewriteCond %{REQUEST_URI} !^/downloader.*$
RewriteCond %{REQUEST_URI} ^(.+)/$
RewriteRule ^(.+)$ %1 [L,R=301]
RewriteCond %{HTTP_HOST} !^www\.bretonsavard\.com$ [NC]
RewriteRule ^(.*)$ http://www.bretonsavard.com/$1 [R=301,L]
RewriteRule /index.php/ http://www.bretonsavard.com/ [L,R=301]
## EXPIRES CACHING ##
<IfModule mod_expires.c>
ExpiresActive On
ExpiresByType image/gif A2592000
ExpiresByType image/jpeg A2592000
ExpiresByType image/jpg A2592000
ExpiresByType image/png A2592000
ExpiresByType image/x-icon A2592000
ExpiresByType text/css A86400
ExpiresByType text/javascript A86400
ExpiresByType application/x-shockwave-flash A2592000
#
<FilesMatch "\.(gif¦jpe?g¦png¦ico¦css¦js¦swf)$">
Header set Cache-Control "public"
</FilesMatch>
</IfModule>
## EXPIRES CACHING ##
## EXPIRES CACHING ##
<IfModule mod_expires.c>
ExpiresActive On
ExpiresByType image/jpg "access plus 1 year"
ExpiresByType image/jpeg "access plus 1 year"
ExpiresByType image/gif "access plus 1 year"
ExpiresByType image/png "access plus 1 year"
ExpiresByType text/css "access plus 1 month"
ExpiresByType application/pdf "access plus 1 month"
ExpiresByType text/x-javascript "access plus 1 month"
ExpiresByType application/x-shockwave-flash "access plus 1 month"
ExpiresByType image/x-icon "access plus 1 year"
ExpiresDefault "access plus 2 days"
</IfModule>
## EXPIRES CACHING ##
#Gzip
<ifmodule mod_deflate.c>
AddOutputFilterByType DEFLATE text/text text/html text/plain text/xml text/css application/x-javascript application/javascript text/javascript
</ifmodule>

RewriteEngine on
RewriteRule ^demenagement-piano(.+)?$ index.php?menu=piano 
RewriteRule ^entreposage-services(.+)?$ index.php?menu=sentr 
RewriteRule ^en(.+)?$ index.php?menu=accue&lang=0 
