<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_setting extends CI_Model {

	public function getSkala()
	{
		$this->db->order_by('id', 'desc');
        return $this->db->get('skala')->result();
	}
	

}

/* End of file M_setting.php */
/* Location: ./application/models/M_setting.php */