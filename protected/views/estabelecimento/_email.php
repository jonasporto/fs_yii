<style>
	
	div.email{
	  clear:left;
	  margin-top: 20px;
	}
	div.add-email{
		margin-top: 15px;
		float:left;
	}

</style>

<div class="email" data-index="<?=count($emails);?>">


<h3> Email </h3>
<hr/>
<?php foreach ($emails as $index => $email) { ?>
		
<?php echo $form->errorSummary($email); ?>

	<div class="row">

		<div class="input">
		<?php echo $form->labelEx($email,"[$index]endereco"); ?>
		<?php echo $form->textField($email,"[$index]endereco"); ?>
		<?php echo $form->error($email,'endereco'); ?>
		</div>

	</div>
	
	
</div>

<? } ?>
<div class="add-email">
	<button id="add-email"> + </button>
</div>


<script>
		window.onload = function(){
			var email = document.getElementById('add-email');
			var email_container = document.querySelector('.email');
			email.addEventListener('click',function(e){
				 
				 e.preventDefault();
				 
				 var row = document.querySelector('.email .row');
				 var input = row.querySelectorAll('input');
				 var label = row.querySelectorAll('label');
				 var index = document.querySelector('[data-index]').dataset.index++;
			 	 
			 	 for(i=0; i<input.length; i++){
			 	 	
			 	 	label[i].htmlFor = label[i].htmlFor.replace(/\d+/g,index);
			 	  	input[i].name = input[i].name.replace(/\d+/g,index);
			 	 	input[i].id = input[i].id.replace(/\d+/g,index);
			 	 }
			 	 
			 	 email_container.innerHTML += row.outerHTML;
			});
		}

	
</script>