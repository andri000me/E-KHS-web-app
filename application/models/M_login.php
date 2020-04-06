<?php 

defined('BASEPATH') OR exit('No direct script access allowed');







class M_login extends CI_Model {

	public function get_data($username,$password)
	{
		$tglb=getdate();
        $takademik="1";
        $bl=date("m");
        if ($bl >=8) {
           $takademik=$tglb['year'];
        }
        else  $takademik=$tglb['year']-1;

        $this->db->where('username',$username);
    	$this->db->where('password',$password);
    	$query=$this->db->get('user');
    	if($query->num_rows()>0)
    	{
    		foreach ($query->result() as $row) {
    			$data = array(
                    'no_hp'=>$row->no_hp,
    				'username'=>$row->username,
                    'nama'=>$row->nama,
                    'foto'=>$row->foto,
                    'password' =>$row->password,
                    'prodiLog'=>$row->prodi,
                    'takademik'=>$takademik,
    				'lv'=>$row->level,
    			 );
    		}
    		$this->session->set_userdata($data);
    		if ($this->session->userdata('lv')=='Kajur/Sekjur')
    		{
    		    redirect('kajur/index');
    		}
    		else if ($this->session->userdata('lv')=='Operator')
    		{
    			redirect('Operator/index');
    		}
    	}
    	else
    	{
    		
            $this->db->where('nip',$username);
            $this->db->where('password',$password);
            $query=$this->db->get('dosen');
            if($query->num_rows()>0)
            {
                foreach ($query->result() as $row) {
                    $sess = array(
                        'nama' =>$row->nama,
                        'password' =>$row->password ,
                        'takademik'=>$takademik,
                        'lv'=>'dosen',
                        'username'=>$row->nip,
                        'no_hp'=>$row->no_hp,
                        
                     );
                }
                $this->session->set_userdata($sess);
                redirect('dosen/index');
                
            }
            else
            {

                $this->db->where('nim',$username);
                $this->db->where('password',$password);
                $query=$this->db->get('mahasiswa');
                if($query->num_rows()>0)
                {
                    foreach ($query->result() as $row) {
                        $sess = array(
                            'nama' =>$row->nama,
                            'username'=>$row->nim,
                            'takademik'=>$takademik,
                            'password' =>$row->password,
                            'lv'=>'mahasiswa',
                            
                         );
                    }
                    $this->session->set_userdata($sess);
                    $this->session->set_flashdata('sukses',"Selamat Datang");
                    redirect('mahasiswa/index');
                    
                }
                else 
                {
                    $this->session->set_flashdata('Gagal',"Username atau password salah Coba Lagi");
                    redirect('login');

                }
            }

    	}
	}

	public function masuk()
	{
		$username=$this->session->userdata('username');
		if(!empty($username))
		{
			if ($this->session->userdata('lv')=='Kajur/Sekjur')
    		{
    			redirect('kajur/index');
    		}
    		else if ($this->session->userdata('lv')=='Operator')
    		{
    			redirect('admin/index');
    		}
            else if ($this->session->userdata('lv')=='dosen') {
                redirect('dosen/index');
            }
            else if ($this->session->userdata('lv')=='mahasiswa') {
                redirect('mahasiswa/index');
                
            }
		}
	}
}
