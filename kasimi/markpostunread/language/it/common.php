<?php

/**
 *
 * @package phpBB Extension - Mark Post Unread
 * @copyright (c) 2015 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	// Viewtopic
	'MARKPOSTUNREAD_MARK_UNREAD'			=> 'Segna messaggio come non letto',
	'MARKPOSTUNREAD_MARKED_UNREAD'			=> 'Messaggio segnato come non letto.',
	'MARKPOSTUNREAD_REDIRECT_FORMAT'		=> '%s<br /><br />%s<br /><br />%s',

	// Navbar
	'MARKPOSTUNREAD_UNREAD_NONE'			=> 'Non ci sono messaggi non letti',
	'MARKPOSTUNREAD_UNREAD_NUM_MAX'			=> 'Ci sono messaggi non letti in più di %1$d topic',
	'MARKPOSTUNREAD_UNREAD_NUM'				=> array(
		0 => 'Non ci sono messaggi non letti',
		1 => 'Messaggi non letti in %1$d topic',
		2 => 'Messaggi non letti in %1$d topic', // in Italian, the plural form of “topic” is still “topic”
	),
));
