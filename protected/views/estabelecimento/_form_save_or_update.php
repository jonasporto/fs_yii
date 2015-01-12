<style>
	div.row label{
		display:block;
	}

	div.row div.input{
	  float:left;
	  margin-right: 10px;
	  margin-bottom: 10px;
	}

	div.row{
	  clear:left;
	}

</style>

<?php $form = $this->beginWidget('CActiveForm'); ?>
	
	<?php echo $form->errorSummary($estabelecimento); ?>
	

	<div class="row">
		<?php echo $form->labelEx($estabelecimento,'nome'); ?>
		<?php echo $form->textField($estabelecimento,'nome'); ?>
		<?php echo $form->error($estabelecimento,'nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($estabelecimento,'descricao'); ?>
		<?php echo $form->textField($estabelecimento,'descricao'); ?>
		<?php echo $form->error($estabelecimento,'descricao'); ?>
	</div>

	<?php 
		foreach ($estabelecimento->enderecos as $index => $endereco) {
			echo $this->renderPartial('_address', compact('form','index','endereco')); 
		}
	?>

	<?php 
		$emails = $estabelecimento->emails;
		echo $this->renderPartial('_email', compact('form','emails')); 
		
	?>


	<div class="row">
		<input type="submit" value="salvar"/> 
	</div>

<?php $this->endWidget(); ?>