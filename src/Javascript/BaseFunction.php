<?php

    namespace PHPJS\Javascript;

    class BaseFunction extends NativeObject
    {
        
        public $name = '';
        private $_closure; //PHP Function to call.
        
        
        public function __construct($name , \Closure $_closure)
        {
            $this->name = $name;
            $this->_closure = $_closure;
            
            //generate the constructor. Constructor name should be 'Function'
        }
        
        public function apply($arg , $value)
        {
            #TODO: Implement
        }
        function bind()
        {
            #TODO: Implement   
        }
        
        
        /**
        * @param $context
        */
        public function call($context = null , $args = [])
        {
            if ( !$context )
            {
                $context = $this;   
            }
            
            $this->_closure->call($context , $args);
        }
    }

?>
