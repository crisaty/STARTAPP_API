<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// import para uso de servicios REST
require_once(APPPATH.'/libraries/REST_Controller.php');
use Restserver\libraries\REST_Controller;

class Prueba extends REST_Controller {

    public function __construct() {
        header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        header("Access-Control-Allow-Origin: *");
        parent::__construct();
        // CARGA UNICA DE LA BD
        $this->load->database();
    }

    public function obtener_usuario_get($codigo) {

        $query = $this->db->query("SELECT * FROM usuario WHERE idUsuario = '$codigo'");

        $this->response($query->result());

    }

    public function obtener_pyme_get($codigo) {

        $query = $this->db->query
            ("SELECT p.*, c.nomCategoria FROM pyme p 
              JOIN categoria c ON p.idCategoria = c.idCategoria
              WHERE codPyme = '$codigo'");

        $this->response($query->result());

    }

}