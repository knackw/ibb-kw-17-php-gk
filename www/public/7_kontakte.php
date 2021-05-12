<?php

session_start();

require_once 'inc/tools.inc.php';

// hier kommt der seitenindividuelle Inhalt

if (isSet($_POST['new'])) {
    $_SESSION['kontaktId'] = 0;
    headerLocation('7_kontakt.php');
}

if (isSet($_POST['old'])) {
    $_SESSION['kontaktId'] = $_POST['old'];
    headerLocation('7_kontakt.php');
}


// -----------------------------------------------------------------------------


$title = 'Alle Kontakte';
$headline = 'via Funktionsbibliothek';
include 'html/header.html.php';

require_once 'inc/kontakt.inc.php';

$kontakte = readKontakte();
include 'html/kontakte.html.php';

//printData(readKontakt(15));
//
//printData(readKontakt(16));


include 'html/footer.html.php';
