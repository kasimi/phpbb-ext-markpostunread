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
	'MARKPOSTUNREAD_GROUP_1'					=> 'Pulsante «Segna messaggio come non letto» in viewtopic',
	'MARKPOSTUNREAD_ENABLED'					=> 'Abilita globalmente il pulsante «Segna messaggio come non letto»',
	'MARKPOSTUNREAD_ENABLED_EXP'				=> 'Quest’impostazione non influisce sulla configurazione del link alla ricerca di «Messaggi non letti».',
	'MARKPOSTUNREAD_MAX_DAYS'					=> 'Età massima dei messaggi (in giorni)',
	'MARKPOSTUNREAD_MAX_DAYS_EXP'				=> 'Quando un utente segna come non letto un messaggio, viene inserita una nuova riga nella tabella topics_track per ogni topic già letto nel relativo forum con un last_post_time dopo un post_time del messaggio marcato come non letto. Su board grandi con un elevato numero di messaggi, è possibile che questa funzione impieghi molto spazio nel database (per esempio, se molti utenti segnano come non letti vecchi messaggi). Con quest’opzione, è possibile limitare l’uso di questa funzione a messaggi non più vecchi di un unmero di giorni specificato.<br />Inserire 0 per permettere agli utenti di marcare <strong>qualsiasi</strong> messaggio come non letto.',
	'MARKPOSTUNREAD_GROUP_2'					=> 'Link a «Messaggi non letti» nella barra di navigazione',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK'			=> 'Azione del link «Messaggi non letti» nella barra di ricerca',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_EXP'		=> 'Le opzioni 2 e 3 funzionano solo per gli utenti registrati; se un utente non è identificato, vedrà sempre «Messaggi non letti».',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT1'		=> '1) Mostra sempre «Unread posts» (impostazione predefinita )',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT2'		=> '2) Mostra «Messaggi non letti» / «Non ci sono messaggi non letti»',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT2_EXP'	=> 'Può influire lievemente sulle prestazioni.',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT3'		=> '3) Mostra «Messaggi non letti in x topic» / «Non ci sono messaggi non letti»',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT3_EXP'	=> 'Può influire sensibilmente sulle prestazioni.',
));
