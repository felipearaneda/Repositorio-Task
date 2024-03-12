<?php

defined('BASEPATH') OR exit('No direct script access allowed');


//CRUD para consultas por los formularios de la página
class Indicadores extends CI_Controller {

    //constructor para cargar el model y form_validation para las demás funciones
    public function __construct()
    {
        parent::__construct();

        $this->load->model('indicadores_model', 'indicadores');

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
    }

    //Se encargará de cargar la vista y el header con los css
    public function index () {

        $this->load->view('_head.html');
        $this->load->view('indicadoresView.php');

    }

    //Función para traer los datos a la vista
    public function fetch() {

        //Validación para ejecutar sólo si es una petición de AJAX
        if($this->input->is_ajax_request()){

            //Si la obtención de datos es correcta entonces mostrará un mensaje en la consola con "success" y los datos obtenidos
            if($posts['data'] = $this->indicadores->getIndicadores()){

                $data = array('response' => 'success', 'posts' => $posts);

                //codificación de los datos a JSON
                echo json_encode($posts, JSON_PRETTY_PRINT);
            }else{
                $data = array('response' => 'error', 'message' => 'Fallo al traer los datos');
            }

            //Si no es una petición de ajax entonces mostrará un mensaje
        }else{
            echo "No direct script access allowed";
        }

    }

    //Función para insertar los datos mediante formularios
    public function insert() {

        //Validación para ejecutar sólo si es una petición de AJAX
        if($this->input->is_ajax_request()){

            //Validación de los formularios
            $this->form_validation->set_rules('nombreIndicador', 'Nombre_Indicador', 'required');
            $this->form_validation->set_rules('codigoIndicador', 'Codigo_indicador', 'required');
            $this->form_validation->set_rules('unidadMedidaIndicador', 'Unidad_medida_indicador', 'required');
            $this->form_validation->set_rules('valorIndicador', 'Valor_indicador', 'required');
            $this->form_validation->set_rules('fechaIndicador', 'Fecha_indicador', 'required');
            $this->form_validation->set_rules('origenIndicador', 'Origen_indicador', 'required');


            //Si hay un problema con la validación de los formularios, entonces mostrará un error
            if($this->form_validation->run() == FALSE){
                $data = array('response' => 'error', 'message' => validation_errors());

            //Si no hay problemas con la validación de los formularios entonces los datos del POST se guardan en una variable
            }else{
                $ajax_data = $this->input->post();

                //Si el POST se realiza correctamente entonces mostrará un mensaje
                if ($this->indicadores->insertIndicador($ajax_data)){
                    $data = array('response' => 'success', 'message' => 'Indicador agregado!');

                }else{
                    $data = array('response' => 'error', 'message' => 'Error al agregar los datos');

                };          
            }

            //codificación de los datos a JSON
            echo json_encode($data);

        }else{
            echo "No direct script access allowed!";
        }
    }

    //Función para borrar los datos mediante formularios
    public function delete() {

        //Validación para ejecutar sólo si es una petición de AJAX
        if($this->input->is_ajax_request()){

            //Variable que guardará el id entregado
            $del_id = $this->input->post('del_id');

            //Si el DELETE se realiza correctamente según el id de la variable entonces mostrará un mensaje 
            if($result = $this->indicadores->deleteIndicador($del_id)){

                $data = array('response' => 'success' , 'posts' => $result);

            }else{
                $data = array('response' => 'error', 'message' => 'Error al eliminar el dato');
            }

            //codificación de los datos a JSON
            echo json_encode($data);
        }else{
            echo "No direct script access allowed";
        }
    }

    //Función para seleccionar los datos correspondientes de los formularios
    public function edit() {

        //Validación para ejecutar sólo si es una petición de AJAX
        if($this->input->is_ajax_request()){

            //Variable que guardará el id enntregado
            $edit_id = $this->input->post('edit_id');

            //Si la obtención de datos se realiza correctamente según el id de la variable entonces mostrará un mensaje 
            if($result = $this->indicadores->editIndicador($edit_id)){

                $data = array('response' => 'success' , 'edit' => $result);

            }else{
                $data = array('response' => 'error', 'message' => 'Error al mostrar la info del dato');
            }

            //codificación de los datos a JSON y guardados en una variable para asegurar que los datos están en formato JSON
            $json = json_encode($result);

            //Se muestran los datos en formato JSON
            echo $json;

        }else{

            echo "No direct script access allowed";
        }

    }

    //Función para actualizar los datos correspondientes de los formularios a la base de datos
    public function update() {

        //Validación para ejecutar sólo si es una petición de AJAX
        if($this->input->is_ajax_request()){

            //Variable data que guardará en un array los datos entregados en los IDS de la vista para actualizarlos en la base de datos
            $data['id'] = $this->input->post('id_indicador_edit');
            $data['nombreIndicador'] = $this->input->post('nombre_indicador_edit');
            $data['codigoIndicador'] = $this->input->post('codigo_indicador_edit');
            $data['unidadMedidaIndicador'] = $this->input->post('unidad_medida_indicador_edit');
            $data['valorIndicador'] = $this->input->post('valor_indicador_edit');
            $data['fechaIndicador'] = $this->input->post('fecha_indicador_edit');
            $data['origenIndicador'] = $this->input->post('origen_indicador_edit');

            //Si se realiza el update de data en la base de datos correctamente entonces mostrará mensaje 
            if($result = $this->indicadores->updateIndicadorForm($data)){

                $data = array('response' => 'success' , 'message' => "Actualizacion exitosa!");

            }else{
                $data = array('response' => 'error', 'message' => 'Error al actualizar la información del dato');
            }

            //codificación de los datos a JSON y guardados en una variable para asegurar que los datos están en formato JSON
            $json = json_encode($result);

            //Se muestran los datos en formato JSON
            echo $json;
            
        }else{
            echo "No direct script access allowed";
        }
    }

    //Función para cargar la vista del gráfico y el head con el CSS
    public function dashboard() {

        $this->load->view('_head.html');

        $this->load->view('dashboard.php');
        
    }

    //Función para obtener los datos específicamente para el dashboard en caso de necesitar algún ajusta en la obtención de datos y no alterar los de la página principal
    public function dashboardGet() {

        //Se realiza un get proveniente del modelo y se guarda en una variable result
        $result = $this->indicadores->dashboardGet();

        //codificación de los datos
        $json = json_decode($result);

        //se muestran los datos
        print_r ($json);

    }
}
