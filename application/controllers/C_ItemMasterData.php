<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Atribut extends CI_Controller {

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
	public function Read()
	{
		$data = array('success' => false ,'message'=>array(),'data' => array());

		$id = $this->input->post('id');

		if ($id == '') {
			$SQL = "
				SELECT 
					a.*,
					b.ArticleName Warna,
					c.ArticleName Motif,
					d.ArticleName Size,
					e.ArticleName Sex
				FROM itemmasterdata a
				LEFT JOIN articlewarna b on a.A_Warna = b.ArticleCOde
				LEFT JOIN articlemotif c on a.A_Motif = c.ArticleCode
				LEFT JOIN articlesize d on a.A_Size = d.ArticleCode
				LEFT JOIN articlesex e on a.A_Sex = d.ArticleCode
				WHERE a.isActive = 1
			";
			$rs = $this->db->query($SQL);
		}
		else{
			$rs = $this->ModelsExecuteMaster->FindData(array('ItemCode'=>$id),'itemmasterdata');
		}

		if ($rs->num_rows()>0) {
			$data['success'] = true;
			$data['data'] = $rs->result();
		}
		else{
			$data['message'] = 'No Record Found';
		}
		echo json_encode($data);
	}
	public function CRUD()
	{
		$data = array('success' => false ,'message'=>array());
		$ItemCode = $this->input->post('ItemCode');
		$KodeItemLama = $this->input->post('KodeItemLama');
		$ItemName = $this->input->post('ItemName');
		$A_Warna = $this->input->post('A_Warna');
		$A_Motif = $this->input->post('A_Motif');
		$A_Size = $this->input->post('A_Size');
		$A_Sex = $this->input->post('A_Sex');
		$DefaultPrice = $this->input->post('DefaultPrice');
		$ItemGroup = $this->input->post('ItemGroup');
		$KodeLokasi = $this->input->post('KodeLokasi');
		$Createdby = $this->session->userdata('username');
		$Createdon = date("Y-m-d h:i:sa");
		$isActive = 1;


		// $exploder = explode("|",$ItemGroup[0]);
		$formtype = $this->input->post('formtype');

		if ($formtype == 'add') {
			$param = array(
				'ItemCode' => $ItemCode,
				'KodeItemLama' => $KodeItemLama,
				'ItemName' => $ItemName,
				'A_Warna' => $A_Warna,
				'A_Motif' => $A_Motif,
				'A_Size' => $A_Size,
				'A_Sex' => $A_Sex,
				'DefaultPrice' => $DefaultPrice,
				'ItemGroup' => $ItemGroup,
				'KodeLokasi' => $KodeLokasi,
				'Createdby' => $Createdby,
				'Createdon' => $Createdon,
				'isActive' => $isActive,
			);
		}
		elseif ($formtype == 'edit') {
			$param = array(
				'KodeItemLama' => $KodeItemLama,
				'ItemName' => $ItemName,
				'A_Warna' => $A_Warna,
				'A_Motif' => $A_Motif,
				'A_Size' => $A_Size,
				'A_Sex' => $A_Sex,
				'DefaultPrice' => $DefaultPrice,
				'ItemGroup' => $ItemGroup,
				'KodeLokasi' => $KodeLokasi,
				'LastUpdatedby' => $Createdby,
				'LastUpdatedon' => $Createdon,
				'isActive' => $isActive,
			);
		}
		if ($formtype == 'add') {
			$this->db->trans_begin();
			try {
				$call_x = $this->ModelsExecuteMaster->ExecInsert($param,'itemmasterdata');
				if ($call_x) {
					$this->db->trans_commit();
					$data['success'] = true;
				}
				else{
					$data['message'] = "Gagal Input Role";
					goto jump;
				}
			} catch (Exception $e) {
				jump:
				$this->db->trans_rollback();
				// $data['success'] = false;
				// $data['message'] = "Gagal memproses data ". $e->getMessage();
			}
		}
		elseif ($formtype == 'edit') {
			try {
				$rs = $this->ModelsExecuteMaster->ExecUpdate($param,array('KodeAtribut'=> $KodeAtribut),'itemmasterdata');
				if ($rs) {
					$data['success'] = true;
				}
			} catch (Exception $e) {
				$data['success'] = false;
				$data['message'] = "Gagal memproses data ". $e->getMessage();
			}
		}
		elseif ($formtype == 'delete') {
			try {
				$SQL = "UPDATE itemmasterdata SET isActive = 0 WHERE ItemCode = '".$ItemCode."'";
				$rs = $this->db->query($SQL);
				if ($rs) {
					$data['success'] = true;
				}
			} catch (Exception $e) {
				$data['success'] = false;
				$data['message'] = "Gagal memproses data ". $e->getMessage();
			}
		}
		else{
			$data['success'] = false;
			$data['message'] = "Invalid Form Type";
		}
		echo json_encode($data);
	}
}
