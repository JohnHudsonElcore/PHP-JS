<?php
  
    namespace PHPJS\Core\Tokenizer;

    class Variable extends \PHPJS\Core\Abstraction\Token implements \PHPJS\Core\Interfaces\TranspilerInterface , \PHPJS\Core\Interfaces\TokenInterface
    {
         private $variableName = '';
         private $declareType = null;
         private $value = null;
         
	    
         /**
         * @param {String} $code - Examine the code and grab information about the current token.
         */
         public function __construct( string $code )
         {
              if ( stristr ( $code , '=' ) )
	      {
	  	   //this needs splitting, value needs parsing, variable name setting and keyword.
		   $parts = explode ( '=' , $code);
		   
		   $declaration = substr( $parts[0] , 0 , 3 );
		      
		   switch ( $declaration )
		   {
			   case "let":
			   case "var":
				$this->declareType = $declaration;
			   break;
			   case "con":
				   $this->declareType = 'const';
			   break;			   
		   }
		   $this->variableName = str_replace( ['const' , $declaration . ' '] , '' , $parts[0] );
		   $this->value = self::parse( $parts[1] );
	      }else{
		   $parts = explode ( ' ' , $code);
		   
		   $declaration = substr( $parts[0] , 0 , 3 );
		      
		   switch ( $declaration )
		   {
			   case "let":
			   case "var":
				$this->declareType = $declaration;
			   break;
			   case "con":
				   $this->declareType = 'const';
			   break;			   
		   }
		   $this->variableName = str_replace( ['const' , $declaration . ' '] , '' , $parts[0] );
	      }
         }
         
                      
          //INTERFACE IMPLEMENTATIONS
	    
	  /**
	  * @return 
	  */
          public static function createToken( string $code , int $startPointer ) \PHPJS\Core\Abstraction\Token{
		$expression = substr( 
				      $code , 
				      $startPointer , 
				      self::getEndOfExpression(
					   $code , 
					   $startPointer
				      );
		
		return new Variable($expression);
	  }
	  private static function isMultiDeclaration( string $code ) : bool{
		$inQuote = false;
		$quoteChar = null;  
		for( $i = 0; $i < strlen( $code ); $i++ )
		{
			$char = $code[$i];
			
			if( $char == '"' || $char == "'" || $char == '`' )
			{
				if( $inQuote && $quoteChar == $char )
				{
					$inQuote = false;
					$quoteChar = null;
				} else { 
					
					$inQuote = true;
					$quoteChar = $char;
					
				}
			}
			
			if( !$inQuote )
			{
				if( $char == ',' )
				{
					return true;	
				}
				if($char == ';')
				{
					return false;	
				}
			}
			
		}
		return false;
	  }
	  private static function getEndOfExpression(string $code , int $pointer) : int{
		$inQuote = false;
		$quoteChar = null;  
		for( $i = $pointer; $i < strlen( $code ); $i++ )
		{
			$char = $code[$i];
			
			if( $char == '"' || $char == "'" || $char == '`' )
			{
				if( $inQuote && $quoteChar == $char )
				{
					$inQuote = false;
					$quoteChar = null;
				} else { 
					
					$inQuote = true;
					$quoteChar = $char;
					
				}
			}
			
			if( !$inQuote )
			{
				if( $char == ';' )
				{
					return $i;	
				}
			}
			
		}
		return -1;
	  }
	  public static function canProcess(string $code , int $startPointer) : bool{
		$next3 = substr($code , $startPointer , 4);
		$variableDeclaration = ["let " , "var " , "cons"]; //check for const after
		if( in_array( $next3 , $variableDeclaration ) )
		{
			if ( $next3 === 'con' ) 
			{
				if( substr( $code , $startPointer , 6 ) === 'const ' )
				{
					if( self::isMultiDeclaration( substr( $code , $startPointer , strlen( $code ) ) )
					{
						return false;	   
					}
					return true;	
				}
				return false;
			}
			if( self::isMultiDeclaration( substr( $code , $startPointer , strlen( $code ) ) )
			{
				return false;	   
			}
			return true;
		}
		return false;
	  }
	  
          public function toPHP() : string{
               switch( $this->declareType )
               {
                   case "var":
                   case "let":
                       return '$' . $this->variableName . ($this->value ? ' = ' . $this->value->toPHP() : ' = null;';
                   break;
                   case "const":
                       return 'define(\'' . $this->variableName . '\' , ' . ($this->value ? $this->value->toPHP() : 'null') . ')';
                   break;    
               }
          }
    }

?>
