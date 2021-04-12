<?php
    class movie implements sellable {
        //Propiedades de la clase television
        private $_title;private $_genero;private $_stockLevel;
        //Métodos de la clase television
        public function getTitle() {
            return $this->_title;
        }
        public function getGener() {
            return $this->_genero;
        }
        public function setTitle($title) {
            $this->_title = $title;
        }
        public function setGener($gener) {
            $this->_genero = $gener;
        }
        public function addStock($numItems) {
            $this->_stockLevel += $numItems;
        }
        public function sellItem() {
            if($this->_stockLevel > 0){
                $this->_stockLevel--;
                return true;
            }else {
                return false;
            }
        }
        public function getStockLevel() {
            return $this->_stockLevel;
        }
    }
?>