<div class="usuarios form col-md-offset-3 col-md-6">
	<?php echo $this->Form->create('Usuario',array('inputDefaults'=>array('class'=>'form-control'))); ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				<?php echo __('Please enter your username and password'); ?>
			</h3>
		</div>
		<div class="panel-body">
			<?php echo $this->Session->flash('auth'); ?>
			<?php echo $this->Form->input('cedula',array('type'=>'number')); ?>
			<?php echo $this->Form->input('password',array('type'=>'password')); ?>
		</div>
		<div class="panel-footer">
			<?php echo $this->Form->button('Login',array('type'=>'submit','class'=>'btn btn-primary')); ?>
		</div>
	</div>
	<?php echo $this->Form->end(); ?>
</div>