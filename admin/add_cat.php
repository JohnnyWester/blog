<?php
/**
 * Created by Johnny Wester.
 * Date: 09.06.17
 * Time: 12:42
 */
?>

<?php 
include ("blocks/db.php");
include ("lock.php");
if (isset ($_POST ['main_title'])) {$main_title = $_POST ['main_title']; if ($main_title == '') {unset($main_title);}}
if (isset ($_POST ['title'])) {$title = $_POST ['title']; if ($title == '') {unset($title);}}
if (isset ($_POST ['meta_d'])) {$meta_d = $_POST ['meta_d']; if ($meta_d == '') {unset($meta_d);}}
if (isset ($_POST ['meta_k'])) {$meta_k = $_POST ['meta_k']; if ($meta_k == '') {unset($meta_k);}}
if (isset ($_POST ['text'])) {$text = $_POST ['text']; if ($text == '') {unset($text);}}
?>

<?php include ("lock.php"); ?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <title>Добавление категории!</title>
    </head>
    <body>
        <div id="wrapper" class="main_border">
                 <!-- Header --> 
                <?php include ("blocks/header.php"); ?>
               
                <!-- Main body -->
                <div id="main">
                    <?php 
                        if (isset ($title) && isset ($meta_d) && isset ($meta_k) && isset ($main_title) && isset ($text)) {
                    $result = mysql_query("INSERT INTO categories (title, meta_d, meta_k, main_title, `text`) VALUES ('$title', '$meta_d', '$meta_k', '$main_title', '$text')");
                        if ($result == 'true') {
                        echo "<p>Ваша категория успешно добавлена!</p>";
                        }

                        else { echo "<p>Ваша категория не добавлена</p>";}
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
