<?php

$config = array_merge([
  'name' => '',
  'sections' => [],
], require('files/config.php'));

if (!isset($_GET['page'])) {
  $view = 'index';
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Preview of <?php echo $config['name']; ?></title>
    <link href="main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>

    <?php if ($view == 'index') : ?>
      <header class="header">
        <h1><?php echo $config['name']; ?></h1>
        <p>Take a look at your files.</p>
        <ul>
          <li class="missing">Not Yet Started</li>
          <li class="done">Completed</li>
        </dl>
      </header>

      <?php foreach ($config['sections'] as $section) : ?>
        <section class="list">
          <header>
            <h1><?php echo $section['name']; ?></h1>
            <?php if ($section['description']) : ?>
              <p><?php echo $section['description']; ?></p>
            <?php endif; ?>
          </header>
          <ul class="<?php echo $section['layout']; ?>">
            <?php foreach ($section['items'] as $item) : ?>
              <li class="<?php echo $item['class']; ?>">
                <a href="<?php echo $item['link']; ?>"><?php echo $item['name']; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </section>
      <?php endforeach; ?>

      <footer class="footer">
        <p class="thanks"><a href="http://hanverd.com"><img src="logo.png" alt=""></a> Thank you for choosing us!</p>
      </footer>
    <?php endif; ?>

    <?php if ($view == 'design') : ?>
      <a href="index.php" class="back">&laquo;</a>

      <div class="design">
        <img src="projects/Escape/different.png" alt="">
      </div>
    <?php endif; ?>

    <?php if ($view == 'device') : ?>
      <div class="preview">
        <div class="device">
          <div class="tablet tablet-vertical">
            <div class="screen">
              <img src="http://placehold.it/1024x2000" alt="">
            </div>
            <div class="home"></div>
          </div>
        </div>
      </div>

      <div class="preview">
        <div class="device">
          <div class="tablet tablet-horizontal">
            <div class="screen">
              <img src="http://placehold.it/1024x2000" alt="">
            </div>
            <div class="home"></div>
          </div>
        </div>
      </div>

      <div class="preview">
        <div class="device">
          <div class="phone phone-vertical">
            <div class="screen">
              <img src="http://placehold.it/1024x2000" alt="">
            </div>
            <div class="home"></div>
          </div>
        </div>
      </div>

      <div class="preview">
        <div class="device">
          <div class="phone phone-horizontal">
            <div class="screen">
              <img src="http://placehold.it/1024x2000" alt="">
            </div>
            <div class="home"></div>
          </div>
        </div>
      </div>
    <?php endif; ?>

  </body>
</html>
