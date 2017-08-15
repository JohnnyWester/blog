<?php
/**
 * Created by Johnny Wester.
 * Date: 31.05.17
 * Time: 18:30
 */
?>

<?php 
include ("blocks/db.php"); 
$result = mysql_query("SELECT title, meta_d, meta_k, `text` FROM settings WHERE page='send'", $db);
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
						$active = 2; 
						include ("blocks/header.php");
					?>

				<!-- Hidden menu -->

					<?php include("blocks/hidden_menu.php"); ?>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2>Euismod et accumsan</h2>
										<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
									</div>
								</header>
								<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Cras vehicula tellus eu ligula viverra, ac fringilla turpis suscipit. Quisque vestibulum rhoncus ligula.</p>
							</article>
					</div>

				<!-- Sidebar -->
				<section id="sidebar">

	<!-- Intro -->
		<section id="intro">
			<a href="index.php" class="logo"><img src="images/logo.png" alt="" /></a>
			<header>
				<h2><?php echo $myrow['text']; ?></h2>
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