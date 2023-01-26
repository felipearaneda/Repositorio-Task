<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

//CRUD para consultas por API
class IndicadoresApi extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        //se carga el model de indicadores
        $this->load->model('indicadores_model', 'indicadores');
    }

    //función GET para obtener datos desde la API
    public function indicadores_get() {

        //la variable rest mostrará los datos dentro de un array con el nombre "data".
        //Los datos se extraerán con la función getIndicadores del model que realizará una consulta a la base de datos
        $rest['data'] = $this->indicadores->getIndicadores();

        //La respuesta de la consulta
        $this->response($rest, 200);

    }

    //Función POST para insertar datos desde la API
    public function indicadores_post() {

        //Las variables que insertarán los valores en los campos correspondientes en la base de datos
        $nombre_indicador = $this->post('nombre_indicador');
        $codigo_indicador = $this->post('codigo_indicador');
        $unidad_medida_indicador = $this->post('unidad_medida_indicador');
        $valor_indicador = $this->post('valor_indicador');
        $fecha_indicador = $this->post('fecha_indicador');
        $origen_indicador = $this->post('origen_indicador');

        //La variable data juntará todos los datos en un array
        $data = array(
            'nombre_indicador' => $nombre_indicador,
            'codigo_indicador' => $codigo_indicador,
            'unidad_medida_indicador' => $unidad_medida_indicador,
            'valor_indicador' => $valor_indicador,
            'fecha_indicador' => $fecha_indicador,
            'origen_indicador' => $origen_indicador
        );

        //Si la inserción de los datos en insertIndicador de la variable data es true entonces responderá con INDICADOR CREADO
        if( $this->indicadores->insertIndicador($data) > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'INDICADOR CREADO'
            ], REST_Controller::HTTP_CREATED); 
        }
        //Si la inserción de datos false entonces mostrará FALLO AL CREAR INDICADOR
        else{
            $this->response([
                'status' => false,
                'message' => 'FALLO AL CREAR INDICADOR'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

    }

    //Función PUT que recibirá un id para modificar datos desde la API
    public function indicadores_put($id) {

        //Variable data que indicará los valores a modificar en los campos correspondientes.
        $data = [
            'nombre_indicador' => $this->put ('nombre_indicador'),
            'codigo_indicador' => $this->put ('codigo_indicador'),
            'unidad_medida_indicador' => $this->put ('unidad_medida_indicador'),
            'valor_indicador' => $this->put ('valor_indicador'),
            'fecha_indicador' => $this->put ('fecha_indicador'),
            'origen_indicador' => $this->put ('origen_indicador'),
        ];

        //variable que guardará el resultado de data con el id de la consulta updateIndicadorApi gracias al model
        $result = $this->indicadores->updateIndicadorApi($id, $data);

        //print del id ingresado
        print_r($id);

        //si la consulta es true entonces mostrará INDICADOR ACTUALIZADO
        if($result > 0){

            $this->response([
                'status' => true,
                'message' => 'INDICADOR ACTUALIZADO'
            ], REST_Controller::HTTP_OK);

        //si la consulta es false entonces mostrará PROBLEMA AL ACTUALIZAR
        }else{
            $this->response([
                'status' => false,
                'message' => 'PROBLEMA AL ACTUALIZAR'
            ], REST_Controller::HTTP_BAD_REQUEST);

        }
    }

    //Función DELETE que recibirá un id para eliminar datos desde la API
    public function indicadores_delete($id)
    {
     
        //Variable que guardará el resultado de la consulta de deleteIndicador accedida por el model y que recibirá el id correspondiente
        $result = $this->indicadores->deleteIndicador($id);

        //si la consulta es true entonces retornará INDICADOR ELIMINADO
        if($result > 0){

            $this->response([
                'status' => true,
                'message' => 'INDICADOR ELIMINADO'
            ], REST_Controller::HTTP_OK);

        //Si la consulta es false entonces retornará PROBLEMA AL ELIMINAR
        }else{
            $this->response([
                'status' => false,
                'message' => 'PROBLEMA AL ELIMINAR'
            ], REST_Controller::HTTP_BAD_REQUEST);

        }
        
    }

}