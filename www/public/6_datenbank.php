<?php

require_once 'inc/tools.inc.php';

$title = 'Datenbanken';
$headline = 'MySQL und MariaDB';
include 'html/header.html.php';

// hier kommt der seitenindividuelle Inhalt

// 
// Datenbank-Programmierung in PHP
// 

// Datenbank - Datenbank-System / -Server
//      Datenbank (Catalog, Schema)
//          Tabelle
//              Spalten     - Datenstruktur
//              Zeilen      - Datensätze
//

// Datenbank-Adminstration
//      phpMyAdmin
//      MySQL-Workbench
//      ...
//

// Datenbank-Systeme
//      MySQL/MariaDB
//      Oracle
//      DB2
//      PostgrSQL
//      MS SQL
//      ...
//      SQLite
//      ...
//      CSV
//

// PHP definiert 2 DB-Schnittstellen
//      Mysqli          - MySQL/MariaDB
//      PDO             - PHP Data Objects => AK
//


// Verbindungs-Parameter
$host = 'database';            // '127.0.0.1', 'google.com'
$user = 'user';
$pass = 'user';                 // $pass = '';
$db = 'app_db';

// Verbindungs-Aufbau
//            @ - silence operator
$connection = @mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_error()) {
    echo 'Fehler beim Verbindungs-Aufbau', BRNL;
    echo mysqli_connect_error(), BRNL;
    echo mysqli_connect_errno(), BRNL;
    exit;   // das wird im AK noch besser !!!
}

mysqli_set_charset($connection, 'utf8');
//mysqli_select_db($connection, $db);           // USE `test`;

echo 'verbindung aufgebaut!', BRNL;


//
// Daten lesen...
$sql = 'SELECT * FROM `kontakt`';
$result = mysqli_query($connection, $sql);

// mysqli_fetch_row() liefert ein numerisch indiziertes Array mit einem Datensatz
// oder false, nach dem letzten Datensatz
//while ($datensatzarray = mysqli_fetch_row($result)) {
//    printData($datensatzarray);
//}

// mysqli_fetch_assoc() liefert ein assoziatives Array mit einem Datensatz
// oder false, nach dem letzten Datensatz
//while ($datensatzarray = mysqli_fetch_assoc($result)) {
//    printData($datensatzarray);
//}

$kontakte = [];
while ($datensatzarray = mysqli_fetch_assoc($result)) {
    $kontakte[] = $datensatzarray;
}

//printData($kontakte);
include 'html/kontakte.html.php';


// alternative Syntax für Kontrollstrukturen (bei html-includes)
// 
//      foreach () {                foreach () :
//          anweisung                   anweisung
//      }                           endforeach;
// 


// 
// Daten hinzufügen...
//$sql = "INSERT INTO `kontakt` (`anrede`, `vorname`, `nachname`) "
//        . "VALUES ('Herr', 'Rainer', 'Zufall')";
//mysqli_query($connection, $sql);
//if (mysqli_affected_rows($connection) == 1) {
//    echo 'datensatz hinzugefügt', BRNL;
//} else {
//    echo 'datensatz NICHT hinzugefügt', BRNL;
//}


// 
// Daten verändern...
//$sql = "UPDATE `kontakt` SET `strasse`='Holzweg 85', `plz`='12345', `stadt`='Ddorf' "
//        . "WHERE `id`='137'";
//mysqli_query($connection, $sql);
//if (mysqli_affected_rows($connection) == 1) {
//    echo 'datensatz verändert', BRNL;
//} else {
//    echo 'datensatz NICHT verändert', BRNL;
//}


// 
// Daten löschen...
$sql = "DELETE FROM `kontakt` WHERE `id`='137'";
mysqli_query($connection, $sql);
if (mysqli_affected_rows($connection) == 1) {
    echo 'datensatz gelöscht', BRNL;
} else {
    echo 'datensatz NICHT gelöscht', BRNL;
}


//
// schliessen der DB-Verbindung
mysqli_close($connection);


include 'html/footer.html.php';
