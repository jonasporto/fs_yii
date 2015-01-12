<?php if(Yii::app()->user->hasFlash('success')): ?>
 
<div class="flash-success">
    <?php echo Yii::app()->user->getFlash('success'); ?>
</div>
 
<?php endif; ?>

<h3> Lista de estabelecimentos cadastrados </h3>

<table>

	<thead>

		<tr>
			<th> Nome </th> 
			<th> Descrição </th>
			<th> Ações </th>
		</tr>

	</thead>
	
	<tbody>

		<?php foreach ($lista_estabelecimentos as $estabelecimento) { ?>
			
		<tr>
			<td> <?= $estabelecimento->nome ?> </td> 
			<td> <?= $estabelecimento->descricao ?></td>
			<td>
				<?php
					echo CHtml::link('Ver', $this->createAbsoluteUrl('estabelecimento/' . $estabelecimento->id));
				?>

				<?php
					echo CHtml::link('Editar', $this->createAbsoluteUrl('estabelecimento/editar/' . $estabelecimento->id));
				?>

				<?php

					echo CHtml::link(
    					'Apagar',
    						array('estabelecimento/delete', 'id' => $estabelecimento->id),
     						array('confirm' => 'Tem certeza?')
					);
				?>

			</td>
		</tr>

		<?php } # end foreach ?>
		
	</tbody>
</table>
	
<?php
	echo CHtml::link('Adicionar', $this->createAbsoluteUrl('estabelecimento/cadastro'));
?>