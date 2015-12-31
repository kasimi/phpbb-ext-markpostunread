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
	'MARKPOSTUNREAD_TITLE'						=> 'Segna messaggi come non letti',
	'MARKPOSTUNREAD_CONFIG'						=> 'Configurazione',
	'MARKPOSTUNREAD_CONFIG_UPDATED'				=> 'Estensione <strong>Segna messaggi come non letti</strong><br />» Configurazione aggiornata',

	'MARKPOSTUNREAD_GROUP_MARKPOSTUNREAD'		=> 'Pulsante «Segna messaggio come non letto» in viewtopic',
	'MARKPOSTUNREAD_ENABLED'					=> 'Pulsante «Segna messaggio come non letto»',
	'MARKPOSTUNREAD_ENABLED_EXP'				=> 'Importante: <strong>Abilita contrassegno argomenti lato server</strong> dev’essere impostata su <strong>Sì</strong> nelle impostazioni di caricamento.',
	'MARKPOSTUNREAD_ENABLE_FAILED'				=> 'Attivazione del pulsante «Segna messaggio come non letto» non riuscita: l’opzione <strong>Abilita contrassegno argomenti lato server</strong> è disabilitata.',
	'MARKPOSTUNREAD_MAX_DAYS'					=> 'Età massima dei messaggi (in giorni)',
	'MARKPOSTUNREAD_MAX_DAYS_EXP'				=> 'Quando un utente segna come non letto un messaggio, viene inserita una nuova riga nella tabella topics_track per ogni topic già letto nel relativo forum con un last_post_time dopo un post_time del messaggio marcato come non letto. Su board grandi con un elevato numero di messaggi, è possibile che questa funzione impieghi molto spazio nel database (per esempio, se molti utenti segnano come non letti vecchi messaggi) e che rallenti le board con molti argomenti. Con quest’opzione, è possibile limitare l’uso di questa funzione a messaggi non più vecchi di un unmero di giorni specificato.<br />Inserire 0 per permettere agli utenti di marcare <strong>qualsiasi</strong> messaggio come non letto.',

	'MARKPOSTUNREAD_GROUP_MARKFORUMSREAD'		=> 'Link «Segna forum come letti» nei risultati della ricerca dei post non letti',
	'MARKPOSTUNREAD_MARK_FORUMS_READ'			=> 'Mostra link «Segna forum come letti» nella pagina dei risultati della ricerca dei post non letti',

	'MARKPOSTUNREAD_GROUP_UNREADSEARCHLINK'		=> 'Link a «Messaggi non letti» nella barra di navigazione',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK'			=> 'Azione del link «Messaggi non letti» nella barra di ricerca',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_EXP'		=> 'Le opzioni 2 e 3 funzionano solo per gli utenti registrati; se un utente non è identificato, vedrà sempre «Messaggi non letti».',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT1'		=> '1) Mostra sempre «Unread posts» (impostazione predefinita )',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT2'		=> '2) Mostra «Messaggi non letti» / «Non ci sono messaggi non letti»',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT2_EXP'	=> 'Può influire lievemente sulle prestazioni.',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT3'		=> '3) Mostra «Messaggi non letti in x topic» / «Non ci sono messaggi non letti»',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT3_EXP'	=> 'Può influire sensibilmente sulle prestazioni.',
));
