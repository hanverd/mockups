<?php

$config = array_merge([
  'name' => '',
  'sections' => [],
], require('config.php'));

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
                $link = $item['url'];
                $icon = isset($item['icon']) ? $item['icon'] : 'file-o';
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
      <p class="thanks">Thank you!</p>
    </footer>
  </body>
</html>
