php-clamd v0.1
==============

php-clamd is a PHP interface to [ClamAV](http://www.clamav.net/) Daemon that allows you to scan files and emails effectively using ClamAV.

API Reference
=============

TODO

Example
========

```PHP
<?php

include_once '../clamd.php';

$EICAR_TEST = 'X5O!P%@AP[4\PZX54(P^)7CC)7}$EICAR-STANDARD-ANTIVIRUS-TEST-FILE!$H+H*';

file_put_contents('evil.txt', $EICAR_TEST);
file_put_contents('good.txt', 'PHP');

$clamd = new ClamdPipe();
// $clamd = new ClamdNetwork();

var_dump($clamd->ping());
var_dump($clamd->version());

var_dump($clamd->fileScan(getcwd() . '/evil.txt'));
var_dump($clamd->fileScan(getcwd() . '/good.txt'));

var_dump($clamd->continueScan(getcwd()));

var_dump($clamd->streamScan($EICAR_TEST));
var_dump($clamd->streamScan('PHP'));

if( $clamd->streamScan($EICAR_TEST) != 'OK' ) { echo 'Infacted' . PHP_EOL; }

// $clamd->reload();
// $clamd->shutdown();

?>
```
