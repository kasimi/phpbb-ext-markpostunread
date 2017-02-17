<?php

/**
 *
 * @package phpBB Extension - Mark Post Unread
 * @copyright (c) 2015 kasimi - https://kasimi.net
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
	'MARKPOSTUNREAD_MARK_UNREAD'			=> 'Mark post unread',
	'MARKPOSTUNREAD_MARKED_UNREAD'			=> 'Post successfully marked unread.',
	'MARKPOSTUNREAD_REDIRECT_FORMAT'		=> '%s<br /><br />%s<br /><br />%s',

	// Navbar
	'MARKPOSTUNREAD_UNREAD_NUM_MAX'			=> 'Unread posts in over %1$d topics',
	'MARKPOSTUNREAD_UNREAD_NUM'				=> array(
		0 => 'No unread posts',
		1 => 'Unread posts in %1$d topic',
		2 => 'Unread posts in %1$d topics',
	),
));
