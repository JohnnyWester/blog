<?php
/**
 * Created by Johnny Wester.
 * Date: 09.06.17
 * Time: 18:22
 */
?>

<?php 
include ("blocks/db.php");
include ("lock.php");
if (isset ($_POST ['title'])) 
{
    $title = $_POST ['title']; 
    if ($title == '') 
        {
            unset($title);
        }
}

if (isset ($_POST ['date'])) 
{
    $date = $_POST ['date']; 
    if ($date == '') 
    {
        unset($date);
    }
}

if (isset ($_POST ['author'])) 
{
    $author = $_POST ['author']; 
    if ($author == '') 
    {
        unset($author);
    }
}

if (isset ($_POST ['text'])) 
{
    $text = $_POST ['text']; 
    if ($text == '') 
    {
        unset($text);
    }
} 
if (isset ($_POST ['id'])) 
{
    $id = $_POST ['id']; 
} 
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <title>Страница редактирования комментария</title>
    </head>
    <body>
        <div id="wrapper" class="main_border">
                 <!-- Header --> 
                <?php include ("blocks/header.php"); ?>
               
                <!-- Main body -->
                <div id="main">
                    <?php 
                        // var_dump($myrow['id']);
                      if (isset ($title) && isset ($date) && isset ($author) && isset ($text)) {
                $result = mysql_query("UPDATE comments SET title='$title', `date`='$date', author='$author', `text`='$text' WHERE id='$id'");
                      if ($result == 'true') {
                      echo "<p>Ваш комментарий успешно отредактирован!</p>";
                      }

                      else { echo ";<p>Ваш комментарий не отредактирован</p>";}
                      } 

                      else {
                      echo "<p>Вы заполнели не все поля!</p>";
                      }
                    ?>
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