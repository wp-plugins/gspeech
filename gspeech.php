<?php
/*
Plugin Name: GSpeech
Plugin URI: http://2glux.com/projects/gspeech
Description: GSpeech is a text to speech solution which allows to listen any selected text on your site! Please use <a href="http://2glux.com/forum/gspeech/">GSpeech Forum</a> for your support requests. See <a href="http://2glux.com/projects/gspeech/demo">GSpeech Demo</a>. 
Author: 2GLux.com
Author URI: http://2glux.com
Version: 1.0.1
*/

$plugin_folder_name = 'gspeech';

$wpgs_options = get_option('wpgs_settings');

/******************************
* includes
******************************/

include('includes/scripts.php'); // this controls all JS / CSS
include('includes/data-processing.php'); // this controls all saving of data
include('includes/display-functions.php'); // display content functions
include('includes/admin-page.php'); // the plugin options page HTML and save functions
