<?php

/**
 *
 * @package phpBB Extension - Mark Post Unread
 * @copyright (c) 2015 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace kasimi\markpostunread\migrations;

class v1_0_0 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		// TODO Require version v314\rc1 once it's out
		return array('\phpbb\db\migration\data\v31x\v314rc1');
	}

	public function effectively_installed()
	{
		return isset($this->config['markpostunreads_version']) && version_compare($this->config['markpostunread_version'], '1.0.0', '>=');
	}

	public function update_data()
	{
		return array(
			// Add config entries
			array('config.add', array('kasimi.markpostunread.version', '1.0.0')),
			array('config.add', array('kasimi.markpostunread.enabled', 0)),
			array('config.add', array('kasimi.markpostunread.max_days', 0)),
			array('config.add', array('kasimi.markpostunread.unread_posts_link', 0)),

			// Add ACP module
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'MARKPOSTUNREAD_TITLE'
			)),

			array('module.add', array(
				'acp',
				'MARKPOSTUNREAD_TITLE',
				array(
					'module_basename'	=> '\kasimi\markpostunread\acp\markpostunread_module',
					'auth'				=> 'ext_kasimi/markpostunread && acl_a_board',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}
