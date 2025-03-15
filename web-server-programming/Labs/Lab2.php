<?php
    $arr = [2, 'r', 6, 8];
    for ($i = 0; $i < sizeof($arr);$i++) {
        echo $arr[$i].' ';
    }

    $arr2['a'] = 2;
    $arr2['b'] = 'r';
    $arr2['c'] = 6;
    $arr2['d'] = 8;
    for ($i = 0; $i < sizeof($arr2);$i++) {
        echo $arr2[$i].' ';
    }

    $arr3 = [
        1 => 2,
        'b' => 'r',
        'c' => 6,
        4 => 8
    ];
    foreach($arr3 as $elem) {
        echo "$elem ";
    }

    $a = array(1,2);
    $b = array(3,4);
    print_r($a + $b);

    $c = [
      'a' => 'f';
      3=> 'c';
      '4'=>1
    ];

    print_r($c);
    echo '<BR>';
    print_r($d);
    echo '<BR>';
    
    print_r($c + $d);
    echo '<BR>';

    $arr_2 = [
      i=>[1, 2, 3],
      'd' => [5,6,'g', '1'],
      3=>5
    ]

    foreach($arr_2 as $arr){
      print_r[$arr];
      foreach[$arr as $elem]{
         echo "$elem, ";
      }
      echo "<BR>";
    }

    $a = 3;
    $b = 4;
    function f($a, $b): int 
    {
      global $c;
      $c = $a + $b;
      return $a + $b;
    }
   /  echo $c;
   
   №1
   $list = ['a', 'b', 'c', 'b', 'a'];
   print_r(array_count_values($list)); //функция по выведению количества каждого значения

   $list = ['a', 'b', 'c', 'b', 'a'];
   print_r(array_flip[$list]);

   $listwork = ['jfh', 'tyr', 'op', 'wer'];
   
?>
    