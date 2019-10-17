<?php
interface ITeleso {
    /** 
     * Vypoète a vrátí povrch tìlesa
     * 
     *@return float  
     */
    public function povrch(): float;
    /** 
     * Vypoète a vrátí objem tìlesa
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
     * Vrací poèet vrcholu tìlesa
     * 
     *@return int vrací 0 protože válec nemá žádné vrcholy  
     */
    public function pocetVrcholu():int;
    /** 
     * Vygeneruje øetìz informující o tìlìsu
     * 
     *@return string
     */
    public function info(): string;
}