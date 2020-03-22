<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>Simple Calculator</title>
    </head>
    <body>
        <form method="post">
            <table>
                <h1>Simple IP Calculator</h1>
                <tr><td>IP address</td><td><input type="text" placeholder="xxx.xxx.xxx.xxx" name="IP_value" id="" maxlength="15" /></td>
                    <td>/</td><td><input name="prefix_value" id=""maxlenght="2" placeholder="xx"/></td></tr>
                <tr><td><input type="submit" name="submit" value="submit" /></td></tr>
                <?php
                If (isset($_POST[submit])) {
                    $IP_value = $_POST['IP_value'];
                    $prefix_value = $_POST['prefix_value'];
                    $values = explode(".", $IP_value);
                    if ($values[0] > "255" or $values[1] > "255" or $values[2] > "255" or $values[3] > "255") {
                        echo 'Octet range is 0 - 255';
                    } else {
                        if ($prefix_value < "2" or $prefix_value > "32") {
                            echo "wrong prefix(2-32)";
                        } else {
                            if ($prefix_value == "32" or $prefix_value == "31") {
                                echo "These prefixes are useless!";
                            } else {
                                /* výpočet bitů, adres, a hostů */
                                $bits = "32" - $prefix_value;
                                $adress = "2" ** $bits;
                                $hosts = $adress - "2";
                                /* výpočet masky */
                                $last_octet = "256" - $adress;
                                $mask = array("255", "255", "255", $last_octet);
                                $mask_bin = array(decbin($mask[0]), decbin($mask[1]), decbin($mask[2]), decbin($mask[3]));
                                /* výpočet Networku */
                                $y = "8" - $bits;
                                $x = substr_replace (str_pad( decbin($values[3]),8,0,STR_PAD_LEFT), "00000000", $y);
                                $network_octet = bindec(substr($x, 0, 8));
                                /* první a poslední host */
                                $first = $network_octet + 1;
                                $last = $network_octet + $hosts;
                                /* Broadcast */
                                $broadcast_octet =  $last + 1;
                                echo "Your Resoults:";
                                echo "<br>";
                                echo "Yout IP:",$values[0], ".", $values[1], ".", $values[2], ".", $values[3],"/",$prefix_value;
                                echo "<br>";
                                echo "IP in binar:", str_pad(decbin($values[0]),8,0,STR_PAD_LEFT), ".", str_pad(decbin($values[1]),8,0,STR_PAD_LEFT), ".", str_pad(decbin($values[2]),8,0,STR_PAD_LEFT), ".", str_pad(decbin($values[3]),8,0,STR_PAD_LEFT);
                                echo "<br>";
                                echo "Mask:", "255", ".", "255", ".", "255", ".", $last_octet;
                                echo "<br>";
                                echo "Mask in binar:", decbin($mask[0]), ".", decbin($mask[1]), ".", decbin($mask[2]), ".", decbin($mask[3]);
                                echo "<br>";
                                echo "First:", $values[0], ".", $values[1], ".", $values[2], ".", $first;
                                echo "<br>";
                                echo "Last:", $values[0], ".", $values[1], ".", $values[2], ".", $last;
                                echo "<br>";
                                echo "Broadcast:", $values[0], ".", $values[1], ".", $values[2], ".", $broadcast_octet;
                                echo "<br>";
                                echo "Network:", $values[0], ".", $values[1], ".", $values[2], ".", $network_octet;
                                echo "<br>";
                                echo "Hosts:", $hosts;
                                echo"<br>";
                                echo"Count of adress in network:", $adress;
                            }
                        }
                    }
                } else {
                    echo "Insert your IP and prefix";
                }
                ?>    
            </table>

        </form>
    </body>
</html>
