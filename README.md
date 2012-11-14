# Menu module for Kohana 3.3

This Kohana module started out as a fork of the original Kohana Menu module by Bastian Bräu (http://github
.com/b263/kohana-menu), but I've changed the code considerably.

Some notable changes:

* Support for Twitter Bootstrap 2.0 style menus (icons, dropdown menus)
* Menu items are objects
* General code improvements + usage of PHP 5.4
* Removed support for storing links in the database

Some aspects of the modified module might not work since they are untested.

## Basics

The menus are defined in configuration files, which must be placed in the `config/menu` folder.

See [config/menu/bootstrap.php](https://github.com/anroots/kohana-menu/blob/master/config/menu/bootstrap.php)

To render the menu without modifications, call:
```php
	Menu::factory()->render();
	// or echo (string)Menu::factory()
```
## Installation

1.	Place the files in the modules directory. Example:

		git clone git://github.com/anroots/kohana-menu.git modules/menu

2.	Create a folder `menu` in your applications config directory, copy the `menu/bootstrap.php` into it, and adjust it to fit your navigation.
```bash
		mkdir -p application/config/menu
		cp modules/menu/config/menu/bootstrap.php application/config/menu/bootstrap.php
```
		# edit application/config/menu/bootstrap.php

3.	Activate the module in the `bootstrap.php` file.
```php
		Kohana::modules(array(
			...
			'menu' => MODPATH.'menu',
		));
```
## Config files

You can use different config files, by setting the factory method's `$config` parameter.

### Example: Load menu configuration based on user role
```php
	$menu = Menu::factory($role); // this could use `config/menu/(user|admin).php`
```
## Marking the current menu item

The config setting `current_class` defines the css class, which will be used by the `set_current()` method, to mark the current menu item:
```php
	$menu->set_current('article/show');
```
The parameter of `set_current()` is the URL segment of the respective item or its ID.