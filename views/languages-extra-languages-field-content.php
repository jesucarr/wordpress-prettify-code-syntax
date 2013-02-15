<?php $options = get_option('markup_highlighter'); ?>
<fieldset><legend class="screen-reader-text"><span><?php _e('Extra Languages', 'markup-highlighter') ?></span></legend>
	<label for="mh-languages-css">
		<input id="mh-languages-css" type="checkbox" name="markup_highlighter[languages_css]" <?php if ($options['languages_css']) { echo 'checked="checked"'; } ?> />
		CSS
	</label>
	<br />
	<label for="mh-languages-sql">
		<input id="mh-languages-sql" type="checkbox" name="markup_highlighter[languages_sql]" <?php if ($options['languages_sql']) { echo 'checked="checked"'; } ?> />
		SQL
	</label>
	<br />
	<label for="mh-languages-yaml">
		<input id="mh-languages-yaml" type="checkbox" name="markup_highlighter[languages_yaml]" <?php if ($options['languages_yaml']) { echo 'checked="checked"'; } ?> />
		YAML
	</label>
	<br />
	<label for="mh-languages-visual-basic">
		<input id="mh-languages-visual-basic" type="checkbox" name="markup_highlighter[languages_visual_basic]" <?php if ($options['languages_visual_basic']) { echo 'checked="checked"'; } ?> />
		Visual Basic
	</label>
	<br />
	<label for="mh-languages-clojure">
		<input id="mh-languages-clojure" type="checkbox" name="markup_highlighter[languages_clojure]" <?php if ($options['languages_clojure']) { echo 'checked="checked"'; } ?> />
		Clojure
	</label>
	<br />
	<label for="mh-languages-scala">
		<input id="mh-languages-scala" type="checkbox" name="markup_highlighter[languages_scala]" <?php if ($options['languages_scala']) { echo 'checked="checked"'; } ?> />
		Scala
	</label>
	<br />
	<label for="mh-languages-tex">
		<input id="mh-languages-tex" type="checkbox" name="markup_highlighter[languages_tex]" <?php if ($options['languages_tex']) { echo 'checked="checked"'; } ?> />
		TeX, LaTeX
	</label>
	<br />
	<label for="mh-languages-wikitext">
		<input id="mh-languages-wikitext" type="checkbox" name="markup_highlighter[languages_wikitext]" <?php if ($options['languages_wikitext']) { echo 'checked="checked"'; } ?> />
		WikiText
	</label>
	<br />
	<label for="mh-languages-erlang">
		<input id="mh-languages-erlang" type="checkbox" name="markup_highlighter[languages_erlang]" <?php if ($options['languages_erlang']) { echo 'checked="checked"'; } ?> />
		Erlang
	</label>
	<br />
	<label for="mh-languages-go">
		<input id="mh-languages-go" type="checkbox" name="markup_highlighter[languages_go]" <?php if ($options['languages_go']) { echo 'checked="checked"'; } ?> />
		Go
	</label>
	<br />
	<label for="mh-languages-haskell">
		<input id="mh-languages-haskell" type="checkbox" name="markup_highlighter[languages_haskell]" <?php if ($options['languages_haskell']) { echo 'checked="checked"'; } ?> />
		Haskell
	</label>
	<br />
	<label for="mh-languages-lua">
		<input id="mh-languages-lua" type="checkbox" name="markup_highlighter[languages_lua]" <?php if ($options['languages_lua']) { echo 'checked="checked"'; } ?> />
		Lua
	</label>
	<br />
	<label for="mh-languages-ocaml">
		<input id="mh-languages-ocaml" type="checkbox" name="markup_highlighter[languages_ocaml]" <?php if ($options['languages_ocaml']) { echo 'checked="checked"'; } ?> />
		OCAML, SML, F#
	</label>
	<br />
	<label for="mh-languages-nemerle">
		<input id="mh-languages-nemerle" type="checkbox" name="markup_highlighter[languages_nemerle]" <?php if ($options['languages_nemerle']) { echo 'checked="checked"'; } ?> />
		Nemerle
	</label>
	<br />
	<label for="mh-languages-protocol-buffers">
		<input id="mh-languages-protocol-buffers" type="checkbox" name="markup_highlighter[languages_protocol_buffers]" <?php if ($options['languages_protocol_buffers']) { echo 'checked="checked"'; } ?> />
		Protocol Buffers
	</label>
	<br />
	<label for="mh-languages-vhdl">
		<input id="mh-vhdl" type="checkbox" name="markup_highlighter[languages_vhdl]" <?php if ($options['languages_vhdl']) { echo 'checked="checked"'; } ?> />
		VHDL
	</label>
	<br />
	<label for="mh-languages-xquery">
		<input id="mh-languages-xquery" type="checkbox" name="markup_highlighter[languages_xquery]" <?php if ($options['languages_xquery']) { echo 'checked="checked"'; } ?> />
		XQuery
	</label>
</fieldset>
