<?php
if (!defined("WIKINI_VERSION")) {
    die("acc&egrave;s direct interdit");
}

$link = $this->getParameter('link');
$title = $this->getParameter('title');
$text = $this->getParameter('text');
//$image = $this->getParameter('image');
$image = "crossroad-default-image.png";

print("<article class='crossroad-item'>
  <h1>{$title}</h1>
  <img src='custom/themes/ecoresponsables/images/{$image}' />
  <p>{$text}</p> 
  <a class='crossroad-button' href='?{$link}'>Lire la suite</a>
</article>
");
