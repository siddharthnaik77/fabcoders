
<?php if($result->num_rows() === 1){ ?>
    <?php $row = $result->result()[0]; ?>
    <div class="post-card">
        <div class="post-header">
            <p class="post-title"><?php echo $row->title; ?></p>
            <p class="author">
                By <a href="<?php echo base_url(); ?>user/profile/<?php echo $row->author_id; ?>">
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
                <?php echo $row->content; ?>
            </p>
        </div>
        <hr class="post-break-hr">
        
            <div class="post-opinion-bar-inner"> 
                <div class="post-opinion-like">
                    <a href="#" class="post-opinion-button"><i class="fal fa-thumbs-up"></i> <?= ($row->like_counter > 0)?$row->like_counter:""; ?></a>
                </div>
                
            </div>
            
        
        
    </div>

<?php }else{ echo "Something wronge"; } ?>
