<?php

/**
 * Alexandre E. Souza
 * site webstudioid.com.br, progs.net.br
 * skype: ale-php
 * Class para usar web servece para endereço por cep
 */



class TCepProgs
{

 
  private $rua;
  private $bairro;
  private $cidade;
  private $uf;


function __construct($cep){

		if(isset($cep)){
    $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string');
    

    if($resultado){
        
         parse_str($resultado, $retorno);


    $this->rua = $retorno['logradouro'] ;
    $this->bairro = $retorno['bairro'] ;
    $this->cidade = $retorno['cidade'] ;
    $this->uf = $retorno['uf'] ;
    }else{

    	throw new Exception("Sem Conexao com a internet");
    	
    }}else{

    	throw new Exception("Cep Em branco");
    }
   

}



public function getRua(){

	return $this->rua;
}

public function getBairro(){

	return $this->bairro;
}

public function getCidade(){

	return $this->cidade;
}

public function getUf(){

	return $this->uf;
}




}
