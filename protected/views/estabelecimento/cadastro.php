<h3> Cadastro Estabelecimento </h3>

<?php $this->beginWidget('ext.widgets.first_wid.First',array('nome'=> 'Jonas')); ?>
<?php echo $this->renderPartial('_form_save_or_update', compact('estabelecimento')); ?>
<?php $this->endWidget('ext.widgets.first_wid.First',array('nome'=> 'Jonas')); ?>

