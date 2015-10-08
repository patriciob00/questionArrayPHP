<?php

include "class/searchArray.php";

use search\search;

$foods = array(

    'meat' => array('burgers', 'steak', 'sausages', 'kebabs'),

    'cake' => array('victorian', 'chocolate', 'fruit', 'fudge'),

);

try{
    $searchArray = new search();
    $searchArray->myArray($foods);
    $searchArray->selectIndice('meat');
    $searchArray->unsetElement('kebabs');
    //$searchArray->unsetElement(array('kebabs','steak'));
    $searchArray->setOrder('desc');

    //out
    echo "<pre>";
    print_r($searchArray->getMyArray());
    echo "</pre>";

} catch (Exception $e){
    echo $e->getMessage();
}

