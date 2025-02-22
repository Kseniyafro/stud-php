<?php

   function myAotuload($className){
      
   }

   spl_autoload_register(function(string $classname){
      require_once dirname(__DIR__).'\\'.$className.'.php';
   });
   $controller = new src\Controllers\MainController;
   if (isset($_GET['name']) && !empty($_GET['name'])){
      $controller->sayHello($_GET['name']);
   }
   else $controller->main();
   var_dump($_GET['route'])
   $user = new src\Users\Users('Ivan');
   $article = new src\Articles\Article('title', 'text', $user);

   // var_dump($user);
   // var_dump($article);
?>