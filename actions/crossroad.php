<?php
if (!defined("WIKINI_VERSION")) {
    die("acc&egrave;s direct interdit");
}

$link = $this->getParameter('link');
$title = $this->getParameter('title');
$text = $this->getParameter('text');
$image = $this->getParameter('image');

print("
<a href='?{$link}' class='crossroad-item' style='background: url(custom/themes/ecoresponsables/images/${image}); background-size: cover;'>
  <h1>{$title}</h1>
  <p>{$text}</p>
</a>
");
