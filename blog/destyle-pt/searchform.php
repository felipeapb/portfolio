<div id="searchform" class="clearfix">
	<form method="get" action="<?php bloginfo('url'); ?>/">
		<?php $search_value = __('Insira a palavra...','destyle'); ?>
		<input type="text" name="s" id="search-text" value="<?php echo $search_value; ?>" onfocus="if (this.value == '<?php echo $search_value; ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo $search_value; ?>';}" /><input type="submit" id="search-submit" name="submit" value="<?php _e('Ok','destyle'); ?>" />
	</form>
</div>