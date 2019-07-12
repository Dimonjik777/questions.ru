<?php
include 'libs/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><? echo $config['title']; ?></title>
    <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>
        <div id="wrapper">
<? include 'header.php'; ?>
    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">

              <div class="block__content">

            <div class="block" id="comment-add-form">
              <h3>Создать вопрос</h3>
              <div class="block__content">
                <form class="form" method="POST">
                  <?php
                  if(isset($_POST['do_post']))
                  {
                    $errors = [];
                    if($_POST['title'] == '')
                    {
                      $errors[] = 'Введите заголовок';
                    }
                    if($_POST['author'] == '')
                    {
                      $errors[] = 'Введите псевдоним';
                    }
                    if($_POST['text'] == '')
                    {
                      $errors[] = 'Напишите вопрос';
                    }
                    if(empty($errors))
                    {
                      //Add answer
                      mysqli_query($connection, "INSERT INTO `articles`(`title`,`text`,`author`,`pubdate`)VALUES('".$_POST['title']."', '".$_POST['text']."', '".$_POST['author']."', NOW())");
                      echo '<span style="color: green;"> Вопрос успешно добавлен!</span>';
                    }
                    else
                    {
                      echo array_shift($errors);
                    }
                  }
                  ?>
                  <div class="form__group">
                    <div class="row">
                      <div class="col-md-6">
                        <input type="text" class="form__control" required="" name="title" placeholder="Заголовок">
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form__control" required="" name="author" placeholder="Никнейм">
                      </div>
                    </div>
                  </div>
                  <div class="form__group">
                    <textarea name="text" required="" class="form__control" name="text" placeholder="Текст вопроса ..."></textarea>
                  </div>
                  <div class="form__group">
                    <input type="submit" class="form__control" name="do_post" value="Добавить вопрос">
                  </div>
                </form>    
              </div>
            </div>
          </section>
 
      </div>
    </div>


    <? include 'footer.php'; ?>
</body>
</html>
