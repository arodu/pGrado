<?php
App::uses('Autor', 'PanelAdmin.Model');

/**
 * Autor Test Case
 *
 */
class AutorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.panel_admin.autor',
		'plugin.panel_admin.proyecto',
		'plugin.panel_admin.categoria',
		'plugin.panel_admin.usuario',
		'plugin.panel_admin.sede',
		'plugin.panel_admin.tipo_usuario',
		'plugin.panel_admin.descripcion_usuario',
		'plugin.panel_admin.descripcion_tutor',
		'plugin.panel_admin.log',
		'plugin.panel_admin.descripcion_log',
		'plugin.panel_admin.revision',
		'plugin.panel_admin.categorias_usuario',
		'plugin.panel_admin.perfil',
		'plugin.panel_admin.perfils_usuario',
		'plugin.panel_admin.fase',
		'plugin.panel_admin.estado',
		'plugin.panel_admin.grupo',
		'plugin.panel_admin.programa',
		'plugin.panel_admin.escenario',
		'plugin.panel_admin.tipo_autor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Autor = ClassRegistry::init('PanelAdmin.Autor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Autor);

		parent::tearDown();
	}

}
