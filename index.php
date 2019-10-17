<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /** 
        * Vytváøení objektu z tøídy Válec.php
        */
        require 'Valec.php';
        $valec = new Valec();
        /** 
        * Vypisování infa
        */ 
         echo $valec->info();
        /** 
        * Vypisování poètu vrcholù
        */
         echo 'Valec ma pocet vrcholu:'.$valec->pocetVrcholu().'<br />';
        /** 
        * Vypisování is3D
        */
         echo 'trojrozmerny'.$valec->is3D().'<br />';
        /** 
        * Vypisování objemu
        */
         echo 'Objem valce:'.$valec->objem().'<br />';
        /** 
        * Vypisování povrchu
        */
         echo 'Povrch valce:'.$valec->povrch().'<br />';
         ?>
    </body>
</html>
