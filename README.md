# HTML Navigation Module for Kohana 3.3

Simplify rendering, building and maintenance of simple, dynamic navigation menus. We don't want _this_ in our HTML.

```php
<? if ($user->get_role() === Role::ANONYMOUS):?>
<ul>
	<li><a href="/" <?= $page === 'home' ? 'class="active"' : NULL?>>Home</a></li>
	<li><a href="/about" <?= $page === 'about' ? 'class="active"' : NULL?>>About</a></li>
</ul>
<? // elseif (...)?>
```

## Basics

You define your menus in Kohana configuration files
(see [config/menu/navbar.php](https://github.com/anroots/kohana-menu/blob/master/config/menu/navbar.php)).
Then, in your (main) controller (or view), you determine which menu configuration to use (based on user role or other factors),
use the factory method to construct a new Menu object, set the active link and render it in your view. Done.

A WordPress type blog might have...

* Public main navigation menu
* Public footer menu
* Admin-only menu on the public pages, when admin is logged in
* Admin-only menu on the administrator interface

Normally, you'd build HTML views with `ul` and `li` elements and then write some PHP to highlight the active link. This is
difficult to maintain (DRY) and too much hassle (not to mention ugly).

Instead, describe your (standardised) menus in configuration files and have Kohana do the heavy lifting.

```php
<?php defined('SYSPATH' OR die('No direct access allowed.'));
return [

	/**
	 * The view file for the menu.
	 * Usually just some wrapper (ul) and foreach for menu items (li).
	 */
	'view'              => 'templates/menu/bootstrap/navbar',

	/**
	 * The CSS class used to mark the active menu item
	 */
	'active_item_class'     => 'active',

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
			'url'     => 'tasks',
			'title'   => 'nav.tasks',
			'icon'    => 'icon-dash',
			'tooltip' => 'nav.tooltip.tasks'
		],
	],
];
```

### Example, rendering the default menu

```php
<?php
// APPPATH/views/template.php

echo Menu::factory('navbar')->render();
// echo Menu::factory()
```

## Installation

### Place the files in your modules directory.

#### As a Git submodule:

```bash
git clone git://github.com/anroots/kohana-menu.git modules/menu
```
#### As a [Composer dependency](http://getcomposer.org)

```javascript
{
	"require": {
		"php": ">=5.4.0",
		"composer/installers": "*",
		"anroots/menu":"2.*"
	}
}
```

### Create a folder `menu` in your applications config directory, copy the `menu/navbar.php` into it,
and adjust it to fit your navigation.

```bash
mkdir -p application/config/menu
cp modules/menu/config/menu/navbar.php application/config/menu/navbar.php
# edit application/config/menu/navbar.php
```

### Activate the module in the `bootstrap.php` file.

```php
<?php
Kohana::modules(array(
	...
	'menu' => MODPATH.'menu',
));
```

### Echo the output in your template

```html
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<?=(string)Menu::factory()?>
		</div>
	</div>
</div>
```

You might wish to instantiate the menu in your main controller, since this gives you a way to interact with the Menu object
before it's rendered.

## Config files

You can use different config files by setting the factory's `$config` parameter.

### Example: Load menu configuration based on user role

```php
	$menu = Menu::factory($role); // this could use `config/menu/(user|admin).php`
```

## Marking the current menu item

The config setting `active_item_class` defines the css class, which will be used by the `set_current()` method, to mark the current menu item:
```php
	$menu->set_current('article/show');
```
The parameter of `set_current()` is the URL value of the respective item or its ID.

# Licence

The Kohana module started out as a fork of the original Kohana Menu module by
[Bastian Bräu](http://github.com/b263/kohana-menu), but is now independently developed under the MIT licence.