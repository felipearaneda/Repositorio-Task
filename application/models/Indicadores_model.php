<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

//Model que se encargará de realizar las consultas a la base de datos en formato QUERY
class Indicadores_model extends CI_Model {
    
	//se carga la conexión a la base de datos realizada en database.php en config
    public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	//Consulta SELECT a la base de datos en la tabla historico_uf
	public function getIndicadores() {

		$data = $this->db->get('historico_uf');

		if(count($data->result()) > 0){

			return $data->result();
		}

	}

	//Consulta INSERT a la base de datos en la tabla historico_uf de los datos en la variable $data entregados a través de AJAX
	public function insertIndicador($data) {

		$this->db->insert('historico_uf', $data);
		return true;

	}

	//Consulta SELECT WHERE ID a la base de datos en la tabla historico_uf de los datos en la variable $data entregados a través de AJAX
	public function editIndicador($id) {

		$this->db->select('*');
		$this->db->from('historico_uf');
		$this->db->where('id', $id);
		
		$data = $this->db->get();

		if(count($data->result()) >0 ){
			return $data->row();
		}

	}

	//Consulta UPDATE WHERE ID a la base de datos en la tabla historico_uf de los datos a través de la API
	public function updateIndicadorApi($id, $data) {

		$this->db->where("id", $id);

		return $this->db->update('historico_uf', $data);    

	}

	//Consulta UPDATE a la base de datos en la tabla historico_uf de los datos en la variable $data entregados a través de AJAX
	public function updateIndicadorForm($data) {

		return $this->db->update('historico_uf', $data, array('id' => $data['id']));

	}

	//Consulta DELETE a la base de datos en la tabla historico_uf de los datos correspondientes a la variable $id entregados a través de AJAX
	public function deleteIndicador($id)
    {
        $this->db->delete('historico_uf', array('id' => $id));

		return true;  
    }

	//Consulta SELECT a la base de datos en la tabla historico_uf de los todos los datos que luego serán manipulados para mostrar en el gráfico
	public function dashboardGet(){

		$query = $this->db->get('historico_uf');

		return $query->result();
	}
}