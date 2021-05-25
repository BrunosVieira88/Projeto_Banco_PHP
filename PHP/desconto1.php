<?php

function desconto(string $cor ,float $preco)
{	
		

	

	if(strtolower($cor) =='vermelho' && $preco >= 50){
			
		$desconto = $preco * 0.25;
		return $preco = $preco -$desconto;
							
	}if(strtolower($cor) =='vermelho' ||strtolower($cor) == 'azul'){

			$desconto = $preco * 0.2;
			return $preco = $preco - $desconto;
	}elseif(strtolower($cor) =='amarelo'){

		$desconto = $preco * 0.1;
		return $preco = $preco - $desconto;

	}

		return $preco = $preco;
}