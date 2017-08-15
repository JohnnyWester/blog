<?php
/**
 * Created by Johnny Wester.
 * Date: 09.06.17
 * Time: 12:21
 */
?>

<?php include ("lock.php"); ?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <title>Добавить категорию</title>
    </head>
    <body>
        <div id="wrapper" class="main_border">
                 <!-- Header --> 
                <?php include ("blocks/header.php"); ?>
               
                <!-- Main body -->
                <div id="main">
                    <form name="form1" action="add_cat.php" method="post">
                    <p><input type="text" name="main_title" id="main_title" placeholder="Введите title категории" width="50%"></p>
                    <p><input type="text" name="title" id="title" placeholder="Введите название категории" width="50%"></p>
                    <p><input type="text" name="meta_d" id="meta_d" placeholder="Введите краткое описание категории(meta-description)" width="50%"></p>
                    <p><input type="text" name="meta_k" id="meta_k" placeholder="Введите ключевые слова для категории" width="50%"></p>
                    <p><textarea name="text" id="text" cols="60" rows="15" placeholder="Введите описаение категории"></textarea></p>
                    <p> <input type="submit" name="submit" id="submit" value="Добавить категорию"></p>
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

