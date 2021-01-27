<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- For Search Engine Meta Data  -->
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="yoursite.com" />

    <title>POST ME</title> 

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="<?php echo base_url(); ?>assets/image/brand-logo.png"/>

    <!-- Main structure css file -->
    <link  rel="stylesheet" href="<?php echo base_url(); ?>assets_old/css/bootstrap.min.css">
    <link  rel="stylesheet" href="<?php echo base_url(); ?>assets_old/css/login-style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if IE]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Start Preloader -->
<div id="preload-block">
    <div class="square-block"></div>
</div>
<!-- Preloader End -->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-8 col-lg-offset-4 col-md-offset-3 col-sm-offset-2">




            <!-- login start -->
            <div class="authfy-login">
                <!-- panel-login start -->
                <div class="authfy-panel panel-login text-center <?php if($this->session->flashdata('reg_msg') != NULL && $this->session->flashdata('reg_msg')){ echo ""; }else{ echo "active"; } ?>">
                    <div class="authfy-heading">
                        <h3 class="auth-title">Login to your account</h3>
                        <p>Don’t have an account? <a class="lnk-toggler" data-panel=".panel-signup" href="#">Sign Up Free!</a></p>
                    </div>
                    
                    




                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <?php
                                $data = array(
                                    'class' => 'loginForm',
                                    'name' => 'loginForm',
                                    'id' => 'loginForm' 
                                );
                                echo form_open('user_login', $data);
                            ?>
                                <div class="form-group wrap-input">
                                    <input type="username" class="form-control" name="username" placeholder="Username">
                                    <span class="focus-input"></span>
                                </div>
                                <div class="form-group wrap-input">
                                    <div class="pwdMask">
                                        <input type="password" class="form-control password" name="password" placeholder="Password">
                                        <span class="focus-input"></span>
                                        <span class="fa fa-eye-slash pwd-toggle"></span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign</button>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                        <?php if($this->session->flashdata('msg')){ ?>
                        <div class="info-area">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                    <?php } ?>
                    </div>
                </div> <!-- ./panel-login -->



                <!-- panel-signup start -->
                <div class="authfy-panel panel-signup text-center <?php if($this->session->flashdata('reg_msg') != NULL && $this->session->flashdata('reg_msg')){ echo "active"; } ?>">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <div class="authfy-heading">
                                <h3 class="auth-title">Sign up for free!</h3>
                            </div>
                            <?php
                                $data = array(
                                    'class' => 'titleInput',
                                    'name' => 'signupForm',
                                    'id' => 'signupForm'
                                );
                                echo form_open_multipart('user_registration', $data);
                            ?>
                                <div class="form-group wrap-input">
                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                    <span class="focus-input">Without whitespace</span>
                                </div>
                                <div class="form-group wrap-input">
                                    <input type="email" class="form-control" name="email" placeholder="Email address">
                                    <span class="focus-input"></span>
                                </div>
                                <div class="form-group wrap-input">
                                    <input type="text" class="form-control" name="fullname" placeholder="Full name">
                                    <span class="focus-input"></span>
                                </div>
                                <div class="form-group wrap-input">
                                    <div class="pwdMask">
                                        <input  type="password" class="form-control" name="password" placeholder="Password">
                                        <span class="focus-input"></span>
                                        <span class="fa fa-eye-slash pwd-toggle"></span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
                                </div>
                            <?php echo form_close() ?>
                            <a class="lnk-toggler" data-panel=".panel-login" href="#">Already have an account?</a>

                            <?php if($this->session->flashdata('reg_msg')){ ?>
                                <div class="info-area">
                                    <?php echo $this->session->flashdata('reg_msg'); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div> <!-- ./panel-signup -->




                
            </div> <!-- ./authfy-login -->
        </div>
    </div> <!-- ./row -->
</div> <!-- ./container -->
<!-- Javascript Files -->

<!-- initialize jQuery Library -->
<script src="<?php echo base_url(); ?>assets_old/js/jquery-2.2.4.min.js"></script>

<!-- for Bootstrap js -->
<script src="<?php echo base_url(); ?>assets_old/js/bootstrap.min.js"></script>

<!-- Custom js-->
<script src="<?php echo base_url(); ?>assets_old/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/custome_js/login.js"></script>

</body>
</html>
