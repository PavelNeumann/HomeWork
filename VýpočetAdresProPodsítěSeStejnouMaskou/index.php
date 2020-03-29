<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subnet Calculator</title>
</head>

<body>
    <form method="post">
            <table>
                <h1>Subnet Calculator</h1>
                <tr><td>IP address</td><td><input type="text" placeholder="xxx.xxx.xxx.xxx" name="IP_value" id="" maxlength="15" /></td>
                    <td>/</td><td><input name="prefix_value" id=""maxlenght="2" placeholder="xx"/></td></tr>
                <tr><td>Number of Subnets</td><td><input name="subnet" id=""maxlenght="2" placeholder="xx"/></td></tr>
                <tr><td><input type="submit" name="submit" value="submit" /></td></tr>
    <?php
    error_reporting(0);
    include "Function.php";
    ini_set('max_execution_time', 0);

    $networks = array();

    if (isset($_POST[submit])) {
        $networkIP = $_POST["IP_value"];
        $IPmask = $_POST["prefix_value"];
        $subnet = $_POST["subnet"];
    } else {
      
    }
    if ($subnet > 0) {
        if ($subnet == 1) {
            table(get_table($networkIP, $IPmask));
        } else {
            $i = 1;
            while ((2 ** $i) < $subnet) {
                $i++;
            }
            $alt_mask = $IPmask + $i;
            $pc = 2 ** (32 - $alt_mask) + 1;
            if ($i + $IPmask < 31 and $pc > 3) {
                $k = 0;
                while ($k != $subnet) {
                    $networkIP = get_network($networkIP, $alt_mask);
                    $networkIP = ip_to_dec($networkIP);
                    table(get_table($networkIP, $alt_mask));
                    $networkIP = ip_to_array($networkIP);
                    $networkIP[3] += $pc;
                    $networkIP = ip_to_string($networkIP);
                    echo "<br><br>";
                    $k++;
                }
            } else {
                echo "Bad IP";
            }
        }
    } else {
        echo "Instert IP, prefix and number of sub domains";
    }

    ?>

</body>

</html>