<?php
namespace App\Controllers;

use App\CsvToTable;
use App\Models\Transaction;

class HomeController{
    private $observer;
    public function index():\App\View{ 
       return \App\View::make('index',[]);
    }
    public function dashboard():\App\View{
    if($_POST['method']=="file"){
        if(!str_ends_with($_FILES['csvFile']['name'],'.csv')){
        echo "invalid Formate ";
        $this->notifyObserver();
        exit;
    }
       $filePath  = STORAGE_PATH.$_FILES['csvFile']['name'];
       move_uploaded_file(
        $_FILES['csvFile']['tmp_name'],
        $filePath
       );
       $transactions = CsvToTable::converteCsv($filePath);
    }
    elseif($_POST['method']=='database'){
        $transaction = new Transaction();
        if(isset($_POST['Date'])){
        $transaction->addTransaction(
            $_POST['Date']??"",
            (int) $_POST['Check'],
            $_POST['Description'],
            (int) ($_POST["Amount"])
        );
        }
        
       $transactions=$transaction->getTransactions();
       
    }
    
    return \App\View::make('dashboard',["transactions"=>$transactions]);

    }
    public function addObserver($observer){
        $this->observer = $observer;
    }
    public function notifyObserver(){
        $this->observer->update();
    }
}