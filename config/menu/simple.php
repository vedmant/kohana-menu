<?php defined('SYSPATH' OR die('No direct access allowed.'));
/**
 * Minimalistic menu config example.
 * Renders a simple list (<li>) of links.
 *
 * @author Ando Roots <ando@sqroot.eu>
 */
return [

	/**
	 * A list of menu items.
	 * All params are optional.
	 * For a list of available keys, see https://github.com/anroots/kohana-menu/wiki/Configuration-files
	 */
	'items'             => [
		[
			'url'     => 'issues',
			'title'   => 'nav.issues',
			'icon'    => 'icon-tasks',
		],
		[
			'url'     => 'users',
			'title'   => 'nav.persons',
			'icon'    => 'icon-user',
			'tooltip' => 'nav.tooltip.persons'
		],
		[
			'url'     => 'projects',
			'icon'    => 'icon-folder-close',
			'title'   => 'nav.projects',
		],
	],
];