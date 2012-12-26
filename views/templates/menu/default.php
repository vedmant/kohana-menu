<?/**
 * Sample menu template.
 * Simplest case, supports only single-level menus.
 *
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @author Ando Roots <ando@sqroot.eu>
 * @since 2.0
 * @package Kohana/Menu
 * @copyright (c) 2012, Ando Roots
 */
?>
<nav>
	<ul>
		<?foreach ($menu->get_visible_items() as $item): ?>

		<li class="<?=implode(' ', $item->classes)?>">
			<?=(string) $item?>
		</li>
		<? endforeach?>
	</ul>
</nav>