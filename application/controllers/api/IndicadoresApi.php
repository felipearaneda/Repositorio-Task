<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';


class IndicadoresApi extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('indicadores_model', 'indicadores');
    }

    public function indicadores_get() {

        $rest['data'] = $this->indicadores->getIndicadores();

        $this->response($rest, 200);

    }

    public function indicadores_post() {

        $nombre_indicador = $this->post('nombre_indicador');
        $codigo_indicador = $this->post('codigo_indicador');
        $unidad_medida_indicador = $this->post('unidad_medida_indicador');
        $valor_indicador = $this->post('valor_indicador');
        $fecha_indicador = $this->post('fecha_indicador');
        $origen_indicador = $this->post('origen_indicador');

        $data = array(
            'nombre_indicador' => $nombre_indicador,
            'codigo_indicador' => $codigo_indicador,
            'unidad_medida_indicador' => $unidad_medida_indicador,
            'valor_indicador' => $valor_indicador,
            'fecha_indicador' => $fecha_indicador,
            'origen_indicador' => $origen_indicador
        );

        if( $this->indicadores->insertIndicador($data) > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'INDICADOR CREADO'
            ], REST_Controller::HTTP_CREATED); 
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'FALLO AL CREAR INDICADOR'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

    }

    public function indicadores_put($id) {

        $data = [
            'nombre_indicador' => $this->put ('nombre_indicador'),
            'codigo_indicador' => $this->put ('codigo_indicador'),
            'unidad_medida_indicador' => $this->put ('unidad_medida_indicador'),
            'valor_indicador' => $this->put ('valor_indicador'),
            'fecha_indicador' => $this->put ('fecha_indicador'),
            'origen_indicador' => $this->put ('origen_indicador'),
        ];

        $result = $this->indicadores->updateIndicadorApi($id, $data);

        print_r($id);

        if($result > 0){

            $this->response([
                'status' => true,
                'message' => 'INDICADOR ACTUALIZADO'
            ], REST_Controller::HTTP_OK);

        }else{

            $this->response([
                'status' => false,
                'message' => 'PROBLEMA AL ACTUALIZAR'
            ], REST_Controller::HTTP_BAD_REQUEST);

        }
    }

    public function indicadores_delete($id)
    {
        
        $result = $this->indicadores->deleteIndicador($id);

        if($result > 0){

            $this->response([
                'status' => true,
                'message' => 'INDICADOR ELIMINADO'
            ], REST_Controller::HTTP_OK);

        }else{

            $this->response([
                'status' => false,
                'message' => 'PROBLEMA AL ELIMINAR'
            ], REST_Controller::HTTP_BAD_REQUEST);

        }

        echo $result;
    }

}