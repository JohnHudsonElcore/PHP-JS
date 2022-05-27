<?php
  
    namespace PHPJS\Javascript;

    class Prototype extends NativeObject
    {
        static $__proto__ = null; // stays null, a prototype cannot have a prototype
       
        public function __construct()
        {
            // this prevents the prototype being initialised
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
        public function __defineGetter__(string $key , BaseFunction $callable)
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
        /**
        * @Overrides NativeObject
        */
        public function __get($key)
        {
          return $this->{$key};
        }
        public function __set($key , $value)
        {
          else $this->{$key} = $value;
        }
    }

?>
