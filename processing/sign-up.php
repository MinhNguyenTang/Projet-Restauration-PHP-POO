<?php

require_once('../manager/manager_methods.php');
require_once('../model/model_member.php');


if($_POST['pass'] != $_POST['confirm_pass'])
{
  echo '<body onLoad="alert(\'Different passwords!\')">';
  echo '<meta http-equiv="refresh" content="0;URL=sign-up.php">';
}
else
{
  $new_member = new member((
    'name' => $_POST['name'],
    'lastname' => $_POST['lastname'],
    'email' => $_POST['email'],
    'pass' => $_POST['pass']
  ));
  $manager_sign = new methods();
  $manager_sign->sign_up($signup);
}

 ?>
