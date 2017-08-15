<?php
/**
 * Created by Johnny Wester.
 * Date: 07.06.17
 * Time: 17:44
 */
?>

<!-- Menu -->
	<section id="menu">

		<!-- Search -->
			<section>
				<form class="search" method="post" action="view_search.php" name="form_search">
					<input type="text" name="search" placeholder="Поиск" />
				</form>
			</section>

		<!-- Links -->
			<section>
				<h2>Категории</h2>
				<ul class="links">
					<?php 
						$resulttwo = mysql_query("SELECT * FROM categories", $db);
						$myrowtwo = mysql_fetch_array($resulttwo);
							do {
								printf ("<a href='view_cat.php?cat=%s'>%s</a>", $myrowtwo["id"], $myrowtwo["title"]);
							}
							while ($myrowtwo = mysql_fetch_array($resulttwo)); 
					?>
				</ul>
			</section>
			
		<!-- Arhive articles -->
			<section>
				<h2>Архив статей</h2>
				<ul class="links">
					<?php 
						$result3 = mysql_query("SELECT DISTINCT left(`date`, 7) AS year FROM data ORDER BY year DESC", $db);
						if (!$result3) {
							echo "<p>Запрос к базе данных не может быть выполнен <br /> Код ошибки:</p>";
							exit (mysql_error());
						}

						if (mysql_num_rows($result3) > 0) {
							$myrow3 = mysql_fetch_array($result3);
							do {
								printf ("<ul><li><a href='view_date.php?date=%s'>%s</a></li></ul>", $myrow3['year'], $myrow3['year']);
							}
							while ($myrow3 = mysql_fetch_array($result3)); 
						}
						else {
							echo "<p>Информация по запросу не может быть извлечена в таблице нет записей!</p>";
							exit();
						}
					?>
				</ul>
			</section>

		<!-- Actions -->
			<section>
				<ul class="actions vertical">
					<li><a href="/admin" class="button big fit">Войти</a></li>
				</ul>
			</section>
	</section>
