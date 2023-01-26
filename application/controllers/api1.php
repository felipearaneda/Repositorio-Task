<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';


class Api extends REST_Controller {

    public function __construct()
    {
        parent::__construct();   
    }

    public function users_get () {

        $res['msg'] = "Hola mundo";

        $this->response($res, 200);

    }

}