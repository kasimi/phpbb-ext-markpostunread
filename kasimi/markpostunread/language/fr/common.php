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
	'MARKPOSTUNREAD_MARK_UNREAD'			=> 'Marquer le message comme non lu',
	'MARKPOSTUNREAD_MARKED_UNREAD'			=> 'Message marqu&eacute; comme non lu.',
	'MARKPOSTUNREAD_REDIRECT_FORMAT'		=> '%s<br /><br />%s<br /><br />%s',

	// Navbar
	'MARKPOSTUNREAD_UNREAD_NUM_MAX'			=> 'Messages non lus dans plus de %1$d sujets',
	'MARKPOSTUNREAD_UNREAD_NUM'				=> array(
		0 => 'Aucun message non lu',
		1 => 'Message(s) non lu(s) dans %1$d sujet',
		2 => 'Messages non lus dans %1$d sujets',
	),
));
