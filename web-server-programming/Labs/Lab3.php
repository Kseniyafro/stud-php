<!-- <!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lab3</title>
</head>
<?php
         if (isset($_GET['name']) && isset($_GET['age'])){
            $name = $_GET['name'];
            $age = $_GET['age'];  
         }else{ 
            $name = NULL;
            $age = NULL;
         }

         if(!empty($_POST)){
            echo 'Hello, i am '.$_POST['name'].', age'.$_POST[age];
         }
      ?>

<?php
         if (isset($_GET['number'])){
            $number = $_GET['number'];
         }else{
            $number = NULL;
         }

      ?>
<body>
   <main>
      <a href="index.php?name=Sergey&age=22">Link</a>
      <form action="index.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="name" class="form-control" id="exampleInputEmail1" value="<?=$name;?>" name="name">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Age</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="<?=$age;?>" name="age">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
   </main>
</body>
</html> -->



<!-- 26 Задание -->

<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<?php
         if (isset($_GET['number'])){
            $number = $_GET['number'];
            echo 'You sent number:'.$_GET['number'];  
         }else { 
            $number= NULL;
         }
      ?>
<body>
      <a href='Lab3.php?number=42'>Link</a>
      <form action='Lab3.php' method="GET">
         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Number</label>
            <input class="form-control" id="exampleInputEmail1" value="<?=$number;?>" name="number">
            <div id="emailHelp" class="form-text"></div>
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</body>
</html>


<!-- 27 Задание -->

<!-- <!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<?php
         if (isset($_GET['number'])){
            $number = $_GET['number'];
            echo 'You sent number:'.$_GET['number'];  
         }else { 
            $number= NULL;
         }

         if(!empty($_POST)){
            echo ''.$_POST['name'].', age'.$_POST[age];
         }
      ?> 
<body>
<main>
      <a href="index.php?number=42">Link</a>
      <form action="index.php" method="GET">
         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Number</label>
            <input type="name" class="form-control" id="exampleInputEmail1" value="<?=$number;?>" name="number">
            <div id="emailHelp" class="form-text"></div>
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</body>
</html> -->
