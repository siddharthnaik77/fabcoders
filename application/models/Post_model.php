<?php

class Post_model extends CI_Model{
    public function insert($file){
        $data['title'] = $this->input->post('title');
        $data['cat_id'] = $this->input->post('cat');
        $data['sub_cat_id'] = $this->input->post('subCat');
        $data['author_id'] = $this->session->userdata('userid');
        $data['image'] = $file['file_name'];
        $data['content'] = $this->input->post('content');
        $this->db->insert('posts', $data);
    }
    public function get_all(){
        $this->db->select('posts.*, users.fullname AS author_name');
        $this->db->join('users', 'posts.author_id = users.id');
        $this->db->where('posts.status', '1');
        $this->db->order_By('posts.id','desc');
        $result = $this->db->get('posts', 6);
        return $result->result();
    }

    public function get_all_by_author_id($author_id){
        $this->db->select('posts.*, users.fullname AS author_name');
        $this->db->join('users', 'posts.author_id = users.id');
        $this->db->where('author_id', $author_id);
        $result = $this->db->get('posts', 5 , 0);
        return $result->result();
    }

    public function get_one($post_id){
        $this->db->select('posts.*, users.fullname AS author_name');
        $this->db->where('posts.id', $post_id);
        $this->db->join('users', 'posts.author_id = users.id');
        $res = $this->db->get('posts');
        return $res;
    }
    public function get_post_by_page($cat, $subCat, $page){
        if($cat !== 0){
            $this->db->where('cat_id', $cat);
            if($subCat !== 0){
                $this->db->where('sub_cat_id', $subCat);
            }
        }
        $this->db->where('status', '1');
        $results = $this->db->get('posts', 8, (int)$page * 8);
        return $results->result();
    }

    public function insert_comment($post_id){
        $data = array(
            'author_id' => $this->session->userdata('userid'),
            'author_name' => $this->session->userdata('fullname'),
            'post_id' => $post_id,
            'comment' => $this->input->post('comment')
        );
        $this->db->insert('comments', $data);
    }

    public function get_all_comment($post_id){
        $this->db->where('post_id', $post_id);
        $results = $this->db->get('comments');
        return $results->result();
    }

    public function check_post_exists($post_id){

        $this->db->select('posts.*');
        $this->db->where('id', $post_id);
        $res = $this->db->get('posts');
        return $res->result();
       
    }

    public function delete_post($id){
        $this->db->where('id', $id);
        $this->db->update('posts', ['status' => '0']);
        return TRUE;
    }

    public function add_like($id,$like_count){
        $this->db->where('id', $id);
        $this->db->update('posts', ['like_counter' => $like_count ]);
        return TRUE;
    }
}