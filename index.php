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
    <title>Preview of <?php echo $config['name'] ?></title>
    <style>html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:"";content:none}table{border-collapse:collapse;border-spacing:0}body{font:16px/24px "Open Sans",sans-serif;color:#46494D;background:#F2F4F2;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;text-size-adjust:none}a{color:#46494D;text-decoration:none}a:hover,a:focus{color:#DF1C30}.header,.list,.footer{max-width:800px;margin-left:auto;margin-right:auto}@media (max-width: 1024px){.header,.list,.footer{padding:0 48px}}@media (max-width: 768px){.header,.list,.footer{padding:0 24px}}.header{margin-top:48px;margin-bottom:48px}.header h1{position:relative;font:bold 32px/32px "Helvetica Neue",Arial,sans-serif;text-transform:uppercase;color:#23262C}.header p{margin-top:12px}.header li{display:inline-block;margin-right:12px;margin-top:12px;font-size:14px}.header li:before{content:"";display:inline-block;height:12px;width:12px;margin-right:6px}.header li.missing:before{background:#6a6f75}.header li.done:before{background:#DF1E30}@media (max-width: 768px){.header{margin-top:24px;margin-bottom:24px}.header h1 span{display:block}.header h1 span:before{content:""}}.list{margin-top:48px;margin-bottom:48px;overflow:hidden}.list header{margin-bottom:24px}.list h1{font-family:"Helvetica Neue", Arial, sans-serif;font-weight:bold;font-size:20px;text-transform:uppercase;color:#23262C}.list p{margin-top:12px;font-size:14px}.list li{line-height:24px;border-top:1px solid #ddd}.list li a{display:block;padding:12px;color:#6a6f75}.list li a i{margin-right:6px}.list li a:hover span{text-decoration:underline}.list li:nth-child(odd){clear:both}.list li.done,.list li.done a{color:#DF1E30}.list li.done:before{float:right;content:"✔";padding:12px}.list .split{margin:0 -2%}.list .split li{float:left;width:46%;margin:0 2%}@media (max-width: 768px){.list .split{margin:0}.list .split li{float:none;width:auto;margin:0}}.footer{margin-top:48px;margin-bottom:48px;font-size:14px}.footer img{margin-right:6px;height:16px}@media (max-width: 768px){.footer{margin-top:24px;margin-bottom:24px}}@media (max-width: 480px){.footer img{display:block;margin-bottom:6px}}</style>
  </head>
  <body>
    <header class="header">
      <h1><?php echo $config['name'] ?></h1>
      <ul>
        <li class="missing">Not Yet Started</li>
        <li class="done">Completed</li>
      </dl>
    </header>

    <?php foreach ($config['sections'] as $section): ?>
      <section class="list">
        <header>
          <h1><?php echo $section['name'] ?></h1>
          <?php if ($section['description']): ?>
            <p><?php echo $section['description'] ?></p>
          <?php endif ?>
        </header>
        <ul class="<?php echo $section['layout'] ?>">
          <?php foreach ($section['items'] as $item): ?>
            <li class="<?php echo $item['class'] ?>">
              <a href="<?php echo $item['url'] ?>">
                <i class="fa fa-<?php echo $item['icon'] ?: 'file-o' ?>"></i>
                <span><?php echo $item['name'] ?></span>
              </a>
            </li>
          <?php endforeach ?>
        </ul>
      </section>
    <?php endforeach ?>

    <?php if ($config['footer']): ?>
      <footer class="footer">
        <p class="thanks">Thank you!</p>
      </footer>
    <?php endif ?>
  </body>
</html>
