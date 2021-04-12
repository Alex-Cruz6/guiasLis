<?php
class database {
   private $conexion;
   private $resource;
   private $sql;
   public static $queries;
   private static $_singleton;
   const HOST = "localhost";
   const USER = "root";
   const PASS = "";
   const DB = "peliculas";

   public static function getInstance(){
      if(is_null (self::$_singleton)) {
         self::$_singleton = new DataBase();
      }
      return self::$_singleton;
   }

   private function __construct(){
      $this->conexion = new mysqli(self::HOST, self::USER, self::PASS, self::DB);
	  $this->conexion->set_charset('utf8');
      //mysql_select_db(self::DB, $this->conexion);
      //mysql_set_charset('utf8', $this->conexion);
      self::$queries = 0;
      $this->resource = null;
   }

   public function execute(){
      if(!($this->resource = $this->conexion->query($this->sql))){
         return null;
      }
      self::$queries++;
      return $this->resource;
   }

   public function alter(){
      if(!($this->resource = $this->conexion->query($this->sql))){
         return false;
      }
      return true;
   }

   public function loadObjectList(){
      if(!($cur = $this->execute())){
		return null;
      }
      $array = array();
      while($row = $cur->fetch_object()){
         $array[] = $row;
      }
      return $array;
   }

   public function setQuery($sql){
      if(empty($sql)){
         return false;
      }
      $this->sql = $sql;
      return true;
   }
   
   public function getNumRows($sql){
      if($this->setQuery($sql)){
	    $rsTotal = $this->conexion->query($this->sql);	    
	    $total = $rsTotal->num_rows;
	    $total = $rsTotal->num_rows;
	    return $total;
      }
      else{
         return false;
      }
   }

   public function freeResults(){
      @mysql_free_result($this->resource);
      return true;
   }

   public function loadObject(){
      if($cur = $this->execute()){
         if($object = mysqli_fetch_object($cur)){
            @mysqli_free_result($cur);
            return $object;
         }
         else {
            return null;
         }
      }
      else {
         return false;
      }
   }

   function __destruct(){
      @mysqli_free_result($this->resource);
      @mysqli_close($this->conexion);
   }
}
?>