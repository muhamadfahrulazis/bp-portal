<?php defined('BASEPATH') OR exit('No Direct script access allowed');

 class Sp extends CI_Controller{
     
     public function __construct() {
         parent::__construct();
         $this->load->model('sp_model');
         $this->load->library('form_validation');
     }
     
     public function index(){
         $data['sp'] = $this->sp_model->getAll();
         $this->load->view('admin/sp/list', $data);
     }
     
     public function add(){
         $sp = $this->sp_model;
         $validation = $this->form_validation;
         $validation->set_rules($sp->rules());
         
         if($validation->run()){
             $sp->save();
             $this->session->set_flashdata('success', 'Berhasil disimpan');
         }
         
         $this->load->view('admin/sp/new_form');
     }
     
     public function edit($id = null){
         if(!isset($id))redirect('admin/sp');
         
         $sp = $this->sp_model;
         $validation = $this->form_validation;
         $validation->set_rules($sp->rules());
         
         if($validation->run()){
             $sp->update();
             $this->session->set_flashdata('success', 'Berhasil disimpan');
         }
         
         $data['sp'] = $sp->getById($id);
         if(!$data['sp']) show_404 ();
         
         $this->load->view('admin/sp/edit_form', $data);
     }
     
     public function delete($id = null){
         if(!isset($id)) show_404 ();
         
         if($this->sp_model->delete($id)){
             redirect(site_url('admin/sp'));
         }
     }
 }

