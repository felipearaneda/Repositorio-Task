<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Indicadores_model extends CI_Model {
    
    public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getIndicadores() {

		$data = $this->db->get('info_valor');

		if(count($data->result()) > 0){

			return $data->result();
		}

	}

	public function insertIndicador($data) {

		$this->db->insert('info_valor', $data);
		return true;

	}

	public function editIndicador($id) {

		$this->db->select('*');
		$this->db->from('info_valor');
		$this->db->where('id', $id);
		
		$data = $this->db->get();

		if(count($data->result()) >0 ){
			return $data->row();
		}

	}

	public function updateIndicadorApi($id, $data) {

		$this->db->where("id", $id);

		return $this->db->update('info_valor', $data);    

	}

	public function updateIndicadorForm($data) {

		return $this->db->update('info_valor', $data, array('id' => $data['id']));

	}

	public function deleteIndicador($id)
    {
        $this->db->delete('info_valor', array('id' => $id));

		return true;  
    }

	public function dashboardGet(){

		$query = $this->db->get('info_valor');

		return $query->result();
	}
}