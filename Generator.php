<?php
	class SpiralGenerator{
		private $num_items; //number of items in the spiral
		private $dimensions;//dimensions
		private $matrix; //the matrix itself
		private $direction; //direction
		private $current; //current item in the matrix
		function __construct($num_items, $direction = NULL){
			$this->num_items = $num_items;
			$this->dimensions = $num_items ** 2;
			$this->matrix = array();
			while($num_items > 0){
				array_push($this->matrix, array(0,0,0,0,0));
				$num_items--;
			}
			$this->direction = $direction;
		}
		
		public function generateItems(){
			//sets the current index;
			$this->current = $this->dimensions - 1;
			self::spin(0);		
		}
		private function spin($spinNumber){
			//spin number is 0
			$start = $spinNumber;//row to start
			$end = $this->num_items - $spinNumber; //row to end
			//on 2d set index;
			for($h = $start; $h < $end; $h++){
				//spin logic goes here
			}
			//spin again if the current index is greater than 0
			if($this->current >= 0){
				//Add spin by 1;
				//Per cycle the N of an index is reduced by 2
				self::spin(++$start,--$end);
			}
		}
		private function setIndex($h, $v, $item){
			$this->matrix[$h][$v] = $item;
		}
		public function printMatrix(){
			for($h = 0; $h < $this->num_items; $h++){
				for($v = 0; $v < $this->num_items; $v++){
					print $this->matrix[$h][$v]." ";
				}
				print "<br>";
			}
		}
	}
	$spiralGenerator = new SpiralGenerator(5);
	$spiralGenerator->generateItems();
    $spiralGenerator->printMatrix();
