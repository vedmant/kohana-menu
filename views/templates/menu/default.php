<?/**
 * Sample menu template
 *
 * @author Ando Roots <ando@sqroot.eu>
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