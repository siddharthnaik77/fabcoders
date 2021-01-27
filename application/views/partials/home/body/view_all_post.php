<div class="page-1100">
    <div class="view-all-post-1100">
        <?php
            if(!empty($result) && is_array($result)){ 
            foreach ($result as $row){ ?>
            <div class="post-box-1100">
                <div class="post-title-1100">
                    <p><?php echo $row->title; ?></p>
                </div>
                <div class="post-image-1100">
                    <img src="<?php echo base_url(); ?>uploads/image/<?php echo $row->image; ?>" alt="" width="100%" height="200px">
                </div>
                <div class="post-content-1100">
                    <p>
                        <?php echo substr($row->content, 0, 50); ?> <a
                                href="<?php echo base_url();?>view/<?php echo  base64_encode(base64_encode(base64_encode(base64_encode($row->id)))); ?>" class="btn btn-primary">View full
                        </a>
                    </p>
                </div>
            </div>
        <?php } }else{ ?> 
            <h2>No Data Found</h2>
        <?php }?>
    </div>
    <?php if(count($result) > 0){ ?>
        <?php if($page > 1){ ?>
        <div class="post-next-1100"><a href="?page=<?php echo $prev_page; ?>"><i class="fas fa-arrow-square-left" style="background: white;"></i></a></div>
        <?php } ?>
        <div class="post-next-1100"><a href="?page=<?php echo $next_page; ?>"><i class="fas fa-arrow-square-right" style="background: white;"></i></a></div>
    <?php } ?>
</div>