<?php
 namespace search;

 class search{

     private $myArray = array();
     private $indice  = false;
     private $unsetElement = false;

     public function myArray(Array $myArray){

         $this->myArray = $myArray;
     }

     public function getMyArray(){
         return $this->myArray;
     }
     public function selectIndice($indice){
         $myArray = $this->validationArray();

         if($this->indiceInArray($indice))
            $this->indice = true;

         $this->myArray = $myArray[$indice];
     }

     public function setOrder($order){
         $order = trim(strtolower($order));
         $myArray = $this->validationArray();

         if($order != 'asc' and $order != 'desc')
             throw new \Exception('valores passados apenas "asc" or "desc"');

         switch($order){
             case 'asc' :
                 sort($myArray);
                 break;
             case 'desc' :
                 rsort($myArray);
                 break;

         }

         $this->myArray = $myArray;
     }

     /**
      * @TODO responsável por tirar elementos do array 1 ou varios
      * @param $unsetElement array or string
      * @return array or string
      * @throws \Exception
      */
     public function unsetElement($unsetElement){
         $myArray = $this->validationArray();

         if(!isset($unsetElement))
             throw new \Exception('informe um valor para remover o elemento em : unsetElement');

         //remove varios
         if(is_array($unsetElement)){
             foreach($unsetElement as $element){
                 if ($this->indiceInArray($element)){
                     unset($myArray[array_search($element, $myArray)]);
                     $this->unsetElement = true;
                 }

             }
         }
         // remove 1 elemento
         else {
             if($this->indiceInArray($unsetElement)){
                 $this->unsetElement = true;
                 unset($myArray[array_search($unsetElement, $myArray)]);
             }
         }

         $this->myArray = $myArray;
     }

     /**
      * @TODO verifica se o indice passado existe no array
      * @param $indice
      * @return bool
      * @throws \Exception
      */
     private function indiceInArray($indice){
         $myArray = $this->validationArray();
         return in_array($indice, $myArray);
     }

     private function validationArray(){
         if(empty($this->myArray))
             throw new \Exception('Array vazia');

         return $this->myArray;
     }
 }