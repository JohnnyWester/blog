<?php
/**
 * Created by Johnny Wester.
 * Date: 31.05.17
 * Time: 15:41
 */
?>

<?php 
include ("blocks/db.php");
if (isset ($_POST ['id'])) {$id = $_POST ['id'];}
include ("lock.php");
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <title>Удаление категории</title>
    </head>
    <body>
        <div id="wrapper" class="main_border">
                 <!-- Header --> 
                <?php include ("blocks/header.php"); ?>
               
                <!-- Main body -->
                <div id="main">
                    <?php 
                      if (isset ($id)) {
                      $result = mysql_query("DELETE FROM categories WHERE id='$id'");
                      // var_dump($result);
                      if ($result == 'true') {
                      echo "<p>Категория успешно удалена!</p>";
                      }

                      else {echo "<p>Категория не удалена!</p>";}
                      } 

                      else {
                      echo "<p>Выберете категорию.</p>";
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