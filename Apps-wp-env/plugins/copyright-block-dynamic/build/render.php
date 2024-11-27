<?php ?>

<?php 
// echo "<p>\$attributes:</p> <pre>" . var_export($attributes, true) . "</pre>";
// echo "<p>\$content:</p> <pre>" . var_export($content, true) . "</pre>";
// echo "<p>\$block:</p> <pre>" . var_export($block, true) . "</pre>";

$current_year = date("Y");

if ( !empty($attributes["startingYear"]) && !empty($attributes["showStartingYear"])) {
	$display_date = $attributes["startingYear"] . "-" . $current_year;
} else {
	$display_date = $current_year;
}

?>

<p <?php echo get_block_wrapper_attributes(); ?>>
	<?php esc_html_e( '@' . $display_date . ' form render.php!', 'copyright-block-dynamic' ); ?>
</p>
