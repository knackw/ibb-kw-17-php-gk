<?php

require_once 'inc/tools.inc.php';

$title = 'Funktionen';
$headline = 'Wer macht Was?';
include 'html/header.html.php';

// hier kommt der seitenindividuelle Inhalt

// 
// Funktionen / Prozeduren
// 

// synonyme:
//      Unterprogramm
//      Aufruf
//      OO: Methode

// Funktionen...
//      ... bringen Struktur ins Programm
//      ... verhindern Wiederholungen (Wiederverwendbarkeit) beim programmieren
//          dry - don't repeat yourself
//      ... reduzieren Fehleranfälligkeit
//      ... verbessern die Wartbarkeit

machWas();

// mit dem Schlüsselwort function beginnt die Definition einer Funktion/Prozedur
// gefolgt von einem syntaktisch gültigen Bezeichner
// Der Name (Bezeichner) darf noch nicht (als Funktions-Bezeichenr) vergeben sein - muss eindeutig sein - case-INsensitive
// Das Paar runde Klammern () ist zwingend
// Das Paar geschweifte Klammern {} ist zwingend - enthält Funktions-Körper
function machWas() {
//    global $title;
//    
//    echo $title, BRNL;
//    $title .= 'x';
    echo 'eine SUPER intelligente Ausgabe', BRNL;
}
// HIER: wird die Funktion definiert - aber NICHT ausgeführt !!!


// Der Aufruf einer Funktion geschieht über den Namen - mit runder Klammer ()!
machWas();
machwas();
MACHWAS();


//function machWas() {
//    echo 'eine intelligente Ausgabe', BRNL;
//}



// Was geht noch mit Funktionen?
//      - einen Parameter übergeben

function fett($text) {              // $text = 'ein fett gedruckter Text';
    // $text ist ein Parameter der Funktion fett()
    echo '<b>', $text, '</b>', BRNL;
}

fett('ein fett gedruckter Text');
fett(42);
//  Uncaught ArgumentCountError: Too few arguments to function fett(), 0 passed
//fett();



// Was geht noch mit Funktionen?
//      - mehrere Paramter übergeben

function ausgabe($text, $tag) {
    // $text und $tag sind die Parameter der ausgabe() Funktion
    echo "<$tag>$text</$tag>", BRNL;
}

ausgabe('fetter Text', 'b');
ausgabe('kursiver Text', 'i');
ausgabe(text: 'eigener Absatz', tag: 'p');
ausgabe('Überschrift 3. Ordnung', 'h3');
//  Uncaught ArgumentCountError: Too few arguments to function ausgabe(), 1 passed
//ausgabe('Überschrift 3. Ordnung');



// Was geht noch mit Funktionen?
//      - optionale Parameter / Parameter mit einem Standard-Wert
//      - der/die optionalen Parameter stehen immer am ENDE der Paramterliste

function ausgabe2($text, $tag='b') {
    // $text und $tag sind Parameter der ausgabe2() Funktion
    // wobei $tag den Standard-Wert 'b' zugewiesen bekommt - und damit optional ist
    ausgabe($text, $tag);
}

ausgabe2('kursiver Text', 'i');
ausgabe2('standard Text');
// Uncaught ArgumentCountError: Too few arguments to function ausgabe2(), 0 passed
//ausgabe2();



// Was geht noch mit Funktionen?
//      - variable Parameter-Listen / 0-N
//      - eine variable Parameter-Liste kann nur EINMAL je Funktion definiert werden
//      - eine variable Parameter-Liste ist immer der LETZTE Parameter
//      - eine variable Parameter-Liste kann NICHT mit optionalen Parametern kombiniert werden

function multipleAusgabe($tag, ...$texte) {
    // $tag und $texte sind Parameter der multipleAusgabe() Funktion
    // wobei für $texte beliebig viele Argumente angegeben werden dürfen
    // $texte ist in der Funktion - ein Array
    foreach ($texte as $text) {
        ausgabe($text, $tag);
    }
}

multipleAusgabe('i', 'kursiver Text', 'noch ein Text', 42, 'nochaml kursiv');
multipleAusgabe('u');
// Uncaught ArgumentCountError: Too few arguments to function multipleAusgabe(), 0 passed
//multipleAusgabe();


// PRAXIS-BEISPIEL: printData()



// Was geht noch mit Funktionen?
//      - Rückgabewert

