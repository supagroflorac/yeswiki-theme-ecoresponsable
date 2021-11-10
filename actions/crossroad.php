<?php
if (!defined("WIKINI_VERSION")) {
    die("acc&egrave;s direct interdit");
}

$link = $this->getParameter('link', 'http://perdu.com');
$title = $this->getParameter('title', 'Titre à ajouter');
$text = $this->getParameter('text', 'Description à ajouter.');
$color = $this->getParameter('color', 'social');
$image = $this->getParameter('image', 'crossroad-default-image.png');
$class = $this->getParameter('class', '');

if (substr($link, 0, 4) !== 'http') {
    $link = "?{$link}";
}

$form = new \YesWiki\WikiniFormatter($this);
$text = $form->format($text);

print("<article class='crossroad-item {$class}'>
  <h1 class='eco-title {$color}' title='{$title}' >{$title}</h1>
  <img src='custom/themes/ecoresponsables/images/{$image}' />
  <p class='description'>{$text}</p> 
  <a class='eco-btn {$color}' href='{$link}'>Lire la suite</a>
</article>
");
