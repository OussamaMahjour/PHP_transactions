<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <style>
        table,th,td{
            border: 1px solid black;
            border-collapse: collapse;
           
        }
        table{
             width: 100%;
        }
      

    </style>
</head>
<body>
  <table>
    <tr>
        <th>Date</th>
        <th>Check #</th>
        <th>Description</th>
        <th>Amount</th>
</tr>
        <?php
         $lose = 0;
         $win =0;
         foreach($this->param['transactions'] as $line){?>
             <tr>
<?php
             foreach($line as $cellule){
                 if(str_starts_with($cellule,'$')){
                     $color = 'green';
                     $amount = (float)explode('$',$cellule)[1];
                     $win+=$amount;
                 }
                 else if(str_starts_with($cellule,'-$')){
                     $color = 'red';
                     $amount = (float)explode('$',str_replace(',','',$cellule))[1];
                     $lose+=$amount;
                 }
                 else $color="black";
?>                 
        <td style='color:<?=$color?>;'><?=$cellule?></td>
    <?php
             }?>
        </tr>
<?php
         }
         $netWorth = $win - $lose;
?>
         <tr>
             <th colspan="3">Lose :</th>
             <td >-$<?=$lose?></td>
         </tr>
         <tr>
             <th colspan="3">Win:</th>
             <td>$<?=$win?></td>
         </tr>
         <tr>
             <th colspan="3">NetWorth:</th>
             <td>$<?=$netWorth?></td>
         </tr>
  </table>
  <?php if($_POST["method"]=="database"){
?>
<form method="post" action="/dashboard">    
    <br>
    <div class="add">
        <input type="text" name="Date" placeholder="Date">
        <input type="text" name="Check" placeholder="Check">
        <input type="text" name="Description" placeholder="Description">
        <input type="text" name="Amount" placeholder="Amount">
        <button type="submit" name="method" value="database">add</button>

    </div></form>


<?php
  }
?>
</body>
</html>