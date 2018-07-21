<html>
<head>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/css/mdb.min.css" rel="stylesheet">
<style>
textarea{ overflow-y: scroll !important; }
</style>
</head>

<body>
	<?php function fy_ip_blocking_and_routing() { ?>
	<h1>IP Blocking and Routing</h1>
	<form method="POST">
		<h3>List of blocked ip addresses. <code>Example: 127.0.0.1, 64.233.160.0, 66.102.0.0</code></h3>
		<div class="md-form mb-4">
		    <i class="fa fa-angle-double-right prefix"></i>
		    <textarea name="ipListBlock" type="text" id="form21" class="md-textarea form-control" rows="6"> <?php echo get_option("ipListBlock"); ?> </textarea>
		   
		</div>
		<h3>Blocked Message <code>It will not work if url router is used</code></h3>
		<div class="md-form mb-4">
		    <i class="fa fa-envelope-open prefix"></i>
		    <textarea name="blockedMessage" type="text" id="form22" class="md-textarea form-control" rows="6"> <?php echo get_option("blockedMessage"); ?></textarea>
		</div>
		<h3>Rooting URL <code>Example: https://google.com</code></h3>
		<div class="md-form mb-4">
		    <i class="fa fa-globe prefix"></i>
		    <input name="routingURL" type="text" value="<?php echo get_option("routingURL"); ?>">
		</div>

		<input type="hidden" name="action" value="update">
	    <input type="submit" class="btn btn-primary" value="UPDATE" >
 		<?php wp_nonce_field('fy_ip_blocking_and_routing_update','fy_ip_blocking_and_routing_update'); ?>
 		
	</form>
	<?php 

	if($_POST["action"] == "update"){

	  if (!isset($_POST['fy_ip_blocking_and_routing_update']) || !wp_verify_nonce( $_POST['fy_ip_blocking_and_routing_update'], 'fy_ip_blocking_and_routing_update' )){
	    print 'Sorry, Access denied ... ! ';
	    exit;

	  }else{

	  	
		    $ipListBlock = sanitize_text_field($_POST['ipListBlock']);
		    update_option('ipListBlock', $ipListBlock);
		 

		    $blockedMessage = sanitize_text_field($_POST['blockedMessage']);
		    update_option('blockedMessage', $blockedMessage);

		    $routingURL = sanitize_text_field($_POST['routingURL']);
		    update_option('routingURL', $routingURL);

		    echo "<script type='text/javascript'>
	        alert('Settings Saved.');
	        window.location=document.location.href;
	        </script>";

		 
		  }
		}

	  } //End 
	?>
</body>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.2/js/mdb.min.js"></script>
</html>