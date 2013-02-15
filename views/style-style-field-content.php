<fieldset><legend class="screen-reader-text"><span><?php _e('Style', $this->plugin_id) ?></span></legend>
	<table>
		<tr>
			<td>
				<label for="mh-style-default">
					<input id="mh-style-default" type="radio" name="prettify_code_syntax[style]" value="default" <?php if ($this->options['style'] == 'default' || !$options['style']) { echo 'checked="checked"'; } ?> />
					<?php _e('Default', $this->plugin_id) ?>
				</label>
			</td>
			<td>
				<label for="mh-style-default">
					<img src="<?php echo $this->plugin_url ?>/images/default.png" alt="Default" />
				</label>
			</td>
		</tr>
		<tr>
			<td>
				<label for="mh-style-desert">
					<input id="mh-style-desert" type="radio" name="prettify_code_syntax[style]" value="desert" <?php if ($this->options['style'] == 'desert') { echo 'checked="checked"'; } ?> />
					Desert
				</label>
			</td>
			<td>
				<label for="mh-style-desert">
					<img src="<?php echo $this->plugin_url ?>/images/desert.png" alt="Desert" />
				</label>
			</td>
		</tr>
		<tr>
			<td>
				<label for="mh-style-sunburst">
					<input id="mh-style-sunburst" type="radio" name="prettify_code_syntax[style]" value="sunburst" <?php if ($this->options['style'] == 'sunburst') { echo 'checked="checked"'; } ?> />
					Sunburst
				</label>
			</td>
			<td>
				<label for="mh-style-sunburst">
					<img src="<?php echo $this->plugin_url ?>/images/sunburst.png" alt="Sunburst" />
				</label>
			</td>
		</tr>
		<tr>
			<td>
				<label for="mh-style-sons-of-obsidian">
					<input id="mh-style-sons-of-obsidian" type="radio" name="prettify_code_syntax[style]" value="sons_of_obsidian" <?php if ($this->options['style'] == 'sons_of_obsidian') { echo 'checked="checked"'; } ?> />
					Sons of Obsidian
				</label>
			</td>
			<td>
				<label for="mh-style-sons-of-obsidian">
					<img src="<?php echo $this->plugin_url ?>/images/sons-of-obsidian.png" alt="Sons of Obsidian" />
				</label>
			</td>
		</tr>
		<tr>
			<td>
				<label for="mh-style-custom">
					<input id="mh-style-custom" type="radio" name="prettify_code_syntax[style]" value="custom" <?php if ($this->options['style'] == 'custom') { echo 'checked="checked"'; } ?> />
					<?php _e('Custom', $this->plugin_id) ?>
				</label>
			</td>
			<td>
				<label for="mh-style-custom">
					<textarea cols="90" rows="30" name="prettify_code_syntax[style_custom]">
<?php 
if(!empty($this->options['style_custom'])) {
	echo $this->options['style_custom']; 
} else {
	include(dirname(dirname(__FILE__)).'/stylesheets/custom.css');
}
?>
					</textarea>
				</label>
			</td>
		</tr>
	</table>
</fieldset>






