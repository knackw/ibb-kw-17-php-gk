<form method="post">
    <button type="submit" name="back">zurück</button><br>
    <input type="text" name="id" placeholder="Id" value="<?=$id?>" readonly ><br>
    <input type="text" name="username" placeholder="Username" value="<?=$username?>" ><br>
    <input type="password" name="password" placeholder="Password" ><br>
    <input type="text" name="vorname" placeholder="Vorname" value="<?=$vorname?>" ><br>
    <input type="text" name="nachname" placeholder="Nachname" value="<?=$nachname?>" ><br>
    <input type="submit" name="save" value="Speichern" >
    <input type="submit" name="delete" value="Löschen - OHNE Rückfrage !!!" >
</form>
<p>
    <?=$message?>
</p>