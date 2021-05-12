<form method="post" >
    <input type="submit" name="new" value="neuer Benutzer" >
    <table border="1" >
        <tr>
            <th>...</th>
            <th>Id</th>
            <th>Username</th>
            <th>Name</th>
        </tr>
        <?php foreach ($users as $user) : ?>
        <tr>
            <td>
                <button type="submit" name="old" value="<?=$user['id']?>" >bearbeiten</button>
            </td>
            <td><?=$user['id']?></td>
            <td><?=$user['username']?></td>
            <td><?=$user['vorname'] . ' ' . $user['nachname']?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</form>