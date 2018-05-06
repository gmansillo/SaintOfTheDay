<?php
/**
 * @package    Saint Of The Day
 * @license    GNU/GPL, see LICENSE.php
 * @link       https:// github.com/gmansillo/saintoftheday
 */

// No direct access
defined('_JEXEC') or die; 

if ($sod_title) echo '<p class="sod_title">'.$sod_title.'</p>';
if ($sod_list) echo '<p class="sod_list">'.$sod_list.'</p>';
