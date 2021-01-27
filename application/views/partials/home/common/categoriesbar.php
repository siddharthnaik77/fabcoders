<div class="categories">
    
    
    <p class="categories-header">Categories</p>
    <div class="main-category-list">
       
        <?php foreach ($main_categories as $cat_row){ ?>
            <div class="main-category-list-item">
                <p>
                    <i class="far fa-angle-double-right"></i>
                     <a href="<?php echo base_url() ?>post/all_post/<?php echo $cat_row->id; ?>">
                        <?php echo $cat_row->name; ?>
                    </a>
                </p>
                <?php $sub_categories = $this->categories_model->get_sub_categories($cat_row->id); ?>
                <?php foreach ($sub_categories as $subcat_row){ ?>
                    <div class="sub-category-list">
                        <div class="sub-category-list-item">
                            <p>
                                <a href="<?php echo base_url() ?>post/all_post/<?php echo $cat_row->id . "/" . $subcat_row->id; ?>">
                                    <?php echo $subcat_row->name; ?>
                                </a>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>


<!-- POST POPUP START -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create Post</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <?php
            
            echo form_open('','class="email" id="myform"');
        ?>
      <div class="modal-body">
        <div class="post-update-form" >
        
        
            <div class="form-group">
                <input type="text" name="title" placeholder="Title" class="form-title-input form-control-plaintext">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="cat"  id="category">
                    <option value="" selected="selected"> -- Select Category -- </option>
                    <?php foreach ($main_categories as $cat_row){ ?>
                        
                        <option value="<?php echo $cat_row->id; ?>"><?php echo $cat_row->name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="subCat">Sub Category</label>
                <select class="form-control" name="subCat" id="subCat" >
                    <option value=""> -- select subcategory -- </option>
                </select>
            </div>
            <div class="form-group">
                <input type="file" name="image" id="image" class="form-control-file">
            </div>


            <div class="col-md-6" id="category_img_preview"> 
                                    

             </div> <br><br>
            <div class="form-group">
                <textarea name="content" id="" cols="50" rows="5" class="form-content" placeholder="Content"></textarea>
            </div>
            
        
    </div>
      </div>
      <div class="modal-footer">
        <div class="alert alert-danger alert-dismissable " id="error_box" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <p class="error_text"></p>
        </div>
        <button type="submit" id="posting" class="btn btn-primary">POST</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


      </div>
      <?php echo form_close(); ?>
    </div>

  </div>
</div>

<!-- POST POPUP END -->

<!-- JS INCLUDED -->
<script src="<?php echo base_url(); ?>assets/js/custome_js/post.js" type="text/javascript"></script> 