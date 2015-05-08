<form action="<?php echo home_url(); ?>" id="searchform" method="get">
	<label for="s" class="screen-reader-text"><?php _e('Search for:', get_bloginfo('name') ); ?></label>
    <input class="text" type="text" id="s" name="s" value="" <?php if (isset($_GET["s"])) echo 'placeholder="' . $_GET["s"] . '"'; ?> />
    <input class="submit" type="submit" value="Search" id="searchsubmit" />
</form>
