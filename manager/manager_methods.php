<?php
//manager_methods.php
require_once('../model/model_member.php');

class methods
{


  public function login(member $login)
  {
    try {
      $bdd = new PDO('mysql:host=localhost;dbname=oop_site1;charset=utf8', 'root', '');
    } catch (PDOException $e) {
      die('Error :'.$e->getMessage());
    }
    $req = $bdd->prepare('SELECT * FROM account_user WHERE email=:email');
    $req->execute(array($login->getEmail()));
    $data = $req->fetch();

    if($data['email'] == $login->getEmail() AND $data['pass'] == $login->getPass())
    {
      session_start();
      $_SESSION['name'] = $data['name'];
      $_SESSION['lastname'] = $data['lastname'];
      $_SESSION['email'] = $login->getEmail();
      header('Location : index.php');
    }
    else
    {
      echo '<body onLoad="alert(\'Incorrect Email or password ! Please try again !\')">';
      echo '<meta http-equiv="refresh" content="0;URL=login.php">';
    }
  }


  public function sign_up(member $signup)
  {
    try {
      $bdd = new PDO('mysql:host=localhost;dbname=oop_site1;charset=utf8', 'root', '');
    } catch (PDOException $e) {
      die('Error :'.$e->getMessage());
    }
    $req = $bdd->prepare('SELECT * FROM account_user WHERE email=:email');
    $req->execute(array($signup->getEmail()));
    $data = $req->fetch();

    if($data)
    {
      echo '<body onLoad="alert(\'Existing user ! Please try again !\')">';
      echo '<meta http-equiv="refresh" content="0;URL=sign-up.php">';
    }
    else
    {
      $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT, 'cost' => 15);
      $req = $bdd->prepare('INSERT INTO account_user (name, lastname, email, pass, date_sign) VALUES (:name, :lastname, :email, :pass, CURDATE())');
      $req->execute(array($signup->getName(), $signup->getLastName(), $signup->getEmail(), password_hash($signup->getPass())));
      session_start();
      $_SESSION['name'] = $signin->getName();
      $_SESSION['lastname'] = $signin->getLastName();
    }
  }


  public function add_admin(member $admin)
  {
    try {
      $bdd = new PDO('mysql:host=localhost;dbname=oop_site1;charset=utf8', 'root', '');
    } catch (PDOException $e) {
      die('Error :'.$e->getMessage());
    }
    $req = $bdd->prepare('SELECT * FROM sign_up WHERE email=:email');
    $req->execute(array($admin->getEmail()));
    $data = $req->fetch();

    if($data)
    {
      echo '<body onLoad="alert(\'Existing admin ! Please try again !\')">';
      echo '<meta http-equiv="refresh" content="0;URL=add_admin.php">';
    }
    else
    {
      $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT, 'cost' => 15);
      $req = $bdd->prepare('INSERT INTO account_user (name, lastname, email, pass, date_sign) VALUES (:name, :lastname, :email, :pass, CURDATE())');
      $req->execute(array($admin->getName(), $admin->getLastName(), $admin->getEmail(), password_hash($admin->getPass())));
      session_start();
      $_SESSION['name'] = $admin->getName();
      $_SESSION['lastname'] = $admin->getLastName();
    }
  }


  public function modify_user(member $modify)
  {
    try {
      $bdd = new PDO('mysql:host=localhost;dbname=oop_site1;charset=utf8', 'root', '');
    } catch (PDOException $e) {
      die('Error :'.$e->getMessage());
    }
    $req = $bdd->prepare('UPDATE account_user SET :name, :lastname, :email, :pass');
    $req->execute(array($modify->getName(), $modify->getLastName(), $modify->getEmail(), $modify->getPass(), $_SESSION['id']));
  }


  public function booktable(reservation $booktable)
  {
    try {
      $bdd = new PDO('mysql:host=localhost;dbname=oop_site1;charset=utf8', 'root', '');
    } catch (PDOException $e) {
      die('Error :'.$e->getMessage());
    }
    $req = $bdd->prepare('INSERT INTO booktable (date_booktable, time_booktable, number_people) VALUES (:date_booktable, :time_booktable, :number_people)');
    $req->execute(array($booktable->getDate(), $booktable->getTime(), $booktable->getNumberPeople()));
  }


  public function delete_user(member $delete)
  {
    try {
      $bdd = new PDO('mysql:host=localhost;dbname=oop_site1;charset=utf8', 'root', '');
    } catch (PDOException $e) {
      die('Error :'.$e->getMessage());
    }
    $req = $bdd->prepare('DELETE FROM account_user WHERE :name, :lastname');
    $req->execute(array($modify->getName(), $modify->getLastName()));
  }


}

 ?>
