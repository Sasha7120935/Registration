<?php

namespace Classes;

class Welcome
{
  public static function created(){
      $name = $_POST['name'];
      $surname = $_POST['surname'];
      echo "Dear $name, $surname  your account has been created";
  }
}
Welcome::created();