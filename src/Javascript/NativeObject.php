<?php

	namespace PHPJS\Javascript;
	
	/**
	* @author - John Hudson
	* @usage - This is the Object in JavaScript, this class maps
	*        - existing methods within JavaScript Object. 
	*
	*/

	class NativeObject
	{
		public $constructor;
		public $__proto__; 
		public function __construct()
		{
				
		}
		public function hasOwnProperty( string $key )
		{
			return in_array( $key , get_class_vars(__CLASS__) );
		}
		public function isPrototypeOf( NativeObject $prototype )
		{
			return ( is_subclass_of ($prototype , get_class ( $this->prototype ) ) );
		}
		public function valueOf()
		{
			return $this;	
		}
		public function toString()
		{
			return $this->__toString();	
		}
		
		public function __toString()
		{
			return '[Object object]';
		}
		
		public function __defineSetter__(string $key , $value)
		{
			$this->{$key} = $value;
		}
		public function __defineGetter__(string $key , Function $callable)
		{
			$this->{'get' . $key} = $callable;
		}
		public function __lookupGetter__(string $key)
		{
			$getter = $this->{'key' . $key};
			
			if( method_exists( $getter , 'call' ) )
			{
				return $getter;	
			}
			return NULL;
		}
		public function __lookupSetter__(string $key)
		{
			return NULL;
		}
		public function __get($key)
		{
			if( $key == 'prototype' ) return $this->__proto__;
			return $this->{$key};
		}
		public function __set($key , $value)
		{
			if ($key == 'prototype') $this->__proto__->{$key} = $value;
			else $this->{$key} = $value;
		}
	}

?>
