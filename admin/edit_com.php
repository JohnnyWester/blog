<?php
/**
 * Created by Johnny Wester.
 * Date: 09.06.17
 * Time: 18:07
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
        <title>Редактировать комментарии</title>
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
                                        $result = mysql_query("SELECT title, id FROM comments");
                                        $myrow = mysql_fetch_array($result); 
                                        // var_dump($myrow['id']);die;
                                        do {
                                            printf ("<p><a href='edit_com.php?id=%s'>%s</a></p>", $myrow ["id"], $myrow ["title"]);
                                        }
                                        while ($myrow = mysql_fetch_array($result)); 
                                    }

                                    else {
                                        $result = mysql_query("SELECT * FROM comments WHERE id=$id");
                                        $myrow = mysql_fetch_array($result); 
                                            print <<<HERE
                                            <form name="form1" action="update_com.php" method="post">
                                                <p><input type="text" value="$myrow[title]" name="title" id="title" placeholder="Введите title комментария" width="50%"></p>
                                                <p><input type="text" value="$myrow[author]" name="author" id="author" placeholder="Введите автора" width="50%"></p>
                                                <p><input type="text" value="$myrow[date]" name="date" id="date" placeholder="Введите дату" width="50%"></p>
                                                <p><textarea name="text" id="text" cols="60" rows="15" placeholder="Введите комментарий">$myrow[text]</textarea></p>
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
