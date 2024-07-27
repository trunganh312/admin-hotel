<?php
require_once 'simple_html_dom.php';

$content =  file_get_html('https://vietgoing.com/hotel/city-48-da-nang.html?utm_web=5');

$title = $content->find('.style-list', 0);

$title = $title->find('h4');

var_dump($title);
