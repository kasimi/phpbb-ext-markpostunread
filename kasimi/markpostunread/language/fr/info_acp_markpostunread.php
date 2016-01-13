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
	'MARKPOSTUNREAD_TITLE'						=> 'Marquer les messages comme non lus',
	'MARKPOSTUNREAD_CONFIG'						=> 'Configuration',
	'MARKPOSTUNREAD_CONFIG_UPDATED'				=> 'Extension <strong>Marquer les messages comme non lus</strong><br />» Configuration mise à jour',

	'MARKPOSTUNREAD_GROUP_MARKPOSTUNREAD'		=> 'Bouton «Marquer le message comme non lu» dans viewtopic',
	'MARKPOSTUNREAD_ENABLED'					=> 'Bouton «Marquer le message comme non lu»',
	'MARKPOSTUNREAD_ENABLED_EXP'				=> 'Important: <strong>Activer l’indicateur de lecture par le serveur</strong> doit être configuré sur <strong>Oui</strong> dans les paramètres de charge.',
	'MARKPOSTUNREAD_ENABLE_FAILED'				=> 'L’activation du bouton "Marquer le message comme non lu" a échoué car l’option <strong>Activer le marquage des sujets sur le serveur</strong> est désactivée.',
	'MARKPOSTUNREAD_MAX_DAYS'					=> 'Ancienneté maximale des sujets pouvant être marqués comme non lus, en jours',
	'MARKPOSTUNREAD_MAX_DAYS_EXP'				=> 'Lorsqu’un utilisateur marque un message comme non lu, une nouvelle ligne est insérée dans la table topics_track pour chaque sujet déjà lu dans le forum correspondant avec un last_post_time après le post_time du message marqué comme non lu. Sur un gros forum comprenant un très grand nombre de messages, il est possible que cette fonctionnalité requière beaucoup d&rsquo;espace dans la base de données (par exemple, si beaucoup de vos utilisateurs marquent des messages anciens comme non lus), et elle pourrait également ralentir les gros forums qui comportent de nombreux sujets. Avec cette option, vous pouvez limiter la fonctionnalité aux messages qui ne dépassent pas un nombre précis de jours d’ancienneté. Entrer 0 pour autoriser les utilisateurs à marquer <strong>tous</strong> les messages comme non lus.',

	'MARKPOSTUNREAD_GROUP_UNREADSEARCHLINK'		=> 'Lien «Messages non lus» dans la barre de navigation',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK'			=> 'Fonctionnement du lien «Messages non lus» dans la barre de navigation',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_EXP'		=> 'Les options 2 et 3 affectent uniquement les utilisateurs connectés. Les utilisateurs non connectés verront toujours «Messages non lus».',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT1'		=> '1) Toujours afficher «Messages non lus» (affichage par défaut de phpBB)',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT2'		=> '2) Afficher «Messages non lus» / «Aucun message non lu»',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT2_EXP'	=> 'Peut affecter légèrement la performance.',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT3'		=> '3) Afficher «Messages non lus dans X sujets» / «Aucun message non lu»',
	'MARKPOSTUNREAD_UNREAD_POSTS_LINK_OPT3_EXP'	=> 'Peut affecter sensiblement la performance.',
));
