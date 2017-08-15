<?php
/**
 * Created by Johnny Wester.
 * Date: 30.04.17
 * Time: 18:15
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
        <title>Удалить заметку</title>
    </head>
    <body>
        <div id="wrapper" class="main_border">
                 <!-- Header --> 
                <?php include ("blocks/header.php"); ?>
               
                <!-- Main body -->
                <div id="main">
                    <h3>Выберите заметку для удаления</h3>
                    <form action="drop_post.php" method="post">
                        <?php 
                            $result = mysql_query("SELECT title, id FROM data");
                            $myrow = mysql_fetch_array($result); 
                            do {
                            printf ("<p><input name='id' type='radio' value='%s'><label> %s</label></p>", $myrow ["id"], $myrow ["title"]);
                            }
                            while ($myrow = mysql_fetch_array($result)); 
                        ?>
                            <p><input type="submit" name="submit" value="Удалить заметку"></p>
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