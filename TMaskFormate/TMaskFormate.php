<?php



/**
 * Description of TMaskFormate


 * @version    1.0
 * @author Alexandre E. Souza
 * @copyright  Copyright (c) 2006-2013 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 *  mail webmaster@progs.net.br
 *  skype ale-php
 */
class TMaskFormate {
    
    


    /**
     * 
     * @param type $valor em decimal
     */

 public function decimal_to_reais($valor){
	
	if($valor){
		$valor = str_replace(',','', $valor);
		$valor = str_replace('.',',', $valor);
		
                return 'R$ '.$valor;
		
	}
	
}
/**
 * 
 * @param type $valor em reais
 */
	public function reais_to_decimal($valor){
		if($valor){
                    
		$valor = str_replace('.','', $valor);
		$valor = str_replace(',','.', $valor);
		
		return $valor;
		
	}
	
	}
/**
 * 
 * @param type $string
 * @param type $tipo (cep,cnpj,fone,cpf)
 */
        public function maskFormate($string, $tipo = "")
{
	$string = preg_replace("[^0-9]", "", $string);
	if (!$tipo)
	{
		switch (strlen($string))
		{
			case 10: 	$tipo = 'fone'; 	break;
			case 8: 	$tipo = 'cep'; 		break;
			case 11: 	$tipo = 'cpf'; 		break;
			case 14: 	$tipo = 'cnpj'; 	break;
		}
	}
	switch ($tipo)
	{
		case 'fone':
			$string = '(' . substr($string, 0, 2) . ') ' . substr($string, 2, 4) . '-' . substr($string, 6);
		break;
		case 'cep':
			$string = substr($string, 0, 5) . '-' . substr($string, 5, 3);
		break;
		case 'cpf':
			$string = substr($string, 0, 3) . '.' . substr($string, 3, 3) . '.' . substr($string, 6, 3) . '-' . substr($string, 9, 2);
		break;
		case 'cnpj':
			$string = substr($string, 0, 2) . '.' . substr($string, 2, 3) . '.' . substr($string, 5, 3) . '/' . substr($string, 8, 4) . '-' . substr($string, 12, 2);
		break;
		
	}
	return $string;
}

/**
 * 
 * @param type $dataUsa
 * @return string
 */

public function data_us_to_br($dataUsa){
	
	if($dataUsa){
	$ano =substr($dataUsa,0,4);
	$mes =substr($dataUsa,5,2);
	$dia =substr($dataUsa,8,2);
	
	$dataBR = $dia."/".$mes."/".$ano;
	
	return $dataBR;
	}
	else{
			new TMessage('error',"data vazia");
        exit;
	}
}

/**
 * 
 * @param date $dataBR
 * @return string
 */
public function data_br_to_us($dataBR){
	
	if($dataBR){
	$ano =substr($dataBR,6,4);
	$mes =substr($dataBR,3,2);
	$dia =substr($dataBR,0,2);
	
	$dataUSA = $ano."-".$mes."-".$dia;
	

	return $dataUSA;
	}
	else{
		new TMessage('error',"data vazia");
        exit;
	}
}

 public function upercase($string){
	
	$str = strtoupper($string);
	
	return $str;
}

/* basta carregar o helper e ao chamalo passe a string que quer limpar
 * como parametro, e ele o retorna a string limpa, sem ate mesmo espaços
 */
function clean_string($string) {
	
	if($string){
	        $string = str_replace(array('á','à','â','ã'),"a",$string);
	        $string = str_replace(array('Á','À','Â','Ã'),"A",$string);
	        $string = str_replace(array('é','è','ê'),"e",$string);
	        $string = str_replace(array('É','È','Ê'),"E",$string);
	        $string = str_replace(array('í','ì'),"i",$string);
	        $string = str_replace(array('Í','Ì'),"I",$string);
	        $string = str_replace(array('ó','ò','ô','õ','º'),"o",$string);
	        $string = str_replace(array('Ó','Ò','Ô','Õ'),"O",$string);
	        $string = str_replace(array('ú','ù','û'),"u",$string);
	        $string = str_replace(array('Ú','Ù','Û'),"U",$string);
	        $string = str_replace("ç","c",$string);
	        $string = str_replace("Ç","C",$string);
	        $string = str_replace(array('[',']','[','}','{',')'
	        ,'(',',',':',',',';','!','?','*','%','~','^','-',"'",'`','&',
	        '#',']','"',','),"",$string);
	       // $string = str_replace(" ","",$string);
	      //  $string = str_replace(" ","_",$string);
 
        return $string;
	}

}
/**
 * 
 * @param date $inicio
 * @param date $fim
 * @return Double Dias
 */
function how_days($inicio,$fim){
	$data1 = $inicio;
	$data2 = $fim;
		$days = round((strtotime($data2) - strtotime($data1)) / (24 * 60 * 60), 0);
	
		return $days;
}
   /**
    * 
    * @param type $busca
    * @param type $palavra
    * @descibe Destaca parte ou palavra inteira
    * @return type
    */
function highlight($busca,$palavra)
{

$resultado = str_replace($busca,"<span class='label label-important'>$busca</span>",$palavra);

return $resultado;
}

}

?>
