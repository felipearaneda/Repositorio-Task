<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Indicadores extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('indicadores_model', 'indicadores');

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
    }

    public function index () {

        $rows = $this->indicadores->getIndicadores();
        $data['rows'] = $rows;

        $this->load->view('_head.html');
        $this->load->view('indicadoresView.php', $data);

    }

    public function fetch() {

        if($this->input->is_ajax_request()){

            if($posts['data'] = $this->indicadores->getIndicadores()){

                $data = array('response' => 'success', 'posts' => $posts);
            }else{
                $data = array('response' => 'error', 'message' => 'Fallo al traer los datos');
            }

            echo json_encode($posts);

        }else{
            echo "No direct script access allowed";
        }

    }

    public function insert() {

        if($this->input->is_ajax_request()){

            $this->form_validation->set_rules('nombre_indicador', 'Nombre_Indicador', 'required');
            $this->form_validation->set_rules('codigo_indicador', 'Codigo_indicador', 'required');
            $this->form_validation->set_rules('unidad_medida_indicador', 'Unidad_medida_indicador', 'required');
            $this->form_validation->set_rules('valor_indicador', 'Valor_indicador', 'required');
            $this->form_validation->set_rules('fecha_indicador', 'Fecha_indicador', 'required');
            $this->form_validation->set_rules('origen_indicador', 'Origen_indicador', 'required');


            if($this->form_validation->run() == FALSE){
                $data = array('response' => 'error', 'message' => validation_errors());

            }else{
                $ajax_data = $this->input->post();

                if ($this->indicadores->insertIndicador($ajax_data)){
                    $data = array('response' => 'success', 'message' => 'Indicador agregado!');

                }else{
                    $data = array('response' => 'error', 'message' => 'Error al agregar los datos');

                };          
            }

            echo json_encode($data);

        }else{
            echo "No direct script access allowed!";
        }
    }

    public function delete() {

        if($this->input->is_ajax_request()){
            $del_id = $this->input->post('del_id');

            if($result = $this->indicadores->deleteIndicador($del_id)){

                $data = array('response' => 'success' , 'posts' => $result);

            }else{
                $data = array('response' => 'error', 'message' => 'Error al eliminar el dato');
            }

            echo json_encode($data);
        }else{
            echo "No direct script access allowed";
        }
    }

    public function edit() {

        if($this->input->is_ajax_request()){
            $edit_id = $this->input->post('edit_id');

            if($result = $this->indicadores->editIndicador($edit_id)){

                $data = array('response' => 'success' , 'edit' => $result);

            }else{
                $data = array('response' => 'error', 'message' => 'Error al mostrar la info del dato');
            }

            $json = json_encode($result);

            echo $json;

        }else{

            echo "No direct script access allowed";
        }

    }

    public function update() {

        if($this->input->is_ajax_request()){

            $data['id'] = $this->input->post('id_indicador_edit');
            $data['nombre_indicador'] = $this->input->post('nombre_indicador_edit');
            $data['codigo_indicador'] = $this->input->post('codigo_indicador_edit');
            $data['unidad_medida_indicador'] = $this->input->post('unidad_medida_indicador_edit');
            $data['valor_indicador'] = $this->input->post('valor_indicador_edit');
            $data['fecha_indicador'] = $this->input->post('fecha_indicador_edit');
            $data['origen_indicador'] = $this->input->post('origen_indicador_edit');

            if($result = $this->indicadores->updateIndicadorForm($data)){

                $data = array('response' => 'success' , 'message' => "Actualizacion exitosa!");

            }else{
                $data = array('response' => 'error', 'message' => 'Error al actualizar la información del dato');
            }

            $json = json_encode($result);

            echo $json;
            
        }else{
            echo "No direct script access allowed";
        }
    }

    public function dashboard() {

        $this->load->view('_head.html');

        $this->load->view('dashboard.php');
        
    }

    public function dashboardGet() {

        $result = $this->indicadores->dashboardGet();

        $json = json_decode($result);

        print_r ($json);

    }
}