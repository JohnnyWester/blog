<?php
/**
 * Created by Johnny Wester.
 * Date: 09.06.17
 * Time: 12:57
 */
?>

<?php include ('blocks/db.php'); 
include ('lock.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <title>Редактировать категорию</title>
    </head>
    <body>
        <div id="wrapper" class="main_border">
                 <!-- Header --> 
                <?php include ("blocks/header.php"); ?>
               
                <!-- Main body -->
                <div id="main">
                    <?php 
                                    $id = $_GET['id'];
                                    if (!isset ($id)) {
                                        $result = mysql_query("SELECT title, id FROM categories");
                                        $myrow = mysql_fetch_array($result); 
                                        // var_dump($myrow['id']);die;
                                        do {
                                            printf ("<p><a href='edit_cat.php?id=%s'>%s</a></p>", $myrow ["id"], $myrow ["title"]);
                                        }
                                        while ($myrow = mysql_fetch_array($result)); 
                                    }

                                    else {
                                        $result = mysql_query("SELECT * FROM categories WHERE id=$id");
                                        $myrow = mysql_fetch_array($result); 
                                            print <<<HERE
                                            <form name="form1" action="update_cat.php" method="post">
                                                <p><input type="text" value="$myrow[main_title]" name="main_title" id="main_title" placeholder="Введите title категории" width="50%"></p>
                                                <p><input type="text" value="$myrow[title]" name="title" id="title" placeholder="Введите название категории" width="50%"></p>
                                                <p><input type="text" value="$myrow[meta_d]" name="meta_d" id="meta_d" placeholder="Введите краткое описание категории(meta-description)" width="50%"></p>
                                                <p><input type="text" value="$myrow[meta_k]" name="meta_k" id="meta_k" placeholder="Введите ключевые слова для категории" width="50%"></p>
                                                <p><textarea name="text" id="text" cols="60" rows="15" placeholder="Введите описаение категории">$myrow[text]</textarea></p>
                                                <p> <input type="submit" name="submit" id="submit" value="Сохранить изменения"></p>
                                                <input type="hidden" name="id" id="submit" value="$myrow[id]">
                                            </form>
HERE;

                        }?>
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
