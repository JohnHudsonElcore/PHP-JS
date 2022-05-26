<?php

    namespace PHPJS\Core\Tokenizer;

	class ArrowFunction extends \PHPJS\Core\Abstraction\Token implements \PHPJS\Core\Interfaces\TranspilerInterface , \PHPJS\Core\Interfaces\TokenInterface
	{
		
		
		
		//IMPLEMENTATIONS
		public static function canProcess(string $code , int $pointer) : bool{
			
			$char = $code[$pointer];
			
			if( $char == '(' )
			{
				$range = substr($code , $pointer , strlen($code));
				
				if( stristr( $range , '=>') && 
				    	(strpos( $range , '=>' ) < strpos( $range , ';' ) || 
						 strpos( $range , '=>') < strpos($range , '}' )
				) )
				{
					//higher probability	
					//ES6 Arrow function can be
					//hello = val => "Hello " + val;
					//hello = (val) => "Hello " + val;
					//hello = () => "Hello World!";
					/*
						() => {
						  return "Hello World!";
						}
					*/
					//(a, b) => a * b;
					//HAVE TO ACCOMMODATE FOR ALL THESE ISSUES
					
					
				}
			}
			return false;
		}
	}

?>
