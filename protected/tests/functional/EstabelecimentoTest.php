<?php

class EstabelecimentoTest extends WebTestCase
{	
	public $testMethodCount = 0;
	
	/**
	* Workaround to execute all functional tests in just one browser session
	* So all toTest prefixed methods are called in this method below.
	*/
	public function testExecuteAll() {

		print("\n");

		$this->toTestFormularioCadastro()
			 ->toTestFormularioEditarEApagar();

		print "\n> $this->testMethodCount test(s) executed";
	}

	private function init($functionName) {

		print("\n> ".$functionName."()");
		return $this->testMethodCount++;
	}		
	
	/**
	*	Testa todos passos para efetivar um cadastro de um estabelecimento
	*/
	private function toTestFormularioCadastro() {	
		
		$this->init(__FUNCTION__);
		
		$this->open('estabelecimento');
		
		/* no data in table */
		$this->assertTextNotPresent('Selenium titulo');
		$this->assertTextNotPresent('Selenium descricao');
		
		/* click cadastro link*/	
		$this->clickAndWait("//a[contains(text(),'Adicionar')]");

		/* check validation */
		$this->clickAndWait("//input[@value='salvar']");

		$this->assertTextPresent('Nome cannot be blank.');
		$this->assertTextPresent('Descricao cannot be blank.');

		/* data input */
		$this->type('name=Estabelecimento[nome]','Selenium titulo');
		$this->type('name=Estabelecimento[descricao]','Selenium descricao');

		$this->clickAndWait("//input[@value='salvar']");

		/* is showing save message ? */
		$this->assertTextPresent('sucesso');

		/* is text in the table */
		$this->assertTextPresent('Selenium titulo');
		$this->assertTextPresent('Selenium descricao');

		return $this;
	}


	/**
	*	Testa todos passos para editar um cadastro de um estabelecimento
	*/
	private function toTestFormularioEditarEApagar() {	
		
		$this->init(__FUNCTION__);

		$this->open('estabelecimento');
		
		/* data to edit in table */
		$this->assertTextPresent('Selenium titulo');
		$this->assertTextPresent('Selenium descricao');
		
		/* click editar link*/	
		$this->clickAndWait("//a[contains(text(),'Editar')]");

		/* data input */
		$this->type('name=Estabelecimento[nome]','Selenium titulo editado');
		$this->type('name=Estabelecimento[descricao]','Selenium descricao editado');

		$this->clickAndWait("//input[@value='salvar']");

		/* is showing save message ? */
		$this->assertTextPresent('sucesso');

		/* is text in the table */
		$this->assertTextPresent('Selenium titulo editado');
		$this->assertTextPresent('Selenium descricao editado');

		/* click apagar link*/	
		$this->clickAndWait("//a[contains(text(),'Apagar')]");

		/* no data in table */
		$this->assertTextNotPresent('Selenium titulo editado');
		$this->assertTextNotPresent('Selenium descricao editado');

		return $this;
	}


}
