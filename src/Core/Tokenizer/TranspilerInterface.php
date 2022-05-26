<?php

    namespace PHPJS\Core\Tokenizer;
    
    /**
    * @author - John Hudson
    * @description - PHPJS converts JavaScript to PHP and allows the transpiled PHP to execute in an isolated environment.
    * This can be plugged into DOMDocument, or a Custom DOM Model, and work like a browser.
    */

    interface TranspilerInterface
    {
        /**
        * @return {String} - the PHP code to execute.
        */
        public function toPHP() : string;
    }

?>
