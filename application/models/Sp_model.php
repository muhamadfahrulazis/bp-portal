<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sp_model extends CI_Model{
    //nama table
    private $_table = "sp";
    
    //nama kolom
    public $sp_id;
    public $sp_name;
    public $finished_order;
    public $image = "default.jpg";
    public $domisili;
    
    public function rules(){
        return [
            [
                'field' => 'sp_name',
                'label' => 'Nama',
                'rules' => 'required' 
            ],
            
            [
                'field' => 'finished_order',
                'label' => 'Finished Order',
                'rules' => 'required'
            ],
            
            [
                'field' => 'domisili',
                'label' => 'Domisili',
                'rules' => 'required'
            ]
        ];
    }
    
    public function getAll(){
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id){
        return $this->db->get_where($this->_table, ["sp_id" => $id])->row();
    }
    
    public function save(){
        $post = $this->input->post();
        $this->sp_id = uniqid();
        $this->sp_name = $post['sp_name'];
        $this->finished_order = $post['finished_order'];
        $this->image = $this->_uploadImage();
        $this->domisili = $post['domisili'];
        $this->db->insert($this->_table, $this);
    }
    
    public function update(){
        $post = $this->input->post();
        $this->sp_id = $post['id'];
        $this->sp_name = $post['sp_name'];
        $this->finished_order = $post['finished_order'];
        if(!empty($_FILES['image']['name'])){
            $this->image = $this->_uploadImage();
        }else{
            $this->image = $post['old_image'];
        }
        
        $this->domisili = $post['domisili'];
        $this->db->update($this->_table, $this, array('sp_id' => $post['id']));
    }
    
    public function delete($id){
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array('sp_id' => $id));
    }
    
    private function _uploadImage(){
        $config['upload_path']      = './upload/sp/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['file_name']        = $this->sp_id;
        $config['overwrite']        = TRUE;
        $config['max_size']         = 1024;
//        $config['max_width']        = 1024;
//        $config['max_height']       = 768;
        
        $this->load->library('upload', $config);
        
        if($this->upload->do_upload('image')){
            return $this->upload->data('file_name');
        }
        
        return 'default.jpg';
    }
    
    private function _deleteImage($id){
        
        $sp = $this->getById($id);
        if($sp->image != "default.jpg"){
            $filename = explode(".", $sp->image)[0];
            return array_map('unlink', glob(FCPATH."upload/sp/$filename.*"));
        }
    }
    
}

