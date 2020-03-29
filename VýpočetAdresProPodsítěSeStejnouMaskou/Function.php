<?php

function table($networks)
{
    echo "<table border=\"1\">\n";

    foreach ($networks as $values) {
        echo "<tr>\n";

        echo "<th>\n";
        echo "</th>\n";

        echo "<th>\n";
        echo "Decimal";
        echo "</th>\n";

        echo "<th>\n";
        echo "Binnar";
        echo "</th>\n";

        echo "</tr>\n";


        echo "<tr>\n";

        echo "<th>\n";
        echo "Network";
        echo "</th>\n";

        echo "<th>\n";
        $values["NIP"] = explode(".", $values["NIP"]);
        foreach ($values["NIP"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo bindec($value);
        }
        echo "</th>\n";
        echo "<th>\n";
        foreach ($values["NIP"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo $value;
        }
        echo "</th>\n";

        echo "</tr>\n";

        echo "<tr>\n";

        echo "<tr>\n";

        echo "<th>\n";
        echo "Mask";
        echo "</th>\n";

        echo "<th>\n";
        echo $values["DecMask"];
        echo "</th>\n";
        echo "<th>\n";
        $values["DecMask"] = explode(".", $values["DecMask"]);
        foreach ($values["DecMask"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo str_pad(decbin($value), 8, 0, STR_PAD_LEFT);
        }
        echo "</th>\n";

        echo "</tr>\n";

        echo "<th>\n";
        echo "First";
        echo "</th>\n";

        echo "<th>\n";
        $values["F"] = explode(".", $values["F"]);
        foreach ($values["F"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo bindec($value);
        }
        echo "</th>\n";
        echo "<th>\n";
        foreach ($values["F"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo $value;
        }
        echo "</th>\n";

        echo "</tr>\n";

        echo "<tr>\n";

        echo "<th>\n";
        echo "Last";
        echo "</th>\n";

        echo "<th>\n";
        $values["L"] = explode(".", $values["L"]);
        foreach ($values["L"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo bindec($value);
        }
        echo "</th>\n";
        echo "<th>\n";
        foreach ($values["L"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo $value;
        }
        echo "</th>\n";

        echo "</tr>\n";

        echo "<tr>\n";

        echo "<th>\n";
        echo "Broadcast";
        echo "</th>\n";

        echo "<th>\n";
        $values["B"] = explode(".", $values["B"]);
        foreach ($values["B"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo bindec($value);
        }
        echo "</th>\n";
        echo "<th>\n";
        foreach ($values["B"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo $value;
        }
        echo "</th>\n";

        echo "</tr>\n";

        echo "<tr>\n";

        echo "<th>\n";
        echo "Hosts";
        echo "</th>\n";

        echo "<th>\n";
        echo $values["Host"];
        echo "</th>\n";
        echo "<th>\n";

        echo "</tr>\n";
    }

    echo "</table>\n";
}


function get_table($networkIP, $IPmask)
{
    //mask calculator
    $IPmask2 = $IPmask;
    $decmask = "";
    $i = 0;
    while ($IPmask2 / 8 > 1. or $IPmask2 / 8 == 1) {
        $IPmask2 -= 8;
        if ($i != 0) {
            $decmask .= ".";
        }
        $decmask .= "255";
        $i++;
    }
    if ($IPmask2 == 0) {
        while ($i != 4) {
            if ($i != 0) {
                $decmask .= ".";
            }
            $decmask .= "0";
            $i++;
        }
    } else {
        $k = 0;
        $imask = "";
        while ($IPmask2 != 0) {
            $imask .= "1";
            $IPmask2--;
        }
        while (strlen($imask) != 8) {
            $imask .= "0";
        }
        if ($i != 0) {
            $decmask .= ".";
        }
        $decmask .= bindec($imask);
        $i++;
        while ($i != 4) {
            if ($i != 0) {
                $decmask .= ".";
            }
            $decmask .= "0";
            $i++;
        }
    }

    //network
    $IPNoDots = "";
    $networkIP = explode(".", $networkIP);
    foreach ($networkIP as $value) {
        $IPNoDots .= str_pad(decbin($value), 8, 0, STR_PAD_LEFT);
    }

    //network
    $i = 0;
    $networkIP = "";
    while ($i != 32) {
        if ($i != 0 and $i % 8 == 0) {
            $networkIP .= ".";
        }
        if ($i >= $IPmask) {
            $networkIP .= "0";
        } else {
            $networkIP .= $IPNoDots[$i];
        }
        $i++;
    }

    //broadcast
    $broadcast = "";
    $i = 0;
    while ($i != 32) {
        if ($i != 0 and $i % 8 == 0) {
            $broadcast .= ".";
        }
        if ($i >= $IPmask) {
            $broadcast .= "1";
        } else {
            $broadcast .= $IPNoDots[$i];
        }
        $i++;
    }

    //first
    $e_broadcast = explode(".", $broadcast);
    $e_network = explode(".", $networkIP);
    $first = $e_network;
    $first[3] = str_pad($first[3] + decbin(1), 8, 0, STR_PAD_LEFT);
    $f = "";
    foreach ($first as $key => $value) {
        if ($key != 0) {
            $f .= ".";
        }
        $f .= $value;
    }
    $first = $f;


    //last
    $e_broadcast = explode(".", $broadcast);
    $last = $e_broadcast;
    $last[3] = str_pad($last[3] - decbin(1), 8, 0, STR_PAD_LEFT);
    $l = "";
    foreach ($last as $key => $value) {
        if ($key != 0) {
            $l .= ".";
        }
        $l .= $value;
    }
    $last = $l;

    $networks[] = array(
        "NIP" => $networkIP,
        "F" => $first,
        "L" => $last,
        "B" => $broadcast,
        "DecMask" => $decmask,
        "Host" => (2 ** (32 - $IPmask)) - 2
    );

    return $networks;
}

function get_network($IP, $IPmask)
{
    $IPNoDots = "";
    $IP = explode(".", $IP);
    foreach ($IP as $value) {
        $IPNoDots .= str_pad(decbin($value), 8, 0, STR_PAD_LEFT);
    }

    //network
    $i = 0;
    $networkIP = "";
    while ($i != 32) {
        if ($i != 0 and $i % 8 == 0) {
            $networkIP .= ".";
        }
        if ($i >= $IPmask) {
            $networkIP .= "0";
        } else {
            $networkIP .= $IPNoDots[$i];
        }
        $i++;
    }
    return $networkIP;
}

function ip_to_dec($IP)
{
    $dec_ip = "";
    $IP = explode(".", $IP);
    foreach ($IP as $key => $value) {
        if ($key != 0) {
            $dec_ip .= ".";
        }
        $dec_ip .= bindec($value);
    }
    return $dec_ip;
}

function ip_to_array($IP)
{
    $IP = explode(".", $IP);
    return $IP;
}

function ip_to_string($IP)
{
    $string_ip = "";
    foreach ($IP as $key => $value) {
        if ($key != 0) {
            $string_ip .= ".";
        }
        $string_ip .= $value;
    }
    return $string_ip;
}
