<?php

namespace FABIANO\Form;

use FABIANO\Form\InterfaceForm\FormInterface;
use FABIANO\Form\InterfaceForm\ElementInterface;
use FABIANO\Form\Tipo\ElementAbstract;

class GeraForm implements FormInterface
{
	private $action; 
	private $item = array();
	private $formElemment;
	private $metodo;

	public function __construct($di)
	{
		$this->di = $di;
	}

	public function getDi()
    {
        return $this->di;
    }

	public function setMetodo($metodo)
	{
		$this->metodo = $metodo;
		return $this;
	}

	public function setAction($action)
	{
		$this->action = $action;
		return $this;
	}

	public function createField(ElementInterface $item)
	{
		$this->item[] = $item;
		return $this;
	}

	private function criandoForm()
	{
		$this->form = "<form action='{$this->action}' method='{$this->metodo}'>";
		$this->form .= '';
		foreach ($this->item as $cada_item) {
        	$this->form .= $cada_item->getElement();
        }
		$this->form .= '</form>';
		return $this->form;
	} 


	public function render()
	{
		echo $this->criandoForm();
	}	

}