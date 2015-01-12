<style>
	
	div.address{
	  clear:left;
	  margin-top: 20px;
	}

</style>

<div class="address">

<?php if(!isset($index)) $index = 0; ?>

<h3> Endereço </h3>
<hr/>

<?php echo $form->errorSummary($endereco); ?>

	<div class="row">

		<div class="input">
		<?php echo $form->labelEx($endereco,'cep'); ?>
		<?php echo $form->textField($endereco,"[$index]cep"); ?>
		<?php echo $form->error($endereco,'cep'); ?>
		</div>

	</div>

	<div class="row">
		
		<div class="input">
		<?php echo $form->labelEx($endereco,'logradouro'); ?>
		<?php echo $form->textField($endereco,"[$index]logradouro"); ?>
		<?php echo $form->error($endereco,'logradouro'); ?>
		</div>

		<div class="input">
		<?php echo $form->labelEx($endereco,'numero'); ?>
		<?php echo $form->textField($endereco,"[$index]numero"); ?>
		<?php echo $form->error($endereco,'numero'); ?>
		</div>

	</div>

	<div class="row">
		
		<div class="input">
		<?php echo $form->labelEx($endereco,'complemento'); ?>
		<?php echo $form->textField($endereco,"[$index]complemento"); ?>
		<?php echo $form->error($endereco,'complemento'); ?>
		</div>

	</div>

	<div class="row">
		
		<div class="input">
		<?php echo $form->labelEx($endereco,'cidade'); ?>
		<?php echo $form->textField($endereco,"[$index]cidade"); ?>
		<?php echo $form->error($endereco,'cidade'); ?>
		</div>

		<div class="input">
		<?php echo $form->labelEx($endereco,'estado'); ?>
		<?php echo $form->textField($endereco,"[$index]estado"); ?>
		<?php echo $form->error($endereco,'estado'); ?>
		</div>

	</div>

</div>


