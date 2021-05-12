<?php

require_once 'inc/tools.inc.php';

$title = 'Sprachelemente';
$headline = 'Was geht in PHP?';
include 'html/header.html.php';

// hier kommt der seitenindividuelle Inhalt

echo '<h2>Bezeichner / identifier</h2>';
echo 'Bezeichner geben <i>Dingen</i> in Programmen einen Namen', BRNL;

echo '<h3>Syntax-Regeln für Bezeichner</h3>';
// kein #-Zeichen
echo 'Bezeichner können Buchstaben enthalten', BRNL;
echo 'Bezeichner können Ziffern enthalten', BRNL;
echo '(Ziffern nicht zu Beginn)', BRNL;
echo 'Bezeichner können _ enthalten', BRNL;

//$3d = 75;     // ungültig
$d3 = 75;       // gültig

echo 'Variablen- und Konstanten-Bezeichner sind case-sensitive', BRNL;
//echo 'Variablen- und Konstanten-Bezeichner sind case-sensitive', brnl;

echo 'Der PHP Quelltext ist UTF-8 (kompatible)', BRNL;

$Österreich = 'ist ein gültiger Bezeichner';
echo $Österreich, BRNL;

echo 'reservierte Wörter (Keywords) können/sollten NICHT verwendet werden', BRNL;
// siehe https://www.php.net/manual/de/reserved.keywords.php


echo '<h3>Namens-Konventionen für Bezeichner / naming conventions</h3>';

echo 'Bezeichner sollten sich aus dem Zeichvorrat von ASCII-7 zusammensetzen [A-Za-z0-9_]', BRNL;
echo 'Variablen-Bezeichner beginnen mit einem kleinen Buchstaben: $lowerCamelCase', BRNL;
echo 'Funktions-Bezeichner beginnen mit einem kleinen Buchstaben: lowerCamelCase()', BRNL;
echo '<i>alte Funktions-Bezeichner bestehen komplett aus kleinen Buchstaben: klein_buchstaben()</i>', BRNL;
echo 'Konstanten-Bezeichner bestehen komplett aus großen Buchstaben: KONSTANTEN_NAME', BRNL;
// einzige Situation für einen _ | außer bei vordefinierten Bezeichnern

echo 'Klassen-Bezeichner beginnen mit einem großen Buchstaben: UpperCamelCase', BRNL;

echo 'Bezeichner sollten aussagekräftig sein !!!', BRNL;



echo '<h2>Variablen</h2>';
echo 'Variablen werden (in PHP) durch Wertzuweisung deklariert und initialisiert', BRNL;

//echo $x, BRNL;
$x = 42;
echo $x, BRNL;
echo 'Der Wert der Variablen $x beträgt: ', $x, BRNL;
echo "Der Wert von x=$x", BRNL;
echo 'Der Wert von x=$x', BRNL;

$x = 99;
echo "Der Wert von x=$x", BRNL;

$x = 'neun und neunzig';
echo "Der Wert von x=$x", BRNL;

echo 'PHP ist <b>keine</b> streng typisierte Sprache', BRNL;



echo '<h2>Datentypen</h2>';
// boolsche werte, string, integer, float
// array, object

$i = 42;
$d = 1.23;
$s = 'eine Zeichenkette';
$b = true;

echo "Die Variable \$i hat den Wert $i und den Datentyp ", getType($i), BRNL;
echo "Die Variable \$d hat den Wert $d und den Datentyp ", getType($d), BRNL;
echo "Die Variable \$s hat den Wert $s und den Datentyp ", getType($s), BRNL;
echo "Die Variable \$b hat den Wert $b und den Datentyp ", getType($b), BRNL;

$i = 'jetzt ein Text';
echo "Die Variable \$i hat den Wert $i und den Datentyp ", getType($i), BRNL;



echo '<h2>Operatoren</h2>';

echo '<h3>arithmetische Operatoren</h3>';
echo '+, -, *, /, %, **', BRNL;

$i = 9;
$j = 5;

$ergebnis = $i + $j;
echo "Das Ergebnis lautet: $ergebnis", BRNL;

$ergebnis = $i - $j;
echo "Das Ergebnis lautet: $ergebnis", BRNL;

$ergebnis = $i * $j;
echo "Das Ergebnis lautet: $ergebnis", BRNL;

$ergebnis = $i / $j;
echo "Das Ergebnis lautet: $ergebnis", BRNL;

$ergebnis = $i % $j;
echo "Das Ergebnis lautet: $ergebnis", BRNL;

$ergebnis = $i ** $j;
echo "Das Ergebnis lautet: $ergebnis", BRNL;

/*
 * Operatoren mit EINEM Operand     unär
 * Operatoren mit ZWEI Operanden    binär
 * Operatoren mit DREI Operanden    ternär
 */

echo 'Das Ergebnis lautet: ', -$ergebnis, BRNL;

// Der - Operator ist überladen:    1. Funktion:    - arithmetischen Minus (binär)
//                                  2. Funktion     - negative Vorzeichen (unär)


echo '<h3>Verkettungs-Operator</h3>';
echo '.', BRNL;

$ergebnis = 'Berlin' . '-Steglitz';
echo "Das Ergebnis lautet: $ergebnis", BRNL;

$ergebnis = $i . ' km/h';
echo "Das Ergebnis lautet: $ergebnis", BRNL;

$ergebnis = $i . $j . ' km/h';
echo "Das Ergebnis lautet: $ergebnis", BRNL;

