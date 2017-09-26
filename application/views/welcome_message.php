<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<body>
<h2>Вход</h2>
<form method="post" action="api/admin">
Логин: <br />
<input name="login" type="text" size="25" maxlength="30" value="Вася" /> <br />
Пароль: <br />
<input name="password" type="password" size="25" maxlength="30" value="" /> <br />
Captcha<br>
<input name="captcha" type="text" size="25" maxlength="30" value="Кто выше всех в религии" /> <br />
<input type="submit" name="enter" value="Вход" />
</form>
<br>
<h2>Регистрация</h2>
<form method="post" action="api/user_reg">
Логин: <br />
<input name="login" type="text" size="25" maxlength="30" value="Вася" /> <br />
Пароль: <br />
<input name="password" type="password" size="25" maxlength="30" value="************" /> <br />
Email: <br />
<input name="email" type="email" size="25" maxlength="30" value="mail@mail.ru" /> <br />
Страна: <br />
<input name="country" type="text" size="25" maxlength="30" value="Russia" /> <br />
Город: <br />
<input name="city" type="text" size="25" maxlength="30" value="Moscow" /> <br />
О_себе: <br />
<input name="about" type="text" size="25" maxlength="30" value="Short text" /> <br />
Captcha<br>
<input name="captcha" type="text" size="25" maxlength="30" value="Кто выше всех в религии" /> <br />
<input type="submit" name="enter" value="Вход" />
</form>
<h2>Обновление регистрации</h2>
<form method="post" action="api/user_upd">
Логин: <br />
<input name="login" type="text" size="25" maxlength="30" value="Вася" /> <br />
Пароль: <br />
<input name="password" type="password" size="25" maxlength="30" value="************" /> <br />
Email: <br />
<input name="email" type="email" size="25" maxlength="30" value="mail@mail.ru" /> <br />
Страна: <br />
<input name="country" type="text" size="25" maxlength="30" value="Russia" /> <br />
Город: <br />
<input name="city" type="text" size="25" maxlength="30" value="Moscow" /> <br />
О_себе: <br />
<input name="about" type="text" size="25" maxlength="30" value="Short text" /> <br />
Captcha<br>
<input name="captcha" type="text" size="25" maxlength="30" value="Кто выше всех в религии" /> <br />
<input type="submit" name="enter" value="Вход" />
</form>
</body>
</html>