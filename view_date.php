<?php
/**
 * Created by Johnny Wester.
 * Date: 07.06.17
 * Time: 12:23
 */
?>

<?php 
include ("blocks/db.php"); 
if (isset ($_GET['date'])) 
{
	$date = $_GET['date'];
}
else 
{
	exit("<p>Вы обратились к файлы без необходимых параметров.</p>");
}

$date_title = $date;
$date_begin = "$date";
$date++;
$date_end = $date;
$date_begin = $date_begin."-00";
$date_end = $date_end."-00";
?>





<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo "Заметки за определенный месяц - $date_title"; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
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
							$result = mysql_query("SELECT id, title, title_description, view, description, author, `date`, image, mini_img  FROM `data` WHERE `date`>'$date_begin' AND `date` <'$date_end'", $db);
										if (!$result) {
											echo "<p>Запрос к базе данных не может быть выполнен <br /> Код ошибки:</p>";
											exit (mysql_error());
										}

										if (mysql_num_rows($result) > 0) {
											$myrow = mysql_fetch_array($result);
											do {
												printf ("
												<article class='post'>
													<header>
														<div class='title'>
															<h2><a href='view_post.php?id=%s'>%s</a></h2>
															<p>%s</p>
														</div>
														<div class='meta'>
															<time class='published' datetime='2015-11-01'>%s</time>
															<a href='#' class='author'>
																<span class='name'>%s</span><img src='%s' alt='' />
															</a>
														</div>
													</header>
													<a href='view_post.php?id=%s' class='image featured'><img src='%s' alt='' /></a>
													<p>%s</p>
													<footer>
														<ul class='actions'>
															<li><a href='view_post.php?id=%s' class='button big'>Подробнее</a></li>
														</ul>
														<ul class='stats'>
																<li><p class='icon fa-eye'>%s</a></li>
														</ul>
													</footer>
												</article>", $myrow["id"], $myrow["title"], $myrow["title_description"], $myrow["date"], $myrow["author"], $myrow["mini_img"], $myrow["id"], $myrow["image"], $myrow["description"], $myrow["id"], $myrow["view"]);
												}
											while ($myrow = mysql_fetch_array($result)); 
										}
										else {
											echo "<p>Информация по запросу не может быть извлечена в таблице нет записей!</p>";
											exit();
										}
							?>
						<!-- Pagination -->
<!-- 							<ul class="actions pagination">
								<li><a href="" class="disabled button big previous">Previous Page</a></li>
								<li><a href="#" class="button big next">Next Page</a></li>
							</ul> -->

					</div>

				<!-- Sidebar -->
				<section id="sidebar">

	<!-- Intro -->
		<section id="intro">
			<a href="index.php" class="logo"><img src="images/logo.png" alt="" /></a>
			<header>
				<h3>Архив статей</h3>
				<p>В этом архиве вы найдете статьи соответствующие определенному месяцу</p>
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