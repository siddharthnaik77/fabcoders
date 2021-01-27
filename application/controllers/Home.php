<?php

class Home extends CI_Controller{
    public function index(){
        $data['page_body'] = "root";
        $data['results'] = $this->post_model->get_all(); 
        $data['main_categories'] = $this->categories_model->get_main_categories();
        $this->load->view('page/home/index', $data);
    }
   
}