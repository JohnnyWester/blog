<?php
/**
 * Created by Johnny Wester.
 * Date: 01.05.17
 * Time: 15:27
 */
?>

<?php 
include ("blocks/db.php"); 
if (isset ($_GET['cat'])) {$cat = $_GET['cat'];}
if (!isset ($cat)) {$cat = 1;}
$result = mysql_query("SELECT * FROM categories WHERE id='$cat'", $db);
if (!$result) {
	echo "<p>Запрос к базе данных не может быть выполнен <br /> Код ошибки:</p>";
	exit (mysql_error());
}

if (mysql_num_rows($result) > 0) {
	$myrow = mysql_fetch_array($result);
}
else {
	echo "<p>Информация по запросу не может быть извлечена в таблице нет записей!</p>";
	exit();
}
?>



<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo "Заметки категории - $myrow[main_title]"; ?></title>
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
							$cat = $_GET['cat'];
							$result = mysql_query("SELECT id, title, title_description, view, description, author, `date`, image, mini_img  FROM `data` WHERE cat='$cat'", $db);
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
				<h3>Описание категории</h3>
				<?php 
					$result_five = mysql_query("SELECT * FROM categories WHERE id='$cat'", $db);
					$myrow_five = mysql_fetch_array($result_five);
				?>
				<p><?php echo "$myrow_five[text]"; ?></p>
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