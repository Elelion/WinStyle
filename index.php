<?php
require_once 'lib/DbHelperPDO.php';
require_once 'lib/Months.php';

date_default_timezone_set('Europe/Moscow');
$dbHelperPDO = new DbHelperPDO;
$month = new Months;

// **

if (empty($_GET['id'])) {
  header('Location: ./index.php?id=1');
} else {
  $page = htmlspecialchars(intval($_GET['id']));

  if (isset($_POST['foward'])) {
    if ($_GET['id'] < 12) {
      $page++;
      header('Location: ./index.php?id='.$page);
    }
  }

  if (isset($_POST['back'])) {
    if ($_GET['id'] > 1) {
      $page--;
      header('Location: ./index.php?id='.$page);
    }
  }
}

// **

$file = basename(__FILE__, '.php');
require './src/' . $file . '.html';
?>