<h2 align="center">OpenWA Client PHP</h2>
OpenWA Client PHP adalah sebuah library yang dibuat untuk membantu para developer PHP menggunakan RESt API dari
https://www.npmjs.com/package/@open-wa/wa-automate. Library ini dibuat atas inisiatif diri sendiri. Project ini tidak di sponsori pihak manapun.<br>

[![Latest Stable Version](https://poser.pugx.org/ardzz/OpenWAClient/v/stable)](https://packagist.org/packages/ardzz/OpenWAClient)
[![License](https://img.shields.io/packagist/l/ardzz/OpenWAClient)](https://packagist.org/packages/ardzz/OpenWAClient)

| Features | Available |
|--|--|
Set my name | ✔
Set my status (e.g, available, busy, etc) | ✔
Set profile picture | ✔
Send text | ✔
Send text with mention | ✔
Send YouTube link with preview (thumbnail & title) | ✔
Send link with preview meta tags | ✔
Send image | ✔
Send video | ❌
Send file (alternative ways to send a video) | ✔
Send sticker from an image | ✔
Send sticker from an .webp file | ✔
Send contact | ✔
Send VCard (only set name and phone number) | ✔

## Installation
The recommended way to install OpenWAClient Library is with Composer. Composer is a dependency management tool for PHP that allows you to declare the dependencies your project needs and installs them into your project.
```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```
You can add Meownime Library as a dependency using Composer:
```
composer require ardzz/openwaclient
```
Alternatively, you can specify OpenWAClient Library as a dependency in your project's
existing composer.json file:
```json
 {
   "require": {
      "ardzz/openwaclient": "^1.0"
   }
}
```
After installing, you need to require Composer's autoloader:
```php
require "vendor/autoload.php";
```
You can find out more on how to install Composer, configure autoloading, and other best-practices for defining dependencies at getcomposer.org.

## Dokumentasi

https://ardzz.gitbook.io/openwaclient/


## License
[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2Fardzz%2FOpenWAClient.svg?type=large)](https://app.fossa.com/projects/git%2Bgithub.com%2Fardzz%2FOpenWAClient?ref=badge_large)
