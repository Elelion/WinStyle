<?php
require_once 'DbHelperPDO.php';
require_once 'functions.php';

class Months
{
  private $dbHelperPDO = null;
  private $id = null;
  private $eu = null;
  protected $payment = 0;
  protected $salary = 0;

  public function __construct()
  {
    $this->dbHelperPDO = new DbHelperPDO;
    $this->id = htmlspecialchars(intval($_GET['id']));
  }

  // **

  private function setSalaryQuery($i)
  {
    $this->dbHelperPDO->executeQuery("SELECT
      image_file, name, sur_name, position, salary, month, year
        FROM payment WHERE id = '$i'");

    $this->payment = $this->dbHelperPDO->getQueryResult();
  }

  private function executeCurrencyFormat($salary)
  {
    if ($this->currency === 'eu') {
      $this->salaryEu = ceil($salary / $this->eu);
      $this->salary = number_format($this->salaryEu, 0, ',', ' ') . ' $';
    } else {
      $this->salary = number_format($salary, 0, ',', ' ')  . ' ₽';
    }
  }

  private function setEu($value)
  {
    if ($this->currency === 'eu') {
      $this->eu = $value;
    }
  }

  // **

  public function outPutData()
  {
    for ($i = $this->id; $i <= 180; $i = $i + 12) {
      $this->setSalaryQuery($i);

      foreach ($this->payment as $row) {
        $this->currency = getCurrency();
        $this->setEu(64.15);
        $this->executeCurrencyFormat($row['salary']);

        ?>
          <tr>
            <td><?=$row['name']?></td>
            <td><?=$row['sur_name']?></td>
            <td><?=$row['position']?></td>
            <td><?=$this->salary?></td>
            <td>
              <img class="table__view"
                src="./src/images/<?= $row['image_file'] ?>.jpg"
                width='15' id='' />
            </td>
            <td><?=$row['month']?></td>
            <td><?=$row['year']?></td>
          </td>
        </tr>
        <?php
      }
    }
  }
}
?>