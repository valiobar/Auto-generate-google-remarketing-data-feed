<?php

 $connect = mysqli_connect("localhost", "root", "", "vimaxbgu_plastmarketbg");
$connect->set_charset("utf8");
 $output = '';

     $sql = "select p.product_id as 'ID',pd.name as 'item title' ,pd.name as 'Item description',concat('http://plast-market.bg/index.php?route=product/product&product_id=',p.product_id) as 'Final url',
concat('http://plast-market.bg/image/',REPLACE(p.image,' ','%20'))as 'image URL',concat(p.price,' BGN') as 'price',
115 as 'Item category' from oc_product as p join oc_product_description as pd on pd.product_id=p.product_id where pd.language_id=2";
     $result = mysqli_query($connect, $sql);
     if(mysqli_num_rows($result) > 0)
     {
         $output .= '  
                <table class="table" bordered="1">  
                     <tr>  
                          <th>ID</th>  
                          <th>item title</th>  
                          <th>Item description</th>  
                           <th>Final URL</th>  
                          <th>Image URL</th>  
                          <th>price</th>  
                          <th>Item category</th>  
                     </tr>  
           ';
         while($row = mysqli_fetch_array($result))
         {
             $output .= '  
                     <tr>  
                          <td>'.$row["ID"].'</td>  
                          <td>'.$row["item title"].'</td>  
                          <td>'.$row["Item description"].'</td>  
                           <td>'.$row["Final url"].'</td>  
                          <td>'.$row["image URL"].'</td>  
                          <td>'.$row["price"].'</td>  
                           <td>'.$row["Item category"].'</td>  
                          
                          
                          
                          
                     </tr>  
                ';
         }
         $output .= '</table>';
         header("Content-Type: application/xls");
         header("Content-Disposition: attachment; filename=download.xls");
         echo $output;
     }

