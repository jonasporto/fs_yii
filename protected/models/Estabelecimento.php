<?php

/**
 * This is the model class for table "Estabelecimento".
 *
 * The followings are the available columns in table 'Estabelecimento':
 */
class Estabelecimento extends CActiveRecord
{	
	public $aEnderecos;
	private $saveErros;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{estabelecimentos}}';
	}


	public function dizAi(){
		echo "diz pra mim";
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		
			array('nome, descricao', 'required'),
		
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			// all fields accepted on request
			array('nome, descricao', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
	    return array(
            'enderecos' => array(self::MANY_MANY, 'Endereco', '{{estabelecimento_enderecos}}(estabelecimento_id, endereco_id)'),
            'emails' => array(self::MANY_MANY, 'Email', '{{estabelecimento_emails}}(estabelecimento_id, email_id)')
        );

	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		return new CActiveDataProvider('Estabelecimento', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Estabelecimento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function afterSave() { // invoked after the order instance is saved
     
        parent::afterSave();
       	
       		
    }

    function saveManyToMany(){
    	
    	$transaction = $this->dbConnection->beginTransaction();
    	$this->saveErros[] = !$this->save();

    	foreach ($this->relations() as $relation_name => $relation_attrs) {

       		if ($this->{$relation_name} && $relation_attrs[0] == self::MANY_MANY)
       			$this->saveRelations($relation_name, $relation_attrs, $this->{$relation_name});
	   	}

	   	/* rollback if have any error */
	   	if (isset($this->saveErros) && !!array_unique(array_filter($this->saveErros))){ 
       		$transaction->rollback();
       		return;
       	}

       	$transaction->commit();
       	return true;
    }

    public function saveRelations($relation_name, $relation_attrs, $values){

    	foreach ($values as $key => $value) {
       				
			/* instatiate related model*/
			$related_model[$key] = new $relation_attrs[1];
			$related_model[$key]->setAttributes($value);
		
			/* clone related model to self attrs, useful for validations */
			$this->{$relation_name} = $related_model;       				
				
			/* validate and try to save related model */
			if ($this->{$relation_name}[$key]->validate() && $this->id && $this->{$relation_name}[$key]->save())
				$this->saveAssociativeTable($relation_attrs[2], $this->id, $related_model[$key]->id);
 			else 
 				$this->saveErros[] = true;
       	}
    }

  	public function saveAssociativeTable($table_fields, $fk, $rel_fk) {
		
		preg_match_all('/([^()]*)\(([^,]*),([^)]*)\)/i', $table_fields, $matches);
		
		$table = $matches[1][0];
		$this_key = $matches[2][0];
		$another_key = $matches[3][0];

		$sql = "DELETE FROM {$table} WHERE $this_key = '{$fk}' AND $another_key  = '{$rel_fk}'";
		Yii::app()->db->createCommand($sql)->execute();
		
		$sql = "INSERT INTO {$table} ($this_key, $another_key) VALUES ('{$fk}', '{$rel_fk}')";
		
	    if (!Yii::app()->db->createCommand($sql)->execute())
	      throw new CException(Yii::t('yii','an Error occured while trying to save or update associative table'));
	}

	

}