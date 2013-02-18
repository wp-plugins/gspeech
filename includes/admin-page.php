<?php

function wpgs_options_page() {

	global $wpgs_options;

	ob_start(); ?>
	<div class="wrap">
		<h2><?php _e('GSpeech Options','wpgs_domain');?></h2>
		
		<form method="post" action="options.php">
		
			<?php settings_fields('wpgs_settings_group'); ?>
		
			<h4 style="margin-bottom: -3px;"><?php _e('Language', 'wpgs_domain'); ?><span class="description" style="display:block;font-weight: normal"><?php echo _e('Your site native language', 'wpgs_domain')?></span></h4>
			<p>
				<?php $languages = array('af' => 'Afrikaans','sq' => 'Albanian','ar' => 'Arabic','hy' => 'Armenian','eu' => 'Basque','be' => 'Belarusian','bg' => 'Bulgarian','zh-CN' => 'Chinese (Simplified)','zh-TW' => 'Chinese (Traditional)','hr' => 'Croatian','cs' => 'Czech','da' => 'Danish','nl' => 'Dutch','en' => 'English','et' => 'Estonian','tl' => 'Filipino','fi' => 'Finnish','fr' => 'French','gl' => 'Galician','ka' => 'Georgian','de' => 'German','el' => 'Greek','ht' => 'Haitian Creole','iw' => 'Hebrew','hi' => 'Hindi','hu' => 'Hungarian','is' => 'Icelandic','id' => 'Indonesian','it' => 'Italian','ja' => 'Japanese','ko' => 'Korean','lv' => 'Latvian','lt' => 'Lithuanian','mk' => 'Macedonian','ms' => 'Malay','mt' => 'Maltese','no' => 'Norwegian','fa' => 'Persian','pl' => 'Polish','pt' => 'Portuguese','ro' => 'Romanian','ru' => 'Russian','sr' => 'Serbian','sk' => 'Slovak','sl' => 'Slovenian','es' => 'Spanish','sw' => 'Swahili','sv' => 'Swedish','th' => 'Thai','uk' => 'Ukrainian','ur' => 'Urdu','vi' => 'Vietnamese','cy' => 'Welsh','yi' => 'Afrikaans','yi' => 'Yiddish'); ?>
				<select name="wpgs_settings[language]" id="wpgs_settings[language]">
					<?php foreach($languages as $key => $language) { ?>
						<?php if($wpgs_options['language'] == $key) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
						<?php if($key == 'en' && $wpgs_options['language'] == '') { $selected = 'selected="selected"'; }?>
						<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $language; ?></option>
					<?php } ?>
				</select>
			</p>
			
			<h4 style="margin-bottom: -3px;"><?php _e('Speak Any Text', 'wpgs_domain'); ?><span class="description" style="display:block;font-weight: normal"><?php echo _e('Show speaker when visitors highlighted text from the site', 'wpgs_domain')?></span></h4>
			<p>
				<?php $checked1 = ($wpgs_options['speak_any_text'] == '' || $wpgs_options['speak_any_text'] == 1) ? 'checked="checked"' : ''; ?>
				<?php $checked2 = (isset($wpgs_options['speak_any_text']) && $wpgs_options['speak_any_text'] == 0) ? 'checked="checked"' : ''; ?>
				<input id="wpgs_settings[speak_any_text1]" name="wpgs_settings[speak_any_text]" type="radio" value="1" <?php echo $checked1;?> /> 
				<label class="description" for="wpgs_settings[speak_any_text1]"><?php _e('Yes', 'wpgs_domain'); ?></label>
				<input id="wpgs_settings[speak_any_text2]" name="wpgs_settings[speak_any_text]" type="radio" value="0" <?php echo $checked2;?> /> 
				<label class="description" for="wpgs_settings[speak_any_text2]"><?php _e('No', 'wpgs_domain'); ?></label>
			</p>
			
			<h4 style="margin-bottom: -3px;"><?php _e('Greeting Text', 'wpgs_domain'); ?></h4>
			<p>
				<?php $value = $wpgs_options['greeting_text'] == '' ? '{gspeech style=1 language=en autoplay=1 speechtimeout=0 registered=2 hidespeaker=1}Welcome to SITENAME{/gspeech}{gspeech style=2 language=en autoplay=1 speechtimeout=0 registered=1 hidespeaker=1}Welcome REALNAME{/gspeech}' : $wpgs_options['greeting_text']?>
				<textarea style="height: 86px;width: 370px;" id="wpgs_settings[greeting_text]" name="wpgs_settings[greeting_text]" type="text" ><?php echo $value; ?></textarea>
				<label style="display: block" class="description" for="wpgs_settings[greeting_text]"><?php _e('Greeting text to speech. Write blank to not use greeting. Use SITENAME to get the site name, USERNAME to get username, REALNAME to get user real name.', 'wpgs_domain'); ?></label>
			</p>
			
			<h4 style="margin-bottom: -3px;"><?php _e('Style 1 (Default)', 'wpgs_domain'); ?></h4>
			<p>
				<?php $value = $wpgs_options['bcp1'] == '' ? '#ffffff' : $wpgs_options['bcp1']?>
				<input id="wpgs_settings[bcp1]" name="wpgs_settings[bcp1]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[bcp1]"><?php _e('Audio Block Background Color, Passive State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['cp1'] == '' ? '#111111' : $wpgs_options['cp1']?>
				<input id="wpgs_settings[cp1]" name="wpgs_settings[cp1]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[cp1]"><?php _e('Audio Block Text Color, Passive State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['bca1'] == '' ? '#3297fd' : $wpgs_options['bca1']?>
				<input id="wpgs_settings[bca1]" name="wpgs_settings[bca1]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[bca1]"><?php _e('Audio Block Background Color, Active State(User Hover The Speaker, or Click on it).', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['ca1'] == '' ? '#ffffff' : $wpgs_options['ca1']?>
				<input id="wpgs_settings[ca1]" name="wpgs_settings[ca1]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[ca1]"><?php _e('Audio Block Text Color, Active State(User Hover The Speaker, or Click on it).', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $opacities = array('10','20','30','40','50','60','70','80','90','100'); ?>
				<select style="width: 136px;" name="wpgs_settings[spop1]" id="wpgs_settings[spop1]">
					<?php foreach($opacities as $opacity) { ?>
						<?php if($wpgs_options['spop1'] == $opacity) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
						<?php if($opacity == '90' && $wpgs_options['spop1'] == '') { $selected = 'selected="selected"'; }?>
						<option value="<?php echo $opacity; ?>" <?php echo $selected; ?>><?php echo $opacity; ?>%</option>
					<?php } ?>
				</select>
				<label class="description" for="wpgs_settings[spop1]"><?php _e('Speaker Icon Opacity, Passive State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $opacities = array('10','20','30','40','50','60','70','80','90','100'); ?>
				<select style="width: 136px;" name="wpgs_settings[spoa1]" id="wpgs_settings[spoa1]">
					<?php foreach($opacities as $opacity) { ?>
						<?php if($wpgs_options['spoa1'] == $opacity) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
						<?php if($opacity == '100' && $wpgs_options['spoa1'] == '') { $selected = 'selected="selected"'; }?>
						<option value="<?php echo $opacity; ?>" <?php echo $selected; ?>><?php echo $opacity; ?>%</option>
					<?php } ?>
				</select>
				<label class="description" for="wpgs_settings[spoa1]"><?php _e('Speaker Icon Opacity, Active State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['animation_time_1'] == '' ? '400' : $wpgs_options['animation_time_1']?>
				<input id="wpgs_settings[animation_time_1]" name="wpgs_settings[animation_time_1]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[animation_time_1]"><?php _e('Time Between Switching Passive And Active States, In miliseconds.', 'wpgs_domain'); ?></label>
			</p>
			
			
			
			<h4 style="margin-bottom: -3px;"><?php _e('Style 2 (Red)', 'wpgs_domain'); ?></h4>
			<p>
				<?php $value = $wpgs_options['bcp2'] == '' ? '#ffffff' : $wpgs_options['bcp2']?>
				<input id="wpgs_settings[bcp2]" name="wpgs_settings[bcp2]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[bcp2]"><?php _e('Audio Block Background Color, Passive State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['cp2'] == '' ? '#ff0000' : $wpgs_options['cp2']?>
				<input id="wpgs_settings[cp2]" name="wpgs_settings[cp2]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[cp2]"><?php _e('Audio Block Text Color, Passive State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['bca2'] == '' ? '#ff0000' : $wpgs_options['bca2']?>
				<input id="wpgs_settings[bca2]" name="wpgs_settings[bca2]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[bca2]"><?php _e('Audio Block Background Color, Active State(User Hover The Speaker, or Click on it).', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['ca2'] == '' ? '#ffffff' : $wpgs_options['ca2']?>
				<input id="wpgs_settings[ca2]" name="wpgs_settings[ca2]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[ca2]"><?php _e('Audio Block Text Color, Active State(User Hover The Speaker, or Click on it).', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $opacities = array('10','20','30','40','50','60','70','80','90','100'); ?>
				<select style="width: 136px;" name="wpgs_settings[spop2]" id="wpgs_settings[spop2]">
					<?php foreach($opacities as $opacity) { ?>
						<?php if($wpgs_options['spop2'] == $opacity) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
						<?php if($opacity == '80' && $wpgs_options['spop2'] == '') { $selected = 'selected="selected"'; }?>
						<option value="<?php echo $opacity; ?>" <?php echo $selected; ?>><?php echo $opacity; ?>%</option>
					<?php } ?>
				</select>
				<label class="description" for="wpgs_settings[spop2]"><?php _e('Speaker Icon Opacity, Passive State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $opacities = array('10','20','30','40','50','60','70','80','90','100'); ?>
				<select style="width: 136px;" name="wpgs_settings[spoa2]" id="wpgs_settings[spoa2]">
					<?php foreach($opacities as $opacity) { ?>
						<?php if($wpgs_options['spoa2'] == $opacity) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
						<?php if($opacity == '100' && $wpgs_options['spoa2'] == '') { $selected = 'selected="selected"'; }?>
						<option value="<?php echo $opacity; ?>" <?php echo $selected; ?>><?php echo $opacity; ?>%</option>
					<?php } ?>
				</select>
				<label class="description" for="wpgs_settings[spoa2]"><?php _e('Speaker Icon Opacity, Active State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['animation_time_2'] == '' ? '400' : $wpgs_options['animation_time_2']?>
				<input id="wpgs_settings[animation_time_2]" name="wpgs_settings[animation_time_2]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[animation_time_2]"><?php _e('Time Between Switching Passive And Active States, In miliseconds.', 'wpgs_domain'); ?></label>
			</p>
			
			
			
			<h4 style="margin-bottom: -3px;"><?php _e('Style 3 (Green)', 'wpgs_domain'); ?></h4>
			<p>
				<?php $value = $wpgs_options['bcp3'] == '' ? '#ffffff' : $wpgs_options['bcp3']?>
				<input id="wpgs_settings[bcp3]" name="wpgs_settings[bcp3]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[bcp3]"><?php _e('Audio Block Background Color, Passive State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['cp3'] == '' ? '#008000' : $wpgs_options['cp3']?>
				<input id="wpgs_settings[cp3]" name="wpgs_settings[cp3]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[cp3]"><?php _e('Audio Block Text Color, Passive State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['bca3'] == '' ? '#008000' : $wpgs_options['bca3']?>
				<input id="wpgs_settings[bca3]" name="wpgs_settings[bca3]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[bca3]"><?php _e('Audio Block Background Color, Active State(User Hover The Speaker, or Click on it).', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['ca3'] == '' ? '#ffffff' : $wpgs_options['ca3']?>
				<input id="wpgs_settings[ca3]" name="wpgs_settings[ca3]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[ca3]"><?php _e('Audio Block Text Color, Active State(User Hover The Speaker, or Click on it).', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $opacities = array('10','20','30','40','50','60','70','80','90','100'); ?>
				<select style="width: 136px;" name="wpgs_settings[spop3]" id="wpgs_settings[spop3]">
					<?php foreach($opacities as $opacity) { ?>
						<?php if($wpgs_options['spop3'] == $opacity) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
						<?php if($opacity == '70' && $wpgs_options['spop3'] == '') { $selected = 'selected="selected"'; }?>
						<option value="<?php echo $opacity; ?>" <?php echo $selected; ?>><?php echo $opacity; ?>%</option>
					<?php } ?>
				</select>
				<label class="description" for="wpgs_settings[spop3]"><?php _e('Speaker Icon Opacity, Passive State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $opacities = array('10','20','30','40','50','60','70','80','90','100'); ?>
				<select style="width: 136px;" name="wpgs_settings[spoa3]" id="wpgs_settings[spoa3]">
					<?php foreach($opacities as $opacity) { ?>
						<?php if($wpgs_options['spoa3'] == $opacity) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
						<?php if($opacity == '100' && $wpgs_options['spoa3'] == '') { $selected = 'selected="selected"'; }?>
						<option value="<?php echo $opacity; ?>" <?php echo $selected; ?>><?php echo $opacity; ?>%</option>
					<?php } ?>
				</select>
				<label class="description" for="wpgs_settings[spoa3]"><?php _e('Speaker Icon Opacity, Active State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['animation_time_3'] == '' ? '400' : $wpgs_options['animation_time_3']?>
				<input id="wpgs_settings[animation_time_3]" name="wpgs_settings[animation_time_3]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[animation_time_3]"><?php _e('Time Between Switching Passive And Active States, In miliseconds.', 'wpgs_domain'); ?></label>
			</p>
		
			
			
			
			<h4 style="margin-bottom: -3px;"><?php _e('Style 4 (Blue)', 'wpgs_domain'); ?></h4>
			<p>
				<?php $value = $wpgs_options['bcp4'] == '' ? '#ffffff' : $wpgs_options['bcp4']?>
				<input id="wpgs_settings[bcp4]" name="wpgs_settings[bcp4]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[bcp4]"><?php _e('Audio Block Background Color, Passive State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['cp4'] == '' ? '#0000ff' : $wpgs_options['cp4']?>
				<input id="wpgs_settings[cp4]" name="wpgs_settings[cp4]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[cp4]"><?php _e('Audio Block Text Color, Passive State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['bca4'] == '' ? '#0000ff' : $wpgs_options['bca4']?>
				<input id="wpgs_settings[bca4]" name="wpgs_settings[bca4]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[bca4]"><?php _e('Audio Block Background Color, Active State(User Hover The Speaker, or Click on it).', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['ca4'] == '' ? '#ffffff' : $wpgs_options['ca4']?>
				<input id="wpgs_settings[ca4]" name="wpgs_settings[ca4]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[ca4]"><?php _e('Audio Block Text Color, Active State(User Hover The Speaker, or Click on it).', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $opacities = array('10','20','30','40','50','60','70','80','90','100'); ?>
				<select style="width: 136px;" name="wpgs_settings[spop4]" id="wpgs_settings[spop4]">
					<?php foreach($opacities as $opacity) { ?>
						<?php if($wpgs_options['spop4'] == $opacity) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
						<?php if($opacity == '60' && $wpgs_options['spop4'] == '') { $selected = 'selected="selected"'; }?>
						<option value="<?php echo $opacity; ?>" <?php echo $selected; ?>><?php echo $opacity; ?>%</option>
					<?php } ?>
				</select>
				<label class="description" for="wpgs_settings[spop4]"><?php _e('Speaker Icon Opacity, Passive State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $opacities = array('10','20','30','40','50','60','70','80','90','100'); ?>
				<select style="width: 136px;" name="wpgs_settings[spoa4]" id="wpgs_settings[spoa4]">
					<?php foreach($opacities as $opacity) { ?>
						<?php if($wpgs_options['spoa4'] == $opacity) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
						<?php if($opacity == '100' && $wpgs_options['spoa4'] == '') { $selected = 'selected="selected"'; }?>
						<option value="<?php echo $opacity; ?>" <?php echo $selected; ?>><?php echo $opacity; ?>%</option>
					<?php } ?>
				</select>
				<label class="description" for="wpgs_settings[spoa4]"><?php _e('Speaker Icon Opacity, Active State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['animation_time_4'] == '' ? '400' : $wpgs_options['animation_time_4']?>
				<input id="wpgs_settings[animation_time_4]" name="wpgs_settings[animation_time_4]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[animation_time_4]"><?php _e('Time Between Switching Passive And Active States, In miliseconds.', 'wpgs_domain'); ?></label>
			</p>
		
			
			
			
			<h4 style="margin-bottom: -3px;"><?php _e('Style 5 (Orange)', 'wpgs_domain'); ?></h4>
			<p>
				<?php $value = $wpgs_options['bcp5'] == '' ? '#ffffff' : $wpgs_options['bcp5']?>
				<input id="wpgs_settings[bcp5]" name="wpgs_settings[bcp5]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[bcp5]"><?php _e('Audio Block Background Color, Passive State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['cp5'] == '' ? '#ffa500' : $wpgs_options['cp5']?>
				<input id="wpgs_settings[cp5]" name="wpgs_settings[cp5]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[cp5]"><?php _e('Audio Block Text Color, Passive State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['bca5'] == '' ? '#ffa500' : $wpgs_options['bca5']?>
				<input id="wpgs_settings[bca5]" name="wpgs_settings[bca5]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[bca5]"><?php _e('Audio Block Background Color, Active State(User Hover The Speaker, or Click on it).', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['ca5'] == '' ? '#ffffff' : $wpgs_options['ca5']?>
				<input id="wpgs_settings[ca5]" name="wpgs_settings[ca5]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[ca5]"><?php _e('Audio Block Text Color, Active State(User Hover The Speaker, or Click on it).', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $opacities = array('10','20','30','40','50','60','70','80','90','100'); ?>
				<select style="width: 136px;" name="wpgs_settings[spop5]" id="wpgs_settings[spop5]">
					<?php foreach($opacities as $opacity) { ?>
						<?php if($wpgs_options['spop5'] == $opacity) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
						<?php if($opacity == '50' && $wpgs_options['spop5'] == '') { $selected = 'selected="selected"'; }?>
						<option value="<?php echo $opacity; ?>" <?php echo $selected; ?>><?php echo $opacity; ?>%</option>
					<?php } ?>
				</select>
				<label class="description" for="wpgs_settings[spop5]"><?php _e('Speaker Icon Opacity, Passive State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $opacities = array('10','20','30','40','50','60','70','80','90','100'); ?>
				<select style="width: 136px;" name="wpgs_settings[spoa5]" id="wpgs_settings[spoa5]">
					<?php foreach($opacities as $opacity) { ?>
						<?php if($wpgs_options['spoa5'] == $opacity) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
						<?php if($opacity == '100' && $wpgs_options['spoa5'] == '') { $selected = 'selected="selected"'; }?>
						<option value="<?php echo $opacity; ?>" <?php echo $selected; ?>><?php echo $opacity; ?>%</option>
					<?php } ?>
				</select>
				<label class="description" for="wpgs_settings[spoa5]"><?php _e('Speaker Icon Opacity, Active State', 'wpgs_domain'); ?></label>
			</p>
			<p>
				<?php $value = $wpgs_options['animation_time_5'] == '' ? '400' : $wpgs_options['animation_time_5']?>
				<input id="wpgs_settings[animation_time_5]" name="wpgs_settings[animation_time_5]" type="text" value="<?php echo $value; ?>"/>
				<label class="description" for="wpgs_settings[animation_time_5]"><?php _e('Time Between Switching Passive And Active States, In miliseconds.', 'wpgs_domain'); ?></label>
			</p>
		
		
		
		
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Options', 'wpgs_domain'); ?>" />
			</p>
		
		</form>
		
	</div>
	<?php
	echo ob_get_clean();
}

function wpgs_add_options_link() {
	add_options_page('GSpeech Plugin Options', 'GSpeech', 'manage_options', 'wpgs-options', 'wpgs_options_page');
}
add_action('admin_menu', 'wpgs_add_options_link');

function wpgs_register_settings() {
	// creates our settings in the options table
	register_setting('wpgs_settings_group', 'wpgs_settings');
}
add_action('admin_init', 'wpgs_register_settings');