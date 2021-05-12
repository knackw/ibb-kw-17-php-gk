<?php

require_once 'inc/tools.inc.php';

// 1. Versuch: Formular-Elemente mit echo ausgeben (NICHT ZU EMPFEHLEN)
//echo '<form>';
//echo '<input type="text"><br>';
//echo '<input type="text"><br>';
//echo '<input type="submit"><br>';
//echo '</form>';

// 2. Versuch: php-kontext verlassen und Formular-Elemente direkt ausgeben (NICHT ZU EMPFEHLEN)
// ? >
//<form>
//<input type="text"><br>
//<input type="text"><br>
//<input type="submit"><br>
//</form>
//<?php       // php-kontext wieder betreten

// 3. Versuch: Formular-Elemente in separate html-Datei - include - EMPFEHLUNG !!!
//include 'html/formular.html.php';


// Wie kommen die (eingegebenen) Daten ins PHP-Programm?
// 
//  1.
//      Standard: an die URL, die das Formular anzeigt
//      ODER:
//          <form action="url" ... >
//          
//  2.
//      über das http-Protokoll
//      die Namen der Formular-Elemente sind die Schlüssel zum Erhalt der Daten
//      
//      Zwei Methoden zum Transport der Daten:
//      GET - Standard
//          als URL-Parameter
//          im PHP-Programm über die Variable $_GET abrufbar
//          unsicher, begrenzter Platz in der URL - 1024-2048 Zeichen
//          
//      POST - <form method="post" ... >
//          im http-header
//          im PHP-Programm über die Variable $_POST abrufbar
//          unbegrenzter Platz im http-header
//

//echo $_GET['vorname'], BRNL;
//echo $_GET['nachname'], BRNL;

$username = '';
$message = '';

if (isSet($_POST['login'])) {
    
    // Der Koaleszens-Operator sorgt bei NICHT vorhandene Formular-Daten für eine 
    // default-Zuweiesung an die Variablen
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Debug-Ausgabe der ankommenden Formular-Daten
//    echo $username, BRNL;
//    echo $password, BRNL;
    
    // aufwändige Überprüfung, ob username und password korrekt
    if ($username == 'willi' and $password == 'geheim') {
        // korrekte Anmeldung
//        $message = 'Herzlich Willkommen ' . $username;
        
        // ALTERNATIV: Aufruf einer weiteren PHP-Seite
        // header() MUSS VOR jeder anderen Ausgabe (echo, html-include, ...) aufgerufen werden 
        headerLocation('4_angemeldet.php');
        
    } else {
        // ungültige Anmeldung
        $message = 'login failed!';
        
    }
    
}

// Bis hier: Datenauswertung!
// -----------------------------------------------------------------------------
// Ab hier: Darstellung!

$title = 'Eingabe';
$headline = 'Ein html-Formular';
include 'html/header.html.php';


// hier kommt der seitenindividuelle Inhalt
include 'html/formular.html.php';


include 'html/footer.html.php';
