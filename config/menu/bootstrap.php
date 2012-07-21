<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Example config for Twitter Bootstrap main navbar menu
 *
 * @author Ando Roots <ando@sqroot.eu>
 */
return [
	'driver'        => 'file', // You can use 'database' or 'file', database uses ORM driver
	'view'          => 'templates/menu/bootstrap/navbar', // The view file
	'current_class' => 'active', // The set_current() method uses this setting to mark the current menu item

	'items'         => [
		[
			'url'     => 'issues',
			'title'   => __('nav.issues'),
			'icon'    => 'tasks', // Any Bootstrap (or Font Awesome More) icon name, without the icon- prefix
			'tooltip' => __('nav.tooltip.issues') // Text for a[title] attribute
		],
		[
			'url'     => 'users',
			'title'   => __('nav.persons'),
			'icon'    => 'user',
			'tooltip' => __('nav.tooltip.persons')
		],
		[
			'url'     => 'projects',
			'icon'    => 'folder-close',
			'title'   => __('nav.projects'),
			'tooltip' => __('nav.tooltip.projects')
		],
		[
			'url'     => 'reports',
			'title'   => __('nav.reports'),
			'icon'    => 'list-ol',
			'tooltip' => __('nav.reports.tooltip'),

			'items'   => [
				[
					'url'    => 'logs',
					'icon'   => 'align-justify',
					'title'  => __('nav.reports.logs'),
					'tooltip'=> __('nav.reports.tooltip.logs')
				],
				[
					'icon'   => 'amazon',
					'title'  => __('nav.reports.bills'),
					'tooltip'=> __('nav.reports.tooltip.bills')
				]
			]
		],
	],
];