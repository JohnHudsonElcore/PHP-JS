<?php
  
    namespace PHPJS\Core\Abstraction;

	abstract class Token
	{
		private $startIndex = 0;
		private $endIndex = 0;		
		
		private $originalJavascript = '';
		
		//setters and getters
		
		public function setCode(string $code) : Token{
			$this->originalJavascript = $code;
			return $this;
		}
		public function getCode() : string{
			return $this->originalJavascript;	
		}
		public function setStartIndex( int $index ) : Token{
			$this->startIndex = $index;
			return $this;
		}
		public function getStartIndex() : int{
			return $this->startIndex;	
		}
		public function setEndIndex( int $index ) : Token{
			$this->endIndex = $index;
			return $this;
		}
		public function getEndIndex() : int{
			return $this->endIndex;
		}
	}

?>
