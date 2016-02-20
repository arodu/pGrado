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

	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

	public function index(){

	}

	public function file_upload(){
		//debug($this->params['form']);
		$uploaded = $this->params['form'];
		$this->set('uploaded',$uploaded);
		$this->layout = 'vacio';
		//exit();
	}


	public function descargas(){

	}


	public function creditos(){
		$aplicacion = Configure::read('sistema.nombre').' v'.Configure::read('sistema.version.larga');
	}


	private function dispositivo_detect(){
			/*
			$tablet_browser = 0;
			$mobile_browser = 0;
			$body_class = 'desktop';

			if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
			    $tablet_browser++;
			    $body_class = "tablet";
			}

			if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
			    $mobile_browser++;
			    $body_class = "mobile";
			}

			if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
			    $mobile_browser++;
			    $body_class = "mobile";
			}

			$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
			$mobile_agents = array(
			    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
			    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
			    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
			    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
			    'newt','noki','palm','pana','pant','phil','play','port','prox',
			    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
			    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
			    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
			    'wapr','webc','winw','winw','xda ','xda-');

			if (in_array($mobile_ua,$mobile_agents)) {
			    $mobile_browser++;
			}

			if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
			    $mobile_browser++;
			    //Check for tablets on opera mini alternative headers
			    $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
			    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
			      $tablet_browser++;
			    }
			}

			if ($tablet_browser > 0) {
			// Si es tablet has lo que necesites
			   return 'tablet';
			}
			else if ($mobile_browser > 0) {
			// Si es dispositivo mobil has lo que necesites
			   return 'mobil';
			}
			else {
			// Si es ordenador de escritorio has lo que necesites
			   return 'desktop';
			}
			*/
	}

	public function demoPdf(){
		Configure::write('debug',0);
		$this->layout = 'pdf';
		$this->response->type('application/pdf');
		$this->set('title_for_layout','Demostracion');
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


	public function directorio(){
		$this->loadModel('Usuario');
		$this->Usuario->recursive = 0;

		$this->Paginator->settings =  array(
					'contain'=>array('DescripcionUsuario','Sede','TipoUsuario'),
					'limit' => 20
				);

		$usuarios = $this->Paginator->paginate('Usuario',$this->Search->getConditions(null,'Usuario'));

		$sedes = $this->Usuario->Sede->find('list');
		$tipoUsuarios = $this->Usuario->TipoUsuario->find('list');
		$this->set(compact('usuarios','sedes','tipoUsuarios'));
	}



}
