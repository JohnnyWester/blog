<?php
/**
 * Created by Johnny Wester.
 * Date: 31.05.17
 * Time: 12:54
 */
?>

<?php 
    include ('blocks/db.php'); 
    include ("lock.php");
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <title>Редактировать текст страниц</title>
    </head>
    <body>
        <div id="wrapper" class="main_border">
                 <!-- Header --> 
                <?php include ("blocks/header.php"); ?>
               
                <!-- Main body -->
                <div id="main">
                    <h3>Выберете страницу для редактирования!</h3>
                                <?php 
                                    $id = $_GET['id'];
                                    if (!isset ($id)) {
                                        $result = mysql_query("SELECT title, id FROM settings");
                                        $myrow = mysql_fetch_array($result); 
                                        // var_dump($myrow['id']);die;
                                        do {
                                            printf ("<p><a href='edit_text.php?id=%s'>%s</a></p>", $myrow ["id"], $myrow ["title"]);
                                        }
                                        while ($myrow = mysql_fetch_array($result)); 
                                    }

                                    else {
                                        $result = mysql_query("SELECT * FROM settings WHERE id=$id");
                                        $myrow = mysql_fetch_array($result); 
                                           
                                            print <<<HERE
                                            <form name="form1" action="update_text.php" method="post">
                                                            <p><input value="$myrow[title]" type="text" name="title" id="title" placeholder="Введите название страницы" width="50%"></p>
                                                            <p><input value="$myrow[meta_d]" type="text" name="meta_d" id="meta_d" placeholder="Введите краткое описание страницы" width="50%"></p>
                                                            <p><input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k" placeholder="Введите ключевые слова для страницы" width="50%"></p>    
                                                            <p><textarea name="text" id="text" cols="60" rows="15" placeholder="Введите полный текст урока (с тэгами)">$myrow[text]"</textarea></p>
                                                            <input name="id" type="hidden" value="$myrow[id]">
                                                            <p> <input type="submit" name="submit" id="submit" value="Сохранить изменения"></p>
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