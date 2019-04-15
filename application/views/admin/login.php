<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>webmobilez signin</title>

    <!-- vendor css -->
    <link href="<?= adminUrl. 'assets/' ?>lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= adminUrl. 'assets/' ?>lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="<?= adminUrl. 'assets/' ?>css/bracket.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Webmobilez <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-60">The Admin Template For Perfectionist
		
		</div>
		<?php echo $error; ?>
		<form method="post" id="userIds" action="<?= site_url('User'); ?>">
        <div class="form-group">
          <input name="email" type="text" class="form-control" placeholder="Enter your username">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Enter your password">
          <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Sign In</button>
		</form>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
<script>
    var siteUrl = '<?= site_url(); ?>';  
</script>
    <script src="<?= adminUrl. 'assets/' ?>lib/jquery/jquery.js"></script>
    <script src="<?= adminUrl. 'assets/' ?>lib/popper.js/popper.js"></script>
    <script src="<?= adminUrl. 'assets/' ?>lib/bootstrap/bootstrap.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	  <script>
	 
	   
	   $("#userIds").validate({
		rules: {
			
		  
			  email: {
				required: true,
				email: true,
				
			},
		},
		messages: {
		   
			  email: { 
				 required: "Please enter your email address.",
						email: "Please enter a valid email address.",
					  
			}, 
		},
		errorElement: "em",
	});
	</script>
  </body>
</html>
