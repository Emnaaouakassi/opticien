<?php
class Produit{
	private $referance;
	private $nom;
	private $prix;
	private $code_barre;
	private $categorie;
	private $quantite;
	private $img;
	public function __construct($referance,$nom,$prix,$code_barre,$categorie,$quantite,$img)/*on peur avoir q'un sel constructeur*/ 
	{
		$this->referance=$referance;
        $this->nom=$nom;
	    $this->prix=$prix;
	    $this->code_barre=$code_barre;
        $this->categorie=$categorie;
        $this->quantite=$quantite;
        $this->img=$img;
	}
	public function getRef(){return $this->referance ;}
	public function getNom(){return $this->nom ;}
	public function getPrix(){return $this->prix ;}
	public function getCode(){return $this->code_barre ;}
	public function getCat(){return $this->categorie ;}
	public function getImg(){return $this->img ;}
	public function getQuant(){return $this->quantite ;}
	public function setRef($referance){$this->referance=$referance;}
	public function setNom($nom){$this->nom=$nom;}
	public function setPrix($prix){$this->prix=$prix;}
	public function setCode($code_barre){$this->code_barre=$code_barre;}
	public function setCat($categorie){$this->categorie=$categorie;}
		public function setQuant($quantite){$this->quantite=$quantite;}
		public function setImg($img){$this->img=$img;}
	}
	?>