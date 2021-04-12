<?php
    class Login{
        private $_id;
        private $_nombre;
        private $_pass;
        private $_status = false;
        //constructor con dos parametros opcionales
        function __construct($nombre = '', $pass = ''){
            $this->_nombre = $nombre;
            $this->_pass = $pass;
        }
        /*********************************************************** 
         * Clases para establecer/Obtener información del usuario **
         * *********************************************************/
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
        //verifica si el password coincide y retorna falso o verdadero
        public function verificarUsuario($fila_datos){
            $username = array('docente','estudiante','maria','ricardo');
            $password = array('udbFET','fetUDB','maria','P@$$w0rD');
            if (in_array($fila_datos["pass"], $password) && in_array($fila_datos["username"], $username)){
                $this->_status = true;
            }else {
                $this->_status = false;
            }
            return $this->_status;
        }
        //verifica el estado de la session
        public function getStatus(){
            return $this->_status;
        }
        //cierra la session y elimina las variables
        public function cerrarSession(){
            $this->_nombre = '';
            $this->_pass = '';
            $this->_status = false;
        }
    }
?>