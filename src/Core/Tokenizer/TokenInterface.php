<?php

    namespace PHPJS\Core\Tokenizer;

    interface TokenInterface
    {
        /**
        * @return {String}
        * @description - keyword to match for instance "let", "var", "const", "for"
        */
        public function getKeyword() : string;        
    }

?>
