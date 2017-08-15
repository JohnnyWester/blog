<?php
/**
 * Created by Johnny Wester.
 * Date: 08.06.17
 * Time: 17:36
 */
?>

<?php include ("lock.php"); ?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <title>Редактировать заметку</title>
    </head>
    <body>
        <div id="wrapper" class="main_border">
                 <!-- Header --> 
                <?php include ("blocks/header.php"); ?>
               
                <!-- Main body -->
                <div id="main">
                      <?php 
                                    $id = $_GET['id'];
                                    if (!isset ($id)) 
                                    {
                                        $result = mysql_query("SELECT title, id FROM `data`");
                                        $myrow = mysql_fetch_array($result); 
                                        // var_dump($myrow['id']);die;
                                            do {
                                                printf ("<p><a href='edit_post.php?id=%s'>%s</a></p>", $myrow ["id"], $myrow ["title"]);
                                                }
                                            while ($myrow = mysql_fetch_array($result)); 
                                    }
                                    else {
                                        $result = mysql_query("SELECT * FROM data WHERE id=$id");
                                        $myrow = mysql_fetch_array($result); 

                                        $result2 = mysql_query("SELECT id, title FROM categories");
                                        $myrow2 = mysql_fetch_array($result2);

                                               echo "<form name='form1' action='update_post.php' method='post'>
                                                    <p>Выберите категорию заметки: <br /><br />
                                                        <select name='cat' id='cat' size=''>";

                                                    do 
                                                    {
                                                        if ($myrow['cat'] == $myrow2['id']) 
                                                        {
                                                            printf ("<option value='%s' selected>%s</option>", $myrow2['id'], $myrow2['title']);
                                                        }
                                                        else 
                                                        {
                                                        printf ("<option value='%s'>%s</option>", $myrow2['id'], $myrow2['title']);
                                                        }
                                                    }
                                                    while ($myrow2 = mysql_fetch_array($result2));

                                                    echo "</select></p>";
                                           
                                            print <<<HERE
                                                    <p>
                                                        <input value="$myrow[title]" type="text" name="title" id="title" placeholder="Введите название заметки" width="50%">
                                                    </p>
                                                    <p>
                                                        <input type="text" name="title_description" value="$myrow[title_description]"  id="title_description" placeholder="Введите описание под название заметки">
                                                    </p>
                                                    <p>
                                                        <input value="$myrow[meta_d]" type="text" name="meta_d" id="meta_d" placeholder="Введите краткое описание заметки" width="50%">
                                                    </p>
                                                    <p>
                                                        <input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k" placeholder="Введите ключевые слова для заметки" width="50%">
                                                    </p>
                                                    <p>
                                                        <input value="$myrow[date]" type="text" name="date" id="date" placeholder="Введите дату добавлениязаметки" value="2017-01-01">
                                                    </p>
                                                    <p>
                                                        <textarea name="description" id="description" cols="60" rows="5" placeholder="Введите краткое описание заметки (с тэгами)">$myrow[description]</textarea>
                                                    </p>
                                                    <p>
                                                        <textarea name="text" id="text" cols="60" rows="15" placeholder="Введите полный текст заметки (с тэгами)">$myrow[text]"</textarea>
                                                    </p>
                                                    <p>
                                                        <input value="$myrow[author]" type="text" name="author" id="author" placeholder="Введите автора заметки">
                                                    </p>
                                                    <input name="id" type="hidden" value="$myrow[id]">
                                                     <p>
                                                        <input type="text" name="image" id="image" value="$myrow[image]" placeholder="Путь к картинке поста">
                                                    </p>
                                                     <p>
                                                        <input type="text" name="mini_img" value="$myrow[mini_img]"  id="mini_img" placeholder="Путь к аватарке автора поста">
                                                    </p>
                                                    <p> 
                                                        <input type="submit" name="submit" id="submit" value="Сохранить изменения">
                                                    </p>

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
