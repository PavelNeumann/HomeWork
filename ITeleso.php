<?php
interface ITeleso {
    /** 
     * Vypocte a vrátí povrch telesa
     * 
     *@return float  
     */
    public function povrch(): float;
    /** 
     * Vypocte a vrátí objem telesa
     * 
     *@return float  
     */
    public function objem(): float;
    /** 
     * Testuje jestli je objekt 3D nebo ne 
     * 
     *@return boolean 
     */
    public function is3D(): bool;
    /** 
     * Vrací pocet vrcholu telesa
     * 
     *@return int vrací 0 protože válec nemá žádné vrcholy  
     */
    public function pocetVrcholu():int;
    /** 
     * Vygeneruje retezec informující o telesu
     * 
     *@return string
     */
    public function info(): string;
}
