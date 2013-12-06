<?php


/**
 * Description of TPagination
 *
 * @author Alexandre E. Souza
 * @version 0.2
 * skype ale-php
 *
 */


 class TPagination{

 	private $total;
 	private $itens;
 	private $tagOpen;
 	private $tagClose;
 	private $urlBase;
 	private $itenOpen;
 	private $itenClose;
 	private $firstItem;
 	private $lastIten;
 	private $key;


public __construct($config){

$this->total = $config['total'];
$this->itens = $config['itens'];
$this->tagOpen = $config['tagOpen'];
$this->tagClose = $config['tagClose'];
$this->urlBase = $config['urlBase'];
$this->itenOpen = $config['itenOpen'];
$this->itenClose = $config['itenClose'];
$this->firstItem = $config['firstItem'];
$this->lastIten = $config['lastIten'];
$this->key = $config['key'];

	
}


public function creat_liks(){

	echo $tagOpen;

foreach ($this->intens as $iten) {
	$i = 1;

	if(is_object($iten)){

		if(empty($this->itenOpen)){
		$this->itenOpen = "<li> <a href='".$this->urlBase.'/'.$iten->$this->key."'>$i";
		$this->itenClose = "</a></li>";
	}

	}else{
	if(empty($this->itenOpen)){
		$this->itenOpen = "<li> <a href='".$this->urlBase.'/'.$iten[$this->key]."'>$i";
		$this->itenClose = "</a></li>";
	}}
	
echo $itenOpen
echo $itenClose;
}
echo $tagClose;
}


 }


 ?>