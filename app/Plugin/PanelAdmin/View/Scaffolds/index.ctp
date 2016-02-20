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
	<li class="active"><?php echo '<i class="fa fa-bars"></i> '.$pluralHumanName;?></li>
</ol>

<div class="<?php echo $pluralVar; ?> index">

	<div class="row">
			<div class="col-md-10 col-sm-8">
				<h2 class="unsort"><?php echo $this->Html->link('<i class="fa fa-bars"></i> '.$pluralHumanName,array('action'=>'index'),array('escape'=>false)); ?>
					<small>Scaffold index</small>
				</h2>
			</div>
			<div class="col-md-2 col-sm-4">
				<div class="actions dropdown">

					<?php echo $this->Form->button('Acciones <i class="fa fa-toggle-down"></i>',array('class'=>'btn btn-default btn-block dropdown-toggle', "data-toggle"=>"dropdown", 'escape'=>false))?>
				  
					<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
						<li><?php echo $this->Html->link(__d('cake', '<i class="fa fa-plus"></i> %s', $singularHumanName), array('action' => 'add'), array('class'=>'', 'escape'=>false)); ?></li>
						<li class="divider"></li>
						<?php
								$done = array();
								foreach ($associations as $_type => $_data) {
									foreach ($_data as $_alias => $_details) {
										if ($_details['controller'] != $this->name && !in_array($_details['controller'], $done)) {
											echo '<li>';
											echo $this->Html->link(
												__d('cake', '<i class="fa fa-bars"></i> %s', Inflector::humanize($_details['controller'])),
												array('plugin' => $_details['plugin'], 'controller' => $_details['controller'], 'action' => 'index'),
												array('class'=>'', 'escape'=>false)
											);
											echo '</li>';

											echo '<li>';
											echo $this->Html->link(
												__d('cake', '<i class="fa fa-plus"></i> %s', Inflector::humanize(Inflector::underscore($_alias))),
												array('plugin' => $_details['plugin'], 'controller' => $_details['controller'], 'action' => 'add'),
												array('class'=>'', 'escape'=>false)
											);
											echo '</li>';
											$done[] = $_details['controller'];
										}
									}
								}
						?>
					</ul>
				</div>
			</div>
	</div>

	<div class="table-responsive">
		<table cellpadding="0" cellspacing="0" class="table table-condensed table-hover">
			<tr class="sort">
			<?php foreach ($scaffoldFields as $_field): ?>
				<th><?php echo $this->Paginator->sort($_field); ?></th>
			<?php endforeach; ?>
				<th><?php echo __d('cake', 'Actions'); ?></th>
			</tr>

			<?php
			foreach (${$pluralVar} as ${$singularVar}):
				echo '<tr>';
					foreach ($scaffoldFields as $_field) {
						$isKey = false;
						if (!empty($associations['belongsTo'])) {
							foreach ($associations['belongsTo'] as $_alias => $_details) {
								if ($_field === $_details['foreignKey']) {
									$isKey = true;
									echo '<td>' . $this->Html->link(${$singularVar}[$_alias][$_details['displayField']], array('controller' => $_details['controller'], 'action' => 'view', ${$singularVar}[$_alias][$_details['primaryKey']])) . '</td>';
									break;
								}
							}
						}
						if ($isKey !== true) {
							echo '<td>' . h(${$singularVar}[$modelClass][$_field]) . '</td>';
						}
					}

					echo '<td class="actions">';
					
					echo $this->Html->link(__d('cake', '<i class="fa fa-eye"></i>'), array('action' => 'view', ${$singularVar}[$modelClass][$primaryKey]), array('class'=>'','escape'=>false, 'title'=>'Ver'));
					echo '&nbsp;&nbsp;&nbsp;&nbsp;';


					echo ' ' . $this->Html->link(__d('cake', '<i class="fa fa-edit"></i>'), array('action' => 'edit', ${$singularVar}[$modelClass][$primaryKey]), array('class'=>'','escape'=>false, 'title'=>'Editar'));
					echo '&nbsp;&nbsp;&nbsp;&nbsp;';


					echo ' ' . $this->Form->postLink(
						__d('cake', '<i class="fa fa-times"></i>'),
						array('action' => 'delete', ${$singularVar}[$modelClass][$primaryKey]),
						array('class'=>'','escape'=>false, 'title'=>'Eliminar'),
						__d('cake', 'Are you sure you want to delete # %s?', ${$singularVar}[$modelClass][$primaryKey])
					);

					echo '</td>';
				echo '</tr>';

			endforeach;

			?>
		</table>
	</div>



	<p><?php
	echo $this->Paginator->counter(array(
		'format' => __d('cake', 'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?></p>


	<div class="paging btn-group">
	<?php
		echo $this->Paginator->prev(
					'<i class="fa fa-caret-left"></i> ' . __d('cake', 'Anterior'),
					array('class' => 'prev btn btn-default','escape'=>false),
					null,
					array('class' => 'prev btn btn-default disabled','escape'=>false)
				);
						
		echo $this->Paginator->numbers(array('separator' => '', 'class'=>'btn btn-default', 'currentClass'=>'btn btn-primary'));
		
		echo $this->Paginator->next(
					__d('cake', 'Proximo') .' <i class="fa fa-caret-right"></i>',
					array('class' => 'prev btn btn-default','escape'=>false),
					null,
					array('class' => 'prev btn btn-default disabled','escape'=>false)
				);
	?>
	</div>
</div>
