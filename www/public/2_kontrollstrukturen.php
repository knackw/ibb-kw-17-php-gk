<?php

require_once 'inc/tools.inc.php';

$title = 'Kontrollstrukturen';
$headline = 'Entweder, oder und wenn JA, wie viele?';
include 'html/header.html.php';

// hier kommt der seitenindividuelle Inhalt

// 
// Kontrollstrukturen
//  Ablaufsteuerung / flow control
// 


// Bedingungen (Voraussetzung) / condition
//      Ausdruck vom Typ boolean (true/false)
//          Vergleich           $a == $b
//          Variable            $bool
//          Funktion            die einen boolschen Wert liefert: isSet()
//      in PHP gilt:
//          JEDER Ausdruck kann als boolean (Bedingung) interpretiert werden

// Was ist in PHP true/false?
//                      false       true
//      integer         0           !=0
//      double          0.0         !=0.0
//      string          ''          !=''
//      boolean         false       true
//      reference       null        !=null
//  

// 1. Verzweigungen

$uhrzeit = 22;
echo "es ist $uhrzeit Uhr", BRNL;

// bedingte Anweisung
//      if (bedingung)
//          anweisung

if ($uhrzeit < 10) {
    echo 'das ist aber früh', BRNL;
    echo 'das ist aber früh', BRNL;
}


// einfache Verzweigung
//      if (bedingung)
//          anweisung
//      else
//          anweisung

if ($uhrzeit < 12) {
    echo 'Guten Morgen!', BRNL;
} else {
    echo 'Guten Tag!', BRNL;
}


// mehrfache Verzweigung
//      if (bedingung)
//          anweisung
//      elseif (bedinung)
//          anweisung
//      ...
//      else
//          anweisung

// mit einer Wertebereichsabfrage
if ($uhrzeit < 12) {                    // 0-11
    echo 'Guten Morgen', BRNL;
//} elseif ($uhrzeit > 11 and $uhrzeit < 17) {              // 12-16
//    echo 'Guten Tag', BRNL;
} elseif ($uhrzeit < 17) {              // 12-16
    echo 'Guten Tag', BRNL;
} elseif ($uhrzeit < 22) {              // 17-21
    echo 'Guten Abend', BRNL;
} else {                                // 22-23
    echo 'Gute Nacht', BRNL;
}


// mit einer exakten Wert-Abfrage
$ampel = 'blau';
if ($ampel == 'rot') {
    echo 'anhalten', BRNL;
} elseif ($ampel == 'gelb') {
    echo 'achtung', BRNL;
} elseif ($ampel == 'grün') {
    echo 'losfahren', BRNL;
} else {
    echo 'ampel defekt', BRNL;
}


// mehrfachverzweigung mit switch
//      switch (ausdruck) {
//          case label:
//              anweisung
//          ...
//          default:
//              anweisung
//      }

switch ($ampel) {
    case 'rot-gelb':
        echo 'gleich geht\'s los', BRNL;
        
    case 'grün':
        echo 'losfahren', BRNL;
        break;
    case 'gelb':
        echo 'schon mal bremsen', BRNL;
//        break;                        // fall-through
    case 'rot':
        echo 'anhalten', BRNL;
        break;
    default:
        echo 'ampel defekt', BRNL;
        break;
}


switch ($uhrzeit) {
    case 8:
    case 9:
    case 10:
        echo 'Frühstück', BRNL;
        break;
    default:
        echo 'leider verpasst', BRNL;
        break;
}  


// Verzweigungen
//      if
//      if else
//      if elseif ... else
//      switch case ... default
//      try catch finally               => AK


// goto - BÖSE !!! => Spaghetti-Code


// 2. Schleifen

// kopf-gesteuerte Schleife
//      while (bedingung)                   if (bedingung)
//          anweisung                           anweisung

while ($uhrzeit < 15) {
    echo "while: es ist $uhrzeit Uhr", BRNL;
    $uhrzeit++;
}


// fuss-gesteuerte Schleife
//      do 
//          anweisung
//      while (bedingung);

do {
    echo "do: es ist $uhrzeit Uhr", BRNL;
    $uhrzeit++;
} while ($uhrzeit < 20);

// die fuss-gesteuerte Schleife wird zumindest EINMAL ausgeführt

// zähler-gesteuerte Schleife
//      for (<1>;<2>;<3>)
//          anweisung

//   <1> - PHP Anweisung (Initialisierung der Zähler-Variablen) - VOR DEM ERSTEN Schleifendurchlauf
//   |          <2> - Bedingung - VOR JEDEM Schleifendurchlauf
//   |          |           <3> - PHP-Anweisung (In-/Dekrement) - NACH JEDEM Schleifendurchlauf
for ($zeit = 0; $zeit < 24; $zeit++) {
    
    if ($zeit < 10) {
        // noch zu früh
        continue;                   // beendet den AKTUELLEN Schleifendurchlauf
    }                               // als nächstes: <3>
    
    echo "for: es ist $zeit Uhr", BRNL;
    
    if ($zeit == 20) {
        // Feierabend
        break;                      // beendet die Schleife KOMPLETT
    }                               // als nächstes: hinter der Schleife

/*<3>*/    
}


// endlos Schleife
//for (;;) {          // leere Bedingung - wird als true interpretiert
//}

//while (true) {
//}

// Maximum execution time of 30 seconds exceeded


// Schleifen
//  while
//  do while
//  for
//  foreach         => kommt noch


echo 'unbedingte Programmausführung', BRNL;


include 'html/footer.html.php';
