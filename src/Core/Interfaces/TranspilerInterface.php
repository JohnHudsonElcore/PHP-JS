<?php

    namespace PHPJS\Core\Interfaces;

    interface TranspilerInterface
    {
        /**
        * @return {String}
        * @description - How do we transform the JavaScript into PHP's equivalent?
        */
        public function toPHP() : string;
    }

?>
