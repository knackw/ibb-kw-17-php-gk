<form method="post">
    <button type="submit" name="back">zurück</button>
    <!-- <a href="7_kontakte.php">zurück</a>--><br>
    <input type="text" name="id" placeholder="Id" value="<?=$id?>" readonly ><br>
    <input type="text" name="anrede" placeholder="Anrede" value="<?=$anrede?>" ><br>
    <input type="text" name="vorname" placeholder="Vorname" value="<?=$vorname?>" ><br>
    <input type="text" name="nachname" placeholder="Nachname" value="<?=$nachname?>" ><br>
    <input type="text" name="strasse" placeholder="Strasse" value="<?=$strasse?>" ><br>
    <input type="text" name="plz" placeholder="Plz" value="<?=$plz?>" ><br>
    <input type="text" name="stadt" placeholder="Stadt" value="<?=$stadt?>" ><br>
    <input type="text" name="telefon" placeholder="Telefon" value="<?=$telefon?>" ><br>
    <input type="submit" name="save" value="Speichern" >
    <input type="submit" name="delete" value="Löschen - OHNE Rückfrage !!!" >
</form>
<p>
    <?=$message?>
</p>