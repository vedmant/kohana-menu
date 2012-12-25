<?php
/**
 * Test case for Menu_Item
 *
 * @package    Kohana/Menu
 * @group      kohana.menu
 * @category   Test
 * @author     Ando Roots
 */
class Menu_ItemTest extends Kohana_Unittest_TestCase
{

	/**
	 * @var Menu
	 */
	private $_menu;


	public function setUp()
	{
		parent::setUp();
		$this->_menu = new Menu($this->_get_test_config());
	}

	public function testNewItemHasDefaultValues()
	{
		$menu_item = new Menu_Item([], $this->_menu);

		$default_item_config = Menu_Item::get_default_config();

		foreach ($default_item_config as $option => $default_value) {
			$this->assertEquals($default_value, $menu_item->{$option});
		}

	}

	public function testItemConfigOverridesDefaults()
	{
		$default_item_config = Menu_Item::get_default_config();
		$menu_item = new Menu_Item(['title' => 'test1', 'classes' => ['class1']], $this->_menu);

		$this->assertEquals('test1', $menu_item->title);
		$this->assertEquals(['class1'], $menu_item->classes);
		$this->assertEquals($default_item_config['visible'], $menu_item->visible);
	}

	/**
	 * Load test menu config
	 *
	 * @return array
	 */
	private function _get_test_config()
	{
		$file_path = Kohana::find_file('tests/menu/test_data', 'nav');
		return require $file_path;
	}
}