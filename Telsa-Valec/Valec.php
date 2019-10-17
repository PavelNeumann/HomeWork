<?php
require "ITeleso.php";

class Valec implements ITeleso {

    /** 
     * Zad�n� polom�ru
     * Zad�n� v��ky
     * Pi =3.14  
     */
    public $r = 3;
    public $v = 4;
    private $pi = 3.14;

    /** 
     * Deklarov�n� funkce pro v�po�et a vr�cen� povrchu t�lesa 
     */
    public function povrch():float{
        return 2 * $this->pi * $this->r * ($this->r + $this->v);
    }
    /** 
     * Deklarov�n� funkce pro v�po�et a vr�cen� objemu t�lesa 
     */
    public function objem():float{
        return $this->pi * ( $this->r * $this->r ) * $this->v;
    }
    /**  
     * Deklarov�n� funkce jestli je objekt 3D 
     */
    public function is3D():bool{
        if ($this->r == 0 || $this->v == 0) {
            echo'Nen� ';        
        } else {
            echo 'Je '; 
        }
    }
    /**  
     * Deklarov�n� funkce pro po�et vrchol� 
     */
    public function pocetVrcholu():int{
        return 0;
    }
    /**
     * Deklarov�n� funkce info 
     */
    public function info():string{
        echo 'Jedna se o valec s vyskou:' . $this->v . ' ma polomerem podstavy:' . $this->r . '<br />';
    }
}