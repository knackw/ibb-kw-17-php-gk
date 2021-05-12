<?php

require_once 'inc/tools.inc.php';


function berechnen($p1, $p2, $op) {
    switch ($op) {
        case '+': return $p1 + $p2;
        case '-': return $p1 + $p2;
        case '*': return $p1 + $p2;
        case '/': return $p1 + $p2;
        default: return 0;
    }
}


// -----------------------------------------------------------------------------


$title = 'Debug';
$headline = 'Wo sind die Wanzen?';
include 'html/header.html.php';

// hier kommt der seitenindividuelle Inhalt
$eingabe1 = 10;
$eingabe2 = 3;
echo berechnen($eingabe1, $eingabe2, '+'), BRNL;
echo berechnen($eingabe1, $eingabe2, '-'), BRNL;
echo berechnen($eingabe1, $eingabe2, '*'), BRNL;
echo berechnen($eingabe1, $eingabe2, '/'), BRNL;

//phpinfo();

// Xdebug
//      Wizard: https://xdebug.org/wizard.php
//      phpinfo()-Output kopieren und in Wizard einfügen
//      Instruction beachten
//      
//      php.ini editieren
//      [XDebug]
//      zend_extension = C:\xampp\php\ext\php_xdebug-3.0.4-8.0-vs16-x86_64.dll
//      xdebug.mode=debug
//  


include 'html/footer.html.php';
