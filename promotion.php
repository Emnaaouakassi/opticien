<?PHP
class promotion{
	private $ref;
	private $nomp;
	private $prixi;
	private $pourcentage;
	private $datef;
	function __construct($ref,$nomp,$prixi,$pourcentage,$datef){
		$this->ref=$ref;
		$this->nomp=$nomp;
		$this->prixi=$prixi;
		$this->pourcentage=$pourcentage;
		$this->datef=$datef;
	}
	
	function getref(){
		return $this->ref;
	}
	function getnomp(){
		return $this->nomp;
	}
	function getprixi(){
		return $this->prixi;
	}
	function getpourcentage(){
		return $this->pourcentage;
	}
	function getdatef(){
		return $this->datef;
	}
	function setref(){
		$this->ref=$ref;
	}
	function setnomp($nomp){
		$this->nomp=$nomp;
	}
	function setprixi($prixi){
		$this->prixi;
	}
	function setpourcentage($pourcentage){
		$this->pourcentage=$pourcentage;
	}
	function setdatef($datef){
		$this->datef=$datef;
	}
	
}
 
?>