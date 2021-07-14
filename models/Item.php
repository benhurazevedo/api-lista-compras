<?php 
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="Item")
*/
class Item 
{
	/**
	* @ORM\id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue
	*/
	protected $id;
	
	/** @ORM\Column(type="string", length=255) */
	protected $descricao;
	
	/** @ORM\Column(type="integer", nullable=TRUE) */
	protected $marcado;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
		$this->id = $id;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}
	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}
	public function getMarcado()
	{
		return $this->marcado;
	}
	public function setMarcado($marcado)
	{
		$this->marcado = $marcado;
	}
}