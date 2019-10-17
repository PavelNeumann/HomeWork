<?php
require "ITeleso.php";

class Valec implements ITeleso {

    /** 
     * Zadání polomìru
     * Zadání výšky
     * Pi =3.14  
     */
    public $r = 3;
    public $v = 4;
    private $pi = 3.14;

    /** 
     * Deklarování funkce pro výpoèet a vrácení povrchu tìlesa 
     */
    public function povrch():float{
        return 2 * $this->pi * $this->r * ($this->r + $this->v);
    }
    /** 
     * Deklarování funkce pro výpoèet a vrácení objemu tìlesa 
     */
    public function objem():float{
        return $this->pi * ( $this->r * $this->r ) * $this->v;
    }
    /**  
     * Deklarování funkce jestli je objekt 3D 
     */
    public function is3D():bool{
        if ($this->r == 0 || $this->v == 0) {
            echo'Není ';        
        } else {
            echo 'Je '; 
        }
    }
    /**  
     * Deklarování funkce pro poèet vrcholù 
     */
    public function pocetVrcholu():int{
        return 0;
    }
    /**
     * Deklarování funkce info 
     */
    public function info():string{
        echo 'Jedna se o valec s vyskou:' . $this->v . ' ma polomerem podstavy:' . $this->r . '<br />';
    }
}