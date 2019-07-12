<?php
include 'libs/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $config['title']; ?></title>
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
              <h3>Все вопросы</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">
                   <?php
                 $article = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC");
                 while($art = mysqli_fetch_assoc($article))
                 { ?>
                  <article class="article">
                    <div class="article__info">
                      <a href="/article.php?id=<? echo $art['id']; ?>"><?php echo $art['title']; ?></a>
                      <div class="article__info__meta">
                        <small><a href="#"><?php echo $cat['categorie']; ?></a></small>
                      </div>
                      <div class="article__info__preview"><?php echo mb_substr($art['text'], 0, 100, 'utf-8') . '...'; ?></div>
                    </div>
                  </article>
                 <?php                  
                };
                 ?>
                  
                
                </div>
              </div>
            </div>

         
          
        </div>
      </div>
    </div>
<?php
  include 'footer.php';
?>
  </div>

</body>
</html>
