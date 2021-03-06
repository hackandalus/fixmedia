<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MY_Controller {

	public function __construct() {
	   parent::__construct();
	}
	public function view($page = 'home') {

		if (!file_exists('application/views/pages/'.$page.'.php')) { show_404(); }
		$titles = array('quienes-somos' => 'Quiénes somos',
						'que-hacemos' => 'Qué hacemos',
						'faq' => 'Preguntas más frecuentes',
						'que-es-fixmedia' => '¿Qué es Fixmedia?',
						'como-funciona' => '¿Cómo funciona?',
						'que-queremos-conseguir' => '¿Qué queremos conseguir?',
						'cofinanciadores' => 'Cofinanciadores',
						'contacto' => 'Contacto',
						'equipo' => 'Equipo',
						'marcador' => 'Usa nuestro marcador',
						'periodistas' => '¿Eres perdiodista?',
						'creadores' => '¿Creas contenido?',
						'top-usuarios' => 'Top fuentes',
						'top-fuentes' => 'Top usuarios',
						'estadisticas' => 'Estadísticas',
						'problemas' => '¿Problemas?',
						'aviso-legal' => 'Información legal y condiciones de uso'
						);
		$data = array();
		$data = get_sidebars_blocks($data);
		$data['page_title'] = $titles[$page];
		$data['main_content'] = 'pages/' . $page;

		$this->load->view('includes/template', $data);
	}
}