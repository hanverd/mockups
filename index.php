<?php

$config = array_merge(array(
  'name' => '',
  'sections' => array(),
), require('config.php'));

switch($_GET['layout']) {
  case 'design':
  case 'tablet':
  case 'phone':
    $layout = $_GET['layout'];
    break;
  default:
    $layout = 'list';
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
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

    <?php if ($layout == 'list') : ?>
      <header class="header">
        <h1><?php echo $config['name']; ?></h1>
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
                <?php
                  $link = $item['type'] == 'link'
                    ? $item['url']
                    : '?layout='.$item['type'].'&amp;url='.$item['url'];
                  $icon = isset($item['icon'])
                    ? $item['icon']
                    : 'file-o';
                ?>
                <a href="<?php echo $link; ?>">
                  <?php if ($icon): ?>
                    <i class="fa fa-<?php echo $icon; ?>"></i>
                  <?php endif; ?>
                  <span><?php echo $item['name']; ?></span>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </section>
      <?php endforeach; ?>

      <footer class="footer">
        <p class="thanks"><a href="http://hanverd.com"><img src="logo.png" alt=""></a> Thank you for choosing us!</p>
      </footer>
    <?php endif; ?>

    <?php if ($layout == 'design') : ?>
      <a href="<?php echo dirname($_SERVER['REQUEST_URI']); ?>" class="back">&laquo;</a>

      <div class="design">
        <img src="files/<?php echo $_GET['link']; ?>" alt="">
      </div>
    <?php endif; ?>

    <?php if ($layout == 'tablet') : ?>
      <a href="<?php echo dirname($_SERVER['REQUEST_URI']); ?>" class="back">&laquo;</a>

      <div class="preview">
        <div class="device">
          <div class="tablet tablet-vertical">
            <div class="screen">
              <img src="files/<?php echo $_GET['link']; ?>" alt="">
            </div>
            <div class="home"></div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($layout == 'phone') : ?>
      <a href="<?php echo dirname($_SERVER['REQUEST_URI']); ?>" class="back">&laquo;</a>

      <div class="preview">
        <div class="device">
          <div class="phone phone-vertical">
            <div class="screen">
              <img src="files/<?php echo $_GET['link']; ?>" alt="">
            </div>
            <div class="home"></div>
          </div>
        </div>
      </div>
    <?php endif; ?>

  </body>
</html>
