<?PHP
class RendezVous{
	private $id;
	private $dateRV;
	private $sujetRV;
	private $messageRV;
	private $etat ;
	function __construct($id,$dateRV,$sujetRV,$messageRV){
		$this->id=$id;
		$this->dateRV=$dateRV;
		$this->sujetRV=$sujetRV;
		$this->messageRV=$messageRV;
		$this->etat=$etat;
	}

	
	
	function getId(){
		return $this->id;
	}
	function getdateRV(){
		return $this->dateRV;
	}
	function getsujetRV(){
		return $this->sujetRV;
	}
	function getmessageRV(){
		return $this->messageRV;
	}
	function getetat(){
		return $this->etat;  }
	

	function setdateRV($dateRV){
		$this->dateRV=$dateRV;
	}
	function setsujetRV($sujetRV){
		$this->sujetRV;
	}
	function setmessageRV($messageRV){
		$this->messageRV=$messageRV;
	}
	function setetat($etat){
		$this->etat=$etat;
	}	
	

}

?>