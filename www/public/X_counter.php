<?php

require_once 'inc/tools.inc.php';

const COUNT_COOKIE_NAME = 'count';

function pageCount() {
    
    $filename = 'data/count.txt';
    
    // beim ersten Aufruf ist die Datei nicht vorhanden - erzeugen!
    if (!file_exists($filename)) {
        $fileHandle = fopen($filename, 'w');
        fputs($fileHandle, "0\n");
        fclose($fileHandle);
    }
    
    
    // datei öffnen und alten Wert auslesen
    $fileHandle = fopen($filename, 'r+');
    $count = intval(fgets($fileHandle));
    
    if (!isSet($_COOKIE[COUNT_COOKIE_NAME])) {
        // counter erhöhen
        $count++;

        // setzt Cookie zur Vermeidung von Reload-Orgien
        setCookie(COUNT_COOKIE_NAME, $count, time() + 10);

        // Datei auf anfangsposition setzen und neuen Zähler schreiben
        rewind($fileHandle);
        fputs($fileHandle, "$count\n");
    }
    
    fclose($fileHandle);
    return $count;
}



// -----------------------------------------------------------------------------


$title = 'Counter';
$headline = 'Wie häufig aufgerufen?';
include 'html/header.html.php';

// hier kommt der seitenindividuelle Inhalt
echo 'PageCount: ', pageCount(), BRNL;


include 'html/footer.html.php';
