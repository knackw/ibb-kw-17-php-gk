<?php

require_once 'inc/tools.inc.php';


$title = 'Verschlüsselung';
$headline = 'Operation: Sicheres Kennwort';
include 'html/header.html.php';


// hier kommt der seitenindividuelle Inhalt

// Grundsätzlich werden Kennwörter NIE im Klartext gespeichert
//  sondern verschlüsselt
// Kennwörter werden mit einer EINWEG-Verschlüsselung kodiert => Hash

$password = 'gehein';
echo "Password: $password", BRNL;

$md5 = md5($password);
echo "md5() $md5", BRNL;

$password = '123456';
echo "Password: $password", BRNL;

$md5 = md5($password);
echo "md5() $md5", BRNL;

$sha1 = hash('sha1', $password);
echo "sha1 $sha1", BRNL;

$sha1 = hash('sha256', $password);
echo "sha256 $sha1", BRNL;

$sha1 = hash('sha512', $password);
echo "sha512 $sha1", BRNL;

// Zur Erhöhung der Sicherheit, wird der Hash-Algorithmus mehrfach durchlaufen und
// um eine zufällige Zeichenkette - das Salt / Salz - erweitert

$anzahl = 188469; // rand(100000, 200000);
$salt = 'lkjlweidfjsdrdsidusifscnaspdeo3984798jdmqo28euqo9ej89230euqojsm39e23o';
echo $anzahl, BRNL;
echo $salt, BRNL;

function myOwnHash($p, $s, $a) {
    $hash = $p;
    for ($i = 0; $i < $a; $i++) {
        $hash .= $s;
        $hash = hash('sha512', $hash);
    }
    return $hash;
}

$myOwnHash = myOwnHash($password, $salt, $anzahl);
echo "myOwnHash $myOwnHash", BRNL;


// STATE OF THE ART

// PASSWORD_DFEFAULT repräsentiert immer einen aktuallen Hash-Algorithmus
// der verwendete Hash-Algorithmus ist ebenfalls im Hash codiert
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
echo "passwordHash $passwordHash", BRNL;

// Klartext-Password wird gegen den Hash geprüft
if (password_verify($password, $passwordHash)) {
    echo 'passwort korrekt', BRNL;
    
    // wenn es einen neuen Standard-Algorithmus gibt, muss der Hash mit dem neuen
    // Algorithmus neu berechnet werden
    if (password_needs_rehash($passwordHash, PASSWORD_DEFAULT)) {
        echo 'password needs to rehash', BRNL;
        // $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        // neuen Hash in die DB schreiben

    } else {
        echo 'password needs NOT to rehash', BRNL;
    }
    
} else {
    echo 'passwort NICHT korrekt', BRNL;
}






include 'html/footer.html.php';
