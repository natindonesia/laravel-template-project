# Laravel Prerequisites Setup for Windows

## Multi PHP Version

Do you have existing PHP version installed? and the application you're working on requires a different version? then
this is the guide for you.

### Download & Install PHP Manually

1. Download PHP from [PHP for Windows](https://windows.php.net/download)
2. Find `php-x.x.x-nts-Win32-vc15-x64.zip` (`nts` stands for Non-Thread Safe, `vc15` stands for Visual C++ 2017,
   use `x86` if you're using 32-bit Windows)
3. Extract the zip file anywhere, preferably `C:\php-x.x.x` or any path that don't have space
4. Copy `php.ini-development` and rename it to `php.ini`
5. Open `php.ini` and find `;extension_dir = "ext"` and uncomment it
6. Uncomment these `extension`

 ```ini
;extension=bz2

; The ldap extension must be before curl if OpenSSL 1.0.2 and OpenLDAP is used
; otherwise it results in segfault when unloading after using SASL.
; See https://github.com/php/php-src/issues/8620 for more info.
;extension=ldap

extension = curl
;extension=ffi
;extension=ftp
extension = fileinfo
extension = gd
;extension=gettext
extension = gmp
extension = intl
;extension=imap
extension = mbstring
extension = exif      ; Must be after mbstring as it depends on it
extension = mysqli
;extension=oci8_12c  ; Use with Oracle Database 12c Instant Client
;extension=oci8_19  ; Use with Oracle Database 19 Instant Client
;extension=odbc
extension = openssl
;extension=pdo_firebird
extension = pdo_mysql
;extension=pdo_oci
;extension=pdo_odbc
;extension=pdo_pgsql
;extension=pdo_sqlite
;extension=pgsql
;extension=shmop

; The MIBS data available in the PHP distribution must be installed.
; See https://www.php.net/manual/en/snmp.installation.php
;extension=snmp

;extension=soap
;extension=sockets
extension = sodium
extension = sqlite3
;extension=tidy
;extension=xsl
extension = zip
```

### Using PHP w Composer and Laravel

Assume you have PHP installed at `C:\php-x.x.x` and the current directory is a Laravel project.

1. Find where your composer is installed
2. Open `cmd` and type `where composer`

Assume the result is `C:\ProgramData\ComposerSetup\bin\composer`

```
C:\php-x.x.x\php.exe C:\ProgramData\ComposerSetup\bin\composer.phar install
C:\php-x.x.x\php.exe artisan serve
```
