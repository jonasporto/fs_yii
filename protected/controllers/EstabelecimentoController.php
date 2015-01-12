<?php


class EstabelecimentoController extends Controller
{
	public $Estabelecimento;

	/* configura as dependencias do controller */
	public function init() {

		if (!isset($this->Estabelecimento)) {
			$this->Estabelecimento = new Estabelecimento();
		}
	}

	public function actionIndex($id = null) {	

		if ($id) {
			$estabelecimento = $this->Estabelecimento->findbyPk($id);
			return $this->render('visualizar',compact('estabelecimento'));
		}

		$lista_estabelecimentos = $this->Estabelecimento->findAll();
		return $this->render('index',compact('lista_estabelecimentos'));
	}

	public function actionCadastro() {

		
		$endereco[0] = new Endereco;
		$this->Estabelecimento->enderecos = $endereco;
		$email[0] = new Email;
		$this->Estabelecimento->emails = $email;
		
		$estabelecimento = $this->Estabelecimento;
		
		if (isset($_POST['Estabelecimento'])){
			
			$this->Estabelecimento->setAttributes($_POST['Estabelecimento']);
			$this->Estabelecimento->enderecos = $_POST['Endereco'];
			$this->Estabelecimento->emails = $_POST['Email'];
			$this->saveOrUpdate($_POST);
		}
		
		return $this->render('cadastro', compact('estabelecimento'));
	}

	public function actionEditar($id){

		$estabelecimento = $this->Estabelecimento->findbyPk($id);
		
		if ($estabelecimento === null) throw new CHttpException(404,'The requested page does not exist.');
		
		if (isset($_POST['Estabelecimento'])) {
		 	
		 	$this->Estabelecimento = $estabelecimento;
		 	$this->Estabelecimento->setAttributes($_POST['Estabelecimento']);
		 	$this->Estabelecimento->enderecos = $_POST['Endereco'];
			$this->Estabelecimento->emails = $_POST['Email'];
		 	$this->saveOrUpdate();	

		}

		return $this->render('editar', compact('estabelecimento'));
	}

	public function actionDelete($id) {

		$model = $this->Estabelecimento->findbyPk($id);

		if ($model === null) throw new CHttpException(404,'The requested page does not exist.');
		
		$model->delete();

		return $this->redirect(array('index'));
		
	}

	private function saveOrUpdate(){

		$isSaved = $this->Estabelecimento->saveManyToMany();

		if (isset($isSaved) && $isSaved) {
			
			Yii::app()->user->setFlash('success','Salvo com sucesso.');
			return $this->redirect(array('index'));
		
		} else if (isset($isSaved) && !$isSaved) {
		
			Yii::app()->user->setFlash('success','Nao salvo.');
		}
	}

	 


	// -----------------------------------------------------------
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}