<?php

namespace App\Models;

class Transaction{
    public function __construct()
    {
        
    }
    public function getTransactions(){
        $stmt = \App\App::$db->prepare(
            "Select * From transactions");
        $stmt->execute();
       $transactions = [];
        while($transaction = $stmt->fetch()){
          
           if($transaction["Amount"]>0){
            $transaction["Amount"]="$".$transaction["Amount"];
           }
           else $transaction["Amount"]="-$".-$transaction["Amount"];
         $transactions[] = $transaction ;
        }
        return $transactions;
        
        
        

    }
    public function addTransaction(string $date,string $check,string $description,int $amount){
        $stmt = \App\App::$db->prepare(
            "Insert Into transactions (Date,`Check #`,Description,Amount) values (?,?,?,?)"
        );

        $stmt->execute([$date,$check,$description,$amount]);
    }
}



