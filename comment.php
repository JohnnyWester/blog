<?php
/**
 * Created by Johnny Wester.
 * Date: 06.06.17
 * Time: 17:04
 */
?>

<?php 
include ("blocks/db.php"); 
if (isset ($_POST['name']))
{
	$name = $_POST['name'];
}

if (isset ($_POST['title'])) 
{
	$title = $_POST['title'];
}

if (isset ($_POST['text'])) 
{
	$text = $_POST['text'];
}

if (isset ($_POST['capcha'])) 
{
	$capcha = $_POST['capcha'];
}

if (isset ($_POST['submit'])) 
{
	$submit = $_POST['submit'];
}

if (isset ($_POST['id'])) {
	$id = $_POST['id'];
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta type="description" content="">
		<meta type="keywords" content="">
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
		<div id="main">

<?php

if (isset ($submit)){
	if (isset ($name)) {
		trim ($name);
	}
	else {$name = "";}

	if (isset ($title)) {
		trim ($title);
	}
	else {$title = "";}

	if (isset ($text)) {
		trim ($text);
	}
	else {$text = "";}

	if (empty($name) or empty($title) or empty($text)) {
		exit ("<h2 style='text-align: center;'>Заполните все поля!</h2>");
	}

	if (isset ($capcha)) {
		trim ($capcha);
	}
	else {$capcha = "";}

	$name = stripcslashes($name);
	$title = stripcslashes($title);
	$text = stripcslashes($text);
	$capcha = stripcslashes($capcha);

	$name = htmlspecialchars($name);
	$title = htmlspecialchars($title);
	$text = htmlspecialchars($text);
	$capcha = htmlspecialchars($capcha);

	$result = mysql_query ("SELECT word FROM comments_settings", $db);
	$myrow = mysql_fetch_array ($result);

	$date = date ("Y-m-d");

	if ($capcha == $myrow["word"]) {
		$result2 = mysql_query ("INSERT INTO comments (post, author, title, `text`, `date`) VALUES ('$id', '$name', '$title', '$text', '$date')", $db);
		$address = "johnnymarchenko@gmail.com";
		$subject = "Новый коментарий на блоге!";
		$result3 = mysql_query ("SELECT title FROM data WHERE id='$id'", $db);
		$myrow3 = mysql_fetch_array ($result3);
		$post_title = $myrow3["title"];
		$message = "Появился комментарий к заметке - ".$post_title."\n Коментарий добавил(а):".$name."\n Текст комментария:".$text." \n Ccылка на заметку: http://blog.yugagroholding.com/view_post.php?id=".$id."";
		mail ($address, $subject, $message, "Content-type: text/plain; Charset=UTF-8 \r \n");

		echo "<html>
				<head>
					<meta http-equiv='Refresh' content='0; URL=view_post.php?id=$id'>
				</head>
			</html>";
			exit ();
	}

	else {exit ("<h2 style='text-align: center;'>Введенное вами слово не совпадает со словом на картинке!</h2>");}
}
?>
	</div>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>