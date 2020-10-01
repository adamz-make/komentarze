
<html>
<head>
<meta charset="utf-8">
</head>
<body>
Zostaw swój komentarz który wyświetlimy poniżej

<form action ="SaveComment.php" method = "POST">
Podaj swoje imię <input type = "text" name = "name"><br>
Czy jesteś zadowolony <select name ="satisfaction">
	<option value = "Zadowolony" >Zadowolony</option>
	<option value = "Niezadowolony">Niezadowolony</option>	
</select><br>
<p>Wpisz swój komentarz</p> 
<textarea cols = "50" rows="10" name = "comment"></textarea>
<br><input type ="submit" value = "Wyślij">
</form>


</body>
</html>

<?php
function __autoload($class)
{
	include_once($class .".php");
}

echo CommentInFile::readComments();



?>


