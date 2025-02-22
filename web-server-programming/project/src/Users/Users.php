<?php

namespace src\Users;
use src\Users;

class User{
      private $name;

      public function __construct(string $name)
      {
         $this->name = $name;
      }

      public function setName(string $name){
         $this->name = $name;
      }
      public function getName(): string
      {
         return $this->name;
      }
   }
?>