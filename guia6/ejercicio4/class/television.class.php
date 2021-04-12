<?php
    class television implements sellable {
        //Propiedades de la clase television
        private $_screenSize;private $_stockLevel;
        //Métodos de la clase television
        public function getScreenSize() {
            return $this->_screenSize;
        }
        public function setScreenSize($screenSize) {
            $this->_screenSize = $screenSize;
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