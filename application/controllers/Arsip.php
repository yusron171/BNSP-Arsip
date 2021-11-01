<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){

	parent::__construct();
	//Do your magic here`
	$this->load->model('arsip_model', 'am');
	$this->load->helper('uploader_helper');
	}
	public function index()
	{
		error_reporting(0);
		$cari = $_GET['keyword'];
		if ($cari != null) {
			$data['data_surat'] = $this->am->search($cari)->result();
		}else{
			$w = array ('surat.id_kategori');
			$data['data_surat'] = $this->am->getDataId('surat', $w)->result();
		}
		$data['kategori'] = $this->am->getData('kategori')->result();
		
		$this->load->view('template/header');
		$this->load->view('arsip',$data);
	}
	public function simpan()
    {
		$config['upload_path'] = './assets/document/';
		$config['allowed_types'] = 'pdf';
		$this->load->library('upload',$config);
		if ( ! $this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('pesan', $error['error']);
			redirect('index.php/welcome','refresh');
		}else{
			$ins = array(
				'nomor_surat' => $this->input->post('nomor_surat'),
				'judul' => $this->input->post('judul'),
				'file' => $this->upload->data('file_name'),
				'id_kategori' => $this->input->post('id_kategori')
			);
			$this->am->ins('surat', $ins);
			$this->session->set_flashdata('pesan', 'Data Berhasil ditambahkan!');
			redirect('index.php/Welcome','refresh');
		}
		
    }
	public function upd()
	{
		$w = array('id_surat' => $this->uri->segment(3));
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file')){
			$ins = array(
				'nomor_surat' => $this->input->post('nomor_surat'),
				'judul' => $this->input->post('judul'),
				'file' => $this->upload->data('file_name'),
				'id_kategori' => $this->input->post('id_kategori')
			);			
		}
		else{
			$ins = array(
				'nomor_surat' => $this->input->post('nomor_surat'),
				'judul' => $this->input->post('judul'),
				'file' => $this->upload->data('file_name'),
				'id_kategori' => $this->input->post('id_kategori')
			);
		}
		$this->am->updData('surat', $ins, $w);
		$this->session->set_flashdata('pesan', 'Data Berhasil Diupdate!');
		redirect('index.php/Welcome','refresh');
	}
	public function hapus()
    {
		$w = array('id_surat' => $this->uri->segment(3));
		$this->am->del('surat', $w);
		redirect('index.php/Welcome','refresh');
    }

	
    public function detail()
    {
        $w = array('id_surat' => $this->uri->segment(3));
		$data['title'] = "Detail Arsip";
        $data['data_surat'] = $this->am->read('surat', $w)->row();
		$this->load->view('template/header');
		$this->load->view('detail',$data);

    }
	public function unduh($id_surat)
    {
        $this->load->helper('download');
		$w = ['id_surat' => $id_surat];
		 $data = $this->am->read('surat', $w)->row();
        $path = $data->file;
        force_download($path, $path);
    }
	public function edit()
    {
		$w = array('id_surat' => $this->uri->segment(3));
		
        $data['data_surat'] = $this->am->getDataId('surat', $w)->row();
		$data['kategori'] = $this->am->getData('kategori')->result();
		$this->load->view('template/header');
		$this->load->view('edit',$data);
		

        
    }
	
}
