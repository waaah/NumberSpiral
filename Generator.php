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
			self::traverseX($start, $end, $start);
			
		}
		private function traverseX($start, $end, $y){
			$curr = self::getCurrent();
            if($this->direction != "r"){
                for($x = $start; $x <= $end; $x++){
                    self::setIndex($y, $x, $curr--);
                }
            }
            else{
                for($x = $end; $x >= $start; $x--){
                    self::setIndex($y, $x, $curr--);
                }
            }
			self::setCurrent($curr);
			return $curr;
        }
        private function traverseY($start, $end, $x){
			$curr = self::getCurrent();
            if($this->direction != "r"){
                for($y = $start + 1; $y <= $end - 1; $y++){
                    self::setIndex($y, $x, $curr-- );
                }
            }
            else{
                for($y = $end - 1; $y >= $start+1; $y--){
                    self::setIndex($y, $x, $curr--);
                }
            }
			self::setCurrent($curr);
			return $curr;
        }
        private function setDirection(){
            $this->direction = $this->direction == "r" ? NULL: "r";
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
		protected function setIndex($y, $x, $item){
			$this->matrix[$y][$x] = $item;
		}
		public function printMatrix(){
			print "<table border=1>";
			for($y = 0; $y < $this->num_items; $y++){
				print "<tr>";
				for($x = 0; $x < $this->num_items; $x++){
					print "<td>".$this->matrix[$y][$x]."</td>";
				}
				print "</tr>";
			}
			print "</table>";
		}
	}
	$spiralGenerator = new SpiralGenerator(8);
	$spiralGenerator->generateItems();
    	$spiralGenerator->printMatrix();
