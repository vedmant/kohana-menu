<?php
require_once 'MenuBuilder.php';

/**
 * Test case for Menu_Item
 *
 * @package    Kohana/Menu
 * @group      kohana.menu
 * @category   Test
 * @author     Ando Roots
 */
class Menu_ItemTest extends MenuBuilder
{

	public function testLabelsAreTranslated()
	{
		$this->markTestIncomplete('Think of a way to mock I18n __()');
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

	public function testItemHasIcon()
	{
		foreach ($this->_menu->get_items() as $item) {
			$this->assertContains($item->icon, (string) $item);
		}
	}

}