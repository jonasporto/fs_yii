<?php



class EstabelecimentoTest extends CDbTestCase
{
	private $controller;

	public function setUp(){

		$this->controller = new EstabelecimentoController('Estabelecimento');
        $this->controller->init();

	}

	public function testActionInitInstantiateModel(){
		
        $this->assertInstanceOf('Estabelecimento', $this->controller->Estabelecimento);

    }

    



    
}