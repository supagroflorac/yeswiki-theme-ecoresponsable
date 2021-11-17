<?php
if (!defined("WIKINI_VERSION")) {
    die("accès direct interdit");
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

$html = "<article class='eco-bloc {$class}'>
  <h1 class='eco-bloc-title eco-title {$color}' title='{$title}' >{$title}</h1>
  <img class='eco-bloc-img' src='custom/themes/ecoresponsables/images/{$image}' />
  <div class='eco-bloc-content'>
      <p>{$text}</p>
  </div>
  <span class='eco-bloc-buttons'>
    <a class='eco-btn {$color}' href='{$link}'>Lire la suite</a>
  </span>
</article>\n";

echo("{$html}");
