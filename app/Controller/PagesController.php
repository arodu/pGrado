<?php
App::uses('AppController', 'Controller');
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
	public $components = array('Paginator','Search');

	public function beforeFilter() {
		parent::beforeFilter();
		// $this->Auth->allow('creditos');
	}

	public function test(){


		// $this->layout = 'ajax';

		/*
		$old_article = "a b c d e \n a b c d e \nk l m n ñ \na b c d e \na b c d e \nk l m n ñ";
		$new_article = "a b c d e \n a b c d e \na b c d e \na b c d e \na b c d e \nf g h i jk l m n ñ";

		//$diff = xdiff_string_diff($old_article, $new_article);
		$diff = xdiff_string_rabdiff($new_article, $old_article);



		if (is_string($diff)) {
			// echo "Diferencias entre los dos artículos:\n";


			$string = xdiff_string_patch ($new_article , $diff );



			debug($old_article);
			debug($new_article);

			debug($diff);
			debug($string);
		}

		exit(); */

	}

	public function index(){

	}

	public function creditos(){
		$aplicacion = Configure::read('sistema.nombre').' v'.Configure::read('sistema.version.larga');
	}


	public function error($num=null){
		switch ($num) {
			case '403':
				throw new ForbiddenException(); break;

			case '404':
				throw new NotFoundException(); break;

			case '500':
				throw new InternalErrorException(); break;

			default:
				throw new InternalErrorException(); break;
		}
	}


}
