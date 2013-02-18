(function($) {
$(document).ready(function() {
	
	function check_pro_version_by_class() {
		if($(".gspeech_wrapper").is(":visible"))
			return true;
		return false;
	};
	
	$('.greeting_block').each(function(i){
		if(i > 1) {
			$(this).next('.sound_container_pro').remove();
			$(this).prev('.gspeech_selection').remove();
		}
	});
	
	$('.sound_container_pro').each(function(i) {
		$elem = $(this);
		var autoplay = $(this).attr("autoplaypro");
		var speechtimeout =$(this).attr("speechtimeout");
		if(isNaN(speechtimeout))
			speechtimeout = 0;
		speechtimeout = parseInt(speechtimeout);
		var selector =$(this).attr("selector");
		var event =$(this).attr("eventpro");
		
		if(selector != '' && event != '' && createtriggerspeechcount < 1) {
			createtriggerspeech($elem,speechtimeout,selector,event);
			createtriggerspeechcount ++;
		}
		else if(autoplay == 1) {
			triggerspeech($elem,speechtimeout);
		};
		
	});
	
	function triggerspeech($elem,speechtimeout) {
		speechtimeoutfinal = speechtimeoutfinal + speechtimeout*1 + 200*1;
		setTimeout(function() {
			stop_all_speakers_pro($('.sound_container_pro'));
			clearAllPlayers();
			setTimeout(function() {
				make_speeching($elem);
			},10);
		},speechtimeoutfinal);
	};
	
	function createtriggerspeech($elem,speechtimeout,selector,event) {
		$("" + selector + "").bind(event, function() {
			var $active_elem = $(this);
			var new_htm = $active_elem.html().replace(/<\/?[^>]+>/gi, '');
			var new_val = $active_elem.val().replace(/<\/?[^>]+>/gi, '');
			stop_all_speakers_pro($('.sound_container_pro'));
			clearAllPlayers();
			
			var htm = $elem.children('.sound_text_pro').html();
			if(htm == 'gspeech_html' || $elem.children('.sound_text_pro').attr("htm") == 'gspeech_html') {
				$elem.children('.sound_text_pro').attr("htm","gspeech_html");
				$elem.children('.sound_text_pro').html(new_htm);
			}
			else if(htm == 'gspeech_value' || $elem.children('.sound_text_pro').attr("htm") == 'gspeech_value') {
					$elem.children('.sound_text_pro').attr("htm","gspeech_value");
					$elem.children('.sound_text_pro').html(new_val);
			}
			setTimeout(function() {
				make_speeching($elem);
			},speechtimeout);
		});
	};
	
	var speech_enable_count = 1;
	$('.sound_container_position').each(function(i) {
		$this = $(this);
		if($(this).hasClass("greeting_block"))
			++speech_enable_count;
		if(i < speech_enable_count) {
			setTimeout(function() {
				var offset = $this.position();
				var left = offset.left;
				var top = offset.top;
				
				$this.next('.sound_container_pro').css({
					top: top,
					left: left,
					display: 'block'
				});
				$this.prev('span').prev('.gspeech_wrapper').css({
					top: top + 43*1,
					left: left,
					display: 'block'
				});
			},300);
			
		} else {
			$(this).next('.sound_container_pro').remove();
		}
	});
	
	$('.sound_container_pro').hover(function() {
		var $selection = $(this).prev('.sound_container_position').prev('.gspeech_selection');
		var roll = $selection.attr("roll");
		roll = roll == '' ? 1 : roll;
		--roll;
		
		var an_time = parseFloat(gspeech_animation_time[roll]);
		var speaker_op = parseInt(gspeech_spoa[roll] / 100);
		$(this).stop().animate({
			opacity: speaker_op
		},an_time);
		
		$selection.stop().animate({
			backgroundColor: gspeech_bca[roll],
			color: gspeech_ca[roll]
		},an_time);
		
	},function() {
		var $selection = $(this).prev('.sound_container_position').prev('.gspeech_selection');
		var roll = $selection.attr("roll");
		roll = roll == '' ? 1 : roll;
		--roll;
		
		//onmouseleave, fade back
		if(! $(this).hasClass('active')) {
			var an_time = parseInt(gspeech_animation_time[roll]);
			var speaker_op = parseFloat(gspeech_spop[roll] / 100);
			$(this).stop().animate({
				opacity: speaker_op
			},an_time);
		};
			
		if(! $selection.hasClass('active')) {
			$selection.stop().animate({
				backgroundColor: gspeech_bcp[roll],
				color: gspeech_cp[roll]
			},an_time);
		};
	});
	
	$('.sound_container_pro').mousedown(function() {
		pro_container_clicked = true;
		basic_plg_enable = false;
	});
	
	$("body").mousedown(function() {
		if($('.sound_container_pro.active').length > 0 && !pro_container_clicked)
			basic_plg_enable = true;
			
		stop_all_speakers_pro($('.sound_container_pro'));
		clearAllPlayers();
		$('.sound_container_pro').removeClass('active');
		$('.gspeech_selection').removeClass('active');
	});
	
	$('.sound_container_pro').click(function() {
		if(!check_pro_version_by_class()) {
			alert('To hide a backlink please purchase a GSpeech PRO version');
			return false;
		}
		make_speeching($(this));
	});
	
	function make_speeching($elem) {
		
		var sel_txt = $elem.children('.sound_text_pro').html();
		if(speechtxt != sel_txt) {
			var $selection = $elem.prev('.sound_container_position').prev('.gspeech_selection');
			$selection.stop().removeAttr("style").addClass('active');
			$elem.addClass('active');
			
			var lang = $elem.attr("language");
			lang = lang == '' ? lang_identifier : lang;
			
			blinking_enable_pro = true;
			blink_start_enable_pro = true;
			
			//animate to active opacity
			var roll = $elem.attr("roll");
			roll = roll == '' ? 1 : roll;
			--roll;
			var speaker_op = parseFloat(gspeech_spoa[roll] / 100);
			$elem.stop().fadeTo(400,speaker_op);
			
			//rotate me
			rotate_speaker_pro($elem);
			
			clearAllPlayers();
			make_audio_pro($elem.children('.sound_text_pro'),$elem,lang);
		}
		speechtxt = sel_txt;
		setTimeout(function() {
			speechtxt = '';
		},100);
	};
	
	function stop_speaker_pro($elem) {
		basic_plg_enable = true;
		clearAllPlayers();
		$elem.rotate({animateTo:360});
		
		var roll = $elem.attr("roll");
		roll = roll == '' ? 1 : roll;
		--roll;
		var speaker_op = parseFloat(gspeech_spop[roll] / 100);
		$elem.stop().fadeTo(400,speaker_op).removeClass('active');
		
		for(f in blink_timer) {
			clearTimeout(blink_timer[f]);
		}
		for(f in rotate_timer) {
			clearInterval(rotate_timer[f]);
		}
	};
	
	function stop_all_speakers_pro($elem) {
		clearAllPlayers();
		$('.sound_container_pro.active').rotate({animateTo:360});
		
		var roll = $elem.attr("roll");
		roll = roll == '' ? 1 : roll;
		--roll;
		var speaker_op = parseFloat(gspeech_spop[roll] / 100);
		$elem.stop().fadeTo(400,speaker_op).removeClass('active');
		
		for(f in blink_timer) {
			clearTimeout(blink_timer[f]);
		}
		for(f in rotate_timer) {
    		clearInterval(rotate_timer[f]);
		}
	};

	function rotate_speaker_pro($elem) {
		var angle = 0;
		rotate_timer_element = setInterval(function(){
		      angle+=3;
		      $elem.rotate(angle);
		},15);
		rotate_timer.push(rotate_timer_element);
	};
	
	function blink_speaker_pro($elem) {
		if(blink_start_enable_pro) {
			$elem.fadeTo(200,0.2);
			blink_start_enable_pro = false;
		}
		else {
			$elem.fadeTo(200,1);
			blink_start_enable_pro = true;
		}
		var t = setTimeout(function() {
			blink_speaker_pro($elem);
		},800);
		blink_timer.push(t);
	};
	
	function change_speaker_animation_pro($elem) {
		if(blinking_enable_pro) {
			for(f in rotate_timer) {
	    		clearInterval(rotate_timer[f]);
			}
			$elem.rotate({animateTo:0});
        	blink_speaker_pro($elem);
		}
		blinking_enable_pro = false;
	};

	//main function which creates audio
	function make_audio_pro($txt_element,$elem,lang) {
		selected_txt = $txt_element.html();
		var 
			words_array = new Array(),
			sent_array = new Array(),
			sent_index = 0;
		
		words_array = selected_txt.split(/[^\S]+/);

		for(var i = 0; i < words_array.length; i++) {
			if(sent_array[sent_index] == undefined) {
				sent_array[sent_index] = '';
			}

			var total_l = sent_array[sent_index].length + words_array[i].length;
			if(sent_array[sent_index].length < speech_text_length && total_l < speech_text_length) {
    				sent_array[sent_index] += words_array[i] + ' ';
			}
			else {
				++sent_index;
				sent_array[sent_index] = words_array[i] + ' ';
			}
		};

		var players_count = sent_array.length;

		var htm_cont = '';
		for(var i = 0; i < players_count; i++) {
			htm_cont += '<audio id="player' + i + '" src="' + streamerphp_folder + 'gspeech.mpeg" type="' + translation_audio_type + '" controls="controls"></audio>';
		};
		$("#sound_audio").html(htm_cont);

		for(var i = 0; i < players_count; i++) {
			create_htm(i,players_count);
		};

		function create_htm(i,players_count) {
			$('#player' + i).mediaelementplayer({
				success: function (mediaElement, domObject) {
					//detect media end
					players[i] = mediaElement;


		            // sets src
					var encoded_text = encodeURIComponent(sent_array[i]);
					var embed_url = streamerphp_folder + 'streamer.php?q=' + encoded_text + '&l=' + lang + '&tr_tool=' +translation_tool;
					mediaElement.setSrc(embed_url);

		            //play next audio, when current ends
		            mediaElement.addEventListener('pause', function(e) {
    	        		try {
    	        			players[i + 1].play()
    	        		} catch(e){}
		        	}, false);

		        	players[0].addEventListener('progress', function(e) {
    		            	change_speaker_animation_pro($elem);
		        	}, false);

		        	if(i == players_count - 1) {
    		        	players[players_count - 1].addEventListener('pause', function(e) {
    		        		stop_speaker_pro($elem);
    		        	}, false);
		        	}
		        	
		            mediaElement.load();
		            
		            if(i == 0) {
		            	mediaElement.play();
		            }
		        }
			});
		}
		
	};
	
	function clearAllPlayers() {
		for(var c in players) {
			players[c] = '';
		}
		$('#sound_audio').html('');
	};
	
				
});
})(jQuery);