<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="content">

	<!-- set flash messages -->

	<?php if(Yii::app()->user->hasFlash('success')): ?>
	 
	<div class="flash-success">
	    <?php echo Yii::app()->user->getFlash('success'); ?>
	</div>
	 
	<?php endif; ?>

	<?php echo $content; ?>
</div>
<!-- content -->

<?php $this->endContent(); ?>