/**
 *
 * @package phpBB Extension - Mark Post Unread
 * @copyright (c) 2015 kasimi
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */
jQuery(function($) {
	var callbacks = ['mark_forums_read'];
	if (!$('#active_topics').length) {
		callbacks.push('mark_topics_read');
	}
	$.each(callbacks, function(i, callback) {
		var phpbbCallback = phpbb.ajaxCallbacks[callback];
		phpbb.addAjaxCallback(callback, function(res) {
			phpbbCallback(res);
			$.ajax({
				url		: markpostunread.updateSearchUnreadAction,
				type	: 'GET',
				cache	: false
			}).success(function(ajaxData, status, xhr) {
				if (ajaxData.search_unread) {
					$('li.icon-search-unread a[href$="unreadposts"]').html(ajaxData.search_unread);
				}
			});
		});
	});
});
