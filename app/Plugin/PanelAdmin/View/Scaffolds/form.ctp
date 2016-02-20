<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Scaffolds
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<ol class="breadcrumb">
	<li><?php echo $this->Html->link('<i class="fa fa-home"></i> Inicio','/',array('escape'=>false)); ?></li>
	<li><?php echo $this->Html->link('<i class="fa fa-bars"></i> '.$pluralHumanName,array('action'=>'index'),array('escape'=>false)); ?></li>
	<?php if ($this->request->action == 'add'){ ?>
		<li class="active"><?php echo __d('cake', '<i class="fa fa-plus"></i> Agregar'); ?></li>
	<?php }elseif ($this->request->action == 'edit'){ ?>
		<li class="active"><?php echo __d('cake', '<i class="fa fa-edit"></i> Editar'); ?></li>
	<?php } ?>
</ol>


<div class="<?php echo $pluralVar; ?> form">


<div class="actions dropdown pull-right">
	<!-- <h3><?php echo __d('cake', 'Actions'); ?></h3> -->

	<?php echo $this->Form->button('Acciones <i class="fa fa-toggle-down"></i>',array('class'=>'btn btn-default dropdown-toggle', "data-toggle"=>"dropdown", 'escape'=>false))?>

	<ul class="dropdown-menu" role="menu">
<?php if ($this->request->action !== 'add'): ?>
		<li><?php echo $this->Form->postLink(
			__d('cake', '<i class="fa fa-trash-o"></i> Eliminar '.$modelClass),
			array('action' => 'delete', $this->Form->value($modelClass . '.' . $primaryKey)),
			array('escape'=>false),
			__d('cake', 'Are you sure you want to delete # %s?', $this->Form->value($modelClass . '.' . $primaryKey)));
		?></li>

		<li role="presentation" class="divider"></li>
		
<?php endif; ?>
		<li><?php echo $this->Html->link(__d('cake', '<i class="fa fa-bars"></i>') . ' ' . $pluralHumanName, array('action' => 'index'),array('escape'=>false)); ?></li>
<?php
		$done = array();
		foreach ($associations as $_type => $_data) {
			foreach ($_data as $_alias => $_details) {
				if ($_details['controller'] != $this->name && !in_array($_details['controller'], $done)) {
					echo "\t\t<li>" . $this->Html->link(
						__d('cake', '<i class="fa fa-bars"></i> %s', Inflector::humanize($_details['controller'])),
						array('plugin' => $_details['plugin'], 'controller' => $_details['controller'], 'action' => 'index'),
						array('escape'=>false)
					) . "</li>\n";
					echo "\t\t<li>" . $this->Html->link(
						__d('cake', '<i class="fa fa-plus"></i> %s', Inflector::humanize(Inflector::underscore($_alias))),
						array('plugin' => $_details['plugin'], 'controller' => $_details['controller'], 'action' => 'add'),
						array('escape'=>false)
					) . "</li>\n";
					$done[] = $_details['controller'];
				}
			}
		}
?>
	</ul>
</div>



<?php
	echo $this->Form->create($modelClass, array(
		'inputDefaults'=>array('class'=>'form-control','div'=>array('class'=>'form-group')),
		'title'=>'asdasdds'

		));

	//echo $this->Form->create();

	echo $this->Form->inputs($scaffoldFields, array('created', 'modified', 'updated'));

	echo '<hr/>';

	echo $this->Form->submit(__d('cake', 'Guardar'),array('class'=>'btn btn-primary'));

	echo $this->Form->end();
?>
</div>


