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
	protected $root_path;
	protected $php_ext;
	protected $user;
	protected $config;
	protected $helper;
	protected $template;
	protected $core;

	/**
 	 * Constructor
	 *
	 * @param string								$root_path
	 * @param string								$php_ext
	 * @param \phpbb\user							$user
	 * @param \phpbb\config\config					$config
	 * @param \phpbb\controller\helper				$helper
	 * @param \phpbb\template\template				$template
	 * @param \kasimi\markpostunread\core			$core
	 */
	public function __construct($root_path, $php_ext, \phpbb\user $user, \phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template, \kasimi\markpostunread\core $core)
	{
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
		$this->user = $user;
		$this->config = $config;
		$this->helper = $helper;
		$this->template = $template;
		$this->core = $core;
	}

	/**
	 * Register events
	 */
	static public function getSubscribedEvents()
	{
		return array(
			'core.search_results_modify_search_title'	=> 'inject_mark_all_forums_read_link',
			'core.viewtopic_modify_post_row'			=> 'inject_mark_unread_button',
			'core.get_unread_topics_modify_sql'			=> 'adjust_get_unread_topics_sql',
			'core.display_forums_modify_sql'			=> 'refuse_exist_unread',
			'core.display_forums_modify_template_vars'	=> 'accept_exist_unread',
			'core.page_footer'							=> 'update_search_unread_text',
		);
	}

	/**
	 * Event: core.search_results_modify_search_title
	 */
	public function inject_mark_all_forums_read_link($event)
	{
		if ($this->config['load_anon_lastread'] || ($this->user->data['is_registered'] && !$this->user->data['is_bot']))
		{
			$params = sprintf('hash=%s&mark=forums&mark_time=%d', generate_link_hash('global'), time());
			$this->template->assign_vars(array(
				'S_IS_SEARCH_RESULTS'	=> true,
				'U_MARK_FORUMS'			=> append_sid($this->root_path . 'index.' . $this->php_ext, $params, true),
			));
		}
	}

	/**
	 * Event: core.viewtopic_modify_post_row
	 */
	public function inject_mark_unread_button($event)
	{
		if ($this->config['kasimi.markpostunread.enabled'] && $this->config['load_db_lastread'] && $this->user->data['is_registered'] && !$this->user->data['is_bot'])
		{
			$max_days = (int) $this->config['kasimi.markpostunread.max_days'];
			if ($max_days === 0 || time() - (60 * 60 * 24 * $max_days) <= $event['row']['post_time'])
			{
				$route_params = array(
					'return_forum_id'	=> (int) $event['row']['forum_id'],
					'unread_post_id'	=> (int) $event['row']['post_id'],
				);

				$event['post_row'] = array_merge($event['post_row'], array(
					'S_CAN_MARK_POST_UNREAD'	=> true,
					'U_MARK_POST_UNREAD'		=> $this->helper->route('kasimi_markpostunread_markpostunread_controller', $route_params),
				));
			}
		}
	}

	/**
	 * Event: core.get_unread_topics_modify_sql
	 */
	public function adjust_get_unread_topics_sql($event)
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
			$this->core->exist_unread = false;
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
			$this->core->exist_unread = true;
		}
	}

	/**
	 * Event: core.page_footer
	 */
	public function update_search_unread_text($event)
	{
		$this->user->lang['SEARCH_UNREAD'] = $this->core->get_search_unread_text();
		$this->template->assign_vars(array(
			'U_UPDATE_SEARCH_UNREAD_ACTION' => $this->helper->route('kasimi_markpostunread_searchunread_controller'),
		));
	}
}
