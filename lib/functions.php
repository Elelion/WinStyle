<?php
require_once 'DbHelperPDO.php';

// **

function clearAllDB()
{
  $dbHelperPDO = new DbHelperPDO;
  $dbHelperPDO->executeQuery('TRUNCATE TABLE professions');
  $dbHelperPDO->executeQuery('TRUNCATE TABLE workers');
  $dbHelperPDO->executeQuery('TRUNCATE TABLE payment');
  $dbHelperPDO->executeQuery('TRUNCATE TABLE users');
}

// ----------------------------------------------------------------------------

function fillProfessionsDB()
{
  $dbHelperPDO = new DbHelperPDO;
  $dbHelperPDO->executeQuery('TRUNCATE TABLE professions');
  $dbHelperPDO->executeQuery("INSERT INTO professions
    (position, min_salary, max_salary)
    VALUES
    ('бухгалтер', 70000, 80000),
    ('курьер', 30000, 40000),
    ('менеджер', 50000, 60000)");
}

// ----------------------------------------------------------------------------

function fillWorkersDB()
{
  $dbHelperPDO = new DbHelperPDO;
  $dbHelperPDO->executeQuery('TRUNCATE TABLE workers');

  for ($i = 0; $i < 15; $i++) {
    $randomId = rand(1, 3);
    $dbHelperPDO->executeQuery("SELECT position FROM professions
      WHERE id = '$randomId'");

    $positionKey = $dbHelperPDO->getQueryResult();
    foreach ($positionKey as $row) {
      $position = $row['position'];
    }

    // **

    $dbHelperPDO->executeQuery("SELECT name FROM users ORDER BY RAND()");
    $nameKey = $dbHelperPDO->getQueryResult();
    foreach ($nameKey as $row) {
      $name = $row['name'];
    }

    // **

    $dbHelperPDO->executeQuery("SELECT sur_name FROM users ORDER BY RAND()");
    $surnameKey = $dbHelperPDO->getQueryResult();
    foreach ($surnameKey as $row) {
      $surname = $row['sur_name'];
    }

    // **

    $image = rand(1, 15);
    $dbHelperPDO->executeQuery("INSERT INTO
      workers (name, sur_name, position, image_file) VALUES
      ('$name', '$surname', '$position', '$image')");
  }
}

// ----------------------------------------------------------------------------

function fillUsersDB()
{
  $dbHelperPDO = new DbHelperPDO;
  $dbHelperPDO->executeQuery('TRUNCATE TABLE users');
  $dbHelperPDO->executeQuery("INSERT INTO users (name, sur_name) VALUES
    ('Иван', 'Иванов'),
    ('Ирина', 'Петров'),
    ('Светлана', 'Сидоровский'),
    ('Петр', 'Великий'),
    ('Анастасия', 'Мелкий'),
    ('Владимир', 'Крупный'),
    ('Михаил', 'Подгорный'),
    ('Абдул', 'Картвилишвили'),
    ('Николай', 'Орлов'),
    ('Игорь', 'Носов'),
    ('Ариана', 'Сорокин'),
    ('Мария', 'Ковалев'),
    ('Валерий', 'Белов'),
    ('Валентина', 'Горький'),
    ('Ангелина', 'Красивый'),
    ('Джон', 'Уик')");
}

// ----------------------------------------------------------------------------

function fillPaymentDB()
{
  $dbHelperPDO = new DbHelperPDO;
  $dbHelperPDO->executeQuery('TRUNCATE TABLE payment');

  // **

  $dbHelperPDO->executeQuery("SELECT name, sur_name, image_file, position
    FROM workers");

  $nameSurKey = $dbHelperPDO->getQueryResult();
  foreach ($nameSurKey as $row) {
    $name = $row['name'];
    $surname = $row['sur_name'];
    $image = $row['image_file'];
    $position = $row['position'];

    for ($i = 1; $i <= 12; $i++) {
      $dbHelperPDO->executeQuery("SELECT min_salary, max_salary FROM professions
        WHERE position = '$position'");

      $salaryKey = $dbHelperPDO->getQueryResult();
      foreach ($salaryKey as $row) {
        $minSalary = $row['min_salary'];
        $maxSalary = $row['max_salary'];
        $salary = rand($minSalary, $maxSalary);
      }

      $dbHelperPDO->executeQuery("INSERT INTO payment
        (image_file, name, sur_name, position, salary, month, year)
        VALUES
        ('$image', '$name', '$surname', '$position', '$salary', '$i', 2018)");
    }
  }
}

// ----------------------------------------------------------------------------

function getCurrency()
{
  if (empty($_POST['currencyApply'])) {
    $currency = 'ru';
  } else {
    if (isset($_POST['currencyApply'])) {
      $currency = $_POST['currency'];
    }
  }

  return $currency;
}

?>