<?php
/**
 * Created by Johnny Wester.
 * Date: 05.05.17
 * Time: 16:02
 */
?>

<?php 
include ("blocks/db.php"); 
if (isset ($_GET['id'])) {$id = $_GET['id'];}
if (!isset ($id)) {$id = 1;}
$result = mysql_query("SELECT * FROM data WHERE id='$id'", $db);
if (!$result) {
	echo "<p>Запрос к базе данных не может быть выполнен <br /> Код ошибки:</p>";
	exit (mysql_error());
}

if (mysql_num_rows($result) > 0) {
	$myrow = mysql_fetch_array($result);
/* ================  Cкрипт просмотра статей =========*/
$new_view = $myrow['view'] + 1;
$update = mysql_query ("UPDATE data SET view ='$new_view' WHERE id='$id'", $db);
/* =============================================================== */
}
else {
	echo "<p>Информация по запросу не может быть извлечена в таблице нет записей!</p>";
	exit();
}
?>



<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $myrow["title"]; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta type="description" content="<?php echo $myrow['meta_d']; ?>">
		<meta type="keywords" content="<?php echo $myrow['meta_k']; ?>">
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->

					<?php include ("blocks/header.php"); ?>

				<!-- Hidden menu -->

					<?php include("blocks/hidden_menu.php"); ?>

				<!-- Main -->
					<div id="main">
						<?php 
						printf ("<article class='post'>
									<header>
										<div class='title'>
											<h2>%s</h2>
											<p>%s</p>
										</div>
										<div class='meta'>
											<time class='published' datetime='2015-11-01'>%s</time>
											<a href='#' class='author'>
												<span class='name'>%s</span><img src='%s' alt='' />
											</a>
										</div>
										</header>
											<img src='%s' alt='' />
											%s
										<footer>
										<ul class='stats'>
											<li><p class='icon fa-eye'>%s</a></li>
										</ul>
									</footer>
								</article>", $myrow["title"], $myrow["title_description"], $myrow["date"], $myrow["author"], $myrow["mini_img"], $myrow["image"], $myrow["text"], $myrow["view"]);	
						 	$result3 = mysql_query ("SELECT * FROM comments WHERE post='$id'", $db);
						 	if (mysql_num_rows($result3) > 0) {
						 		$myrow3 = mysql_fetch_array ($result3);
						 		echo "<h3 id='comments'>Комментарии к этой статье:</h3>";
						 		do {
						 			printf ("<div class='post_div'>
						 					<p class='post_comment_add'>Коментарий добавил(а): <strong>%s</strong> <br />
						 					 Дата: <strong>%s</strong></p>
						 					 <h3>%s</h3>
						 				     <p>%s</p></div>", $myrow3['author'], $myrow3['date'], $myrow3['title'], $myrow3['text']);

						 		}
						 		while ($myrow3 = mysql_fetch_array ($result3)); 
						 	}
						 	else {echo "<h3 id='comments'>В данной статье комментарии отсутствуют.</h3>";}
						 	$result4 = mysql_query ("SELECT img FROM comments_settings", $db);
						 	$myrow4 = mysql_fetch_array ($result4);
						 ?>
						 <h3 class="post_comment">Добавить новый комментарий:</h3>
						 <form action="comment.php" name="form_com" method="post" class="comment_form">
						 	<input type="text" name="name" placeholder="Введите Ваше полное имя...">
						 	<input type="text" name="title" placeholder="Введите тему комментария...">
						 	<textarea name="text" placeholder="Напишите Ваш комментарий..."></textarea>
						 	<img class="capcha_img" src="<?php echo $myrow4['img']; ?>" /><input type="text" name="capcha" placeholder="Введите текст с картинки" class="chapcha_field">
						 	<input type="submit" name="submit" value="Комментировать">
						 	<input type="hidden" name="id" value="<?php echo $id; ?>">
						 </form>
					</div>

				<!-- Sidebar -->
				<section id="sidebar">

	<!-- Intro -->
		<section id="intro">
			<a href="index.php" class="logo"><img src="images/logo.png" alt="" /></a>
			<header>
				<h2><?php echo $myrow["title"]; ?></h2>
			</header>
		</section>
					<?php include ("blocks/sidebar.php"); ?>

						<!-- Footer -->
							<?php include ("blocks/footer.php"); ?>

					</section>

			</div>
			

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>