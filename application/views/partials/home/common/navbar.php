<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a href="#" class="navbar-brand">POST ME</a>
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('home'); ?>">Home</a>
            </li>

            <?php if($this->session->userdata('islogin')){ ?>
                <!-- <li class="nav-item active"> -->
                    <!-- <a class="nav-link" href="<?php echo base_url(); ?>index.php/post/create">Post</a> -->
                    <!-- <a class="nav-link"  id="post_modal" >Post</a> -->
                <!-- </li> -->
                
            <?php }else{ ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('user'); ?>">Login</a>
                </li>
            <?php } ?>
        </ul>
        <?php if($this->session->userdata('islogin')){ ?>
            <div class="navbar-nav ml-auto">
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i class="fal fa-angle-down" style="font-weight: 500;font-size: 40px;color: #fff;"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo base_url('user/logout'); ?>">Logout</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</nav>

