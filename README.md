# CUIT

## Este paquete valida y genera CUITs

### Validación

Se valida que el dígito verificador se corresponda con los primeros 10 dígitos del CUIT

### Generación

Dado un número de documento y, opcionalmente, el sexo, esta paquete genera un CUIT.

El CUIT generado no es necesariamente válido ya que existen documentos duplicados que podrían hacer que el CUIT generado no sea correcto.

## ¿Es "el CUIT" o "la CUIT"?

Estrictamente hablando es "la CUIT", ya que la "C" de CUIT es la primera letra de la palabra "Clave" y es un sustantivo femenino.

Coloquialmente se usa como sustantivo masculino: el CUIT o este CUIT.

## Uso

### Validación

```
require_once 'vendor/autoload.php';

use Vester\CUIT\CUIT;
use Vester\CUIT\CUITException;

$cuit = 20111111112;

try {
    $cuit_valuido = CUIT::validar($cuit);  // Devuelve true o false
    print_r($cuit_valido);
} catch (CUITException $e) {
    echo $e->getMessage();
}

```

### Generación

```
require_once 'vendor/autoload.php';

use Vester\CUIT\CUIT;
use Vester\CUIT\CUITException;

$nro_doc = 11111111;
$sexo    = 'M;

try {
    $cuit_generado = CUIT::generar($cuit, $sexo);
    print_r($cuit_generado);
} catch (CUITException $e) {
    echo $e->getMessage();
}

```

