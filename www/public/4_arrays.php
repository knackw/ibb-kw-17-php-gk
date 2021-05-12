<?php

require_once 'inc/tools.inc.php';

$title = 'Arrays';
$headline = 'Arrays oder Felder';
include 'html/header.html.php';

// hier kommt der seitenindividuelle Inhalt

$variable = 42;
echo $variable, BRNL;

$variable = 99;
echo $variable, BRNL;

// eine (skalare) Variable kann zu jedem Zeitpunkt nur EINEN Wert speichern


//$umsatz = 123;
//$umsatz = 121;
//$umsatz = 135;

$umsatz01 = 123;
$umsatz02 = 121;
$umsatz03 = 135;
// ...

$jahresUmsatz = $umsatz01 + $umsatz02 + $umsatz03 /* ... */;
echo $umsatz01, BRNL;
echo $umsatz02, BRNL;
echo $umsatz03, BRNL;
echo "Der Jahresumsatz betgrägt $jahresUmsatz", BRNL;


// Arrays können MEHR als einen Wert zur gleichen Zeit speichern


// 
// numreisch indizierte Arrays
// 

$umsatz = array();      // Array-Erzeugung mit der array()-Funktion
$umsatz = [];           // Array-Erzeugung mit der []-Syntax

$umsatz = array(123, 121, 135);
$umsatz = [123, 121, 135];

echo 'Das Array umsatz hat ', count($umsatz), ' Elemente', BRNL;
echo $umsatz[0], BRNL;      // Array-Index beginnt bei 0
echo $umsatz[1], BRNL;
echo $umsatz[2], BRNL;

$jahresUmsatz = 0;
for ($index = 0; $index < count($umsatz); $index++) {
    echo $index, '. ', $umsatz[$index], BRNL;
    $jahresUmsatz += $umsatz[$index];
}
echo "Der Jahresumsatz betgrägt $jahresUmsatz", BRNL;


// Wie kommen neue Elemente ins Array?
$umsatz[] = 158;
$umsatz[] = 162;
$umsatz[] = 199;

echo 'Das Array umsatz hat ', count($umsatz), ' Elemente', BRNL;
//echo $umsatz, BRNL;

printData($umsatz);
//echo '<pre>';
//print_r($umsatz);
//echo '</pre>';

//echo '<pre>';
//var_dump($umsatz);
//echo '</pre>';


// Wie kann ein Element im Array verändert werden?

$umsatz[1] = 99;

printData($umsatz);
//echo '<pre>';
//print_r($umsatz);
//echo '</pre>';


// Wie kann ein Wert im Array gelöscht werden?

//$umsatz[3] = 0;       // SO NICHT !!
unSet($umsatz[3]);

printData($umsatz);
//echo '<pre>';
//print_r($umsatz);
//echo '</pre>';

// Bitte NIE mit der for-Schleife über Arrays iterieren
for ($index = 0; $index < count($umsatz); $index++) {
    echo $index, '. ', $umsatz[$index], BRNL;
}

// Besser: foreach-Schleife
//      foreach (array as [index =>] wert)
//          anweisung

foreach ($umsatz as $index => $monatsUmsatz) {
    echo $index, '. ', $monatsUmsatz, BRNL;
}

$umsatz[] = 250;

printData($umsatz);
//echo '<pre>';
//print_r($umsatz);
//echo '</pre>';


// 
// assoziative Arrays
// 

$ampel = [
    'rot' => 'stehen bleiben',
    'gelb' => 'achtung',
    'grün' => 'freie fahrt',
];

printData($ampel);

echo $ampel['gelb'], BRNL;

// Verändern
$ampel['gelb'] = 'VORSICHT!!!';

// hinzufügen
$ampel['rot-gelb'] = 'gleich gehts los';

$ampel[] = 'und jetzt?';
$ampel['blau'] = 'Amepl defekt';
$ampel[] = 'und jetzt?';
$ampel[20] = 'und jetzt?';
$ampel[] = 'und jetzt?';
$ampel[10] = 'und jetzt?';
$ampel[] = 'und jetzt?';
$ampel[] = 4711;
$ampel[] = 1.23;


printData($ampel);
printData($ampel, true);


// 
// PHP kennt auch mehrdimensionale Arrays
// 

$wochentag = [
    'Montag',           // [0]
    'Dienstag',
    'Mittwoch',
    'Donnerstag',
    'Freitag',
    'Samstag',
    'Sonntag',
];

$weekday = [
    'Monday',           // [0]
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday',
    'Sunday',
];

// mehrdimensionale Arrays sind: Arrays von Arrays
$alleTage = [
    $wochentag,
    $weekday,
];

echo $alleTage[1][3], BRNL;

$alleTage = [
    [                   // [0]
        'Montag',           // [0]
        'Dienstag',
        'Mittwoch',
        'Donnerstag',
        'Freitag',
        'Samstag',
        'Sonntag',
        ],
    [                   // [1]
        'Monday',           // [0]
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday',
    ]
];

echo $alleTage[0][3], BRNL;


$alleTage = [
    'de' => $wochentag,
    'en' => $weekday,
    'fr' => 'noch nicht implementiert',
];

printData($alleTage);

$language = 'en';
$wocht = 4;

echo $alleTage[$language][$wocht], BRNL;


// 
// ein paar Array-Funktionen
// 


printData($wochentag);


// sort() sortiert das Array AUFsteigend - nach Wert
// die Indizierung bleibt in der ursprünglichen Reihenfolge
sort($wochentag);
printData($wochentag);

// rsort() sortiert das Array ABsteigend - nach Wert
// die Indizierung bleibt in der ursprünglichen Reihenfolge
rsort($wochentag);
printData($wochentag);

// shuffle() mixt die Werte zufällig durcheinander
// die Indizierung bleibt in der ursprünglichen Reihenfolge
shuffle($wochentag);
printData($wochentag);

// asort() sortiert das Array AUFsteigend - nach Wert
// die Assoziation zwischen key=>value bleibt erhalten
asort($wochentag);
printData($wochentag);

// arsort() sortiert das Array ABsteigend - nach Wert
// die Assoziation zwischen key=>value bleibt erhalten
arsort($wochentag);
printData($wochentag);

// ksort() sortiert das Array AUFsteigend - nach Index/Key
// die Assoziation zwischen key=>value bleibt erhalten
ksort($wochentag);
printData($wochentag);

// krsort() sortiert das Array ABsteigend - nach Index/Key
// die Assoziation zwischen key=>value bleibt erhalten
krsort($wochentag);
printData($wochentag);


// Array in einen String konvertieren
//                        glue  array
$wochentagString = implode(';', $wochentag);
echo $wochentagString, BRNL;

//                 glue  string
$newArray = explode(';', $wochentagString);
printData($newArray);


// ist ein Element im Array enthalten?
$eingabe = 'Saturday';
if (in_array($eingabe, $weekday)) {
    echo "$eingabe ist ein Wochentag", BRNL;
} else {
    echo "$eingabe ist KEIN Wochentag", BRNL;
}


// seit PHP 5.6 können Arrays als const definiert werden
const UMWELTPLAKETTE = [
    'rot' => 'dreckschleuder',
    'gelb' => 'naja',
    'grün' => 'topp',
];
// seit PHP 7.0 auch mit der define()-Funktion



include 'html/footer.html.php';
