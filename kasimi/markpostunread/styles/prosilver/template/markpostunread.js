/**
 *
 * @package phpBB Extension - Mark Post Unread
 * @copyright (c) 2016 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */
jQuery(function($) {
	var cbName = $('#active_topics').length ? 'mark_forums_read' : 'mark_topics_read';
	var cbPhpbb = phpbb.ajaxCallbacks[cbName];
	phpbb.addAjaxCallback(cbName, function(res) {
		cbPhpbb(res);
		$.ajax({
			url		: markpostunread.updateSearchUnreadAction,
			type	: 'GET',
			cache	: false
		}).success(function(ajaxData, status, xhr) {
			if (ajaxData.search_unread) {
				$('li.icon-search-unread a').html(ajaxData.search_unread);
			}
		});
	});
});
