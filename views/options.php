<div class="wrap">
<?php screen_icon(); ?>
<h2><?php _e('Markup Highlighter', $this->plugin_id) ?></h2>
<form method="post" action="options.php"> 
<?php settings_fields( 'mh_settings_group' ); ?>
<?php do_settings_sections( 'mh_languages'); ?>
<?php do_settings_sections( 'mh_style'); ?>
<?php submit_button(); ?>
</form>
</div>