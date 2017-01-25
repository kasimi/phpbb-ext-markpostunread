<?php

/**
 *
 * @package phpBB Extension - Mark Post Unread
 * @copyright (c) 2015 kasimi - https://kasimi.net
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace kasimi\markpostunread\migrations;

class v1_0_2 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\kasimi\markpostunread\migrations\v1_0_1');
	}

	public function update_data()
	{
		return array(
			array('config.update', array('kasimi.markpostunread.version', '1.0.2')),
			array('config.remove', array('kasimi.markpostunread.mark_forums_link', 0)),
		);
	}
}
