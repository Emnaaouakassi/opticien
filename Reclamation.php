<?PHP
class Reclamantion{
	private $id;
	private $reference;
	private $nomRec;
	private $description;
	function __construct($id,$reference,$nomRec,$description){
		$this->id=$id;
		$this->reference=$reference;
		$this->nomRec=$nomRec;
		$this->description=$description;
		
	}

	
	
	function getId(){
		return $this->id;
	}
	function getReference(){
		return $this->reference;
	}
	function getNomRec(){
		return $this->prenom;
	}
	function getDescripton(){
		return $this->description;
	}
	

	function setReference($reference){
		$this->reference=$reference;
	}
	function setNomRec($nomRec){
		$this->nomRec;
	}
	function setDescription($description){
		$this->nbHeures=$nbHeures;
	}
	
	
}

?>