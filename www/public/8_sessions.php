<?php

// initiiert eine neue Sitzung
//      ODER
// nimmt eine vorhandene Sitzung wieder auf (Datei mit dem Namen der PHP-Session-ID wird in $_SESSION gelesen)
session_start();
// der Aufruf von session_start() muss VOR jeder anderen Ausgabe erfolgen (wie header())
//      echo, html-include, irgendein Zeichen vor <?php, ...

// durch session_start() wird die superglobale Variable $_SESSION bereitgestellt

require_once 'inc/tools.inc.php';
require_once 'inc/user.inc.php';

// Warum Sessions (Sitzungen)?
// 
//      1. weil die Übertragung der Daten zwischen Client (Browser) und
//          Server (Apache)  - und zurück - über das http-Protokoll erfolgt.
//          
//      2. weil das http-Protokoll zustand- / verbindungs-los arbeitet (stateless)
//      
//      http/s
//          eine Anfrage vom Client an den Server ist ein REQUEST
//          jedes REQUEST wird vom Server mit einem RESPONSE beantwortet
//          danach vergisst der Server den kompletten Vorgang (REQUEST/RESPONSE)
//          
//      http unterstützt keine Sessions - PHP schon!
//

// Realisierung einer Session durch PHP gelingt mittels Cookies!


$message = '';
$username = $_SESSION['username'] ?? '';
$loggedIn = $username != '';

if (isSet($_POST['login'])) {
    
    // Der Koaleszens-Operator sorgt bei NICHT vorhandene Formular-Daten für eine 
    // default-Zuweiesung an die Variablen
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // aufwändige Überprüfung, ob username und password korrekt
    $user = checkLoginUser($username, $password);
    if ($user) {
        // korrekte Anmeldung
        $message = 'Herzlich Willkommen ' . $username;
        $_SESSION['username'] = $username;
        $_SESSION['user'] = $user;
        $loggedIn = true;
        
        // Einen Cookie erzeugen
        //        Name des Cookie
        //        |           Wert des Cookie
        //        |           |          Gültigkeitsdauer (in Sekunden seit dem 1.1.1970)
        setCookie('username', $username, time() + 60 * 60);
        
    } else {
        // ungültige Anmeldung
        $message = 'login failed!';
        $_SESSION['username'] = '';
        $loggedIn = false;
        
    }
    
}

if (isSet($_POST['logout'])) {
    $loggedIn = false;
    $username = '';         // optional - geschmackssache
    
    // Zerstört (beendet) die aktuelle Sitzung, und beim nächsten REQUEST wird 
    // wieder eine NEUE initiiert.
    // Löscht KEINE Daten aus der $_SESSION
    session_destroy();
    
    // bitte nicht so: damit würde eine PHP-System-Variable entfernt !
//    unSet($_SESSION); 
    // besser so:
    $_SESSION = [];
    
}

if (isSet($_POST['clear'])) {
    // Cookie soll gelöscht werden
    setCookie('username', '', time() - 1000);
    unset($_COOKIE['username']);
}

// Datenverarbeitung
// -----------------------------------------------------------------------------
// Ausgabe / Darstellung

$title = 'Sessions';
$headline = 'Sitzungs-Steuerung';
include 'html/header.html.php';


// hier kommt der seitenindividuelle Inhalt
if ($loggedIn) {
    $fullname = $_SESSION['user']['vorname'] . ' ' . $_SESSION['user']['nachname'];
    include 'html/logout.html.php';
} else {
    if ($username == '') {
        $username = $_COOKIE['username'] ?? '';
    }
    include 'html/login.html.php';
}


include 'html/footer.html.php';

// zum Ende des PHP-Programms wird der Inhalt der $_SESSION-Variable unter dem Namen
// der PHP-Session-ID als Datei gespeichert!
