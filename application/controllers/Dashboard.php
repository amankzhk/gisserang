<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __Construct()
	{
		parent::__Construct();
		$this->load->helper('login');
		cek_login();
	}

	public function index()
	{
		$this->template->load('back-end/_template','back-end/_dashboard');
	}

	public function fasilitas()
	{
		if(isset($_POST['update'])){
			$data = array(
				'judul'			=> $this->input->post('judul'),
				'isi_fasilitas'	=> $this->input->post('isi'),
			);
			$this->db->where('id_fasilitas',$this->input->post('id'));
			$this->db->update('fasilitas',$data);
			redirect('dashboard/fasilitas');
		}else{
			$data['p'] = $this->db->get_where('fasilitas',array('id_fasilitas'=>1))->row_array();
			$this->template->load('back-end/_template','back-end/_fasilitas',$data);
		}
	}

	public function Lokasi()
	{
		if(isset($_POST['simpan'])){
			$data = array(
				'nama'		=> $this->input->post('nama'),
				'kategori'	=> $this->input->post('kategori'),
				'alamat'	=> $this->input->post('alamat'),
				'telp'		=> $this->input->post('telp'),
				'latittude'	=> $this->input->post('lat'),
				'longitude'	=> $this->input->post('long'),
			);
			$this->db->insert('lokasi',$data);
			redirect('dashboard/lokasi');
		}elseif(isset($_POST['update'])){
			$data = array(
				'nama'		=> $this->input->post('nama'),
				'kategori'	=> $this->input->post('kategori'),
				'alamat'	=> $this->input->post('alamat'),
				'telp'		=> $this->input->post('telp'),
				'latittude'	=> $this->input->post('lat'),
				'longitude'	=> $this->input->post('long'),
			);
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('lokasi',$data);
			redirect('dashboard/lokasi');
		}else{
			$data['l'] = $this->db->get('lokasi');
			$this->template->load('back-end/_template','back-end/_lokasi',$data);
		}
	}

	public function Lokasi_tambah()
	{
		$data['k'] = $this->db->get('kategori');
		$this->template->load('back-end/_template','back-end/_lokasi_tambah',$data);
	}

	public function Lokasi_edit($id)
	{
		$data['k'] = $this->db->get('kategori');
		$data['l'] = $this->db->get_where('lokasi',array('id'=>$id))->row_array();
		$this->template->load('back-end/_template','back-end/_lokasi_edit',$data);
	}

	public function Lokasi_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('lokasi');
		redirect('dashboard/lokasi');
	}

	public function Lokasi_kategori()
	{
		if (isset($_POST['simpan'])) {
			if ($_FILES['gambar']['error'] <> 4) {

		        $config['upload_path'] = './uploads/icon';
		        $config['allowed_types'] = 'jpg|png|gif|bmp';
		        $this->load->library('upload', $config);
		 
		        if (!$this->upload->do_upload('gambar')) {
		            $error = array('error' => $this->upload->display_errors());
		            $this->index($error);
		        } else {
		            $hasil 	= $this->upload->data();
					$data = array(
						'nama_kategori'	=> $this->input->post('nama'),
						'keterangan'	=> $this->input->post('keterangan'),
						'ikon'			=> $hasil['file_name'],
					);
					$this->db->insert('kategori',$data);
					redirect('dashboard/Lokasi_kategori');
				}
			} else {
				$data = array(
					'nama_kategori'	=> $this->input->post('nama'),
					'keterangan'	=> $this->input->post('keterangan'),
				);
				$this->db->insert('kategori',$data);
				redirect('dashboard/Lokasi_kategori');
		    }
		}elseif (isset($_POST['update'])) {
			if ($_FILES['gambar']['error'] <> 4) {

		        $config['upload_path'] = './uploads/icon';
		        $config['allowed_types'] = 'jpg|png|gif|bmp';
		        $this->load->library('upload', $config);
		 
		        if (!$this->upload->do_upload('gambar')) {
		            $error = array('error' => $this->upload->display_errors());
		            $this->index($error);
		        } else {
		            $hasil 	= $this->upload->data();
					$data = array(
						'nama_kategori'	=> $this->input->post('nama'),
						'keterangan'	=> $this->input->post('keterangan'),
						'ikon'			=> $hasil['file_name'],
					);

					$id 	= $this->input->post('id');
					$query 	= $this->db->get_where('kategori',array('id'=>$id))->row_array();
	    			unlink("./uploads/icon/".$query['ikon']);

					$this->db->where('id',$id);
					$this->db->update('kategori',$data);
					redirect('dashboard/Lokasi_kategori');
				}
			} else {
				$data = array(
					'nama_kategori'	=> $this->input->post('nama'),
					'keterangan'	=> $this->input->post('keterangan'),
				);
				$this->db->where('id',$this->input->post('id'));
				$this->db->update('kategori',$data);
				redirect('dashboard/Lokasi_kategori');
		    }
		}else{
			$data['k'] = $this->db->get('kategori');
			$this->template->load('back-end/_template','back-end/_lokasi_kategori',$data);
		}
	}

	public function lokasi_kategori_edit($id)
	{
		$data['l'] = $this->db->get_where('kategori',array('id'=>$id))->row_array();
		$this->template->load('back-end/_template','back-end/_lokasi_kategori_edit',$data);
	}

	public function lokasi_kategori_delete($id)
	{
	    $query = $this->db->get_where('kategori',array('id'=>$id))->row_array();
	    
	    unlink("./uploads/icon/".$query['ikon']);
	    
	    $this->db->delete('kategori', array('id' => $id));
		redirect('dashboard/Lokasi_kategori');
	}

	public function trayekangkot()
	{
		if (isset($_POST['simpan'])) {
			if ($_FILES['gambar']['error'] <> 4) {

		        $config['upload_path'] = './uploads/trayekangkot';
		        $config['allowed_types'] = 'jpg|png|gif|bmp';
		        $this->load->library('upload', $config);
		 
		        if (!$this->upload->do_upload('gambar')) {
		            $error = array('error' => $this->upload->display_errors());
		            $this->index($error);
		        } else {
		            $hasil 	= $this->upload->data();
					$data = array(
						'judul'			=> $this->input->post('judul'),
						'isi_trayek'	=> $this->input->post('isi'),
						'gambar'		=> $hasil['file_name'],
						'tanggal'		=> date('Y-m-d'),
						'penulis'		=> 'Admin',
						'dibaca'		=> '0',
					);
					$this->db->insert('trayekangkot',$data);
					redirect('dashboard/trayekangkot');
				}
			} else {
				$data = array(
					'judul'			=> $this->input->post('judul'),
					'isi_trayek'	=> $this->input->post('isi'),
					'tanggal'		=> date('Y-m-d'),
					'penulis'		=> 'Admin',
					'dibaca'		=> '0',
				);
				$this->db->insert('trayekangkot',$data);
				redirect('dashboard/trayekangkot');
		    }
		}elseif (isset($_POST['update'])) {
			if ($_FILES['gambar']['error'] <> 4) {

		        $config['upload_path'] = './uploads/trayekangkot';
		        $config['allowed_types'] = 'jpg|png|gif|bmp';
		        $this->load->library('upload', $config);
		 
		        if (!$this->upload->do_upload('gambar')) {
		            $error = array('error' => $this->upload->display_errors());
		            $this->index($error);
		        } else {
		            $hasil 	= $this->upload->data();
					$data = array(
						'judul'			=> $this->input->post('judul'),
						'isi_trayek'	=> $this->input->post('isi'),
						'gambar'		=> $hasil['file_name'],
					);

					$id 	= $this->input->post('id');
					$query 	= $this->db->get_where('trayekangkot',array('id_trayek'=>$id))->row_array();
	    			unlink("./uploads/trayekangkot/".$query['gambar']);

					$this->db->where('id_trayek',$id);
					$this->db->update('trayekangkot',$data);
					redirect('dashboard/trayekangkot');
				}
			} else {
				$data = array(
					'judul'			=> $this->input->post('judul'),
					'isi_trayek'	=> $this->input->post('isi'),
				);
				$this->db->where('id_trayek',$this->input->post('id'));
				$this->db->update('trayekangkot',$data);
				redirect('dashboard/trayekangkot');
		    }
		}else{
			$data['b'] = $this->db->get('trayekangkot');
			$this->template->load('back-end/_template','back-end/_trayekangkot',$data);
		}
	}

	public function trayekangkot_tambah()
	{
		$this->template->load('back-end/_template','back-end/_trayekangkot_tambah');
	}

	public function trayekangkot_edit($id)
	{
		$data['b'] = $this->db->get_where('trayekangkot',array('id_trayek'=>$id))->row_array();
		$this->template->load('back-end/_template','back-end/_trayekangkot_edit',$data);
	}

	public function trayekangkot_delete($id)
	{
	    $r = $this->db->get_where('trayekangkot',array('id_trayek'=>$id))->row_array();
	    
	    unlink("./uploads/trayekangkot/".$r['gambar']);
	    
	    $this->db->delete('trayekangkot', array('id_trayek' => $id));
		redirect('dashboard/trayekangkot');
	}


	
	
	
	
	
	public function trayekbus()
	{
		if (isset($_POST['simpan'])) {
			if ($_FILES['gambar']['error'] <> 4) {

		        $config['upload_path'] = './uploads/trayekangkot';
		        $config['allowed_types'] = 'jpg|png|gif|bmp';
		        $this->load->library('upload', $config);
		 
		        if (!$this->upload->do_upload('gambar')) {
		            $error = array('error' => $this->upload->display_errors());
		            $this->index($error);
		        } else {
		            $hasil 	= $this->upload->data();
					$data = array(
						'judul'			=> $this->input->post('judul'),
						'isi_trayek'	=> $this->input->post('isi'),
						'gambar'		=> $hasil['file_name'],
						'tanggal'		=> date('Y-m-d'),
						'penulis'		=> 'Admin',
						'dibaca'		=> '0',
					);
					$this->db->insert('trayekbus',$data);
					redirect('dashboard/trayekbus');
				}
			} else {
				$data = array(
					'judul'			=> $this->input->post('judul'),
					'isi_trayek'	=> $this->input->post('isi'),
					'tanggal'		=> date('Y-m-d'),
					'penulis'		=> 'Admin',
					'dibaca'		=> '0',
				);
				$this->db->insert('trayekbus',$data);
				redirect('dashboard/trayekbus');
		    }
		}elseif (isset($_POST['update'])) {
			if ($_FILES['gambar']['error'] <> 4) {

		        $config['upload_path'] = './uploads/trayekangkot';
		        $config['allowed_types'] = 'jpg|png|gif|bmp';
		        $this->load->library('upload', $config);
		 
		        if (!$this->upload->do_upload('gambar')) {
		            $error = array('error' => $this->upload->display_errors());
		            $this->index($error);
		        } else {
		            $hasil 	= $this->upload->data();
					$data = array(
						'judul'			=> $this->input->post('judul'),
						'isi_trayek'	=> $this->input->post('isi'),
						'gambar'		=> $hasil['file_name'],
					);

					$id 	= $this->input->post('id');
					$query 	= $this->db->get_where('trayekbus',array('id_trayek'=>$id))->row_array();
	    			unlink("./uploads/trayekangkot/".$query['gambar']);

					$this->db->where('id_trayek',$id);
					$this->db->update('trayekbus',$data);
					redirect('dashboard/trayekbus');
				}
			} else {
				$data = array(
					'judul'			=> $this->input->post('judul'),
					'isi_trayek'	=> $this->input->post('isi'),
				);
				$this->db->where('id_trayek',$this->input->post('id'));
				$this->db->update('trayekbus',$data);
				redirect('dashboard/trayekbus');
		    }
		}else{
			$data['b'] = $this->db->get('trayekbus');
			$this->template->load('back-end/_template','back-end/_trayekbus',$data);
		}
	}

	public function trayekbus_tambah()
	{
		$this->template->load('back-end/_template','back-end/_trayekbus_tambah');
	}

	public function trayekbus_edit($id)
	{
		$data['b'] = $this->db->get_where('trayekbus',array('id_trayek'=>$id))->row_array();
		$this->template->load('back-end/_template','back-end/_trayekbus_edit',$data);
	}

	public function trayekbus_delete($id)
	{
	    $r = $this->db->get_where('trayekbus',array('id_trayek'=>$id))->row_array();
	    
	    unlink("./uploads/trayekangkot/".$r['gambar']);
	    
	    $this->db->delete('trayekbus', array('id_trayek' => $id));
		redirect('dashboard/trayekbus');
	}
}
