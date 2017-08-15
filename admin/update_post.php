<?php
/**
 * Created by Johnny Wester.
 * Date: 09.06.17
 * Time: 10:30
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
if (isset ($_POST ['meta_d'])) 
    {
        $meta_d = $_POST ['meta_d']; 
        if ($meta_d == '') 
        {
            unset($meta_d);
        }
    }
if (isset ($_POST ['meta_k'])) 
    {
        $meta_k = $_POST ['meta_k']; 
        if ($meta_k == '') 
            {
                unset($meta_k);
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
if (isset ($_POST ['description'])) 
    {
        $description = $_POST ['description']; 
        if ($description == '') 
            {
                unset($description);
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
if (isset ($_POST ['author'])) 
    {
        $author = $_POST ['author']; 
        if ($author == '') 
            {
                unset($author);
            }
        }
if (isset ($_POST ['image'])) 
    {
        $image = $_POST ['image']; 
        if ($image == '')
         {
            unset($image);
        }
    }
if (isset ($_POST ['mini_img'])) 
    {
        $mini_img = $_POST ['mini_img']; 
        if ($mini_img == '') 
            {
                unset($mini_img);
            }
        }
if (isset ($_POST ['cat'])) 
    {$cat = $_POST ['cat']; 
if ($cat == '') 
    {
        unset($cat);
    }
}
if (isset ($_POST ['title_description'])) 
{
        $title_description = $_POST ['title_description']; 
        if ($title_description == '') 
            {
                unset($title_description);
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
        <title>Редактирование заметки</title>
    </head>
    <body>
        <div id="wrapper" class="main_border">
                 <!-- Header --> 
                <?php include ("blocks/header.php"); ?>
               
                <!-- Main body -->
                <div id="main">
                  <?php 
                    if (isset ($title) && isset ($title_description) && isset ($meta_d) && isset ($meta_k) && isset ($date) && isset ($description) && isset ($text) 
                    && isset ($author) && isset ($image) && isset ($mini_img) && isset ($cat)) 
                      {
                      $result = mysql_query("UPDATE data SET title='$title', meta_d='$meta_d', meta_k='$meta_k', `date`='$date', description='$description', `text`='$text', author='$author', cat='$cat', image='$image', mini_img='$mini_img', title_description='$title_description' WHERE id='$id'");
                      if ($result == 'true') {
                      echo "<p>Вашa заметка успешно отредактирована!</p>";
                      }

                      else { echo "<p>Ваш заметка не отредактирована</p>";}
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