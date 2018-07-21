<?php
/*
Plugin Name: IP Blocking and Routing
Plugin URI: https://github.com/frkyldrm/wordpress-ip-block-routing
Description: Basic ip blocking or ip redirect for your web site.
Version: 1.0
Author: Faruk YILDIRIM
Author URI: https://softalika.com
License: GNU
Text Domain: ip-block-routing
*/


defined( 'ABSPATH' ) or die( 'Hey, This is not for you !' );
define( 'IPBLOCK__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if ( !class_exists( 'IPBLOCK_ROUTING' ) ) {

	class IPBLOCK_ROUTING {


		function __construct(){

			add_action( 'admin_menu', array( $this, 'wp_add_menu' ));
			add_action('wp_head', array( $this, 'check_and_add'));


		}


		function wp_add_menu() {

			add_menu_page('IP Blocking and Routing','IP Blocking and Routing', 'manage_options', 'fy_block_or_routing', 'fy_ip_blocking_and_routing');

		}


		function adminPanel () {

			require_once( IPBLOCK__PLUGIN_DIR . 'inc/admin.php' );
		}


		function check_and_add() {

			$blockList = array_map('trim', explode("," , get_option("ipListBlock")));
			$url = get_option("routingURL");

			if(!empty($url)){

         		if(in_array($_SERVER['REMOTE_ADDR'], $blockList)){

         			echo "<script type='text/javascript'>window.top.location='$url'</script>"; 
         			exit;
         		}

			 }else{

				if(in_array($_SERVER['REMOTE_ADDR'], $blockList)){

         			echo get_option("blockedMessage");
         			exit;
         		}
				
			}

		}

	}

	$ipBlock = new IPBLOCK_ROUTING();
	$ipBlock -> adminPanel();

}

?>