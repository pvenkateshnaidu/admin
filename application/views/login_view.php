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
    <link href="<?php echo base_url();?>assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bracket.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Webmobilez <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-60">The Admin Template For Perfectionist</div>
         <?php 
        if(validation_errors())
        {
                echo "<div class='alert alert-danger'>".validation_errors()."</div>";
        }
        if($this->session->tempdata("error"))
        {
                echo "<div class='alert alert-danger'>".$this->session->tempdata("error")."</div>";
        }
        ?>
        <?php echo form_open();?>
        <div class="form-group">
          <input type="text" name="email" class="form-control" placeholder="Enter your email">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" name="pass" class="form-control" placeholder="Enter your password">
          <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Sign In</button>
        <?php echo form_close();?>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="<?php echo base_url();?>assets/lib/jquery/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/lib/popper.js/popper.js"></script>
    <script src="<?php echo base_url();?>assets/lib/bootstrap/bootstrap.js"></script>

  </body>
</html>
