<?php
interface ITeleso {
    /** 
     * Vypo�te a vr�t� povrch t�lesa
     * 
     *@return float  
     */
    public function povrch(): float;
    /** 
     * Vypo�te a vr�t� objem t�lesa
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
     * Vrac� po�et vrcholu t�lesa
     * 
     *@return int vrac� 0 proto�e v�lec nem� ��dn� vrcholy  
     */
    public function pocetVrcholu():int;
    /** 
     * Vygeneruje �et�z informuj�c� o t�l�su
     * 
     *@return string
     */
    public function info(): string;
}