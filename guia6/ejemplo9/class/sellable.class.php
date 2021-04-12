<?php
    interface sellable
    {
        public function addStock($numItems);
        public function sellItem();
        public function getStockLevel();
    }
?>
