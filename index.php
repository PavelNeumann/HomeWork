<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /** 
        * Vytv��en� objektu z t��dy V�lec.php
        */
        require 'Valec.php';
        $valec = new Valec();
        /** 
        * Vypisov�n� infa
        */ 
         echo $valec->info();
        /** 
        * Vypisov�n� po�tu vrchol�
        */
         echo 'Valec ma pocet vrcholu:'.$valec->pocetVrcholu().'<br />';
        /** 
        * Vypisov�n� is3D
        */
         echo 'trojrozmerny'.$valec->is3D().'<br />';
        /** 
        * Vypisov�n� objemu
        */
         echo 'Objem valce:'.$valec->objem().'<br />';
        /** 
        * Vypisov�n� povrchu
        */
         echo 'Povrch valce:'.$valec->povrch().'<br />';
         ?>
    </body>
</html>
