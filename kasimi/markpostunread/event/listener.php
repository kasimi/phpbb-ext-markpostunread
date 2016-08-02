<?php

/**
 *
 * @package phpBB Extension - Mark Post Unread
 * @copyright (c) 2015 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace kasimi\markpostunread\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/* @var \phpbb\user */
	protected $user;

	/* @var \phpbb\config\config */
	protected $config;

	/* @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\template\template */
	protected $template;

	/* @var \kasimi\markpostunread\includes\core */
	protected $core;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/* @var bool */
	protected $exist_unread = null;

	/**
 	 * Constructor
	 *
	 * @param \phpbb\user							$user
	 * @param \phpbb\config\config					$config
	 * @param \phpbb\controller\helper				$helper
	 * @param \phpbb\template\template				$template
	 * @param \kasimi\markpostunread\includes\core	$core
		* @param \phpbb\auth\auth						$auth
	 */
	public function __construct(
		\phpbb\user $user,
		\phpbb\config\config $config,
		\phpbb\controller\helper $helper,
		\phpbb\template\template $template,
		\kasimi\markpostunread\includes\core $core,
		\phpbb\auth\auth $auth
	)
	{
		$this->user		= $user;
		$this->config	= $config;
		$this->helper	= $helper;
		$this->template	= $template;
		$this->core		= $core;
		$this->auth		= $auth;
	}

	/**
	 * Register events
	 */
	static public function getSubscribedEvents()
	{
		return array(
			// Mark post unread button
			'core.viewtopic_modify_page_title'			=> 'viewtopic_lang_setup',
			'core.viewtopic_modify_post_row'			=> 'inject_mark_unread_button',

			// Permission
			'core.permissions'							=> 'add_permission',

			// Unread posts search link
			'core.get_unread_topics_modify_sql'			=> 'adjust_get_unread_topics_sql',
			'core.display_forums_modify_sql'			=> 'refuse_exist_unread',
			'core.display_forums_modify_template_vars'	=> 'accept_exist_unread',
			'core.page_footer'							=> 'update_search_unread_text',
		);
	}

	/**
	 * Event: core.viewtopic_modify_page_title
	 */
	public function viewtopic_lang_setup($event)
	{
		$this->user->add_lang_ext('kasimi/markpostunread', 'common');
	}

	/**
	 * Event: core.viewtopic_modify_post_row
	 */
	public function inject_mark_unread_button($event)
	{
		if ($this->core->cfg('enabled') && $this->config['load_db_lastread'] && $this->user->data['is_registered'] && !$this->user->data['is_bot'])
		{
			if ($this->core->is_valid_post_time($event['row']['post_time']))
			{
				$route_params = array(
					'return_forum_id'	=> (int) $event['row']['forum_id'],
					'unread_post_id'	=> (int) $event['row']['post_id'],
				);

				$event['post_row'] = array_merge($event['post_row'], array(
					'S_MARKPOSTUNREAD_ALLOWED'	=> $this->auth->acl_get('u_markpostunread_use'),
					'U_MARKPOSTUNREAD'			=> $this->helper->route('kasimi_markpostunread_markpostunread_controller', $route_params),
				));
			}
		}
	}

	/**
	 * Event: core.permissions
	 */
	public function add_permission($event)
	{
		$permissions = $event['permissions'];
		$permissions['u_markpostunread_use'] = array('lang' => 'ACL_U_MARKPOSTUNREAD_USE', 'cat' => 'misc');
		$event['permissions'] = $permissions;
	}

	/**
	 * Event: core.get_unread_topics_modify_sql
	 */
	public function adjust_get_unread_topics_sql($event)
	{
		if ($this->core->cfg('unread_posts_link') != 0)
		{
			$sql_array = $event['sql_array'];
			$last_mark = $event['last_mark'];
			$sql_extra = $event['sql_extra'];
			$sql_sort = $event['sql_sort'];
			$sql_array['WHERE'] = "
				(
					(tt.mark_time IS NOT NULL AND t.topic_last_post_time > tt.mark_time) OR
					(tt.mark_time IS NULL AND ft.mark_time IS NOT NULL AND t.topic_last_post_time > ft.mark_time) OR
					(tt.mark_time IS NULL AND ft.mark_time IS NULL AND t.topic_last_post_time > $last_mark)
				)
				$sql_extra
				$sql_sort";
			$event['sql_array'] = $sql_array;
		}
	}

	/**
	 * Event: core.display_forums_modify_sql
	 */
	public function refuse_exist_unread($event)
	{
		// initialize the flag to signal that we have already checked unreads in functions_display()
		// so that when check_unread_posts() is called in the future it can skip the sql query and give the
		// answer that there are none (this gets reset to true later on in functions_display() if there are unreads),
		// but do NOT initialize if the user is on viewforum since the test for unreads may give false negatives in that context
		if (empty($event['sql_ary']['WHERE']))
		{
			$this->exist_unread = false;
		}
	}

	/**
	 * Event: core.display_forums_modify_template_vars
	 */
	public function accept_exist_unread($event)
	{
		// if there are any unread topics, set $exist_unread flag to true so that
		// when check_unreads_flag() is called in the future it can skip the sql query
		// and give the answer that there are unread posts
		if ($event['forum_row']['S_UNREAD_FORUM'])
		{
			$this->exist_unread = true;
		}
	}

	/**
	 * Event: core.page_footer
	 */
	public function update_search_unread_text($event)
	{
		$this->user->lang['SEARCH_UNREAD'] = $this->core->get_search_unread_text($this->exist_unread);
		$use_custom_link = $this->core->cfg('unread_posts_link') != 0;
		$this->template->assign_vars(array(
			'S_MARKPOSTUNREAD_CUSTOM_SEARCH_UNREAD_LINK'	=> $use_custom_link,
			'U_MARKPOSTUNREAD_UPDATE_SEARCH_UNREAD_ACTION'	=> $use_custom_link ? $this->helper->route('kasimi_markpostunread_searchunread_controller') : '',
		));
	}
}
