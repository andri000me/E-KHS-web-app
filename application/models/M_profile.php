<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

    }
    public function getData()
    {
        $this->db->select('nama, username,level,foto');
        $this->db->where('id',$this->session->userdata('id'));

        return $this->db->get('user')->result();
    }

    public function update($tb='')
    {
        if ($tb=='dosen') {
            # code...
            $this->form_validation->set_rules('nip', 'nip', 'required');
            $this->form_validation->set_rules('nama', 'nama', 'required');
            $this->form_validation->set_rules('no_hp', 'no_hp', 'required');

            if($this->form_validation->run()==FALSE){
                $message = array(
                'type' =>'error',
                'text'=>'Data Gagal Di Diedit' );
                return $message;
            }
            else{
                $data=array(

                    "nip"=>$_POST['nip'],
                    "nama"=>$_POST['nama'],
                    "no_hp"=>$_POST['no_hp'],
                );

                $data1=array(

                    "username"=>$_POST['nip'],
                    "nama"=>$_POST['nama'],
                    "no_hp"=>$_POST['no_hp'],
                );
                $this->db->where('nip',$this->session->userdata('nip'));
                $this->db->update('dosen',$data);
                $this->session->set_userdata($data1);
                $message = array(
                    'type' =>'success',
                    'text'=>'Data Berhasil Di Update');
                return $message;
            }
        }
        else{
            # code...
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('nama', 'nama', 'required');
            $this->form_validation->set_rules('no_hp', 'no_hp', 'required');

            if($this->form_validation->run()==FALSE){
                $message = array(
                'type' =>'error',
                'text'=>'Data Gagal Di Diedit' );
                return $message;
            }
            else{
                $data=array(

                    "username"=>$_POST['username'],
                    "nama"=>$_POST['nama'],
                    "no_hp"=>$_POST['no_hp'],
                );
                $this->db->where('id',$this->session->userdata('id'));
                $this->db->update('user',$data);
                $this->session->set_userdata($data);
                $message = array(
                    'type' =>'success',
                    'text'=>'Data Berhasil Di Update');
                return $message;
            }
        }

            
    }
    public function change_password($tb='user')
    { 
        $this->form_validation->set_rules('oldpassword', 'oldpassword', 'required');
        $this->form_validation->set_rules('confirm', 'confirm', 'required');

        if ($tb=='dosen') {
          $this->db->where('nip', $this->session->userdata('username'));
          $this->db->where('password', md5($_POST['oldpassword']));
          $chek=$this->db->get('dosen');

          if($this->form_validation->run()==FALSE){
              $message = array(
              'type' =>'error',
              'text'=>'Password Gagal Di Ubah' );
              return $message;
          }
          elseif ($chek->num_rows()<=0) {
             $message = array(
              'type' =>'error',
              'text'=>'Password Lama Salah!' );
              return $message;
          }
          else{
              $data=array(
                  "password"=> md5($_POST['confirm']),
              );
              $this->db->where('nip',$this->session->userdata('username'));
              $this->db->update('dosen',$data);
              $message = array(
                  'type' =>'success',
                  'text'=>'Data Berhasil Di Update');
              return $message;
          }

        }
        else{
          $this->db->where('id', $this->session->userdata('id'));
          $this->db->where('password', md5($_POST['oldpassword']));
          $chek=$this->db->get('user');

          if($this->form_validation->run()==FALSE){
              $message = array(
              'type' =>'error',
              'text'=>'Password Gagal Di Ubah' );
              return $message;
          }
          elseif ($chek->num_rows()<=0) {
             $message = array(
              'type' =>'error',
              'text'=>'Password Lama Salah!' );
              return $message;
          }
          else{
              $data=array(
                  "password"=> md5($_POST['confirm']),
              );
              $this->db->where('id',$this->session->userdata('id'));
              $this->db->update('user',$data);
              $message = array(
                  'type' =>'success',
                  'text'=>'Data Berhasil Di Update');
              return $message;
          } 
        }
        # code...
       
        
          
    }
    public function change_photo()
    {
        
        
        $config['upload_path']          = './assets/images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->session->userdata('id');
        $config['overwrite']            = true;
        $config['max_size']             = 1024 * 10; // 1MB
        
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            $this->load->library('simple_image');
                $this->simple_image
                     ->fromFile('./assets/images/'.$this->upload->data("file_name"))
                     ->thumbnail(500, 500, 'center')
                     ->toFile('./assets/images/'.$this->upload->data("file_name"));
            $data=array(
                "foto"=>$this->upload->data("file_name"),   
            );
            $this->db->where('id', $this->session->userdata('id'));
            $this->db->update('user', $data);
            $this->session->set_userdata($data);
            $message = array(
                'type' =>'success',
                'text'=>'Foto Profil Berhasil Di Ubah');
            return $message;
        }
        else{
           $message = array(
                'type' =>'error',
                'text'=>'Foto Profil Gagal Di Upload');
            return $message; 
        }
            

    }
        
   
    
}
