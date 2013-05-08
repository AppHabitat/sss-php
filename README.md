               ,
             .';
         .-'` .'
       ,`.-'-.`\
      ; /     '-'
      | \       ,-,
      \  '-.__   )_`'._
       '.     ```      ``'--._
      .-' ,                   `'-.
       '-'`-._           ((   o   )
        jgs   `'--....(`- ,__..--'
                       '-'`

[ascii art cred](http://www.retrojunkie.com/asciiart/animals/sharks.htm)

This is the PHP library for creating screenshot URLs using the ScreenshotShark service.

```php
<?php

require_once 'ScreenshotShark.php';

$sss = new ScreenshotShark($api_key, $secret);

$opts = array(
  'url' => 'http://www.google.com/',
  'op'  => 'r:200:160',
);

print $sss->buildUrl($opts);

```

Check out [ScreenshotShark](http://www.screenshotshark.com) for your screenshotting needs.
