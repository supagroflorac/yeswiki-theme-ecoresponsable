<?php
if (!defined("WIKINI_VERSION")) {
    die("acc&egrave;s direct interdit");
}

$link = $this->getParameter('link', 'http://perdu.com');
$title = $this->getParameter('title', 'Titre à ajouter');
$text = $this->getParameter('text', 'Description à ajouter.');
$color = $this->getParameter('color', 'social');
$image = $this->getParameter('image', 'crossroad-default-image.png');

print("<article class='crossroad-item'>
  <h1 class='{$color}' white top left no-repeat;'>{$title}</h1>
  <img src='custom/themes/ecoresponsables/images/{$image}' />
  <p>{$text}</p> 
  <a class='crossroad-button {$color}' href='?{$link}'>Lire la suite</a>
</article>
");
