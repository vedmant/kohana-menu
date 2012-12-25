<?php defined('SYSPATH') or die('No direct script access.');
abstract class MenuBuilder extends Kohana_Unittest_TestCase {
	/**
	 * @var Menu
	 */
	protected $_menu;

	public function setUp()
	{
		parent::setUp();
		$this->_menu = $this->_build_test_menu();
	}

	protected function _build_test_menu()
	{
		return new Menu(self::_get_test_config());
	}


	/**
	 * Load test menu config
	 *
	 * @param string $file_name Navigation config file name (without EXT) in test_data dir
	 * @return array
	 */
	protected static function _get_test_config($file_name = 'nav_complex')
	{
		$file_path = Kohana::find_file('tests/menu/test_data', $file_name);
		return require $file_path;
	}
}