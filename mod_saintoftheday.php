<?php
/**
 * @package Module Saint Of The Day for Joomla!
 * @author Giovanni Mansillo
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @link https:// github.com/gmansillo/saintoftheday
 *
**/

// No direct access
defined('_JEXEC') or die;

 jimport( 'joomla.application.module.helper' ); 

// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

$module = JModuleHelper::getModule('mod_saintoftheday');
$lang   = JFactory::getLanguage()->getTag();
$params = new JRegistry();
$params->loadString($module->params);

$sod_title  = ModSaintOfTheDayHelper::getDataFromAPI('liturgic_t', $lang); 
$sod_list   = ModSaintOfTheDayHelper::getDataFromAPI('saint', $lang); 

require_once JModuleHelper::getLayoutPath('mod_saintoftheday');