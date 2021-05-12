<?php

session_start();

require_once 'inc/tools.inc.php';
require_once 'inc/kontakt.inc.php';

if (isSet($_POST['back'])) {
    $_SESSION['kontaktId'] = '';
    headerLocation('7_kontakte.php');
}

$id = $_SESSION['kontaktId'] ?? '';
if ($id == '') {
    echo 'fehlerhafter Aufruf!', BRNL;
    exit;
}

$kontakt = readKontakt($id);
$message = '';

// Ist ein Button zum Speichern oder Löschen vom Benutzer gedrückt worden?
if (isSet($_POST['save'])) {
    // der Speichern-Button gedrückt
    $kontakt['anrede'] = $_POST['anrede'];
    $kontakt['vorname'] = $_POST['vorname'];
    $kontakt['nachname'] = $_POST['nachname'];
    $kontakt['strasse'] = $_POST['strasse'];
    $kontakt['plz'] = $_POST['plz'];
    $kontakt['stadt'] = $_POST['stadt'];
    $kontakt['telefon'] = $_POST['telefon'];
    // Formular-Daten sind in das Datensatz-Array übernommen
    
    if ($id == 0) {
        // neuer Datensatz
        $message = createKontakt($kontakt)
                ? 'Kontakt hinzugefügt'
                : 'Kontakt NICHT hinzugefügt';
    } else {
        // vorhandener Datensatz
        $message = updateKontakt($kontakt)
                ? 'Kontakt aktualisiert'
                : 'Kontakt NICHT aktualisiert';
    }
}

if (isSet($_POST['delete'])) {
    // der Löschen-Button gedrückt
    if (deleteKontakt($kontakt)) {
        $message = 'Kontakt gelöscht';
        $kontakt = [];
    } else {
        $message = 'Kontakt NICHT gelöscht';
    }
}

// -----------------------------------------------------------------------------

$title = 'Ein Kontakt';
$headline = 'Einen Kontakt bearbeiten';
include 'html/header.html.php';


// hier kommt der seitenindividuelle Inhalt
$id = $kontakt['id'] ?? 0;
$anrede = $kontakt['anrede'] ?? '';
$vorname = $kontakt['vorname'] ?? '';
$nachname = $kontakt['nachname'] ?? '';
$strasse = $kontakt['strasse'] ?? '';
$plz = $kontakt['plz'] ?? '';
$stadt = $kontakt['stadt'] ?? '';
$telefon = $kontakt['telefon'] ?? '';
include 'html/kontakt.html.php';


include 'html/footer.html.php';
