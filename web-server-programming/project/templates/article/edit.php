<?php require dirname(__DIR__).'/header.php';?> 
<!-- // Подключает файл header.php, расположенный на один уровень выше в директории проекта. -->
 <form action="<?=dirname($_SERVER['SCRIPT_NAME']);?>/article/<?=$article->getId();?>/update" method="POST"> 
   <!-- // Открывает HTML-форму. Атрибут action указывает URL, на который будут отправлены данные формы. URL содержит ID статьи, которую нужно обновить. Используется метод POST. -->
   <div class="mb-3"> 
     <label for="name" class="form-label">Article title</label>
     <input type="text" class="form-control" id="name" name="name" value="<?=$article->getName();?>"> 
   </div> 
   <div class="mb-3"> 
     <label for="text" class="form-label">Text</label> 
     <input type="text" class="form-control" id="text" name="text" value="<?=$article->getText();?>"> 
   </div> 
   <button type="submit" class="btn btn-primary">Update</button> 
 </form>
 <?php require dirname(__DIR__).'/footer.php';?> 
 <!-- // Подключает файл footer.php, расположенный на один уровень выше в директории проекта. -->

