<?php

class member {

  protected $_id;
  protected $_name;
  protected $_lastname;
  protected $_email;
  protected $_pass;


  public function __construct(array $data)
  {
    $this->hydrate($data);
  }


  public function hydrate(array $data)
  {
    foreach($data as $key => $value)
    {
      $method = 'set'.ucfirst($key);

      if(method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }


  public function getId() {return $this->_id;}
  public function getName() {return $this->_name;}
  public function getLastName() {return $this->_lastname;}
  public function getEmail() {return $this->_email;}
  public function getPass() {return $this->_pass;}


  public function setId($id)
  {
    $this->_id = $id;
  }


  public function setName($name)
  {
    $this->_name = $name;
  }


  public function setLastName($lastname)
  {
    $this->_lastname = $lastname;
  }


  public function setEmail($email)
  {
    $this->_email = $email;
  }


  public function setPass($pass)
  {
    $this->_pass = $pass;
  }
}

 ?>
