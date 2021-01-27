<?php

class Post extends CI_Controller{


    public function create(){
        try{
        if($this->session->userdata('islogin')){
            if($_SERVER['REQUEST_METHOD'] === 'GET') {
                $data['page_body'] = 'create_post';
                $this->load->view('page/home/index', $data);
            }else if($_SERVER['REQUEST_METHOD'] === 'POST'){ 
                $this->form_validation->set_rules('title', 'Title', 'required|min_length[3]');
                $this->form_validation->set_rules('content', 'Content', 'required|min_length[3]');
                $this->form_validation->set_rules('cat', 'Category', 'trim|required');
                $this->form_validation->set_rules('subCat', 'Sub-Category', 'trim');
                if($this->form_validation->run()){
                    $config['upload_path'] = './uploads/image';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = 0;
                    $config['max_width'] = 0;
                    $config['max_height'] = 0;

                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload('image')) {
                        $errors =$this->upload->display_errors();

                        $response['status'] = FALSE;
                        $response['msg'] = $errors;
                    } else {
                        $file = $this->upload->data();
                        $this->post_model->insert($file);
                        $response['status'] = TRUE;
                        $response['msg'] = "Post create success";
                    }
                }else{
                    
                    $response['status'] = FALSE;
                     $response['msg'] = "Data is invalid. Make sure data is fill up";
                }
            }
        }else{
            $response['status'] = FALSE;
            $response['msg'] = "Data is invalid. Make sure data is fill up";
        }
        }catch( Exception $e){
            log_message( 'error', $e->getMessage() . 'in'. $e->getFile().':'. $e->getLine() );
        }

        echo json_encode($response, JSON_UNESCAPED_SLASHES);        
    }


    public function view($post_id){
        try{
        if(isset($post_id)){
            $data['page_body'] = 'view_post';
            
            $data['result'] = $this->post_model->get_one(base64_decode(base64_decode(base64_decode(base64_decode($post_id)))));
            $data['main_categories'] = $this->categories_model->get_main_categories();
            $this->load->view('page/home/index', $data);
        }else{
            $data = array(
                'error' => '<p>Data is invalid. Make sure data is fill up</p>',
                'page_body' => 'errors'
            );
            $this->load->view('page/home/index', $data);
        }
        }catch( Exception $e){
            log_message( 'error', $e->getMessage() . 'in'. $e->getFile().':'. $e->getLine() );
        }
    }

    

    public function all_post($cat = 0, $subCat = 0){
        try{
        if($this->input->get('page')){
            $page = (int)$this->input->get('page');
        }else{
            $page = 0;
        }
        $data['result'] = $this->post_model->get_post_by_page($cat, $subCat, $page);
        $data['main_categories'] = $this->categories_model->get_main_categories();
        $data['page_body'] = "view_aLl_post";
        $data['page'] = $page;
        $data['next_page'] = $page + 1;
        $data['prev_page'] = $page - 1;
        $this->load->view('page/home/index.php', $data);
        }catch( Exception $e){
            log_message( 'error', $e->getMessage() . 'in'. $e->getFile().':'. $e->getLine() );
        }
    }


    public function get_sub_cat(){
        try{
        $result['data'] = $this->categories_model->get_sub_categories($this->input->post('category_id'));
        if(!empty($result['data']) && is_array($result['data'])){
            $subcategory_data = "";
            $subcategory_data .="<option value='' selected > -- select subcategory -- </option>";
            foreach ($result['data'] as $key => $value) {
               $subcategory_data .="<option value='".$value->id."'>".$value->name." </option>";
            }
            $response['status'] = TRUE;
            $response['msg'] = "subcategory data found";
            $response['data'] = $subcategory_data;
                  
        }else{
            $response['status'] = FALSE;
            $response['msg'] = "subcategory data not found";
                 
        }
        }catch( Exception $e){
            log_message( 'error', $e->getMessage() . 'in'. $e->getFile().':'. $e->getLine() );
        }

        echo json_encode($response, JSON_UNESCAPED_SLASHES);
    }

    public function update_like(){
        try{
        $result['data'] = $this->post_model->check_post_exists(base64_decode(base64_decode(base64_decode(base64_decode($this->input->post('post_id'))))));
        if(!empty($result['data']) && is_array($result['data'])){
            
            $updated_like = $result['data'][0]->like_counter + 1;
            $like_status_updated =$this->post_model->add_like(base64_decode(base64_decode(base64_decode(base64_decode($this->input->post('post_id'))))),$updated_like );
            if($like_status_updated){
                $response['status'] = TRUE;
                $response['msg'] = "post liked successfully";
                $response['updated_count'] = $updated_like;
            }else{
                $response['status'] = FALSE;
                $response['msg'] = "something went wrong";
                
            }
        }else{
            $response['status'] = FALSE;
            $response['msg'] = "post not found";
        }
        }catch( Exception $e){
            log_message( 'error', $e->getMessage() . 'in'. $e->getFile().':'. $e->getLine() );
        }
        echo json_encode($response, JSON_UNESCAPED_SLASHES);   
    }


    public function delete_post(){
        try{
        $result['data'] = $this->post_model->check_post_exists(base64_decode(base64_decode(base64_decode(base64_decode($this->input->post('post_id'))))));
        if(!empty($result['data']) && is_array($result['data'])){
            
            $delete_status = $this->post_model->delete_post(base64_decode(base64_decode(base64_decode(base64_decode($this->input->post('post_id'))))));
            if($delete_status){
                $response['status'] = TRUE;
                $response['msg'] = "post deleted successfully";
                
              }else{
                $response['status'] = FALSE;
                $response['msg'] = "something went wrong";
              }
        }else{
            $response['status'] = FALSE;
            $response['msg'] = "post not found";
                 
        }
        }catch( Exception $e){
            log_message( 'error', $e->getMessage() . 'in'. $e->getFile().':'. $e->getLine() );
        }
         echo json_encode($response, JSON_UNESCAPED_SLASHES);   
    }
}