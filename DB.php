<?php
require_once "Constants.php"; //Archivo no incluido en el repositorio
class DB {

    private $db;

    //Inicializa Conexion Con La Base De Datos
    public function __construct() {

		$this->db = mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die('Cannot connect to the DB');

    }


    public function getEmployees(){
        $result = mysqli_query($this->db, "SELECT * FROM employees limit 1000");
        return mysqli_fetch_all($result);

    }


}
