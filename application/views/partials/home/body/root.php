<?php if($this->session->flashdata('create_success')){ ?>
    <div class="info-area">
        <?php echo $this->session->flashdata('create_success'); ?>
    </div>
<?php } ?>


<!-- post -->

<?php foreach ($results as $row){ ?>
    <div class="post-card" id="post_card_<?= base64_encode(base64_encode(base64_encode(base64_encode($row->id)))) ?>">
        <div class="post-header">
            <p class="post-title"><?php echo $row->title; ?></p>
            <p class="author">
                By <a href="#">
                    <?php
                        if((int)$this->session->userdata('userid') === (int)$row->author_id){
                            echo "You";
                        }else{
                            echo $row->author_name;
                        }
                    ?>
                </a>
            </p>
        </div>
        <div class="post-image">
            <img src="<?php echo base_url() ?>uploads/image/<?php echo $row->image; ?>">
        </div>
        <div class="post-text">
        <p>
            <?php echo substr($row->content, 0, 149);?>
            <?php if(strlen($row->content) >= 150){ ?>
                ...<a class="btn btn-primary" href="<?php echo base_url() ?>post/view/<?php echo base64_encode(base64_encode(base64_encode(base64_encode($row->id)))); ?>" role="button">Read more</a>
            <?php } ?>
        </p>
        </div>
        <?php if($this->session->userdata('islogin')){ ?>
            <div class="post-opinion-bar">
                <!-- like buton -->
                <div class="post-opinion-like"><a href="#" class="post-opinion-button btn-primary update_like" id="<?= base64_encode(base64_encode(base64_encode(base64_encode($row->id))))  ?> " ><i class="fal fa-thumbs-up"></i> <label id="like_counter_<?= base64_encode(base64_encode(base64_encode(base64_encode($row->id)))) ?> "><?= ($row->like_counter > 0)?$row->like_counter:""; ?> </label> </a></div>
                <!-- like buton -->
                <!-- delete button -->
                 <div class="post-opinion-like"><a href="#" class="post-opinion-button btn-danger delete_post " id="<?= base64_encode(base64_encode(base64_encode(base64_encode($row->id))))  ?> " ><i class="fal fa-trash"></i> </a>
                    <div class="alert alert-danger alert-dismissable " id="error_post_del_<?= base64_encode(base64_encode(base64_encode(base64_encode($row->id)))) ?>" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p class="error_post_del_text_<?= base64_encode(base64_encode(base64_encode(base64_encode($row->id)))) ?>"></p>
                </div> 
                 </div>
                 <!-- delete button -->
                 <!-- posted date -->
                 <div class="post-opinion-like"><label>Posted on : <?= date("d-m-Y",strtotime($row->created_date) ); ?></label>
                </div> 
                 <!-- posted date -->

            </div>

            
        <?php } ?>
    </div>
<?php } ?>
<!--end post-->

<footer class="footer">
    <div class="view-all">
        <p><a href="<?php echo base_url(); ?>post/all_post">View all post</a></p>
    </div>
</footer>