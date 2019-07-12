<?php
include 'libs/db.php';
?>
<header id="header">
      <div class="header__top">
        <div class="container">
          <div class="header__top__logo">
            <h1><?= $config['title']; ?></h1>
          </div>
          <nav class="header__top__menu">
            <ul>
              <li><a href="/">Главная</a></li>
            </ul>
          </nav>
        </div>
      </div>

      <div class="header__bottom">
        <div class="container">
         
          <nav>
            <ul>
              <a href="../question.php" class="question">Создать вопрос</a>
            </ul>
          </nav>
        </div>
      </div>
    </header>
