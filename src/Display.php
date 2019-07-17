<?php
// Copyright 2018 MaTaXeToS
// Copyright 2019 The Just4Fun Authors
// This file is part of the J4FCore library.
//
// The J4FCore library is free software: you can redistribute it and/or modify
// it under the terms of the GNU Lesser General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// The J4FCore library is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU Lesser General Public License for more details.
//
// You should have received a copy of the GNU Lesser General Public License
// along with the J4FCore library. If not, see <http://www.gnu.org/licenses/>.

class Display {

    /**
     * Clean the screen
     */
    public static function ClearScreen() {
        echo "\033[2J";
    }

    /**
     * Replace the colors of a string for the CMD
     *
     * @param $string
     * @return mixed
     */
    public static function _replaceColors($string) {
        $string = str_replace("%B%",ColorsCLI::$FG_BLACK,$string);
        $string = str_replace("%DG%",ColorsCLI::$FG_DARK_GRAY,$string);
        $string = str_replace("%R%",ColorsCLI::$FG_RED,$string);
        $string = str_replace("%LR%",ColorsCLI::$FG_LIGHT_RED,$string);
        $string = str_replace("%G%",ColorsCLI::$FG_GREEN,$string);
        $string = str_replace("%LG%",ColorsCLI::$FG_LIGHT_GREEN,$string);
        $string = str_replace("%BR%",ColorsCLI::$FG_BROWN,$string);
        $string = str_replace("%Y%",ColorsCLI::$FG_YELLOW,$string);
        $string = str_replace("%B%",ColorsCLI::$FG_BLUE,$string);
        $string = str_replace("%LB%",ColorsCLI::$FG_LIGHT_BLUE,$string);
        $string = str_replace("%P%",ColorsCLI::$FG_PURPLE,$string);
        $string = str_replace("%LP%",ColorsCLI::$FG_LIGHT_PURPLE,$string);
        $string = str_replace("%C%",ColorsCLI::$FG_CYAN,$string);
        $string = str_replace("%LC%",ColorsCLI::$FG_LIGHT_CYAN,$string);
        $string = str_replace("%LG%",ColorsCLI::$FG_LIGHT_GRAY,$string);
        $string = str_replace("%W%",ColorsCLI::$FG_WHITE,$string);
        return $string;
    }

    /**
     * Write a line in the CMD
     * @param $string
     */
    public static function _printer($string) {
        $date = new DateTime();
        $formatted_string = "%G%INFO%W% [".$date->format("m-d|H:i:s")."] ".$string."%W%".PHP_EOL;
        $colored_string = self::_replaceColors($formatted_string);
        echo $colored_string;
        ob_flush();
    }

    /**
     * Write a debug line in the CMD
     * @param $string
     */
    public static function _debug($string) {
        $date = new DateTime();
        $formatted_string = "%Y%DEBUG%W% [".$date->format("m-d|H:i:s")."] ".$string."%W%".PHP_EOL;
        $colored_string = self::_replaceColors($formatted_string);
        echo $colored_string;
        ob_flush();
    }

    /**
     * Write a Error line in the CMD
     * @param $string
     */
    public static function _error($string) {
        $date = new DateTime();
        $formatted_string = "%LR%ERROR%W% [".$date->format("m-d|H:i:s")."] ".$string."%W%".PHP_EOL;
        $colored_string = self::_replaceColors($formatted_string);
        echo $colored_string;
        ob_flush();
    }

    /**
     * Write a Warning line in the CMD
     * @param $string
     */
    public static function _warning($string) {
        $date = new DateTime();
        $formatted_string = "%LR%WARN%W% [".$date->format("m-d|H:i:s")."] ".$string."%W%".PHP_EOL;
        $colored_string = self::_replaceColors($formatted_string);
        echo $colored_string;
        ob_flush();
    }

    /**
     * Line break
     */
    public static function _br() {
        echo PHP_EOL;
    }

    /**
     * Write a message of the mined block
     * @param Block $blockMined
     */
    public static function NewBlockMined($blockMined) {

        $mini_hash = substr($blockMined->hash,-12);
        $mini_hash_previous = substr($blockMined->previous,-12);

        //Obtenemos la diferencia entre la creacion del bloque y la finalizacion del minado
        $minedTime = date_diff(
            date_create(date('Y-m-d H:i:s', $blockMined->timestamp)),
            date_create(date('Y-m-d H:i:s', $blockMined->timestamp_end))
        );
        $blockMinedInSeconds = $minedTime->format('%im%ss');

        self::_printer("%Y%Mined%W% new block     		%G%nonce%W%=" . $blockMined->nonce . " %G%elapsed%W%=" . $blockMinedInSeconds . " %G%previous%W%=" . $mini_hash_previous . " %G%hash%W%=" . $mini_hash);
    }

    /**
     * Write a canceled block message
     * @param $gossip
     */
    public static function NewBlockCancelled() {
		if (SHOW_INFO_SUBPROCESS)
        	self::_printer("%Y%Miner work cancelled, another miner found block before");
    }
}
?>
