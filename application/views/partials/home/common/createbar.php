
<div class="categories">
    
     <?php if($this->session->userdata('islogin')){ ?>
    <p class="categories-header">Create Post</p>
    <div class="main-category-list ">
        <a class="nav-link"  id="post_modal" > Add Post</a>
    </div>
    <?php } ?>
    <p><a href="<?php echo base_url(); ?>post/all_post">View all post</a></p>
</div>