$ergebnis = $i . $j;
echo "Das Ergebnis lautet: $ergebnis", BRNL;
echo getType($ergebnis), BRNL;

echo $ergebnis + 5, BRNL;



echo '<h3>Verbund-Operatoren</h3>';
echo '+=, -=, *=, /=, ..., .=', BRNL;

$i = $i + 3;
echo "i=$i", BRNL;

$i += 4;
echo "i=$i", BRNL;

$i -= 7;
echo "i=$i", BRNL;

$i *= 4;
echo "i=$i", BRNL;

$i /= 6;
echo "i=$i", BRNL;

//$i .= '°C';
//echo "i=$i", BRNL;



echo '<h3>In-/Dekrement-Operatoren</h3>';
echo '++, --', BRNL;

$i = $i + 1;
$i += 1;
$i++;
echo "i=$i", BRNL;

$i--;
echo "i=$i", BRNL;

++$i;
echo "i=$i", BRNL;

--$i;
echo "i=$i", BRNL;

echo 'Der Wert von $i beträgt ', $i++, BRNL;        // post-fix inkrement
echo 'Der Wert von $i beträgt ', $i, BRNL;

echo 'Der Wert von $i beträgt ', ++$i, BRNL;        // pre-fix inkrement
echo 'Der Wert von $i beträgt ', $i, BRNL;

echo 'Der Wert von $i beträgt ', $i--, BRNL;        // post-fix dekrement
echo 'Der Wert von $i beträgt ', $i, BRNL;

echo 'Der Wert von $i beträgt ', --$i, BRNL;        // pre-fix dekrement
echo 'Der Wert von $i beträgt ', $i, BRNL;

// $i = 8;
//          8 (9)  (9) 10
$ergebnis = $i++  +  ++$i;
echo "ergebnis=$ergebnis", BRNL;
echo "i=$i", BRNL;

//   10 (11)
$i = $i++;
echo "i=$i", BRNL;



echo '<h3>Vergleichs-Operatoren</h3>';
echo '==, !=, <>, >=, <=, >, <, ===, !==', BRNL;

if ($i == $j) {
    echo '$i == $j', BRNL;
}

if ($i != $j) {
    echo '$i != $j', BRNL;
}

if ($i <> $j) {
    echo '$i <> $j', BRNL;
}

if ($i >= $j) {
    echo '$i >= $j', BRNL;
}

if ($i <= $j) {
    echo '$i <= $j', BRNL;
}

if ($i > $j) {
    echo '$i > $j', BRNL;
}

if ($i < $j) {
    echo '$i < $j', BRNL;
}

$a = 10;
$b = 10.0;
$c = '10';

if ($a == $b) {                 // == macht einen reinen Wert-Vergleich
    echo '$a == $b', BRNL;
}
if ($b == $c) {
    echo '$b == $c', BRNL;
}
if ($c == $a) {
    echo '$c == $a', BRNL;
}

if ($a === $b) {                 // === macht zunächst einen Typ- und dann einen reinen Wert-Vergleich
    echo '$a === $b', BRNL;
}
if ($b === $c) {
    echo '$b === $c', BRNL;
}
if ($c === $a) {
    echo '$c === $a', BRNL;
}

// KEIN Vergleich, sondern ZUWEISUNG
if ($i = 20) {
    echo '$i = 20', BRNL;
}
echo "i=$i", BRNL;

if ($i = 0) {
    echo '$i = 0', BRNL;
}
echo "i=$i", BRNL;

// Was ist in PHP true/false?
//                      false       true
//      integer         0           !=0
//      double          0.0         !=0.0
//      string          ''          !=''
//      boolean         false       true
//      reference       null        !=null
//  

if (0.0) {
    echo '0.0', BRNL;
}

if ('0.0') {
    echo "'0.0'", BRNL;
}



echo '<h3>Logische Operatoren</h3>';
echo '!, &&, and, ||, or, xor', BRNL;

//  $bool1              true        true        false       false
//  $bool2              true        false       true        false
// -----------------------------------------------------------------------------
//  &&, and             true        false       false       false   UND
//  ||, or              true        true        true        false   ODER
//  xor                 false       true        true        false   eXklusive ODER
//  !$bool1             false                   true
//

// Wenn die Reihenfolge der Operatoren unklar ist => Klammern setzen ()



echo '<h3>Bedingungs-Operator</h3>';
echo '?:', BRNL;

//         bedingung ? true : false
$ergebnis = $i == $j ? 'JA' : 'nein';
echo "Ergebnis = $ergebnis", BRNL;


echo '<h3>Koaleszens-Operator</h3>';
echo '?? (ab PHP 7)', BRNL;


//echo "Der Wert der Variablen abc lautet $abc", BRNL;
$ergebnis = $abc;
echo "Ergebnis = $ergebnis", BRNL;

// 1. Variante: if/else mit isSet()
if (isSet($abc)) {
    $ergebnis = $abc;
} else {
    $ergebnis = 100;
}
echo "Ergebnis = $ergebnis", BRNL;


// 2. Variante: Bedingungs-Operator
$ergebnis = isSet($abc) ? $abc : 200;
echo "Ergebnis = $ergebnis", BRNL;


// 3. Variante: Koaleszens
$ergebnis = $abc ?? 300;
echo "Ergebnis = $ergebnis", BRNL;


include 'html/footer.html.php';
