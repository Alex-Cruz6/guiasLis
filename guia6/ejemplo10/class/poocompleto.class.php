<?php
    //Definiendo una interfaz 
    interface leer{
        function tieneLibro($tituloLibro);
        function leeLibro();   
    }
    //Definiendo la clase abstracta persona
    abstract class persona {
        //Propiedades de la clase abstracta persona.
        //Esta clase definirá el método abstracto ocupacionPrincipal()
        private static $numPersonas= 0;  
        //número total de personas
        protected $nombre = '';    
        //Nombre de la persona
        protected $fechaNac = '';  
        //Fecha de nacimiento de la persona
        //Constructor de la clase abstracta persona
        function __construct($nombrePersona = 'sin nombre'){
            self::$numPersonas++;
            $this->nombre = $nombrePersona;
        }
        function __clone(){
            self::$numPersonas++;
        }
        //Destructor de la clase abstracta persona
        function __destruct(){
            self::$numPersonas--;
        }
        function __toString(){
            $cadena  = 'nombre(' . $this->nombre;
            $cadena .= ') Poblaci&oacute;n(' . self::$numPersonas . ')';
            return $cadena;
        }
        //Métodos de la clase abstracta persona
        final public static function poblacion(){
            return self::$numPersonas;
        }
        final public function asignaNombre($nombreAsignado){
            $this->nombre = $nombreAsignado;
        }
        public function dameNombre(){
            return $this->nombre;
        }
        //Se fuerza la implementación del método en las subclases
        abstract public function ocupacionPrincipal();
    }  
    //Final clase persona
    //Definiendo la clase derivada empleado.
    //Esta clase implementará la interfaz leer
    class empleado extends persona implements leer {
        //Propiedades de la clase empleado
        private static $idEmpleados =0;  
        //Número de empleados
        protected $id;          
        //Id del empleado
        private $libro = NULL;  
        //Título del libro que está leyendo
        //Constructor de la clase empleado
        function __construct($nombreEmpleado){
            parent::__construct($nombreEmpleado);  
            //Invocando  al  constructor  de  clase padre
            self::$idEmpleados++;
            $this->id = self::$idEmpleados;
        }
        //Destructor de la clase empleado
        function __destruct(){
            parent::__destruct();
            self::$idEmpleados--;
        }
        function __clone(){
            parent::__clone();
            self::$idEmpleados++;
            $this->id = self::$idEmpleados;
        }
        function __toString(){
            $cadena  = __CLASS__ . ": id($this->id) nombre($this->nombre)";
            $cadena .= ' poblaci&oacute;n(' . parent::poblacion() . ')';
            if(!empty($this->libro)){
                $cadena .= $this->leerLibro();         
            }
            return $cadena;
        }
        public function ocupacionPrincipal(){
            return 'trabajar';
        }
        public function tieneLibro($tituloLibro){
            $this->libro = $tituloLibro;      
        }
        public function leeLibro(){
            if(empty($this->libro))
                return 'No est&aacute; leyendo ning&uacute;n libro actualmente.';
            else
                return "Est&aacute; leyendo \"$this->libro\"";
        }
    }  
    //Final clase empleado
    //Definiendo la clase estudiante.
    //Esta clase implementará también la interface leer
    class estudiante extends persona implements leer{
        //Métodos de la clase abstracta estudiante
        protected $estudios = '';  
        //Estudios realizados
        private$libro = NULL;  
        //Título de libro que está leyendo
        //Cosntructor de la clase abstracta estudiante
        function __construct($nombreEstudiante, $estudios = ''){
            parent::__construct($nombreEstudiante);
            $this->estudios = $estudios;
        }
        function __destruct(){
            parent::__destruct();  
        }
        function __clone(){
            parent::__clone();      
        }
        public function __toString(){
            $cadena  = __CLASS__ . ": nombre($this->nombre) ";
            $cadena .= "estudios($this->estudios) poblaci&oacute;n(";
            $cadena .= parent::poblacion() . ")<br />";
            if(!empty($this->libro)){
                $cadena .= $this->leeLibro();
            }
            return $cadena;
        }//Métodos de la clase abstracta estudiante
        public function ocupacionPrincipal(){
            return "estudiar($this->estudios)";      
        }
        public function tieneLibro($tituloLibro){
            $this->libro = $tituloLibro;      
        }
        public function leeLibro(){
            if(empty($this->libro))
                return 'No est&aacute; leyendo ning&uacute;n libro actualmente.';
            else
                return " est&aacute; leyendo \"$this->libro\"";      
        }
    }  
    //Fin clase estudiante
    //Definiendo la clase bebe.
    class bebe extends persona {
        //Constructor de la clase bebe
        function __construct($nombreBebe){
            parent::__construct($nombreBebe);      
        }
        //Destructor de la clase bebe
        function __destruct(){
            parent::__destruct();      
        }
        function __clone(){
            parent::__clone();      
        }
        //Métodos de la clase bebe
        public function ocupacionPrincipal(){
            return 'Comer y dormir';      
        }
    }  
    //Final clase bebe
?>