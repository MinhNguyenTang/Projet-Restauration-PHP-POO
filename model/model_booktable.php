<?php

require_once('../model/model_member.php');

class booktable extends member {

  protected $_date;
  protected $_time;
  protected $_number_people;


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


  public function getDate() {return $this->_date;}
  public function getTime() {return $this->_time;}
  public function getNumberPeople() {return $this->_number_people;}


  public function setDate($date)
  {
    $this->_date = $date;
  }


  public function setTime($time)
  {
    $this->_time = $time;
  }


  public function setNumberPeople($number_people)
  {
    $this->_number_people = $number_people;
  }
}

 ?>
