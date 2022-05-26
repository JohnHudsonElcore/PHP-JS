<?php
    
    namespace PHPJS\Core\Interface;

    interface TokenInterface
    {
        /**
        * @param {String} $code - the code to check against.
        * @param {Integer} $startPointer - the current position in the string
        * @return {Boolean}
        */
        public static function canProcess(string $code , int $startPointer) : bool;
        
        /**
        * @param {String} $code - the code to check against.
        * @param {Integer} $startPointer - the current position in the string
        * @return {PHPJS\Core\Abstraction\Token
        */
        public static function createToken(string $code , int $startPointer) : \PHPJS\Core\Abstraction\Token;
        
        
    }

?>
