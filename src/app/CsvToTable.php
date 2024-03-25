<?php

namespace App;

class CsvToTable{
    protected array $csvContent;
    public function __construct(
        protected string $filePath)
    {
        
    }
    public static function converteCsv($filePath):array{
        $temp = new static($filePath);
        $temp->setContent();
       
        return  $temp->csvContent;

    }
    private function setContent():array{
        $file = fopen($this->filePath,'r');
        $titles = fgetcsv($file,null,",");
        while($line = fgetcsv($file,null,",")){
            $this->csvContent[]=array_combine($titles,$line);  
            
        }
        return $this->csvContent;
      
    }
}