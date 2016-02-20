<?php
/**
 * Helper for Showing the use of Captcha*
 * @author     Arvind Kumar
 * @link       http://www.devarticles.in/
 * @copyright  Copyright © 2014 http://www.devarticles.in/
 * @version 2.5 - Tested OK in Cakephp 2.5.4
 */
class CaptchaHelper extends AppHelper {

/**
 * helpers
 *
 * @var array
 */

  public $helpers = array('Html', 'Form');

/**
 * Constructor
 *
 * ### Settings:
 *
 * - Get settings set from Component.
 *
 * @param View $View the view object the helper is attached to.
 * @param array $settings Settings array Settings array
 */
    public function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);
    }

    function render($settings=array()) {
        $out = '';

        $this->settings = array_merge($this->settings, (array)$settings);


        // debug($this->settings); exit();


        $this->settings['reload_txt'] = isset( $this->settings['reload_txt']) ? __($this->settings['reload_txt']) : __('Can\'t read? Reload');

        $this->settings['clabel'] = isset( $this->settings['clabel']) ? __($this->settings['clabel']) : __('Ingrese el código de seguridad que aparece en la Imagen');

        $this->settings['mlabel'] = isset( $this->settings['mlabel']) ? __($this->settings['mlabel']) : __('<p>Answer Simple Math sdfsdf</p>');

        $controller = strtolower( $this->settings['controller']);
        $action =  $this->settings['action'];
        $qstring = array(
            'type' =>   $this->settings['type'],
            'model' =>  $this->settings['model'],
            'field' =>  $this->settings['field']
        );

        $out .= '<div class="panel-reload callout callout-gray required">';

        switch( $this->settings['type']):
            case 'image':

                $qstring = array_merge($qstring, array(
                    'width' =>  $this->settings['width'],
                    'height'=>  $this->settings['height'],
                    'theme' =>  $this->settings['theme'],
                    'length' => $this->settings['length'],
                ));
                    $out .= '<div class="">';


						$out .= $this->Html->link($this->settings['reload_txt'], '#',array(
								'class' => 'btn-reload btn btn-default btn-flat pull-right',
								'escape' => false,
							));


						$out .= $this->Html->image($this->Html->url(
								array('controller'=>$controller, 'action'=>$action, '?'=> $qstring), true),
								array('vspace'=>2,'class'=>'img-reload pull-left img-responsive','alt'=>'Recargar Imagen')
							);




                    $out .= '</div>';

                    $out .= $this->Form->input( $this->settings['model'].'.'. $this->settings['field'], array('autocomplete'=>'off','div'=>false,'label'=>false,'placeholder'=> $this->settings['clabel'],'class'=>'clabel form-control'));
            break;
            case 'math':
                $qstring = array_merge($qstring, array('type'=>'math'));

                if(isset($this->settings['stringOperation']))   {
                    $out .=  $this->settings['mlabel'] .  $this->settings['stringOperation'].' = ?';
                }   else    {
                    $out .= $this->requestAction(array('controller'=>$controller, 'action'=>$action, '?'=> $qstring));
                }
                $out .= $this->Form->input( $this->settings['model'].'.'. $this->settings['field'],array('autocomplete'=>'off','label'=>false,'class'=>'form-control','div'=>array('class'=>'form-group')));
            break;
        endswitch;

        $out .= '</div>';


        return $out;
    }
}