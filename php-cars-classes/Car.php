<?php
class Car{
	/*SETS THE PROPERTIES TO PRIVATE AND THE DATATYPE TO STRING*/
    private $make;
    private $model;
    private $color;
    private $engine;

    
    public function __construct(){
    	 /*ASSIGNS VALUES TO THE PROPERTIES. CONSTRUCTOR FUNCTIONS ARE USED TO SET THINGS UP.*/
        $this->make = "Honda";
        $this->model = "CRV";
        $this->color = "Dark Blue";
        $this->engine = "4 cylinder";
    }
     
    public function setColor($color){
    	$this->color=$color;
    }  
    
    public function setModel($model){
    	$this->model=$color;
    }  
    
    public function setMake($make){
    	$this->make=$make;
    }  
    
    public function setEngine($engine){
    	$this->engine=$engine;
    }   
	
	public function getColor(){
		return $this->color;
	}
	
	public function getModel(){
		return $this->model;
	}
	
	public function getMake(){
		return $this->make;
	}
	
	public function getEngine(){
		return $this->engine;
	}

	public function getDetails(){
		return $this->color." ".$this->make." ".$this->model;
	}
}
