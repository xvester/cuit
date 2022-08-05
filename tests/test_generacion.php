<?php

require_once '../src/CUIT.php';
require_once '../src/CUITException.php';

use Vester\CUIT\CUIT;
use Vester\CUIT\CUITException;

try {
    $cuit = CUIT::generar();
} catch (CUITException $e) {
    echo $e->getMessage().PHP_EOL;
}

try {
    $cuit = CUIT::generar('abcdefghijk', 'F');
} catch (CUITException $e) {
    echo 'Da error, OK';
    echo PHP_EOL;
}

try {
    $nro_doc = '11.111.111';
    $sexo = 'Masculino';
    $cuit = CUIT::generar($nro_doc, $sexo);
    echo $cuit==20111111112?'OK':'Error';
    echo PHP_EOL;
} catch (CUITException $e) {
    echo $e->getMessage().PHP_EOL;
}

try {
    $nro_doc = 24313779;
    $sexo = 'Masculino';
    $cuit = CUIT::generar($nro_doc, $sexo);
    echo $cuit.PHP_EOL;
} catch (CUITException $e) {
    echo $e->getMessage().PHP_EOL;
}

try {
    $nro_doc = 27242380;
    $sexo = 'Masculino';
    $cuit = CUIT::generar($nro_doc, $sexo);
    echo $cuit.PHP_EOL;
} catch (CUITException $e) {
    echo $e->getMessage().PHP_EOL;
}

try {
    $nro_doc = 22278229;
    $sexo = 'Femenino';
    $cuit = CUIT::generar($nro_doc, $sexo);
    echo $cuit.PHP_EOL;
} catch (CUITException $e) {
    echo $e->getMessage().PHP_EOL;
}




