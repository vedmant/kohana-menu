<?php defined('SYSPATH') or die('No direct script access.');
class Menu_ACL
{

	public static $is_admin;

	public static function is_admin()
	{
		return self::$is_admin;
	}
}