<?php
/**
 * @package Module Saint Of The Day for Joomla!
 * @author Giovanni Mansillo
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @link https:// github.com/gmansillo/saintoftheday
 *
**/

class ModSaintOfTheDayHelper
{
    private static function translateISOLangToAPIFormat($iso_lang = 'en-GB') {

        $result = "AM";
        $iso_lang = strtolower($iso_lang);
        $iso_lang = explode("-", $iso_lang);
        $iso_lang = $iso_lang[0];

        $apilang = array(
            'en' => 'AM', // american-us
            'ar' => 'AR', // arabic
            'de' => 'DE', // german
            'fr' => 'FR', // french
            'el' => 'GR', // greek (hellenic)
            'it' => 'IT', // italian
            'mg' => 'MG', // malagasy
            'nl' => 'NL', // dutch
            'pl' => 'PL', // polish
            'pt' => 'PT', // portuges
            'es' => 'SP', // spanish
            'hy' => 'ARM' // armenian
        );
        
        if(array_key_exists($iso_lang, $apilang)) {
            $result = $apilang[$iso_lang];
        }
        
        return $result;
    }
    
    /**
     * Retrieves contents via Evangelizo.org APIs
     *
     * @param  type    Inform about what you want to get
     * @access public
     */
    public static function getDataFromAPI($type = 'saint', $lang = 'en-GB') {
        
        $result = false;
        
        $lang   = self::translateISOLangToAPIFormat($lang);
        $date   = date("Ymd");
        $url = "http://feed.evangelizo.org/v2/reader.php?date=$date&type=$type&lang=$lang";
        
        if(extension_loaded('curl') && function_exists('curl_init')) {
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            curl_close($ch);
            
        } else if ($stream = fopen($url, 'r')) { 
            // fopen fallback
            $result = stream_get_contents($stream);
            fclose($stream);
        }

        return $result;
    }
}