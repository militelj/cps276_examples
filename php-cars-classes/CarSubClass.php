<?php
/*NEED TO INCLUDE THE CAR.PHP FILE TO USE THE CLASS.*/
include_once('Car.php');
class CarSubClass extends Car{
	/*SETS THE PROPERTIES TO PRIVATE AND THE DATATYPE TO STRING*/
    private $seats;
        
    public function __construct(){
    	parent::__construct();/*NEEDS TO BE CALLED SO WE CAN INHERIT THE CONSTRUCTOR, OTHERWISE IT WILL OVERWRITE IT.*/
    	$this->seats = 4;
    }
    
    public function setSeats($num){
    	$this->seats=$$num;
    }  
    
    public function getSeats(){
    	return $this->seats;
    }  
 
	public function getDetails(){
		/*I HAVE TO CALL THE GET FUNCTIONS OF THE PARENT BECAUSE I CANNOT ACCESS THE PRIVATE PROPERTIES DIRECTLY*/
		return $this->getColor()." ".$this->getMake()." ".$this->getModel()." ".$this->seats." seats";
	}
}
