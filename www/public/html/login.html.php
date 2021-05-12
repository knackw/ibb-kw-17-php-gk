<h3>Bitte anmelden!</h3>
<form method="post" >
    <input type="text" name="username" placeholder="Username" value="<?=$username?>" ><br>
    <input type="password" name="password" placeholder="Password" ><br>
    <input type="submit" name="login" value="Login" >
    <input type="submit" name="clear" value="Cookie löschen" >
</form>
<p>
    <?=$message?>
</p>