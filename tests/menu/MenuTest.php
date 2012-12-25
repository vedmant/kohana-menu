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
class Menu_MenuTest extends MenuBuilder
{

	public function testAllMenuItemsAreBuilt()
	{
		$menu_config = self::_get_test_config();

		$menu_item_count = count($menu_config['items']);

		$this->assertEquals($menu_item_count, count($this->_menu->get_items()));
	}

	public function testRenderedMenuHasAllVisibleItemLinks()
	{
		$rendered_menu = $this->_menu->render();
		foreach ($this->_menu->get_items() as $item) {
			if (! $item->is_visible()) {
				continue;
			}
			$this->assertContains($item->url, $rendered_menu);
		}
	}

	public function testHiddenLinksAreNotRendered()
	{
		Menu_ACL::$is_admin = FALSE;
		$this->_menu = $this->_build_test_menu();
		$this->assertFalse(stristr($this->_menu, 'projects'));
	}

	public function testActiveLinkIsHighlighted()
	{
		$this->_menu->set_current('reports');

		foreach ($this->_menu->get_items() as $item) {
			if ($item->url !== 'reports') {
				continue;
			}
			$this->assertTrue(in_array($this->_menu->current_class, $item->classes));
		}
	}

	/**
	 * Expect the active class to be removed from the previously active link
	 */
	public function testAtMostOneItemIsActive()
	{
		$this->_menu->set_current(0);
		$this->_menu->set_current(1);

		foreach ($this->_menu->get_items() as $index => $item) {
			$is_item_active = in_array($this->_menu->current_class, $item->classes);
			if ($index === 1) {
				$this->assertTrue($is_item_active);
			} else {
				$this->assertFalse($is_item_active);
			}
		}
	}
}