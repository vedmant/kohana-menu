<?php defined('SYSPATH' OR die('No direct access allowed.'));
/**
 * Example config for Twitter Bootstrap main navbar menu
 *
 * @author Ando Roots <ando@sqroot.eu>
 */
return [

	/**
	 * The view file for the menu.
	 * Usually just some wrapper (ul) and foreach for menu items (li).
	 */
	'view'              => 'templates/menu/bootstrap/navbar',

	/**
	 * The CSS class used to mark the active menu item
	 */
	'current_class'     => 'active',

	/**
	 * Set to TRUE to enable active menu item guessing based on the initial request URI.
	 * Will sometimes guess wrong, it's safer to manually mark the active link in the controller.
	 */
	'auto_mark_current' => FALSE,

	/**
	 * A list of menu items. All params are optional.
	 *
	 * Params:
	 *     classes array An array of CSS classes to apply to the menu item container
	 *     url string The URL for the link, default #
	 *     title string The displayed text string, I18n is applied
	 *     icon string Icon for the menu item, displayed as <i class="VALUE"></i>
	 *     items array Nested (dropdown) menu configuration
	 *     tooltip string The tooltip text for the link, I18n is applied
	 *     visible bool Whether the menu item is currently shown. Default TRUE
	 */
	'items'             => [
		[
			'url'     => 'issues',
			'title'   => 'nav.issues',
			'icon'    => 'icon-tasks',
			'tooltip' => 'nav.tooltip.issues'
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
			'tooltip' => 'nav.tooltip.projects',
			'visible' => date('d') == 1 // Only show the link on the first day of each month
		],
		[
			'url'     => 'reports',
			'title'   => 'nav.reports',
			'icon'    => 'icon-list-ol',
			'tooltip' => 'nav.reports.tooltip',
			'items'   => [
				[
					'url'     => 'logs',
					'icon'    => 'icon-align-justify',
					'title'   => 'nav.reports.logs',
					'tooltip' => 'nav.reports.tooltip.logs'
				],
				[
					'icon'    => 'icon-amazon',
					'title'   => 'nav.reports.bills',
					'tooltip' => 'nav.reports.tooltip.bills'
				]
			]
		],
	],
];