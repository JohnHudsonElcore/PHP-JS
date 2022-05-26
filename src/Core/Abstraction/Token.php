<?php
  
    namespace PHPJS\Core\Abstraction;

	abstract class Token
	{
		private $startIndex = 0;
		private $endIndex = 0;	
		
		private $parentScope = null;
		private $childScopes = [];
		
		private $originalJavascript = '';
		
		public function parse(string $jsCode) : Token{
			
			#TODO Implement Parser
			
			return $this;
		}
		
		public function addChildScope(Token $scope) : Token{
		   	$this->childScopes[] = $scope;
			return $this;
		}
		public function getChildScopes() : array{
			return $this->childScopes;	
		}
		//setters and getters
		public function setParent(Token $token) : Token{
			$this->parentScope = $token;
			return $this;
		}
		public function getParent() : Token{
			return $this->parentScope;	
		}
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
