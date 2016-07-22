<?php
class CustomHelper extends AppHelper {
	public $helpers = array('Html');

	public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);
	}

	public function userFoto( $avatar = null, $size = 'default', $options = array() ){

		$options['class'] = ( isset($options['class']) ? $options['class'].' user-avatar' : 'user-avatar' );
    return $this->Html->image( $this->Html->url(array('controller'=>'usuarios', 'action'=>'foto', $size, $avatar), true), $options );
  }

}
