<?php

namespace Vester\CUIT;

class CUIT
{
    static protected
        $multiplicadores = [5, 4, 3, 2, 7, 6, 5, 4, 3, 2];

    static public function validar($cuit=null)
    {
        if ($cuit==null):
            throw new CUITException('El $cuit no puede ser nulo');
        endif;

        $cuit_numerico = preg_replace('/[^\d]/', '', $cuit);
        if (strlen($cuit_numerico)!=11):
            throw new CUITException('El $cuit debe contener 11 dígitos; los guiones o espacios se ignoran');
        endif;

        $acumulador = 0;
        for ($i=0; $i<10; $i++):
            $acumulador += substr($cuit_numerico, $i, 1) * self::$multiplicadores[$i];
        endfor;

        $verificador_calculado = 11 - $acumulador%11;
        if ($verificador_calculado==11):
            $verificador_calculado = 0;
        elseif ($verificador_calculado==10):
            $verificador_calculado = 9;
        endif;

        $digito_verificador = substr($cuit_numerico, -1);

        return $digito_verificador==$verificador_calculado;
    }

    static public function generar($dni=null, $sexo=null)
    {
        if ($dni==null||$sexo==null):
            throw new CUITException('$dni y $sexo deben estar populados');
        endif;
        $nro_doc = preg_replace('/[^\d]/', '', $dni);
        if (strlen($nro_doc)<6):
            throw new CUITException('El $nro_doc es muy corto.');
        endif;
        $sexo = strtoupper(substr($sexo, 0, 1));

        if ($sexo=='M'):
            $prefijo = 20;
        elseif ($sexo=='F'):
            $prefijo = 27;
        else:
            throw new CUITException('El $sexo debe comenzar con M o F');
        endif;

        $nro_doc = sprintf('%08d', $nro_doc);
        $numeros = $prefijo.$nro_doc;

        $acumulador = 0;
        for ($i=0; $i<10; $i++):
            $acumulador += substr($numeros, $i, 1) * self::$multiplicadores[$i];
        endfor;
        $resto = $acumulador%11;
        if ($resto==0):
            $dv = 0;
        elseif ($resto==1):
            if ($sexo=='M'):
                $dv = 9;
            else:
                $dv = 4;
            endif;
            $prefijo = 23;
        else:
            $dv = 11 - $resto;
        endif;

        return $prefijo.$nro_doc.$dv;
    }
}
