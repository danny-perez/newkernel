<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<body>
<form method="post" action="api/admin">
Логин: <br />
<input name="login" type="text" size="25" maxlength="30" value="Вася" /> <br />
Пароль: <br />
<input name="password" type="password" size="25" maxlength="30" value="" /> <br />
Captcha<br>
<input name="captcha" type="text" size="25" maxlength="30" value="Кто выше всех в религии" /> <br />
<input type="submit" name="enter" value="Вход" />
</form>

</body>
</html>