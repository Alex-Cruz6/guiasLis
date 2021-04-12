<?php
    class Usuario {
        /******************************* 
         * Declaramos las propiedades 
         * *******************************/
        private $_id;
        private $_nombre;
        private $_pass;
        private $_email;
        private $_usuarios;
        //contructor con dos parametros opcionales
        function __construct($nombre = '', $pass = ''){
            $this->_nombre = $nombre;$this->_pass = $pass;
        }
        /************************************************************ 
         * Métodos para establecer/obtener información del usuario **
         * **********************************************************/
        public function setId($id){ 
            $this->_id = $id; 
        }
        public function getId(){
            return $this->_id;
        }
        public function setNombre($nombre){
            $this->_nombre = $nombre;
        }
        public function getNombre(){
            return $this->_nombre;
        }
        public function setPass($pass){
            $this->_pass = $pass;
        }
        public function getPass(){
            return $this->_pass;
        }
        public function setEmail($email){
            $this->_email = $email;
        }
        public function getEmail(){
            return $this->_email;
        }
        public function obtener_datos(){
            $arreglo["username"] = $this->_nombre;
            $arreglo["pass"] = $this->_pass;
            return $arreglo;
        }
        //cifrar password a SHA254
        private function cifrarPass($pass){
            $this->_pass = hash('sha256', $pass);
            return $this->_pass;
        }
    }
?>