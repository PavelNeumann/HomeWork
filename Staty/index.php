<?php

require "Template.php";
$handle = fopen("States.xml", "r");
$text = "";
while (($line = fgets($handle)) !== false) {
    $text = $text . $line;
}
$data = array("title" => "States","h1" =>"States" , "menu" => "");
$xml = new SimpleXMLElement($text);
foreach ($xml->states->state as $value) {
    $data["menu"] .= "<a href=\"index.php?search=" . $value->name->__toString() . "\">" . $value->name->__toString() . "</a><br>";
    if (isset($_GET["search"]) and $_GET["search"] == $value->name->__toString()) {
        $data["state"] = $value->name->__toString() . "<br>" . $value->capital->__toString() . "<br>" . $value->population->__toString();
    }
}
if (!isset($data["state"])) {
    $data["state"] = $xml->states->state[0]->name->__toString() . "<br>" . $xml->states->state[0]->capital->__toString() . "<br>" . $xml->states->state[0]->population->__toString();
}
$test = new Template();
$test->setData($data);
$test->setFileName("page.html");
$test->render();
