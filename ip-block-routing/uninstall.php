<?php 

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
 
 delete_option( 'ipListBlock' );
 delete_option( 'blockedMessage' );
 delete_option( 'routingURL' );