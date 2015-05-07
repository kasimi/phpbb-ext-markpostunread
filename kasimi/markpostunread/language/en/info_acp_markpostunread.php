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
	'MARKPOSTUNREAD_TITLE'						=> 'Mark Post Unread',
	'MARKPOSTUNREAD_CONFIG'						=> 'Configuration',
	'MARKPOSTUNREAD_CONFIG_UPDATED'				=> '<strong>Mark Post Unread </strong>Extension<br />» Configuration updated',
	'MARKPOSTUNREAD_GROUP_1'					=> '«Mark post as unread» button in viewtopic',
	'MARKPOSTUNREAD_ENABLED'					=> 'Globally enable or disable the «Mark post as unread» button',
	'MARKPOSTUNREAD_ENABLED_EXP'				=> 'This setting doesn\'t affect the setting for the «Unread posts» search link below.',
	'MARKPOSTUNREAD_MAX_DAYS'					=> 'Maximum age of posts, in days',
	'MARKPOSTUNREAD_MAX_DAYS_EXP'				=> 'When a user marks a post unread, a row in the topics_track table is inserted for each already read topic in the relevant forum with a last_post_time after the post_time of the post being marked unread. On a big board with a huge number of posts, it is conceivable that a lot of db storage could be used for this feature (e.g. if a lot of your users mark really old posts unread). With this option, you can limit the feature to posts that are no more than a specified number of days old. Enter 0 to allow your users to mark <strong>all</strong> posts as unread.',
	'MARKPOSTUNREAD_GROUP_2'					=> '«Unread posts» search link in the navbar',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK'			=> 'Behaviour of the «Unread posts» search link in the navbar',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_EXP'		=> 'When using option 2 or 3, the search link is only changed for logged in users. User who are not logged in always see «Unread posts».',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT1'		=> '1) Always display «Unread posts» (phpBB default)',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT2'		=> '2) Display «Unread posts» / «No unread posts»',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT2_EXP'	=> 'May slightly affect performance.',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT3'		=> '3) Display «Unread posts in X topics» / «No unread posts»',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT3_EXP'	=> 'May perceptibly affect performance.',
));
