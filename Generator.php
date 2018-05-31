<?php
	class SpiralGenerator extends Matrix{
		protected $direction;
		public function __construct($num_items, $direction = NULL){
			$this->direction = $direction;
			parent::__construct($num_items);
		}
		private function getCurrent(){
			return $this->current;
		}
		private function setCurrent($current){
			$this->current = $current;
		}
		public function generateItems(){
			//sets the current index;
			$this->current = $this->dimensions - 1;
			
			//start spin cycle
			self::createSpiral();		
		}
		private function createSpiral(){
			$spinNumber = 0;
			while(self::getCurrent() >= 0){
				self::spin($spinNumber);
				$spinNumber++;
			}
		}
		private function spin($spinNumber, $curr = NULL){
			$start = $spinNumber;
			//since the array is zero based, it wouldn't make 
			//sense that the value is equal to the original number
			//of items;
			$end = $this->num_items - $spinNumber - 1;
			$curr = self::getCurrent();
			//top
			for($v = $start; $v <= $end; $v++){
				self::setIndex($start, $v, $curr--);
			}
			//next side
			for($h = $start + 1; $h <= $end - 1; $h++){
				//sets end of matrix
				self::setIndex($h, $end, $curr-- );
			}
			//bottom
			for($v = $end; $v >= $start; $v--){
				self::setIndex($end, $v, $curr--);
			}
			//last side
			for($h = $end - 1; $h >= $start+1; $h--){
				self::setIndex($h, $start, $curr--);
			}
			self::setCurrent($curr);
		}
		
		
	}
	class Matrix{
		protected $num_items; //number of items in the spiral
		protected $dimensions;//dimensions
		protected $matrix; //the matrix itself
		protected $direction; //direction
		protected $current; //current item in the matrix
		public function __construct($num_items){
			$this->num_items = $num_items;
			$this->dimensions = $num_items ** 2;
			$this->matrix = array();
			$this->matrix = array();
			$num_items = $this->num_items;
			while($num_items > 0){
				array_push($this->matrix, array());
				$num_items--;
			}
		}
		protected function setIndex($h, $v, $item){
			$this->matrix[$h][$v] = $item;
		}
		public function printMatrix(){
			print "<table border=1>";
			for($h = 0; $h < $this->num_items; $h++){
				print "<tr>";
				for($v = 0; $v < $this->num_items; $v++){
					print "<td>".$this->matrix[$h][$v]."</td>";
				}
				print "</tr>";
			}
			print "</table>";
		}
	}
	$spiralGenerator = new SpiralGenerator(8);
	$spiralGenerator->generateItems();
    	$spiralGenerator->printMatrix();
