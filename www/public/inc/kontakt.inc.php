<?php

require_once 'inc/db.inc.php';


/*
 * Funktions-Bibliothek für den Zugriff auf die DB-Tabelle `kontakt`
 * 
 *  5 Standard-Funktionen (CRUD - Create Read Update Delete):
 *      readKontakte()              liest ALLE Kontakte
 *      readKontakt($id)            liest EINEN Kontakt
 *      createKontakt($kontakt)     fügt einen Datensatz hinzu
 *      updateKontakt($kontakt)     aktualisiert einen Datensatz
 *      deleteKontakt($kontakt)     löscht einen Datensatz
 * 
 *  weitere Funktionen sind - tabellenspezifisch - möglich
 *      z.B. bei einer `user`-Tablle
 *          checkLogin($user, $pass)
 */

function readKontakte() {

    $connection = createConnection();

    $sql = 'SELECT * FROM `kontakt`';
    $result = mysqli_query($connection, $sql);

    $kontakte = [];
    while ($kontaktDatensatzarray = mysqli_fetch_assoc($result)) {
        $kontakte[] = $kontaktDatensatzarray;
    }
    mysqli_close($connection);

    return $kontakte;
}

function readKontakt($id) {
    
    $connection = createConnection();

    $sql = "SELECT * FROM `kontakt` WHERE `id`='$id'";
    $result = mysqli_query($connection, $sql);

    $kontaktDatensatzarray = mysqli_fetch_assoc($result);
    mysqli_close($connection);

    return $kontaktDatensatzarray;
    
}


//function createKontakt($kontakt) {
//
//    $sql = "INSERT INTO `kontakt` (`anrede`, `vorname`, `nachname`, `strasse`, `plz`, `stadt`, `telefon`) VALUES ("
//            . "'" . $kontakt['anrede'] . "', "
//            . "'" . $kontakt['vorname'] . "', "
//            . "'" . $kontakt['nachname'] . "', "
//            . "'" . $kontakt['strasse'] . "', "
//            . "'" . $kontakt['plz'] . "', "
//            . "'" . $kontakt['stadt'] . "', "
//            . "'" . $kontakt['telefon'] . "')";
//    return modify($sql);
//}


// ungeprüfte übernahme von Formular-Feldern in das SQL-Statement ermöglichen SQL-Injections
// RISIKO!
//function createKontakt($kontakt) {
//    $connection = createConnection();
//
//    $sql = "INSERT INTO `kontakt` (`anrede`, `vorname`, `nachname`, `strasse`, `plz`, `stadt`, `telefon`) VALUES ("
//            . "'" . $kontakt['anrede'] . "', "
//            . "'" . $kontakt['vorname'] . "', "
//            . "'" . $kontakt['nachname'] . "', "
//            . "'" . $kontakt['strasse'] . "', "
//            . "'" . $kontakt['plz'] . "', "
//            . "'" . $kontakt['stadt'] . "', "
//            . "'" . $kontakt['telefon'] . "')";
//    echo $sql, BRNL;
////    mysqli_query($connection, $sql);
////    $kontakt['id'] = mysqli_insert_id($connection);
////    $ar = mysqli_affected_rows($connection) == 1;
//    mysqli_close($connection);
//    return false;
//}


// SQL-Injections vermeiden - 1. mit quotes/escapes
//function createKontakt($kontakt) {
//    $connection = createConnection();
//
//    $sql = "INSERT INTO `kontakt` (`anrede`, `vorname`, `nachname`, `strasse`, `plz`, `stadt`, `telefon`) VALUES ("
//            . "'" . mysqli_real_escape_string($connection, $kontakt['anrede']) . "', "
//            . "'" . mysqli_real_escape_string($connection, $kontakt['vorname']) . "', "
//            . "'" . mysqli_real_escape_string($connection, $kontakt['nachname']) . "', "
//            . "'" . mysqli_real_escape_string($connection, $kontakt['strasse']) . "', "
//            . "'" . mysqli_real_escape_string($connection, $kontakt['plz']) . "', "
//            . "'" . mysqli_real_escape_string($connection, $kontakt['stadt']) . "', "
//            . "'" . mysqli_real_escape_string($connection, $kontakt['telefon']) . "')";
//    echo $sql, BRNL;
////    mysqli_query($connection, $sql);
////    $kontakt['id'] = mysqli_insert_id($connection);
////    $ar = mysqli_affected_rows($connection) == 1;
//    mysqli_close($connection);
//    return false;
//}


// SQL-Injections vermeiden - 2. mit Prepared Statements
function createKontakt($kontakt) {

    $connection = createConnection();
    $sql = "INSERT INTO `kontakt` (`anrede`, `vorname`, `nachname`, `strasse`, `plz`, `stadt`, `telefon`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $createStatement = mysqli_prepare($connection, $sql);
    
    //               PreparedStatement   Datentypen für jeden Platzhalten: s-string, i-integer, d-double
    mysqli_stmt_bind_param($createStatement, 'sssssss',
            $kontakt['anrede'],
            $kontakt['vorname'],
            $kontakt['nachname'],
            $kontakt['strasse'],
            $kontakt['plz'],
            $kontakt['stadt'],
            $kontakt['telefon'],
    );
    
    mysqli_stmt_execute($createStatement);
    $kontakt['id'] = mysqli_insert_id($connection);
    $ar = mysqli_stmt_affected_rows($createStatement) == 1;
    mysqli_close($connection);
    return $ar;
}


function updateKontakt($kontakt) {
    
    if (!isSet($kontakt['id']) or $kontakt['id'] == 0) {
        return false;
    }
    
    $sql = "UPDATE `kontakt` SET "
            . "`anrede`='" . $kontakt['anrede'] . "', "
            . "`vorname`='" . $kontakt['vorname'] . "', "
            . "`nachname`='" . $kontakt['nachname'] . "', "
            . "`strasse`='" . $kontakt['strasse'] . "', "
            . "`plz`='" . $kontakt['plz'] . "', "
            . "`stadt`='" . $kontakt['stadt'] . "', "
            . "`telefon`='" . $kontakt['telefon'] . "' "
            . "WHERE `id`='" . $kontakt['id'] . "'";
    return modify($sql);
}


function deleteKontakt($kontakt) {

    if (!isSet($kontakt['id']) or $kontakt['id'] == 0) {
        return false;
    }
    
    $sql = "DELETE FROM `kontakt` WHERE `id`='" . $kontakt['id'] . "'";
    return modify($sql);
}


/*
 * 
CREATE TABLE `kontakt` (
  `id` int(11) UNSIGNED NOT NULL,
  `anrede` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vorname` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nachname` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strasse` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plz` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stadt` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letzte` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 * 
ALTER TABLE `kontakt` ADD PRIMARY KEY (`id`);
 * 
ALTER TABLE `kontakt` MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
 * 
 */
