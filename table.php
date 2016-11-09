<?php

 $connect = mysqli_connect("localhost", "username", "password", "vimaxbgu_plastmarketbg");
$connect->set_charset("utf8");
 $output = '';

     $sql = "select p.product_id as 'ID',pd.name as 'item title' ,pd.name as 'Item description',concat('http://plast-market.bg/index.php?route=product/product&product_id=',p.product_id) as 'Final url',
concat('http://plast-market.bg/image/',REPLACE(p.image,' ','%20'))as 'image URL',concat(p.price,' BGN') as 'price',
115 as 'Item category' from oc_product as p join oc_product_description as pd on pd.product_id=p.product_id where pd.language_id=2 ORDER BY p.product_id";
      $result = mysqli_query($connect, $sql);
     if(mysqli_num_rows($result) > 0)
     {
         $output .= "ID\titem title\tItem description\tFinal URL\tImage URL\tprice\tItem category\n";
         while($row = mysqli_fetch_array($result))
         {
             $output .= $row["ID"]."\t".$row["item title"]."\t".$row["Item description"]."\t".$row["Final url"]."\t".$row["image URL"]."\t".$row["price"]."\t".$row["Item category"]."\n";
         }

         header("Content-Type: application/xls");
         header("Content-Disposition: attachment; filename=download.xls");
         echo $output;
     }



