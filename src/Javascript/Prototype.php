<?php
  
    namespace PHPJS\Javascript;

    class Prototype extends NativeObject
    {
        static $__proto__ = null; // stays null, a prototype cannot have a prototype
       
        public function __construct()
        {
            // this prevents the prototype being initialised
        }

    }

?>
