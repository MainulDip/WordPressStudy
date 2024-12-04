<?php

/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

// Generates a unique id for aria-controls.
$unique_id = wp_unique_id('p-');

// Adds the global state.
wp_interactivity_state(
	'create-block',
	array(
		'isDark'    => false,
		'darkText'  => esc_html__('Switch to Light', 'donation-calculator'),
		'lightText' => esc_html__('Switch to Dark', 'donation-calculator'),
		'themeText'	=> esc_html__('Switch to Dark', 'donation-calculator'),
	)
);

$context = array(
	"price" => (int) $attributes["price"],
	"contribution" => 0,
	"isOpen" => false
)
?>

<div
	<?php echo get_block_wrapper_attributes(); ?>
	data-wp-interactive="create-block"
	<?php echo wp_interactivity_data_wp_context($context); ?>
	data-wp-watch="callbacks.logIsOpen"
	data-wp-class--dark-theme="state.isDark">
	<button
		data-wp-on--click="actions.toggleTheme"
		data-wp-text="state.themeText"></button>

	<button
		data-wp-on--click="actions.toggleOpen"
		data-wp-bind--aria-expanded="context.isOpen"
		aria-controls="<?php echo esc_attr($unique_id); ?>">
		<?php esc_html_e('Toggle', 'donation-calculator'); ?>
	</button>

	<p
		id="<?php echo esc_attr($unique_id); ?>"
		data-wp-bind--hidden="!context.isOpen">
		<?php
		esc_html_e('Donation Calculator - hello from an interactive block!', 'donation-calculator');
		?>
	</p>

	<form data-wp-bind--hidden="!context.isOpen" action="javascript:void(0);" aria-label="<?php esc_attr_e('Calculate the impact of your donation.'); ?>" class="calculator">
		<label for="contribution-value" class="calculator-label"><?php esc_html_e('Check the impact of your donation:'); ?></label>
		<div class="calculator-input">$
			<input type="number"
				data-wp-on--input="actions.calculate"
				placeholder="0"
				id="contribution-value"
				class="calculator-input-form" />
		</div>
		<output class="calculator-output" data-wp-class--show="state.show">
			<?php
			echo sprintf(
				esc_html__('Your %s donation will enable us to plant %s trees.'),
				'<span data-wp-text="state.donation"></span>',
				'<span data-wp-text="state.trees"></span>'
			); ?>
		</output>
	</form>

	<p
		id="<?php echo esc_attr($unique_id); ?>"
		data-wp-bind--hidden="context.isOpen">
		<?php
		esc_html_e('Donation Calculator - hello from an interactive block!', 'donation-calculator');
		?>
	</p>

</div>