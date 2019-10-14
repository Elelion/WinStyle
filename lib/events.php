<?php
require_once 'functions.php';
require_once 'DbHelperPDO.php';

date_default_timezone_set('Europe/Moscow');
$dbHelperPDO = new DbHelperPDO;

// **

if (!$dbHelperPDO->getLastError()) {
  if (isset($_POST['clearAll'])) {
    clearAllDB();
  }

  if (isset($_POST['professionsFill'])) {
    fillProfessionsDB();
  }

  if (isset($_POST['workersFill'])) {
    fillWorkersDB();
  }

  if (isset($_POST['usersFill'])) {
    fillUsersDB();
  }

  if (isset($_POST['paymentFill'])) {
    fillPaymentDB();
  }
}

header("Location: ".$_SERVER['HTTP_REFERER']);
?>