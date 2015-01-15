<?php
class First extends CWidget {
 	
 	public $nome;

 	public function init(){
 		echo 'inicio';
 		$this->render('myView',array('nome'=>$this->nome));
 	}
    public function run() {
    	echo 'fim';
        $this->render('myView',array('nome'=>$this->nome));
    }
 
}
?>