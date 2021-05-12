<?php

session_start();

require_once 'inc/tools.inc.php';

// hier kommt der seitenindividuelle Inhalt

if (isSet($_POST['new'])) {
    $_SESSION['userId'] = 0;
    headerLocation('X_user.php');
}

if (isSet($_POST['old'])) {
    $_SESSION['userId'] = $_POST['old'];
    headerLocation('X_user.php');
}


// -----------------------------------------------------------------------------


$title = 'Alle Benutzer';
$headline = 'aus einer Tabelle';
include 'html/header.html.php';

require_once 'inc/user.inc.php';

$users = readUsers();
include 'html/users.html.php';


include 'html/footer.html.php';
