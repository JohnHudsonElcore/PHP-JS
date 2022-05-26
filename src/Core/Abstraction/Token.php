<?php
  
    namespace PHPJS\Core\Abstraction;

	abstract class Token
	{
		/**
		* @return {Integer} 
		* @description - while iterating the JavaScript string, this will return 
		* the position in which the current token ends, so the iterator can skip 
		* all the characters in this token.
		*/
		public abstract function getEndOfExpression() : int;
		
		
	}

?>
