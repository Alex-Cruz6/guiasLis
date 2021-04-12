<?php
    class storeManager {
        //Propiedades de la clase StoreManager
        private $_productList = array();
        //Métodos de la clase StoreManager
        public function addProduct(Sellable $product){
            $this->_productList[] = $product;
        }
        public function stockUp() {
            foreach ($this->_productList as $product) {
                $product->addStock(100);
            }
        }
    }
?>