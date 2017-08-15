<?php
/**
 * Created by Johnny Wester.
 * Date: 26.05.17
 * Time: 18:36
 */
?>

<?php include ("lock.php"); ?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <title>Admin panel</title>
    </head>
    <body>
        <div id="wrapper" class="main_border">
                 <!-- Header --> 
                <?php include ("blocks/header.php"); ?>
               
                <!-- Main body -->
                <div id="main">
                    <form name="form1" action="add_post.php" method="post">
                        <p><input type="text" name="title" id="title" placeholder="Введите название заметки" width="50%"></p>
                        <p><input type="text" name="title_description" id="title_description" placeholder="Введите описание под название заметки" width="50%"></p>
                        <p><input type="text" name="meta_d" id="meta_d" placeholder="Введите краткое описание заметки" width="50%"></p>
                        <p><input type="text" name="meta_k" id="meta_k" placeholder="Введите ключевые слова для заметки" width="50%"></p>
                        <p><input type="text" name="date" id="date" placeholder="Введите дату добавления заметки" value="<?php $date = date('Y-m-d'); echo $date; ?>"></p>
                        <p><textarea name="description" id="description" cols="60" rows="5" placeholder="Введите краткое описание заметки (с тэгами)"></textarea></p>
                        <p><textarea name="text" id="text" cols="60" rows="15" placeholder="Введите полный текст заметки (с тэгами)"></textarea></p>
                        <p><input type="text" name="author" id="author" placeholder="Введите автора заметки"></p>
                        <p><input type="text" name="image" id="image" placeholder="Путь к картинке поста"></p>
                        <p><input type="text" name="mini_img" id="mini_img" placeholder="Путь к аватарке автора поста"></p>
                        <p><select name="cat" id="cat">
                            <?php
                                $result = mysql_query("SELECT id, title FROM categories", $db);
                                $myrow = mysql_fetch_array($result);
                                do {
                                    printf("<option value='%s'>%s</option>", $myrow['id'], $myrow['title']);
                                }
                                while ($myrow = mysql_fetch_array($result)); 
                            ?>
                        </select> </p>
                        <p><input type="submit" name="submit" id="submit" value="Добавить заметку"></p>
                    </form>
                </div>
               
                <!-- Side bar -->
                <section id="sidebar">
                    <?php include ("blocks/sidebar.php"); ?>
               
                </section>
                <!-- Footer -->
                <?php include ("blocks/footer.php");?>
        </div>
    </body>
</html>
