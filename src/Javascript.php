<?php

    namespace PHPJS;
    
    class Javascript
    {
        /**
        * @param {String} $jsCode - the code to evaluate
        */
        public function evaluate( $jsCode ) {
            $tokenizer = new \PHPJS\Core\Tokenizer();
            $tokenizer->tokenize( $jsCode )
        }
    }

?>
