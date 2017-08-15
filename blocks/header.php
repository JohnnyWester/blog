<?php
/**
 * Created by Johnny Wester.
 * Date: 1.06.17
 * Time: 11:41
 */
?>

<!-- Header -->
	<header id="header">
		<h1><a href="index.php">My php blog</a></h1>
		<nav class="links">
			<ul>
				<li><a <?php if(isset ($active)) {if($active == 1) {echo "class='active'";}} ?> href="index.php">Главная</a></li>
				<li><a <?php if(isset ($active)) {if($active == 2) {echo "class='active'";}} ?> href="send.php">Рассылка</a></li>
				<li><a <?php if(isset ($active)) {if($active == 3) {echo "class='active'";}} ?> href="products.php">Товары</a></li>
				<li><a <?php if(isset ($active)) {if($active == 4) {echo "class='active'";}} ?> href="about.php">О нас</a></li>
				<li><a <?php if(isset ($active)) {if($active == 5) {echo "class='active'";}} ?> href="contacts.php">Контакты</a></li>
			</ul>
		</nav>
		<nav class="main">
			<ul>
				<li class="search">
					<a class="fa-search" href="#search">Поиск</a>
					<form id="search" method="post" action="view_search.php" name="form_search">
						<input type="text" name="search" placeholder="Поиск" />
					</form>
				</li>
				<li class="menu">
					<a class="fa-bars" href="#menu">Меню</a>
				</li>
			</ul>
		</nav>
	</header>