function quadrat($wert) {
    // $wert ist der Parameter der quadrat() Funktion
    // die quadrat() Funktion gibt auch einen Wert zurück!
    $q = $wert * $wert;
    return $q;
    // Zwei Aufgaben des return-Statement:
    //      1. Funktion verlassen
    //      2. (optional) Wert zurückgeben
}

$eingabe = 5;
$quad = quadrat($eingabe);
echo "Das Quadrat von $eingabe beträgt $quad", BRNL;
echo 'Das Quadrat von 6 beträgt ', quadrat(6), BRNL;
echo 'Das Quadrat von 6.5 beträgt ', quadrat(6.5), BRNL;

// Der Rückgabewert kann ignoriert werden!
quadrat(7);


// Undefined variable $q
// echo "q=$q", BRNL;


// Funktionen - und Gültigkeitsbereiche (von $variablen und KONSTANTEN)
// (prozedurale Programmierung)
// 
//      lokale Variablen            wird innerhalb einer Funktion definiert
//                                  ist NUR innerhlab dieser Funktion gültig
//                                  Parameter sind lokale Variablen
//                                  
//      globale Variablen           wird ausserhalb von Funktionen definiert
//                                  ist NUR ausserhalb von Funktionen gültig
//                                  
//                                  AUSSER: globale Variablen könenn mit 'global'
//                                  in den lokalen Kontext einer Funktion
//                                  gebracht werden - NICHT ZU EMPFEHLEN !!!
//                                  KEIN guter Programmierstil !!!
//                                  Stattdessen:    Eingang - Parameter
//                                                  Ausgang - Rückgabe
//                                                  
//      superglobalen Variablen     $_GET, $_POST, $_COOKIE, $_REQUEST, $_SERVER, $_SESSION, ...
//                                  ist überall (innerhalb UND ausserhalb von Funktionen) verfügbar
//                                  
//      KONSTANTEN sind superglobal
//          



// Was geht noch mit Funktionen?
//      - Parameter-Übergabe als Referenz

$i1 = 10;
$i2 = $i1;                  // Zuweisung durch die Kopie des Wertes

echo "i1=$i1", BRNL;
echo "i2=$i2", BRNL;

$i1 = 99;

echo "i1=$i1", BRNL;        // 99
echo "i2=$i2", BRNL;        // 10


// pass-by-value / pass-by-copy / Übergabe als Wert/Kopie - Standard!
function addOne($wert) {                    // $wert = $original
    echo 'vorher: ', $wert, BRNL;               // 42
    $wert++;
    echo 'nachher: ', $wert, BRNL;              // 43
}

$original = 42;
echo 'vor addOne() - ', $original, BRNL;        // 42
addOne($original);
echo 'nach addOne() - ', $original, BRNL;       // 42


// pass-by-reference / Übergabe als Verweis/Referenz
function addOneByReference(&$wert) {
    echo 'vorher ', $wert, BRNL;                            // 42
    $wert++;
    echo 'nachher ', $wert, BRNL;                           // 42
}

echo 'vor addOneByReference() - ', $original, BRNL;         // 42
addOneByReference($original);
echo 'nach addOneByReference() - ', $original, BRNL;        // 43 (!)


// Typisches Beispiel:
//  function kreisBerechnung($radius, &$umfang, &$flaeche) {}

// Strukturierte Programmierung:
//      Daten in eine Funktion rein     - via Paramter-Liste
//      Daten aus einer Funktion raus   - via Rückgabe
//      
//      Übergabe als Reference - nur in AUSNAHMEFÄLLEN
//

// Uncaught Error: addOneByReference(): Argument #1 ($wert) cannot be passed by reference
//addOneByReference(99);

//  Only variables should be passed by reference
//addOneByReference(quadrat(8));



// Was geht noch mit Funktionen?
//      - named Parameters (ab PHP 8)
function namedParameter($p1, $p2, $p3='3', $p4='4') {
    echo "p1=$p1, p2=$p2, p3=$p3, p4=$p4", BRNL;
}

// das funktioniert ab PHP 8, auch wenn Netbeans einen Fehler anzeigt !!!
namedParameter('Arg1', 'Arg2', 'Arg3');
namedParameter(p1:'Arg1', p2:'Arg2', p3:'Arg3');
namedParameter(p2:'Arg1', p1:'Arg2', p3:'Arg3');
namedParameter(p2:'Arg1', p1:'Arg2', p4:'Arg3');
namedParameter(
    p2: 'Arg1', 
    p1: 'Arg2',
    p4: 'Arg3',
);


include 'html/footer.html.php';
