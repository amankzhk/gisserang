<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {


	public function index()
	{
		$data['l'] = $this->db->query("SELECT * FROM lokasi GROUP BY nama DESC LIMIT 5");
		$data['bp'] = $this->db->query("SELECT * FROM trayekangkot GROUP BY dibaca DESC LIMIT 3");
		$data['bt'] = $this->db->query("SELECT * FROM trayekangkot GROUP BY id_trayek DESC LIMIT 3");
		$this->template->load('front-end/_template','front-end/_home',$data);
	}

		public function trayekangkot ()
	{
		$data['bp'] = $this->db->query("SELECT * FROM trayekangkot GROUP BY dibaca DESC LIMIT 5");
		$data['bt'] = $this->db->query("SELECT * FROM trayekangkot GROUP BY id_trayek DESC LIMIT 5");
		$data['ab'] = $this->db->query("SELECT * FROM trayekangkot GROUP BY id_trayek DESC");
		$this->template->load('front-end/_template','front-end/_trayekangkot',$data);
	}

	public function trayekangkot_detail($id)
	{
		$data['bp'] = $this->db->query("SELECT * FROM trayekangkot GROUP BY dibaca DESC LIMIT 5");
		$data['bt'] = $this->db->query("SELECT * FROM trayekangkot GROUP BY id_trayek DESC LIMIT 5");
		$b = $this->db->get_where("trayekbus",array("id_trayek"=>$id))->row_array();
		$dibaca = $b['dibaca'];
		$this->db->update('trayekangkot',array('dibaca'=>$dibaca + 1),array("id_trayek"=>$id));
		$data['bo'] = $this->db->get_where("trayekangkot",array("id_trayek"=>$id))->row_array();
		$this->template->load('front-end/_template','front-end/_trayekangkot_detail',$data);
	}	


	

	public function fasilitas()
	{
		$data['bp'] = $this->db->query("SELECT * FROM trayekangkot GROUP BY dibaca DESC LIMIT 5");
		$data['bt'] = $this->db->query("SELECT * FROM trayekangkot GROUP BY id_trayek DESC LIMIT 5");
		$data['p'] = $this->db->get_where("fasilitas",array("id_fasilitas"=>1))->row_array();
		$this->template->load('front-end/_template','front-end/_fasilitas',$data);
	}

	public function lokasi()
	{
		$data['bp'] = $this->db->query("SELECT * FROM trayekangkot GROUP BY dibaca DESC LIMIT 5");
		$data['bt'] = $this->db->query("SELECT * FROM trayekangkot GROUP BY id_trayek DESC LIMIT 5");
		$data['la'] = $this->db->get("lokasi");
		$this->template->load('front-end/_template','front-end/_lokasi',$data);
	}

	public function direction()
	{
		if(isset($_POST['cari'])) {
			$data = array(
				'saddr' => $_POST['asal'],
				'daddr' => $_POST['tujuan'],
				'l'		=> $this->db->query("SELECT * FROM lokasi GROUP BY nama DESC LIMIT 5"),
				);
            $this->template->load('front-end/_template','front-end/_direction_v',$data);
        }else{
        	$data['l'] = $this->db->query("SELECT * FROM lokasi GROUP BY nama DESC LIMIT 5");
			$this->template->load('front-end/_template','front-end/_direction',$data);
        }
	}

	public function lokasi_one($id)
	{
		$data['lo'] = $this->db->get_where("lokasi",array("id"=>$id))->row_array();
		$this->template->load('front-end/_template','front-end/_lokasi_one',$data);

	}


		public function trayekbus ()
	{
		$data['bp'] = $this->db->query("SELECT * FROM trayekbus GROUP BY dibaca DESC LIMIT 5");
		$data['bt'] = $this->db->query("SELECT * FROM trayekbus GROUP BY id_trayek DESC LIMIT 5");
		$data['ab'] = $this->db->query("SELECT * FROM trayekbus GROUP BY id_trayek DESC");
		$this->template->load('front-end/_template','front-end/_trayekbus',$data);
	}

	public function trayekbus_detail($id)
	{
		$data['bp'] = $this->db->query("SELECT * FROM trayekbus GROUP BY dibaca DESC LIMIT 5");
		$data['bt'] = $this->db->query("SELECT * FROM trayekbus GROUP BY id_trayek DESC LIMIT 5");
		$b = $this->db->get_where("trayekbus",array("id_trayek"=>$id))->row_array();
		$dibaca = $b['dibaca'];
		$this->db->update('trayekbus',array('dibaca'=>$dibaca + 1),array("id_trayek"=>$id));
		$data['bo'] = $this->db->get_where("trayekbus",array("id_trayek"=>$id))->row_array();
		$this->template->load('front-end/_template','front-end/_trayekbus_detail',$data);
	}	
}