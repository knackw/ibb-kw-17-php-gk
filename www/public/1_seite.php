<?php

//  Grundgerüst einer PHP-Datei
//      das öffnender PHP-Tag gehört in die ERSTE ZEILE an die ERSTE STELLE !!!
//      auf das schliessende PHP-Tag wird verzichtet !!!

//  Grundstruktur eines PHP-Projektes
//      root- / Wurzel-Verzeichnis mit PHP-Seiten
//      html-Ordner mit html-Dateien (Output)
//      inc-Ordner mit einzubindenden Dateien (seitenübergreifende Funktionalität)
//      
//      Ausgaben aus dem Programm auf die WebSeite erfolgen mit html-Include !
//      NICHT mit echo !!!
//      
//      echo kommt vor allem in der Entwicklungsphase als 'debug'-Output zum Einsatz
//


//// Konstanten-Deklaration mit dem Schlüsselwort 'const'
//const BR = '<br>';
//const NL = "\n";
//
//// Konstanten-Deklaration mit der Funktion 'define'
//define('BRNL', BR . NL);

// Dieser Block der Kontstanten-Deklaration ist in tools.inc.php gewandert
// und wird hier inkludiert!
//include 'inc/tool.inc.php';         // falls nicht: Warning, Program läuft weiter
//require 'inc/tool.inc.php';         // falls nicht: Error, Program beendet
//include_once 'inc/tool.inc.php';    // kein zweites inkludieren der gleichen Datei
require_once 'inc/tools.inc.php';

//  Constant BRNL already defined
//define('BRNL', BR . NL);


$title = 'Zweite Seite';
$headline = 'Eine zweite Überschrift';
include 'html/header.html.php';

// hier kommt der seitenindividuelle Inhalt
echo '<h2>eine zweite Seite</h2>';

// PHP-Anweisungen enden mit einem Semikolon ';'
echo 'eine Zeile';
echo 'eine zweite Zeile<br>';
echo 'noch eine Zeile<br>\n';       // ' - Zeichenkette mit NICHT interpretiertem Text
echo "eine weitere Zeile<br>\n";    // " - Zeichenkette mit interpretiertem Text
// Lösung: <br> und \n werden als Konstanten deklariert
echo 'eine letzte Zeile', BRNL;
echo 'eine aller-letzte Zeile', BRNL;


// Projekt wird als ZIP-Datei verteilt:
//      zip-File via File/Import/from Zip... einbinden
//          evtl. replace
//      Project Properties/Run Configuration/Project URL auf http://localhost/php/PHP... setzen


include 'html/footer.html.php';
