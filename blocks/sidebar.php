<?php
/**
 * Created by Johnny Wester.
 * Date: 1.06.17
 * Time: 12:01
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

	<!-- Mini Posts -->
		<section>
		<h3 class="last_articles">Последние заметки</h3>
			<div class="mini-posts">
				<?php 
					$result2 = mysql_query ("SELECT id, image, title, `date`, mini_img FROM data ORDER BY id DESC, `date` DESC LIMIT 4", $db); 
					$myrow2 = mysql_fetch_array ($result2);

					do {
						printf("					
						<article class='mini-post'>
							<header>
								<h3><a href='view_post.php?id=%s'>%s</a></h3>
								<time class='published' datetime='2015-10-20'>%s</time>
								<img class='author' src='%s' alt='' />
							</header>
							<a href='view_post.php?id=%s' class='image'><img src='%s' alt='' /></a>
						</article>", $myrow2['id'], $myrow2['title'], $myrow2['date'], $myrow2['mini_img'], $myrow2['id'], $myrow2['image']);
					}
					while ($myrow2 = mysql_fetch_array ($result2)); 
				?>
			</div>
		</section>

	<!-- Posts List -->
		<section>
			<h3 class="last_articles">Первые заметки</h3>
			<ul class="posts">
				<li>
				<?php 
					$result3 = mysql_query ("SELECT id, image, title, `date` FROM data ORDER BY id, `date` LIMIT 4", $db); 
					$myrow3 = mysql_fetch_array ($result3);
					do {
						printf("					
							<article>
								<header>
									<h3><a href='view_post.php?id=%s'>%s</a></h3>
									<time class='published' datetime='2015-10-20'>%s</time>
								</header>
								<a href='view_post.php?id=%s' class='image'><img src='%s' alt='' /></a>
							</article>", $myrow3['id'], $myrow3['title'], $myrow3['date'], $myrow3['id'], $myrow3['image']);
					}
					while ($myrow3 = mysql_fetch_array ($result3)); 
				?>
				</li>
			</ul>
		</section>

	<!-- About -->
		<section class="blurb">
			<h2>About</h2>
			<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
			<ul class="actions">
				<li><a href="#" class="button">Learn More</a></li>
			</ul>
		</section>