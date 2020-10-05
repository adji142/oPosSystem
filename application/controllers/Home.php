<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

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
	function __construct()
	{
		parent::__construct();
		$this->load->model('ModelsExecuteMaster');
		$this->load->model('GlobalVar');
		$this->load->model('Apps_mod');
		$this->load->model('LoginMod');
	}
	public function Test()
	{
		// try {
		// 	$rs = $this->ModelsExecuteMaster->ExecInsert(array('Nomor'=>'1001'),'ttest');
		// 	if ($rs) {
		// 		print_r('done');
		// 	}
		// 	else{
		// 		$undone = $this->db->error();
		// 		print_r('undone'.$undone['message']);
		// 		// var_dump();
		// 	}
		// } catch (Exception $e) {
		// 	print_r('hai');
		// }
		$data = array('success' => false ,'message'=>array(),'Nomor' => '');

		// $Kolom = $this->input->post('Kolom');
		// $Table = $this->input->post('Table');
		// $Prefix = $this->input->post('Prefix');

		$Kolom = 'ArticleCode';
		$Table = 'articlewarna';
		$Prefix = '1';

		$SQL = "SELECT RIGHT(MAX(".$Kolom."),3)  AS Total FROM " . $Table . " WHERE LEFT(" . $Kolom . ", LENGTH('".$Prefix."')) = '".$Prefix."'";

		// var_dump($SQL);
		$rs = $this->db->query($SQL);

		$temp = $rs->row()->Total + 1;

		$nomor = $Prefix.str_pad($temp, 3,"0",STR_PAD_LEFT);
		if ($nomor != '') {
			$data['success'] = true;
			$data['nomor'] = $nomor;
		}
		echo json_encode($data);
	}
	public function index()
	{
		$this->load->view('Dashboard');
	}
	// --------------------------------------- Master ----------------------------------------------------
	public function permission()
	{
		$this->load->view('V_Auth/permission');
	}
	public function role()
	{
		$this->load->view('V_Auth/roles');
	}
	public function permissionrole($value)
	{
		$rs = $this->ModelsExecuteMaster->FindData(array('id'=>$value),'roles');
		$data['roleid'] = $value;
		$data['rolename'] = $rs->row()->rolename;
		$this->load->view('V_Auth/permissionrole',$data);	
	}
	public function user()
	{
		$this->load->view('V_Auth/users');
	}

	// Article

	public function warna()
	{
		$this->load->view('V_Article/articlewarna');
	}
	public function motif()
	{
		$this->load->view('V_Article/articlemotif');
	}
	public function size()
	{
		$this->load->view('V_Article/articlesize');
	}
	public function sex()
	{
		$this->load->view('V_Article/articlesex');
	}
	public function lokasi()
	{
		$this->load->view('V_Article/articlelokasi');
	}

	// Inventory

	public function itemmasterdata()
	{
		$this->load->view('V_inventory/itemmasterdata');
	}
	public function penerimaanbarang()
	{
		$this->load->view('V_inventory/penerimaanbarang');
	}
}
