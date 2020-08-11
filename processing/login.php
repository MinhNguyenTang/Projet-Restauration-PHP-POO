<?php

session_start();

require_once('../manager/manager_methods.php');
require_once('../model/model_member.php');


$member = new member((
  'email' => $_POST['email'],
  'pass' => $_POST['pass']
));

$manager_log = new methods();
$manager_log->login($login);
}
 ?>
