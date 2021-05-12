<?php

session_start();

require_once 'inc/tools.inc.php';
require_once 'inc/user.inc.php';

if (isSet($_POST['back'])) {
    $_SESSION['userId'] = '';
    headerLocation('X_users.php');
}

$id = $_SESSION['userId'] ?? '';
if ($id == '') {
    echo 'fehlerhafter Aufruf!', BRNL;
    exit;
}

$user = readUser($id);
$message = '';

// Ist ein Button zum Speichern oder Löschen vom Benutzer gedrückt worden?
if (isSet($_POST['save'])) {
    // der Speichern-Button gedrückt
    
    // Server-Seitige Validierung: Ist das Passwort eingegeben?
    if ($_POST['password'] == '') {
        // KEIN Password vorhanden!
        $message = 'Bitte Password eingeben!';
        
    } else {
        // Password vorhanden!
        $user['username'] = $_POST['username'];
        $user['password'] = $_POST['password'];
        $user['vorname'] = $_POST['vorname'];
        $user['nachname'] = $_POST['nachname'];
        // Formular-Daten sind in das Datensatz-Array übernommen

        if ($id == 0) {
            // neuer Datensatz
            $message = createUser($user)
                    ? 'Benutzer hinzugefügt'
                    : 'Benutzer NICHT hinzugefügt';
        } else {
            // vorhandener Datensatz
            $message = updateUser($user)
                    ? 'Benutzer aktualisiert'
                    : 'Benutzer NICHT aktualisiert';
        }
    }
}

if (isSet($_POST['delete'])) {
    // der Löschen-Button gedrückt
    if (deleteUser($user)) {
        $message = 'Benutzer gelöscht';
        $user = [];
    } else {
        $message = 'Benutzer NICHT gelöscht';
    }
}

// -----------------------------------------------------------------------------

$title = 'Ein Benutzer';
$headline = 'Einen Benutzer bearbeiten';
include 'html/header.html.php';


// hier kommt der seitenindividuelle Inhalt
$id = $user['id'] ?? 0;
$username = $user['username'] ?? '';
$vorname = $user['vorname'] ?? '';
$nachname = $user['nachname'] ?? '';
include 'html/user.html.php';


include 'html/footer.html.php';
