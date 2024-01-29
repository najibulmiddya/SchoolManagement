<?php


defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Student
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Najibul Middya
 * @param     ...
 * @return    ...
 *
 */

class Demo extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $fact = 1;
    for ($i = 5; $i >= 1; $i--) {
      $fact = $i * $fact;
    }
    echo 'factroil no' . $fact;
    echo '<br>';

    for ($i = 1; $i <= 5; $i++) {
      for ($j = 0; $j < $i; $j++) {
        echo '*';
      }
      echo '<br>';
    }
    for ($i = 1; $i <= 5; $i++) {
      for ($j = 0; $j < $i; $j++) {
        echo $i;
      }
      echo '<br>';
    }
    for ($i = 1; $i <= 5; $i++) {
      for ($j = 1; $j <= $i; $j++) {
        echo $j;
      }
      echo '<br>';
    }

    for ($i = 5; $i >= 1; $i--) {
      for ($j = 1; $j <= $i; $j++) {
        echo '*';
      }
      echo '<br>';
    }
    for ($i = 5; $i >= 1; $i--) {
      for ($j = 1; $j <= $i; $j++) {
        echo $i;
      }
      echo '<br>';
    }
    for ($i = 5; $i >= 1; $i--) {
      for ($j = 1; $j <= $i; $j++) {
        echo '*';
      }
      echo '<br>';
    }
    $n = 4;
    for ($i = 1; $i <= $n; $i++) {
      for ($j = 0; $j <= (2 * $n) - 1; $j++) {
        echo '*';
      }
      echo '<br>';
    }


    $arr = array('najibul', 'middya', 20, 'm', 62952574414);

    echo 'count- ' . count($arr) . '<br>';
    echo 'implode- ' . $implode_arr = implode(',', $arr);
    $explode_arr = explode(',', $implode_arr);
    echo '<pre>';
    print_r($explode_arr);
    echo '<pre>';

    $arr1 = [
      'name' => 'najibul',
      'age' => 23,
      'mobule' => 6295257441,
      'gender' => 'M'
    ];
    echo '<br> implode- ' . $implode_arr1 = implode(',', $arr1);
    $explode_arr1 = explode(',', $implode_arr1);
    // pp($explode_arr1);
    $pattern = '/[\s,]+/';
    $string = 'This is a test,string';
    echo '<br> ' . $string . '<br>';

    $parts = preg_split($pattern, $string);

    print_r($parts);
    $fruits = array(
      "lemon", "orange", "banana", "apple"
    );
    sort($fruits);
    foreach ($fruits as $key => $val) {
      echo "fruits[" . $key . "] = " . $val . "\n";
    }
    echo implode(', ', range(0, 12)), PHP_EOL;

    print_r(key($arr1));
    $str = 'lorem ipsum dolor sit, amet consectetur adipisicing elit';
    echo '<br>' . $str;
    echo '<br>' . wordwrap($str, 15, "\n", true);
    echo '<br>' . ucfirst($str);
    echo '<br>' . ucwords($str);
    echo '<br>' . strrev($str) . '<br>';
    $pass = 'najibu';
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    echo 'Hash = ' . $hash, '<br>';
    if (password_verify('najibu', $hash)) {
      echo 'Password is valid!';
    } else {
      echo 'Invalid password.';
    }

    echo '<br> <br>';

    $strings = 'Lorem ipsum dolor sit amet consectetur adipisicing elit';
    echo strlen($strings);
    $string = "Hii everyone!";
    $search = 'Hii';
    $replace = 'Hello';
    $newstr = str_replace($search, $replace, $string, $count);
    echo '<br>';
    echo $newstr . '</br>';
    echo 'Number of replacement =' . $count;
    echo '<br>';

    echo substr($string, 5, 10);
    echo '<br>';
    echo strtolower($string);
    echo '<br>';
    echo strtoupper($string);
    echo '<br>';
    echo str_word_count($string);
    echo '<br>';
    echo strrev($string);
    echo '<br>';
    echo ucwords($string);
    echo '<br>';
    echo ucfirst($string);
    echo '<br>';
    echo lcfirst($string);
    $s = 'naji <b>mid</b>';
    echo '<br>';
    echo strip_tags($s);
  }

  public function demo()
  {
    $a = 5;
    $b = 4;
    echo "A= 5 ";
    echo "B= 4 <br>";
    $a = $a + $b;
    $b = $a - $b;
    echo 'B = ' . $b . "<br>";
    $a = $a - $b;
    echo "A = ".$a ."<br>";

    function table($no, $i){
      if($i > 10){
        return false;
      }else{
        echo $no * $i ;
        echo "<br>";
        table($no,++$i);
      }
    }
    table($no=5, $i=1);
    
    for ($i=1; $i <= 10; $i++) { 
      echo 5*$i ."<br>";
    }
  }
  
}

/* End of file Student.php */
/* Location: ./application/controllers/Student.php */

// dfflxzeugykgbrzu
