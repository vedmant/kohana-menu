<?/**
 * Navigation item template for Twitter Bootstrap main navbar
 * Render the output inside div.navbar>div.navbar-inner>.container
 *
 * @author Ando Roots <ando@sqroot.eu>
 */
?>
<ul class="nav">

	<?foreach ($menu['items'] as $menu_item):

	// Get menu item values
	$item = Menu::extract_values($menu_item);

	// Is this a dropdown-menu with sibling links?
	if (array_key_exists('items', $item)):?>

		<li class="dropdown  <?=implode(' ', $item['classes'])?>" title="<?=$item['tooltip']?>">
			<a href="#"
			   class="dropdown-toggle"
			   data-toggle="dropdown"><?=$item['title']?><b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
				<?foreach ($item['items'] as $menu_subitem):

				$subitem = Menu::extract_values($menu_subitem)?>

				<li>
					<?=HTML::anchor($subitem['url'], $subitem['title'], ['title'=> $subitem['tooltip']], NULL, FALSE)?>
				</li>
				<? endforeach?>
			</ul>
		</li>

		<? else:
		// No, this is a "normal", single-level menu
		?>
		<li class="<?=implode(' ', $item['classes'])?>">
			<?=HTML::anchor($item['url'], $item['title'], ['title'=> $item['tooltip']], NULL, FALSE)?>
		</li>

		<? endif ?>

	<? endforeach?>
</ul>