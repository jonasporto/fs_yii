<?php

Yii::import('application.controllers.*');

class EstabelecimentoControllerTest extends CTestCase
{	
	private $controller;
	
	public function setUp()
	{
		$this->controller = new TestEstabelecimentoController('TestEstabelecimento');
	}

	public function testActionInit()
	{
		$this->controller->init();
		$this->assertInstanceOf('Estabelecimento',$this->controller->Estabelecimento);
	}

	public function testActionIndex()
	{	
		$this->controller->actionIndex();
		$this->assertEquals('index', $this->controller->renderedView);

		$this->controller->actionIndex(213);
		$this->assertEquals('visualizar', $this->controller->renderedView);
	
	}

	public function testActionCadastro()
	{
		$this->controller->actionCadastro();
		$this->assertEquals('cadastro', $this->controller->renderedView);

		$_POST['Estabelecimento'] = $_POST['Endereco'] = $_POST['Email'] = array(1,2,3);
		$this->controller->actionCadastro();
		$this->assertEquals(array('index'), $this->controller->redirectTo);

	}

	public function testActionEditar()
	{
		$this->controller->actionEditar(1);
		$this->assertEquals('editar', $this->controller->renderedView);

		$_POST['Estabelecimento'] = $_POST['Endereco'] = $_POST['Email'] = array(1,2,3);
		$this->controller->actionEditar(1);
		$this->assertEquals(array('index'), $this->controller->redirectTo);


	}

	public function testActionDelete()
	{
		$this->controller->actionDelete(1);
		$this->assertEquals(array('index'), $this->controller->redirectTo);

	}

}

class MockEstabelecimento extends Estabelecimento
{

	public function findAll()
	{	
		return array(new MockEstabelecimento);
	}

	public function findByPk($param)
	{
		return new MockEstabelecimento;
	}

	public function saveManyToMany()
	{
		return true;
	}

	public function setAttributes($params = array())
	{
		return $params;
	}

	public function delete()
	{
		return true;
	}
}

class TestEstabelecimentoController extends EstabelecimentoController
{	
	public $renderedView;
	public $Estabelecimento;
	public $redirectTo;

	public function __construct($controller)
	{
		parent::__construct($controller);
		$this->Estabelecimento = new MockEstabelecimento();
	}

	public function render($view, $params = array())
	{
		return $this->renderedView = $view;
	}

	public function redirect($url = array())
	{
		$this->redirectTo = $url;
	}
}