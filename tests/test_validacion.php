<?php

require_once '../src/CUIT.php';
require_once '../src/CUITException.php';

use Vester\CUIT\CUIT;
use Vester\CUIT\CUITException;

try {
    CUIT::validar();
} catch (CUITException $e) {
    echo $e->getMessage().PHP_EOL;
}

try {
    CUIT::validar('1234');
} catch (CUITException $e) {
    echo $e->getMessage().PHP_EOL;
}

try {
    CUIT::validar('abcdefghijk');
} catch (CUITException $e) {
    echo $e->getMessage().PHP_EOL;
}

try {
    $cuit = '20111111111';
    echo strlen($cuit).PHP_EOL;
    $cuit_valido = CUIT::validar($cuit);
    var_dump($cuit_valido);
} catch (CUITException $e) {
    echo $e->getMessage().PHP_EOL;
}




