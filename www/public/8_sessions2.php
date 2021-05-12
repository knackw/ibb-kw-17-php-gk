<?php

session_start();

require_once 'inc/tools.inc.php';

$username = $_SESSION['username'] ?? '';
$loggedIn = $username != '';

// Datenverarbeitung
// -----------------------------------------------------------------------------
// Ausgabe / Darstellung

$title = 'Sessions';
$headline = 'Angemeldet?';
include 'html/header.html.php';


// hier kommt der seitenindividuelle Inhalt
if ($loggedIn) {
    
    echo 'Hallo angemeldeter Benutzer: ', $username, BRNL;
    
    echo 'vertrauliche Infos', BRNL;
    
    echo '$_SESSION', BRNL;
    printData($_SESSION);
    
    echo '$_COOKIE', BRNL;
    printData($_COOKIE);
    
    
} else {
    echo 'nicht berechtigt - bitte anmelden!', BRNL;
}


include 'html/footer.html.php';
