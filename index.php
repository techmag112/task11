<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Практика по логическому сравнению php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <?php
        echo "<h4>Задание 1. Таблица истинности PHP</h4>";
        // Вычислим таблицу
        $a = 0;
        $b = 0;
        for ($i = 1; $i <= 24; $i += 6) {
            if ($i > 4 && $i<=8) {
                $b = 1;
            } 
            if ($i > 8 && $i<=12) {
                $a = 1;
                $b = 0;
            }
            if ($i > 12) {
                $a = 1;
                $b = 1;
            }
            $arr[$i] = $a;
            $arr[$i+1] = $b;
            $arr[$i+2] = (integer)!$a;
            $arr[$i+3] = $a or $b;
            $arr[$i+4] = $a AND $b;
            $arr[$i+5] = $a xor $b;
        }

        // Выведем таблицу на экран  
        echo "<table class='table table-bordered border-primary'>";
        echo "<tr>";
        echo "<th>A</th>";
        echo "<th>B</th>";
        echo "<th>!A</th>";
        echo "<th>A||B</th>";
        echo "<th>A&&B</th>";
        echo "<th>AxorB</th>";
        echo "</tr>";
        echo "<tr>";
        $i = 1;
        foreach($arr as $value) {
            printf("<td>%s</td>", $value);
            if ($i%6 === 0) {
                 echo "</tr><tr>";
            }
            $i++;
        }
        echo "</tr>";
        echo "</table>";

        echo "<h4>Задание 2. Таблица истинности PHP - гибкое сравнение</h4>";
        // Шапка таблицы
        $title = ['#', 'true', 'false', '1', '0', '-1', '"1"', 'null', '"php"'];
        // Операнды для таблицы 
        $arr = ['', true, false, 1, 0, -1, "1", null, "php"];
        echo "<table  class='table table-bordered border-primary'>";
       
        for ($i = 0; $i <= 8; $i++ ) {
            echo "<tr>";
            printf("<th>%s</th>", $title[$i]);
              for ($j = 1; $j <= 8; $j++ ) {
                  if ($i === 0) {
                      printf("<th>%s</th>", $title[$j]);
                  } else {
                      printf("<td>%s</td>", $arr[$i] == $arr[$j] ? "true" : "false" );
                  }
              }
            echo "</tr>";
        }
        echo "</table>";

         echo "<h4>Задание 3. Таблица истинности PHP - жесткое сравнение</h4>";
        $title = ['#', 'true', 'false', '1', '0', '-1', '"1"', 'null', '"php"'];
        $arr = ['', true, false, 1, 0, -1, "1", null, "php"];
        echo "<table  class='table table-bordered border-primary'>";
       
        for ($i = 0; $i <= 8; $i++ ) {
            echo "<tr>";
            printf("<th>%s</th>", $title[$i]);
              for ($j = 1; $j <= 8; $j++ ) {
                  if ($i === 0) {
                      printf("<th>%s</th>", $title[$j]);
                  } else {
                      printf("<td>%s</td>", $arr[$i] === $arr[$j] ? "true" : "false" );
                  }
              }
            echo "</tr>";
        }
        echo "</table>";

        echo "<br/><h5>Вывод: при жестком сравнение идет дополнительная проверка по типу данных, и при несовпадении оно дает false. 
        Это исключает 'странные совпадения', когда например сравнение пустых или строковых значений (в версиях php до 8.0) с нулем дает true. 
        Рекомендуется не мешать сравниваемые типы данных, или определять их типы данных в названии.</h5>";
        
    ?> 
</body>
</html>