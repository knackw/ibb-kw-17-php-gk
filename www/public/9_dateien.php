<?php

require_once 'inc/tools.inc.php';

// Dateien werden Server-Seitig gespeichert
// 
//      Dateien                 vs      Datenbank
//      'quick-n-dirty'                 struturiert
//      einfacher                       aufwändiger
//                                      Transaktionen
//      (OS)                            User-Handling
//      (Software)                      Backup
//

function writeMyFile($filename) {
    
    $events = [
        ['Notice', 'Illegal Index'],
        ['Warning', 'Undifined Variable'],
        ['Fatal Error', 'Syntax Error'],
    ];
    
    // 
    // Daten in eine Datei schreiben
    // 
    
    // File Open        Dateiname  Modus: r-read, w-write, a-append
    $fileHandle = fopen($filename, 'a');
    
    foreach ($events as $event) {
        $string = implode('=', $event);
        // Array:       ['Notice', 'Illegal Index']
        // String:      Notice=Illegal Index
        fputs($fileHandle, "$string\n");
    }
    
    // File Close
    fclose($fileHandle);
}


function readMyFile($filename) {
    
    // 
    // Daten aus Datei lesen
    // 
    
    if (!file_exists($filename)) {
        echo "Die Datei $filename ist nicht vorhanden", BRNL;
        return false;
    }
    
    $fileHandle = fopen($filename, 'r');
    
    $events = [];
    while (!feof($fileHandle)) {        // eof - end of file
        $string = fgets($fileHandle);   // liest eine Zeile aus der Datei (bis zum Zeilenumbruch)
        if ($string != '') {
            $event = explode('=', $string);
            $events[] = $event;
        }
    }
    
    fclose($fileHandle);
    
    return $events;
}

// -----------------------------------------------------------------------------


$title = 'Dateien';
$headline = 'Lesen und Schreiben (IO)';
include 'html/header.html.php';


// hier kommt der seitenindividuelle Inhalt
$pfad = 'data/';
$datei = 'log.txt';

writeMyFile($pfad . $datei);

$evts = readMyFile($pfad . $datei);
printData($evts);


include 'html/footer.html.php';
