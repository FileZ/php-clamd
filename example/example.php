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

if( $clamd->streamScan($EICAR_TEST) == "OK\n" ) { echo 'Infacted' . PHP_EOL; }

// $clamd->reload();
// $clamd->shutdown();



?>
