<?php

namespace Hope\Cli
{

    /**
     * Class Style
     *
     * @package Hope\Cli
     */
    class Style
    {

        /**
         * Default styles
         *
         * @var array
         */
        protected static $styles = [
            'bold'          => [1, 22],
            'dim'           => [2, 22],
            'italic'        => [3, 23],
            'underline'     => [4, 24],
            'inverse'       => [7, 27],
            'hidden'        => [8, 28],
            'strike'        => [9, 29],

            'black'         => [30, 39],
            'green'         => [32, 39],
            'red'           => [31, 39],
            'yellow'        => [33, 39],
            'blue'          => [34, 39],
            'magenta'       => [35, 39],
            'cyan'          => [36, 39],
            'white'         => [37, 39],
            'gray'          => [90, 39],
            'grey'          => [90, 39],

            'bg.black'      => [40, 49],
            'bg.red'        => [41, 49],
            'bg.green'      => [42, 49],
            'bg.yellow'     => [43, 49],
            'bg.blue'       => [44, 49],
            'bg.magenta'    => [45, 49],
            'bg.cyan'       => [46, 49],
            'bg.white'      => [47, 49],
        ];

        /**
         * Active styles
         *
         * @var array
         */
        protected $_styles;

        /**
         * Create style instance
         *
         * @param array $styles
         */
        public function __construct(array $styles = null)
        {
            $this->_styles = $styles ? $styles : static::$styles;
        }

        /**
         * Wrap given string to style
         *
         * @param string $style
         * @param string $string
         *
         * @return bool|string
         */
        public function wrap($style, $string)
        {
            if (false === isset($this->_styles[$style])) {
                return false;
            }
            $style = $this->_styles[$style];

            return sprintf("\033[%sm%s\033[0m", $style[0], $string, $style[1]);
        }

        /**
         * Strip styles from string
         *
         * @param string $string
         *
         * @return string
         */
        public function strip($string)
        {
            return preg_replace('/\\033\[d+m/g', '', $string);
        }
    }

}