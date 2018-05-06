<?php
/**
 * @package    Saint Of The Day
 * @license    GNU/GPL, see LICENSE.php
 * @link       https:// github.com/gmansillo/saintoftheday
 */

class ModSaintOfTheDayHelper
{
     /**
     * Retrieves contents via Evangelizo.org APIs
     *
     * @param  type    Inform about what you want to get
     * @access public
     */
    public static function getAPIFormattedLanguage() {

        $lang = null;
        $jlang = JFactory::getLanguage();
        $apilang = array(
            '' => 'AM', // american-us
            '' => 'AR', // arabic
            '' => 'DE', // german
            '' => 'FR', // french
            '' => 'GR', // greek (hellenic)
            '' => 'IT', // italian
            '' => 'MG', // malagasy
            '' => 'NL', // dutch
            '' => 'PL', // polish
            '' => 'PT', // portuges
            '' => 'SP', // spanish
            '' => 'ARM' // armenian
        );
        
        if(array_key_exists($jlang, $apilang)) {
            $lang = apilang[$jlang];
        }
        
        return $lang;        
    }
    
    /**
     * Retrieves contents via Evangelizo.org APIs
     *
     * @param  type    Inform about what you want to get
     * @access public
     */
    public static function getDataFromAPI($type = 'saint', $lang = 'AM') {
        $result = false;
        $date   = date("Ymd");
        $url    = "http:// feed.evangelizo.org/v2/reader.php?type=$type&lang=$lang&date=$date";
        
        if(extension_loaded('curl') && function_exists('curl_init')) {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            curl_close($ch);      

        } else {

            $stream = fopen($url, 'r');
            $result = stream_get_contents($stream);
            fclose($stream);

        }

        return $result;
    }
}