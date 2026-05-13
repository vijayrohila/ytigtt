<?php

include 'inc/config.php';

if (!isset($_GET['page']) || empty($_GET['page'])) {
  $page = 'index';
} else {
  $page = $_GET['page'];
  $og_url = $site_url . "/" . $page;
}


$inc_file = TPL_PATH . $page . '.php';

if (file_exists($inc_file)) {
  include($inc_file);
} else {
  header('Location: ./404');
}
