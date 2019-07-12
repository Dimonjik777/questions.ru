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
              <?php
              $article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);
              if(mysqli_num_rows($article) <= 0)
              {
                ?>
                <h3>Страница не найдена</h3>
              <div class="block__content">

                <div class="full-text">
                  Запрашиваемый вами вопрос не найден!
                </div>
              </div>
                <?php
              }else
              {
                $art = mysqli_fetch_assoc($article);
                ?>
                 <h3><?php echo $art['title']; ?></h3>
              <div class="block__content">
                  <p>Написал:<? echo $art['author']; ?></p>
                 <p>В:<? echo $art['pubdate']; ?></p>
                <div class="full-text">
                 <? echo $art['text']; ?>

                </div>
              </div>
                <?
              };
              ?>
              
            </div>

            <div class="block">
              <a href="#comment-add-form">Добавить свой</a>
              <h3>Ответы на вопрос</h3>
              <div class="block__content">
                <div class="articles articles__vertical">
                    <?php
                    //Connection table in comments
                    $comment = mysqli_query($connection, "SELECT * FROM `comments` WHERE `article_id` =" . (int)$art['id'] . " ORDER BY `id` DESC");
                    while($com = mysqli_fetch_assoc($comment))
                    {
                      ?>
                      <article class="article">
                    <div class="article__info">
                      <p><? echo $com['name'] . ' или ' . $com['nickname']; ?></p>
                      <div class="article__info__meta">
                        <small><? echo $com['pubdate']; ?></small>
                      </div>
                      <div class="article__info__preview"><? echo $com['text']; ?></div>
                    </div>
                  </article>
                      <?php
                    };
                    ?>
                  
                </div>
              </div>
            </div>

            <div class="block" id="comment-add-form">
              <h3>Добавить ответ</h3>
              <div class="block__content">
                <form class="form" method="post">
                  <?php
                  if(isset($_POST['do_post']))
                  {
                    $errors = [];
                    if($_POST['name'] == '')
                    {
                      $errors[] = 'Введите имя';
                    }
                    if($_POST['nickname'] == '')
                    {
                      $errors[] = 'Введите никнейм';
                    }
                    if($_POST['text'] == '')
                    {
                      $errors[] = 'Напишите вопрос';
                    }
                    if(empty($errors))
                    {
                      //Add answer
                      mysqli_query($connection, "INSERT INTO `comments`(`name`,`nickname`,`text`,`pubdate`,`article_id`) VALUES('".$_POST['name']."', '".$_POST['nickname']."', '".$_POST['text']."', NOW(), '".$art['id']."')");
                      echo '<span style="color: green;"> Ответ успешно добавлен!</span>';
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
                        <input type="text" class="form__control" required="" name="name" placeholder="Имя">
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form__control" required="" name="nickname" placeholder="Никнейм">
                      </div>
                    </div>
                  </div>
                  <div class="form__group">
                    <textarea name="text" required="" class="form__control" name="text" placeholder="Текст ответа ..."></textarea>
                  </div>
                  <div class="form__group">
                    <input type="submit" class="form__control" name="do_post" value="Добавить ответ">
                  </div>
                </form>    
              </div>
            </div>
          </section>
 
      </div>
    </div>

   <? include 'footer.php'; ?>

  </div>

</body>
</html>
