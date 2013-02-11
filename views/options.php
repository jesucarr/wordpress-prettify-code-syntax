<div class="wrap">
<?php screen_icon(); ?>
<h2><?php _e('Prettify Code Syntax', $this->plugin_id) ?></h2>
<form method="post" action="options.php"> 
<?php settings_fields( 'pcs_settings_group' ); ?>
<?php do_settings_sections( 'pcs_languages'); ?>
<?php do_settings_sections( 'pcs_style'); ?>
<?php submit_button(); ?>
</form>
</div>