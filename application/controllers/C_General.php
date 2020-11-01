<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_General extends CI_Controller {

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
	public function ChangeStatus()
	{
		$data = array('success' => false ,'message'=>array());

		$NoTransaksi = $this->input->post('NoTransaksi');
		$TableName = $this->input->post('TableName');
		$Value = $this->input->post('Value');

		$Createdby = $this->session->userdata('username');
		$CreatedOn = date("Y-m-d h:i:sa");

		try {
			$this->db->trans_begin();
			$rs = $this->ModelsExecuteMaster->ExecUpdate(array('StatusTransaksi'=>$Value,'LastUpdatedby'=>$Createdby,'LastUpdatedon'=>$CreatedOn),array('NoTransaksi'=> $NoTransaksi),$TableName);
			if ($rs) {
				$this->db->trans_commit();
				$data['success'] = true;
			}
			else{
				goto catchjump;
			}
		} catch (Exception $e) {
			catchjump:
			$undone = $this->db->error();
			$data['success'] = false;
			$data['message'] = "Sistem Gagal Melakukan Pemrossan Data: ".$undone['message'];
			$this->db->trans_rollback();
		}
		echo json_encode($data);
	}

	function GetInfoAddr()
	{
		$data = array('success' => false ,'message'=>array(),'data'=>array());

		$tipe = $this->input->post('link');
		$idaddr = $this->input->post('idaddr');

		if ($tipe == 'prov') {
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "key: 66f09fcb700162bd339a522699dd8215"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
				$result = json_decode($response, true);
			  	if ($result['rajaongkir']['status']['code'] == 200){
			  		$data['success'] = true;
			  		$data['data'] = $result['rajaongkir']['results'];
			  	}
			}
		}
		if ($tipe == 'kota_RO') {
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "key: 66f09fcb700162bd339a522699dd8215"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $result = json_decode($response, true);
			  	if ($result['rajaongkir']['status']['code'] == 200){
			  		$data['success'] = true;
			  		$data['data'] = $result['rajaongkir']['results'];
			  	}
			}
		}

		if ($tipe == 'kota') {
			$kota = $this->ModelsExecuteMaster->FindData(array('province_id'=>$idaddr),'ro_regencies');
			$data['success'] = true;
			$data['data'] = $kota->result();
		}
		if ($tipe == 'kec') {
			$kota = $this->ModelsExecuteMaster->FindData(array('regency_id'=>$idaddr),'ro_districts');
			$data['success'] = true;
			$data['data'] = $kota->result();
		}
		if ($tipe == 'kel') {
			$kota = $this->ModelsExecuteMaster->FindData(array('district_id'=>$idaddr),'ro_villages');
			$data['success'] = true;
			$data['data'] = $kota->result();
		}
		echo json_encode($data);
	}
	public function getDummy()
	{
		$data = array('success' => true ,'message'=>array(),'data' =>array(),'masteralat'=>array());

		$call = $this->db->query("select '' ItemCode,'' ItemName,0 Qty,'' Satuan,0 Price, 0 Diskon,0 Total");

		$data['data'] = array();

		echo json_encode($data);
	}
	public function GetLevelingHarga()
	{
		$data = array('success' => false ,'message'=>array(),'data' => array());
		$Qty = $this->input->post('Qty');

		$SQL = "SELECT * FROM tbmk WHERE ".$Qty." BETWEEN QtyStart AND QtyEnd;";
		$rs = $this->db->query($SQL);

		if ($rs->num_rows() > 0) {
			$data['success'] = true;
			$data['data'] = $rs->result();
		}
		echo json_encode($data);
	}

	function cekongkir()
	{
		$data = array('success' => false ,'message'=>array(),'origin_det'=>array(),'dest_det'=>array(),'data'=>array());

		$Kota_origin = $this->input->post('Kota_origin');
		$Kota_Destination = $this->input->post('Kota_Destination');
		$xpdc = $this->input->post('xpdc');
		$berat = $this->input->post('berat');

		$user_id = $this->session->userdata('userid');

		$ro_kotaOri = $this->ModelsExecuteMaster->FindData(array('id'=>$Kota_origin),'ro_regencies')->row()->id_RO;
		$ro_kotaDest = $this->ModelsExecuteMaster->FindData(array('id'=>$Kota_Destination),'ro_regencies')->row()->id_RO;

		if ($berat == 0 ) {
			$berat = 1;
		}
		// var_dump(ROUND($berat);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=".$ro_kotaOri."&destination=".$ro_kotaDest."&weight=".$berat."&courier=".$xpdc,
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: 66f09fcb700162bd339a522699dd8215"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		// var_dump($response);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$result = json_decode($response, true);
			// var_dump($result);
		  if ($result['rajaongkir']['status']['code'] == 200){
		  	$data['success'] = true;
		  	$data['data'] = $result['rajaongkir']['results'];
		  	$data['origin_det'] = $result['rajaongkir']['origin_details'];
		  	$data['dest_det'] = $result['rajaongkir']['destination_details'];
		  }
		  else{
		  	$data['message'] = $result['rajaongkir']['status']['description'];
		  }
		}
		echo json_encode($data);
	}
	public function GetBerat()
	{
		$data = array('success' => false ,'message'=>array(),'Berat'=>0);

		$KodeItem = $this->input->post('KodeItem');

		$SQL = "SELECT COALESCE(BeratStandar,0) BeratStandar FROM itemmasterdata WHERE ItemCode = '".$KodeItem."' ";

		$rs = $this->db->query($SQL);
		if ($rs->num_rows() > 0) {
			$data['success'] = true;
			$data['Berat'] = $rs->row()->BeratStandar;
		}
		echo json_encode($data);
	}
	public function Reprint()
	{
		$data = array('success' => false ,'message'=>array());

		$NoTransaksi = $this->input->post('NoTransaksi');

		try {
			$this->db->trans_begin();
			$rs = $this->ModelsExecuteMaster->ExecUpdate(array('Printed'=>0),array('NoTransaksi'=> $NoTransaksi),'printinglog');
			if ($rs) {
				$this->db->trans_commit();
				$data['success'] = true;
			}
			else{
				goto catchjump;
			}
		} catch (Exception $e) {
			catchjump:
			$undone = $this->db->error();
			$data['success'] = false;
			$data['message'] = "Sistem Gagal Melakukan Pemrossan Data: ".$undone['message'];
			$this->db->trans_rollback();
		}
		echo json_encode($data);
	}
}
