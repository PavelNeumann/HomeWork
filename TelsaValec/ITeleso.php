<?php
interface ITeleso {
    /** 
     * Vypočte a vrátí povrch tělesa
     * 
     *@return float  
     */
    public function povrch(): float;
    /** 
     * Vypočte a vrátí objem tělesa
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
     * Vrací počet vrcholu tělesa
     * 
     *@return int vrací 0 protože válec nemá žádné vrcholy  
     */
    public function pocetVrcholu():int;
    /** 
     * Vygeneruje řetěz informující o tělesu
     * 
     *@return string
     */
    public function info(): string;
}
