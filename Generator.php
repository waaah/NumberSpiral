<?php
	class SpiralGenerator{
		private $num_items;
		private $dimensions;
		private $matrix;
		private $direction;
		private $current;
		function __construct($num_items, $direction = NULL){
			$this->num_items = $num_items;
			$this->dimensions = $num_items ** 2;
			$this->matrix = array();
			$this->direction = $direction;
		}
		
		public function generateItems(){
			//sets the current index;
			$this->current = $this->dimensions - 1;
			for($layer = 0; $layer < )
			self::oneSpin(0, $this->current);
				
		}
		private function oneSpin($spinNumber, $current){
			$num_items = $this->num_items;
			for($h = 0; $h < $num_items; $h++){
				print $this->current-- ." ";
			}
			
		}
		private function setIndex($h, $v, $index){
			$matrix[$h][$v] = $item;
		}
	}
	$spiralGenerator = new SpiralGenerator(5);
	$spiralGenerator->generateItems();
?>
