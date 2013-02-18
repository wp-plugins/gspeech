<?php

/*our display functions for outputting information*/

function wpgs_prepare_html($content) {

	global $wpgs_options;
	global $plugin_folder_name;
	
	//get all parameters
	$gspeech_lang = $wpgs_options['language'] == '' ? 'en' : $wpgs_options['language'];
	$speak_any_text = $wpgs_options['speak_any_text'] == '' ? 1 : $wpgs_options['speak_any_text'];
	 
	//$speech_engine = $wpgs_options['speech_engine'];
	$tr_tool = 'g';
	$speech_lenght = '100';
	 
	$greeting_text = $wpgs_options['greeting_text'];
	$greeting_text = $greeting_text == '' ? '{gspeech style=1 language=en autoplay=1 speechtimeout=0 registered=2 hidespeaker=1}Welcome to SITENAME{/gspeech}{gspeech style=2 language=en autoplay=1 speechtimeout=0 registered=1 hidespeaker=1}Welcome REALNAME{/gspeech}' : ($greeting_text == 'blank' ? '' : $greeting_text);
	 
	$bcp1 = $wpgs_options['bcp1'] == '' ? '#ffffff' : $wpgs_options['bcp1'];
	$cp1 = $wpgs_options['cp1'] == '' ? '#111111' : $wpgs_options['cp1'];
	$bca1 = $wpgs_options['bca1'] == '' ? '#3297fd' : $wpgs_options['bca1'];
	$ca1 = $wpgs_options['ca1'] == '' ? '#ffffff' : $wpgs_options['ca1'];
	$spop1 = $wpgs_options['spop1'] == '' ? 90 : $wpgs_options['spop1'];
	$spop1_ = $spop1 == '' ? 0.9 : $spop1 / 100;
	$spoa1 = $wpgs_options['spoa1'] == '' ? 100 : $wpgs_options['spoa1'];
	$animation_time_1 = $wpgs_options['animation_time_1'] == '' ? 400 : $wpgs_options['animation_time_1'];
	 
	$bcp2 = $wpgs_options['bcp2'] == '' ? '#ffffff' : $wpgs_options['bcp2'];
	$cp2 = $wpgs_options['cp2'] == '' ? '#ff0000' : $wpgs_options['cp2'];
	$bca2 = $wpgs_options['bca2'] == '' ? '#ff0000' : $wpgs_options['bca2'];
	$ca2 = $wpgs_options['ca2'] == '' ? '#ffffff' : $wpgs_options['ca2'];
	$spop2 = $wpgs_options['spop2'] == '' ? 80 : $wpgs_options['spop2'];
	$spop2_ = $spop2 == '' ? 0.8 : $spop2 / 100;
	$spoa2 = $wpgs_options['spoa1'] == '' ? 100 : $wpgs_options['spoa2'];
	$animation_time_2 = $wpgs_options['animation_time_2'] == '' ? 400 : $wpgs_options['animation_time_2'];
	 
	$bcp3 = $wpgs_options['bcp3'] == '' ? '#ffffff' : $wpgs_options['bcp3'];
	$cp3 = $wpgs_options['cp3'] == '' ? '#008000' : $wpgs_options['cp3'];
	$bca3 = $wpgs_options['bca3'] == '' ? '#008000' : $wpgs_options['bca3'];
	$ca3 = $wpgs_options['ca3'] == '' ? '#ffffff' : $wpgs_options['ca3'];
	$spop3 = $wpgs_options['spop3'] == '' ? 70 : $wpgs_options['spop3'];
	$spop3_ = $spop3 == '' ? 0.7 : $spop3 / 100;
	$spoa3 = $wpgs_options['spoa3'] == '' ? 100 : $wpgs_options['spoa3'];
	$animation_time_3 = $wpgs_options['animation_time_3'] == '' ? 400 : $wpgs_options['animation_time_3'];
	 
	$bcp4 = $wpgs_options['bcp4'] == '' ? '#ffffff' : $wpgs_options['bcp4'];
	$cp4 = $wpgs_options['cp4'] == '' ? '#0000ff' : $wpgs_options['cp4'];
	$bca4 = $wpgs_options['bca4'] == '' ? '#0000ff' : $wpgs_options['bca4'];
	$ca4 = $wpgs_options['ca4'] == '' ? '#ffffff' : $wpgs_options['ca4'];
	$spop4 = $wpgs_options['spop4'] == '' ? 60 : $wpgs_options['spop4'];;
	$spop4_ = $spop4 == '' ? 0.6 : $spop4 / 100;
	$spoa4 = $wpgs_options['spoa4'] == '' ? 100 : $wpgs_options['spoa4'];
	$animation_time_4 = $wpgs_options['animation_time_4'] == '' ? 400 : $wpgs_options['animation_time_4'];
	 
	$bcp5 = $wpgs_options['bcp5'] == '' ? '#ffffff' : $wpgs_options['bcp5'];
	$cp5 = $wpgs_options['cp5'] == '' ? '#ffa500' : $wpgs_options['cp5'];
	$bca5 = $wpgs_options['bca5'] == '' ? '#ffa500' : $wpgs_options['bca5'];
	$ca5 = $wpgs_options['ca5'] == '' ? '#ffffff' : $wpgs_options['ca5'];
	$spop5 = $wpgs_options['spop5'] == '' ? 50 : $wpgs_options['spop5'];;
	$spop5_ = $spop5 == '' ? 0.5 : $spop5 / 100;
	$spoa5 = $wpgs_options['spoa5'] == '' ? 100 : $wpgs_options['spoa5'];
	$animation_time_5 = $wpgs_options['animation_time_5'] == '' ? 400 : $wpgs_options['animation_time_5'];
	
	$code_path =  plugins_url() . '/'. $plugin_folder_name .'/';
	$gspeech_js = $speak_any_text == 1 ? '<script src="'.$code_path.'includes/js/gspeech.js"></script>' : '';
	
	//$speech_title = _e('Click to listen highlighted text!', 'wpgs_domain');
	//$speech_powered_by = _e('Powered By', 'wpgs_domain');
	$speech_title = 'Click to listen highlighted text!';
	$speech_powered_by = 'Powered By';
	$gspeech_content = <<<EOM
	
        <div id="gspeech_wrapper"><span class="gspeech_title">{$speech_title}</span><span class="gspeech_powered">{$speech_powered_by} <a href="http://2glux.com/projects/gspeech" target="_blank">GSpeech</a></span></div>
        <div id="sound_container" class="sound_div" title="{$speech_title}" style=""><div id="sound_text"></div>
        </div><div id="sound_audio"></div>
        <script type="text/javascript">
        	var players = new Array(),
            	blink_timer = new Array(),
            	rotate_timer = new Array(),
            	lang_identifier = '{$gspeech_lang}',
            	selected_txt = '',
            	sound_container_clicked = false,
            	sound_container_visible = true,
            	blinking_enable = true,
            	basic_plg_enable = true,
            	pro_container_clicked = false,
            	streamerphp_folder = '{$code_path}',
            	translation_tool = '{$tr_tool}',
            	//translation_audio_type = 'audio/x-wav',
            	translation_audio_type = 'audio/mpeg',
            	speech_text_length = {$speech_lenght},
            	blink_start_enable_pro = true,
            	createtriggerspeechcount = 0,
				speechtimeoutfinal = 0,
				speechtxt = '',
            	userRegistered = "{$userRegistered}",
            	gspeech_bcp = ["{$bcp1}","{$bcp2}","{$bcp3}","{$bcp4}","{$bcp5}"],
		    	gspeech_cp = ["{$cp1}","{$cp2}","{$cp3}","{$cp4}","{$cp5}"],
		    	gspeech_bca = ["{$bca1}","{$bca2}","{$bca3}","{$bca4}","{$bca5}"],
		    	gspeech_ca = ["{$ca1}","{$ca2}","{$ca3}","{$ca4}","{$ca5}"],
		    	gspeech_spop = ["{$spop1}","{$spop2}","{$spop3}","{$spop4}","{$spop5}"],
		    	gspeech_spoa = ["{$spoa1}","{$spoa2}","{$spoa3}","{$spoa4}","{$spoa5}"],
		    	gspeech_animation_time = ["{$animation_time_1}","{$animation_time_2}","{$animation_time_3}","{$animation_time_4}","{$animation_time_5}"];
        </script>
        <script type="text/javascript" src="{$code_path}includes/js/gspeech_pro.js"></script>
        {$gspeech_js}
        <style type="text/css">#sound_container{width: 32px;height: 32px;position: absolute;background-image: url("{$code_path}/includes/images/gspeech.png");cursor: pointer;z-index: 999999;display: none;}#sound_container:hover{filter: alpha(opacity = 100);opacity:1;}#sound_audio {width: 0;height: 0;display: block;overflow: hidden;}#sound_text {display: none;}</style>
        <style type="text/css">.gspeech_selection{display: inline;background-color:white;}.sound_container_pro{width: 32px;height: 32px;position: absolute;background-image: url("{$code_path}/includes/images/gspeech.png");cursor: pointer;z-index: 999999;display: none;}.sound_audio_pro {width: 0;height: 0;display: inline;overflow: hidden;}.sound_text_pro {display: none;}</style>
        <style type="text/css">.gspeech_style_,.gspeech_style_1{background-color:{$bcp1};color:{$cp1};}.gspeech_style_2{background-color:{$bcp2};color:{$cp2};}.gspeech_style_3{background-color:{$bcp3};color:{$cp3};}.gspeech_style_4{background-color:{$bcp4};color:{$cp4};}.gspeech_style_5{background-color:{$bcp5};color:{$cp5};}</style>
        <style type="text/css">.gspeech_style_.active,.gspeech_style_1.active{background-color:{$bca1};color:{$ca1};}.gspeech_style_2.active{background-color:{$bca2};color:{$ca2};}.gspeech_style_3.active{background-color:{$bca3};color:{$ca3};}.gspeech_style_4.active{background-color:{$bca4};color:{$ca4};}.gspeech_style_5.active{background-color:{$bca5};color:{$ca5};}</style>
        <style type="text/css">
        .sound_div_,.sound_div_1{opacity:{$spop1_};filter: alpha(opacity = {$spop1})}
        .sound_div_2{opacity:{$spop2_};filter: alpha(opacity = {$spop2})}
        .sound_div_3{opacity:{$spop3_};filter: alpha(opacity = {$spop3})}
        .sound_div_4{opacity:{$spop4_};filter: alpha(opacity = {$spop4})}
        .sound_div_5{opacity:{$spop5_};filter: alpha(opacity = {$spop5})}
        #gspeech_wrapper {box-shadow:2px 2px 5px #000, 0 0 4px 1px rgba(17, 18, 29, 0.46), 0 0 23px 8px rgb(255, 255, 255);border-radius: 11px;padding: 4px 30px 8px 10px;top: 44px;background-color: rgba(242, 244, 245, 0.85);position: absolute;display: none;z-index: 9999;}#gspeech_wrapper:hover {box-shadow: 2px 2px 6px #000, 0 0 6px 2px rgba(17, 18, 29, 0.46), 0 0 23px 8px rgb(255, 255, 255);}.gspeech_title {color: rgb(90, 90, 90);font-size: 13px}.gspeech_powered {margin-top: 6px;font-weight: bold;font-size: 16px;display: block;color:#666;}.gspeech_powered a {color: #08C;text-decoration: underline;}.gspeech_powered a:hover {color: #08C;text-decoration: none;}	.gspeech_wrapper {box-shadow: 2px 2px 5px #000, 0 0 4px 1px rgba(17, 18, 29, 0.46), 0 0 23px 8px rgb(255, 255, 255);border-radius: 11px;padding: 4px 30px 8px 10px;top: 44px;background-color: rgba(242, 244, 245, 0.85);position: absolute;display: none;z-index: 9999;}.gspeech_wrapper:hover {box-shadow: 2px 2px 6px #000, 0 0 6px 2px rgba(17, 18, 29, 0.46), 0 0 23px 8px rgb(255, 255, 255);}
        </style>
	
EOM;
        // Makes appropriate changes to the HTML
        function wpgs_strip_htm($matches) {
        	 
			$speech_title = 'Click to listen highlighted text!';
			$speech_powered_by = 'Powered By';
        
        	$sitename = get_bloginfo('name');
        	
        	global $current_user;
        	$userRegistered =  $current_user->ID == 0 ? 0 : 1;
        	get_currentuserinfo();
        	
        	$username =  $current_user->user_login;
        	$realname = $current_user->display_name;
        	 
        	if($userRegistered == 0 && $matches[10] == 1) {
        		if($matches[16] != 1) {
        			return $matches[17];
        		}
        		else return;
        	}
        	if($userRegistered == 1 && $matches[10] == 2) {
        		if($matches[16] != 1) {
        			return $matches[17];
        		}
        		else return;
        	}
        	 
        	$htm = strip_tags($matches[17]);
        	$htm = preg_replace('/<script\b[^>]*>(.*?)<\/script>/si', "", $htm);
        	$htm = preg_replace('/<style\b[^>]*>(.*?)<\/style>/si', "", $htm);
        	$htm = str_replace(array("\"","'"),"",$htm);
        	 
        	$htm = str_replace("SITENAME",$sitename,$htm);
        	if($userRegistered == 1) {
        		$htm = str_replace("USERNAME",$username,$htm);
        		$htm = str_replace("REALNAME",$realname,$htm);
        	}
        	 
        	$htm_original = str_replace("SITENAME",$sitename,$matches[17]);
        	if($userRegistered == 1) {
        		$htm_original = str_replace("USERNAME",$username,$htm_original);
        		$htm_original = str_replace("REALNAME",$realname,$htm_original);
        	}
        	 
        	$hidespeaker_pre = $matches[16] == 1 ? '<div style="display:none">' : '';
        	$hidespeaker_af = $matches[16] == 1 ? '</div>' : '';
        	return $hidespeaker_pre.'
        	<div class="gspeech_wrapper"><span class="gspeech_title">'.$speech_title.'</span><span class="gspeech_powered">'.$speech_powered_by.' <a href="http://2glux.com/projects/gspeech" target="_blank">GSpeech</a></span></div>
        	<span class="gspeech_selection gspeech_style_'.$matches[2].'" roll="'.$matches[2].'">'.$htm_original.'</span><span class="sound_container_position">&nbsp;</span>
        	<span class="sound_container_pro sound_div_'.$matches[2].'" language="'.$matches[4].'" roll="'.$matches[2].'" autoplaypro="'.$matches[6].'" speechtimeout="'.$matches[8].'" selector="'.$matches[12].'" eventpro="'.$matches[14].'" title="'.$speech_title.'" style=""><span class="sound_text_pro">'.$htm.'</span></span>'.$hidespeaker_af;
        }

	 	$greeting_text = preg_replace_callback('/{gspeech( style=([\d]*?))?( language=([\S]*?))?( autoplay=([\d]*?))?( speechtimeout=([\d]*?))?( registered=([\d]*?))?( selector=(.*?))?( event=(.*?))?( hidespeaker=([\d]*?))?[\s]?}(.*?){\/gspeech}/si', 'wpgs_strip_htm', $greeting_text, 2);
        $greeting_text = preg_replace('/{gspeech[^}]*?}/si', '', $greeting_text);
        $greeting_text = preg_replace('/{\/gspeech}/si', '', $greeting_text);
        $greeting_text = str_replace('sound_container_position','sound_container_position greeting_block',$greeting_text);
        
        $content = preg_replace_callback('/{gspeech( style=([\d]*?))?( language=([\S]*?))?( autoplay=([\d]*?))?( speechtimeout=([\d]*?))?( registered=([\d]*?))?( selector=(.*?))?( event=(.*?))?( hidespeaker=([\d]*?))?[\s]?}(.*?){\/gspeech}/si', 'wpgs_strip_htm', $content, 1);
        $content = preg_replace('/{gspeech[^}]*?}/si', '', $content);
        $content = preg_replace('/{\/gspeech}/si', '', $content);
        
        $is_htm = strpos($content, '<body');
        if($is_htm)
        	$content = preg_replace('/<body([^>]*)?>/si', "<body$1>" . $greeting_text, $content);
       	$content = str_replace('</body>', $gspeech_content . '</body>', $content);
	return $content;
}

function wpgs_start_speeching() {
	//return on admin
	if(is_admin())
		return;
	ob_start("wpgs_prepare_html");
}

function wpgs_make_ob_end_flush() {
	ob_end_flush();
}
register_shutdown_function('wpgs_make_ob_end_flush');

add_action('wp_loaded', 'wpgs_start_speeching');



?>