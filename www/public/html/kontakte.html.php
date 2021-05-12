<form method="post" >
    <input type="submit" name="new" value="neuer Kontakt" >
    <!-- <a href="7_kontakt.php?id=0" >Kontakt hinzufügen</a> -->
    <table border="1" >
        <tr>
            <th>...</th>
            <th>Id</th>
            <th>Anrede</th>
            <th>Name</th>
            <th>Anschrift</th>
            <th>PLZ/Ort</th>
            <th>Telefon</th>
        </tr>
        <?php foreach ($kontakte as $kontakt) : ?>
        <tr>
            <td>
                <button type="submit" name="old" value="<?=$kontakt['id']?>" >bearbeiten</button>
                <!-- <a href="7_kontakt.php?id=">bearbeiten</a> -->
            </td>
            <td><?=$kontakt['id']?></td>
            <td><?=$kontakt['anrede']?></td>
            <td><?=$kontakt['vorname'] . ' ' . $kontakt['nachname']?></td>
            <td><?=$kontakt['strasse']?></td>
            <td><?=$kontakt['plz'] . ' ' . $kontakt['stadt']?></td>
            <td><?=$kontakt['telefon']?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</form>