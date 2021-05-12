<?php

require_once 'inc/db.inc.php';

/*
 * Funktions-Bibliothek für den Zugriff auf die DB-Tabelle `user`
 * 
 *  5 Standard-Funktionen (CRUD - Create Read Update Delete):
 *      readUsers()                 liest ALLE User
 *      readUser($id)               liest EINEN User
 *      createUser($user)           fügt einen Datensatz hinzu
 *      updateUser($user)           aktualisiert einen Datensatz
 *      deleteUser($user)           löscht einen Datensatz
 * 
 *  weitere Funktionen sind - tabellenspezifisch - möglich
 *      checkLoginUser($username, $password)    prüft username-password auf korrektheit
 */


// Simulation einer user-Tabelle, da eine Tabelle user nicht wirklich existiert
//function readUsers() {
//    $users = [
//        [
//            'id' => 1,
//            'username' => 'willi',
//            'password' => '$2y$10$HxpnGgyVhLzNfjD2bQBY3.KDI.MHfVTuIStNws/L6jORkuqMxu0Ye',   // geheim
//            'vorname' => 'Willi',
//            'nachname' => 'Winzig',
//        ],
//        [
//            'id' => 2,
//            'username' => 'kalle',
//            'password' => '$2y$10$znqTjhczrAh9hNanvt8jy.5G1w3my//1OohZkEEUHvpHvnqDlbagm',   // qwertz
//            'vorname' => 'Karl',
//            'nachname' => 'Friedrich',
//        ],
//        [
//            'id' => 3,
//            'username' => 'klara',
//            'password' => '$2y$10$/uq85zvxJsu5f6n/wyPguOYWu/6YgNhCLLKna8b1S4tSCFX7Afkhe',   // 123456
//            'vorname' => 'Klara',
//            'nachname' => 'Fall',
//        ],
//    ];
//    return $users;
//}

// KEINE Simulation mehr, das DB-Tabelle user jetzt existiert!
function readUsers() {
    
    $connection = createConnection();

    $sql = 'SELECT * FROM `user`';
    $result = mysqli_query($connection, $sql);

    $users = [];
    while ($userDatensatzarray = mysqli_fetch_assoc($result)) {
        $users[] = $userDatensatzarray;
    }
    mysqli_close($connection);

    return $users;
}

function readUser($id) {
    
    $connection = createConnection();

    $sql = "SELECT * FROM `user` WHERE `id`='$id'";
    $result = mysqli_query($connection, $sql);

    $userDatensatzarray = mysqli_fetch_assoc($result);
    mysqli_close($connection);

    return $userDatensatzarray;
    
}

function createUser($user) {
    // Das $user-Datensatzarray enthält das Password im klartext
    // und muss HIER gehasht werden
    
    $connection = createConnection();
    $sql = "INSERT INTO `user` (`username`, `password`, `vorname`, `nachname`) VALUES (?, ?, ?, ?)";
    $createStatement = mysqli_prepare($connection, $sql);
    
    $pwdHash = password_hash($user['password'], PASSWORD_DEFAULT);
    
    //               PreparedStatement   Datentypen für jeden Platzhalten: s-string, i-integer, d-double
    mysqli_stmt_bind_param($createStatement, 'ssss',
            $user['username'],
            $pwdHash,
            $user['vorname'],
            $user['nachname'],
    );
    
    mysqli_stmt_execute($createStatement);
    $user['id'] = mysqli_insert_id($connection);
    $ar = mysqli_stmt_affected_rows($createStatement) == 1;
    mysqli_close($connection);
    return $ar;
}


function updateUser($user) {
    // Das $user-Datensatzarray enthält das Password im klartext
    // und muss HIER gehasht werden    

    if (!isSet($user['id']) or $user['id'] == 0) {
        return false;
    }
    
    $sql = "UPDATE `user` SET "
            . "`username`='" . $user['username'] . "', "
            . "`password`='" . password_hash($user['password'], PASSWORD_DEFAULT) . "', "
            . "`vorname`='" . $user['vorname'] . "', "
            . "`nachname`='" . $user['nachname'] . "' "
            . "WHERE `id`='" . $user['id'] . "'";
    return modify($sql);

}


function deleteUser($user) {
    
    if (!isSet($user['id']) or $user['id'] == 0) {
        return false;
    }
    
    $sql = "DELETE FROM `user` WHERE `id`='" . $user['id'] . "'";
    return modify($sql);
    
}

// 1. Versuch: via Simulation!
//function checkLoginUser($username, $password) {
//    // 1. SEEEEEEHR einfach
////    return $username == 'willi' and $password == 'geheim';
//    
//    // 2. Simulation der Tabelle (mit readUsers())
//    $users = readUsers();
//    foreach ($users as $user) {
//        if ($username == $user['username'] and password_verify($password, $user['password'])) {
//            return $user;
//        }
//    }
//    return false;
//}

// 2. Versuch: via echte DB-Tabelle user
function checkLoginUser($username, $password) {

    $connection = createConnection();

    $sql = "SELECT * FROM `user` WHERE `username`='$username'";
    $result = mysqli_query($connection, $sql);

    $userDatensatzarray = mysqli_fetch_assoc($result);
    mysqli_close($connection);
    
    if (!$userDatensatzarray) {
        // KEIN Datensatz mit dem passenden username gefunden
        return false;
    }

    if (!password_verify($password, $userDatensatzarray['password'])) {
        // Datensatz mit username gefunden, ABER FALSCHES passwort
        return false;
    }
    
    // username UND passwort korrekt!
    if (password_needs_rehash($userDatensatzarray['password'], PASSWORD_DEFAULT)) {
        // TODO needs rehash !!!
        $userDatensatzarray['password'] = $password;
        updateUser($userDatensatzarray);
    }
    
    return $userDatensatzarray;

}


