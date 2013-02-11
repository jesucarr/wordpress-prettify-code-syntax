<?php $options = get_option('prettify_code_syntax'); ?>
<fieldset><legend class="screen-reader-text"><span><?php _e('Style', $this->plugin_id) ?></span></legend>
	<table>
		<tr>
			<td>
				<label for="mh-style-default">
					<input id="mh-style-default" type="radio" name="prettify_code_syntax[style]" value="default" <?php if ($options['style'] == 'default' || !$options['style']) { echo 'checked="checked"'; } ?> />
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
					<input id="mh-style-desert" type="radio" name="prettify_code_syntax[style]" value="desert" <?php if ($options['style'] == 'desert') { echo 'checked="checked"'; } ?> />
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
					<input id="mh-style-sunburst" type="radio" name="prettify_code_syntax[style]" value="sunburst" <?php if ($options['style'] == 'sunburst') { echo 'checked="checked"'; } ?> />
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
					<input id="mh-style-sons-of-obsidian" type="radio" name="prettify_code_syntax[style]" value="sons_of_obsidian" <?php if ($options['style'] == 'sons_of_obsidian') { echo 'checked="checked"'; } ?> />
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
					<input id="mh-style-custom" type="radio" name="prettify_code_syntax[style]" value="custom" <?php if ($options['style'] == 'custom') { echo 'checked="checked"'; } ?> />
					<?php _e('Custom', $this->plugin_id) ?>
				</label>
			</td>
			<td>
				<label for="mh-style-custom">
					<textarea cols="90" rows="30" name="prettify_code_syntax[style_custom]">
<?php 
if(!empty($options['style_custom'])): 
echo $options['style_custom']; 
else: ?>
/* Based on Sunburst theme */

pre .str, code .str { color: #65B042; } /* string  - green */
pre .kwd, code .kwd { color: #E28964; } /* keyword - dark pink */
pre .com, code .com { color: #AEAEAE; font-style: italic; } /* comment - gray */
pre .typ, code .typ { color: #89bdff; } /* type - light blue */
pre .lit, code .lit { color: #3387CC; } /* literal - blue */
pre .pun, code .pun { color: #fff; } /* punctuation - white */
pre .pln, code .pln { color: #fff; } /* plaintext - white */
pre .tag, code .tag { color: #89bdff; } /* html/xml tag    - light blue */
pre .atn, code .atn { color: #bdb76b; } /* html/xml attribute name  - khaki */
pre .atv, code .atv { color: #65B042; } /* html/xml attribute value - green */
pre .dec, code .dec { color: #3387CC; } /* decimal - blue */

pre.prettyprint, code.prettyprint {
	background-color: #000;
	-moz-border-radius: 8px;
	-webkit-border-radius: 8px;
	-o-border-radius: 8px;
	-ms-border-radius: 8px;
	-khtml-border-radius: 8px;
	border-radius: 8px;
}

pre.prettyprint {
	width: 95%;
	margin: 1em auto;
	padding: 1em;
	white-space: pre-wrap;
}


/* Specify class=linenums on a pre to get line numbering */
ol.linenums { margin-top: 0; margin-bottom: 0; color: #AEAEAE; } /* IE indents via margin-left */
li.L0,li.L1,li.L2,li.L3,li.L5,li.L6,li.L7,li.L8 { list-style-type: none }
/* Alternate shading for lines */
li.L1,li.L3,li.L5,li.L7,li.L9 { }

@media print {
  pre .str, code .str { color: #060; }
  pre .kwd, code .kwd { color: #006; font-weight: bold; }
  pre .com, code .com { color: #600; font-style: italic; }
  pre .typ, code .typ { color: #404; font-weight: bold; }
  pre .lit, code .lit { color: #044; }
  pre .pun, code .pun { color: #440; }
  pre .pln, code .pln { color: #000; }
  pre .tag, code .tag { color: #006; font-weight: bold; }
  pre .atn, code .atn { color: #404; }
  pre .atv, code .atv { color: #060; }
}
<?php 
endif; 
?>
					</textarea>
				</label>
			</td>
		</tr>
	</table>
</fieldset>






