<?php
/**
 * @package    Saint Of The Day
 * @license    GNU/GPL, see LICENSE.php
 * @link       https:// github.com/gmansillo/saintoftheday
 */

// No direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

require JModuleHelper::getLayoutPath('mod_saintoftheday');

$lang   = ModSaintOfTheDayHelper::getAPIFormattedLanguage();
$params = JFactory::getParams('mod_saintoftheday');
        
if($params->get('show_title')) { $sod_title = ModSaintOfTheDayHelper::getDataFromAPI('liturgic_t', $lang); }
if($params->get('show_list')) { $sod_list = ModSaintOfTheDayHelper::getDataFromAPI('saint', $lang); }