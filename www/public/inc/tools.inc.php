<?php

// wenn alle - oder zumindest die meisten - PHP-Programme unter Sitzungs-Kontrolle laufen:
// session_start();

// Konstanten-Deklaration mit dem Schlüsselwort 'const'
const BR = '<br>';
const NL = "\n";

// Konstanten-Deklaration mit der Funktion 'define'
define('BRNL', BR . NL);


function printData($data, $varDump=false) {
    echo '<pre>';
    if ($varDump) {
        var_dump($data);
    } else {
        print_r($data);
    }
    echo '</pre>';
}

function headerLocation($url) {
    header("Location: $url");
    exit;
}

