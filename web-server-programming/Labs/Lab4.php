<?php
   $c = 7;
   $b = 6;
   $a = &$c;
   
   function f(&$s){
      ++$s;
   }
   echo $b."<BR>";
   f($b);
   echo $b."<BR>";

   $a = 10;
   $z = 'a';

   echo $$z.'<BR>';

   // $a=5;$b=2; $c=1;

   // list($a,$b,$c)=F1($a,$b,$c);

   // print "a=$a,b=$b, c=$c<BR>";

   // function F1($d, $e, $f){
   //    $d = $d + 1; $e--; $f++;
   //    return array($d, $e, $f);
   // }

   // $d = 50; $e = 20; $f = 10;
   // function F2(&$d, &$e, &$f){
   //    $d++; $e--; $f++;
   // }
   // F2($d, $e, $f);
   // print("a = $d, b = $e, c = $f<BR>")
   
   // $func = 'sin';
   // $y = 30;
   // $x = $y/180 * pi();
   // $z = $func($x);
   
   // eval("\$z = $func(s$);")

   echo "<a href = 'Lab4.php?XVI=&x='>XVI</a>";
    if (!empty($_GET)){
        foreach($_GET as $z=>$value) {
            eval("\$$z='$value';");
        }
        echo  "Имя = $XVI, оклад = $value";
        
   }



   
    
