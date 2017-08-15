<?php
/**
 * Created by Johnny Wester.
 * Date: 31.05.17
 * Time: 18:30
 */
?>

<?php 
include ("blocks/db.php"); 
$result = mysql_query("SELECT title, meta_d, meta_k, `text` FROM settings WHERE page='index'", $db);
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
		<title><?php echo $myrow['title']; ?></title>
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
					<?php
						$active = 1;
						include ("blocks/header.php"); 
					?>

				<!-- Hidden menu -->

					<?php include("blocks/hidden_menu.php"); ?>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<?php 
								$result4 = mysql_query ("SELECT id, image, title, title_description, `date`, author, mini_img, description, view FROM data", $db); 
								$myrow4 = mysql_fetch_array ($result4);

								do {
									$id = $myrow4['id'];
									$result5 = mysql_query("SELECT * FROM comments WHERE post = $id");
									$myrow5 = mysql_num_rows ($result5);
									
									printf("					
										<article class='post'>
											<header>
												<div class='title'>
													<h2><a href='view_post.php?id=%s'>%s</a></h2>
													<p>%s</p>
												</div>
												<div class='meta'>
													<time class='published' datetime='2015-11-01'>%s</time>
													<a href='#' class='author'><span class='name'>%s</span><img src='%s' alt='' /></a>
												</div>
											</header>
											<a href='view_post.php?id=%s' class='image featured'><img src='%s' alt='' /></a>
											<p>%s</p>
											<footer>
												<ul class='actions'>
													<li><a href='view_post.php?id=%s' class='button big'>Подробнее</a></li>
												</ul>
												<ul class='stats'>
													<li><p class='icon fa-eye'>%s</p></li>
													<li><a href='view_post.php?id=%s#comments' class='icon fa-comment'>%s</a></li>
												</ul>
											</footer>
										</article>", $myrow4['id'], $myrow4['title'], $myrow4['title_description'], $myrow4['date'], $myrow4['author'], $myrow4['mini_img'], $myrow4['id'], $myrow4['image'], $myrow4['description'], $myrow4['id'], $myrow4['view'], $myrow4['id'], $myrow5);
								}
								while ($myrow4 = mysql_fetch_array ($result4)); 
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
			<a href="#" class="logo"><img src="images/logo.png" alt="" /></a>
			<header>
				<?php echo $myrow['text']; ?>
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