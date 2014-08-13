<?php
/// -------------------------------------------------------------------------------------------------------------------///
global $NOTICE_SUPER_ARRAY;
/// -------------------------------------------------------------------------------------------------------------------///
$or['sameThemeNameORNamespaceExist']			=	tendoo_error('Un thème possédant le même nom ou le même espace nom existe d&eacute;j&agrave;. Veuillez choisir un autre nom ou espace nom.');
$or['project_removed']							=	tendoo_success('Le projet &agrave; correctement &eacute;t&eacute; supprimé.');
$or['unknowProject']							=	tendoo_error('Projet inconnu ou introuvable, ou aucun item chargé.');
$or['itemsUpdated']								=	tendoo_success('Items mis &agrave; jour.');
$or['zipUploaded']								=	tendoo_success('Fichier correctement décompressé.');
/// -------------------------------------------------------------------------------------------------------------------///
$NOTICE_SUPER_ARRAY = $or;
/// -------------------------------------------------------------------------------------------------------------------///

class tendoo_theme_builder_admin_controller
{
	public function __construct($data)
	{
		$this->data						=&	$data;
		__extends($this);
		$this->moduleNamespace			=	$data['module'][0]['NAMESPACE']; // retreive namespace
		$this->notice					=&	$this->notice;
		$this->data['module_dir']		=	MODULES_DIR.$this->data['module'][0]['ENCRYPTED_DIR'];
		$this->lib						=	new tendoo_theme_builder_projet_lib($this->data);
		$this->data['lib']				=&	$this->lib;
		
		$this->tendoo_admin->menuExtendsBefore($this->load->view($this->data['module_dir'].'/views/menu',$this->data,true,TRUE));
		$this->data['inner_head']		=	$this->load->view('admin/inner_head',$this->data,true);
		$this->data['lmenu']			=	$this->load->view(VIEWS_DIR.'/admin/left_menu',$this->data,true,TRUE);
		if(!$this->users_global->isSuperAdmin()	&& !$this->tendoo_admin->adminAccess('modules','widgetsMastering',$this->users_global->current('PRIVILEGE')))
		{
			$this->url->redirect(array('admin','index?notice=access_denied'));
		}
		js_push_if_not_exists('underscore.1.6.0');
	}
	public function index($page	=	1,$action = "",$element	=	'')
	{
		if(array_key_exists('delete_pid',$_GET))
		{
			if($this->lib->deleteProject($_GET['delete_pid']))
			{
				$this->url->redirect(array('admin','open','modules',$this->data['module'][0]['ID'].'?notice=project_removed'));
			}
		}
		$this->data['countProjects']	=	count($this->lib->getMyThemes());
		$this->data['paginate']			=	$this->tendoo->paginate(10,$this->data['countProjects'],1,'bg-color-blue fg-color-white','bg-color-white fg-color-blue',$page,$this->url->site_url(array('admin','open','modules',$this->data['module'][0]['ID'],'index')).'/',$ajaxis_link=null);
		if($this->data['paginate'][3] == FALSE): $this->url->redirect(array('error','code','page404'));endif; // redirect if page incorrect
		$this->data['getProjects']		=	$this->lib->getMyThemes($this->data['paginate'][1],$this->data['paginate'][2]);
		set_page('title','Tendoo Theme Builder &raquo; Tendoo');
		
		$this->data['body']			=	$this->load->view($this->data['module_dir'].'/views/body',$this->data,true,TRUE,$this);
		return $this->data['body'];
	}
	public function new_projet()
	{
		$this->load->library('form_validation',null,null,$this);
		$this->form_validation->set_rules('theme_name','Du nom du thème','trim|required|min_length[3]');
		$this->form_validation->set_rules('theme_author','Du nom de l\'auteur','trim');
		$this->form_validation->set_rules('theme_namespace','Du nom du thème','trim|required|min_length[3]');
		// $this->form_validation->set_rules('theme_app_vers','De la version du thème','trim|numeric|required');
		$this->form_validation->set_rules('theme_tendoo_vers','"Compatible avec tendoo"','trim|numeric');
		$this->form_validation->set_rules('theme_description','De la description du thème','trim');
		if($this->form_validation->run())
		{
			$result	=	$this->lib->publishProjet(
				$this->input->post('theme_name'),
				$this->input->post('theme_namespace'),
				$this->input->post('theme_app_vers'),
				$this->input->post('theme_tendoo_vers'),
				$this->input->post('theme_author'),
				$this->input->post('theme_description')
			);
			if(is_array($result))
			{
				$this->url->redirect(array('admin','open','modules',$this->data['module'][0]['ID'],'edit_project',$result[0]['ID']));
			}
			notice('push',fetch_error($result));
		}		
		set_page('title','Cr&eacute;er un nouveau projet &raquo; 2TB');
		
		$this->data['body']			=	$this->load->view($this->data['module_dir'].'/views/new',$this->data,true,TRUE,$this);
		return $this->data['body'];
	}
	public function edit_project($pid)
	{
		$this->instance->visual_editor->loadEditor();
		
		$this->file->css_url	=	$this->url->main_url().$this->data['module_dir'].'/css/';
		css_push_if_not_exists('lib/codemirror');
		css_push_if_not_exists('addons/hint/show-hint');
		css_push_if_not_exists('jquery-ui-1.10.4.custom.min');
		// css_push_if_not_exists('jquery.textcomplete');
		
		$this->file->js_url		=	$this->url->main_url().$this->data['module_dir'].'/js/';
		js_push_if_not_exists('jquery-ui-1.10.4.custom.min');
		js_push_if_not_exists('jquery.ui-contextmenu.min');
		js_push_if_not_exists('lib/codemirror');
		js_push_if_not_exists('mode/xml/xml');
		js_push_if_not_exists('mode/css/css');
		js_push_if_not_exists('mode/javascript/javascript');
		js_push_if_not_exists('mode/htmlmixed/htmlmixed');
		js_push_if_not_exists('addons/hint/show-hint');
		
		// js_push_if_not_exists('jquery.textcomplete.min');		
		
		js_push_if_not_exists('CONTEXT_MENU');		
		
		$this->data['explorer_dir']		=	'';
		
		$this->data['current_project']	=	$this->lib->getMyThemes($pid);
		if(!$this->data['current_project'])
		{
			$this->url->redirect(array('admin','open','modules',$this->data['module'][0]['ID'].'?notice=unknowProject'));
		}
		
		if($this->lib->editOuput($pid))
		{
			notice('push',tendoo_success('Elements mis &agrave; jour'));
		}
		$this->data['load_head']		=	$this->lib->getOutput('head',$pid);
		$this->data['load_header']		=	$this->lib->getOutput('header',$pid);
		$this->data['load_body']		=	$this->lib->getOutput('body',$pid);
		$this->data['load_footer']		=	$this->lib->getOutput('footer',$pid);
		$this->data['templating']		=	$this->lib->getGlobalTemplating();
		
		set_page('title','Modifier '.$this->data['current_project'][0]['PROJECT_NAME'].' &raquo; 2TB');
		
		$this->data['body']			=	$this->load->view($this->data['module_dir'].'/views/edit',$this->data,true,TRUE,$this);
		return $this->data['body'];
		
	}
	public function items($pid)
	{
		// Code Mirror
		$this->file->css_url	=	$this->url->main_url().$this->data['module_dir'].'/css/';
		css_push_if_not_exists('lib/codemirror');
		css_push_if_not_exists('addons/hint/show-hint');
		css_push_if_not_exists('jquery-ui-1.10.4.custom.min');
		
		$this->file->js_url		=	$this->url->main_url().$this->data['module_dir'].'/js/';
		js_push_if_not_exists('lib/codemirror');
		js_push_if_not_exists('mode/xml/xml');
		js_push_if_not_exists('mode/css/css');
		js_push_if_not_exists('mode/javascript/javascript');
		js_push_if_not_exists('mode/htmlmixed/htmlmixed');
		js_push_if_not_exists('addons/hint/show-hint');
		// End Code Mirror
		
		$this->file->css_url	=	$this->url->main_url().$this->data['module_dir'].'/css/';
		css_push_if_not_exists('jquery-ui-1.10.4.custom.min');
		$this->file->js_url		=	$this->url->main_url().$this->data['module_dir'].'/js/';
		// js_push_if_not_exists('jquery-1.10.2.min');
		js_push_if_not_exists('jquery-ui-1.10.4.custom.min');
		js_push_if_not_exists('jquery.ui-contextmenu.min');
		
		js_push_if_not_exists('CONTEXT_MENU');
		
		
		
		$this->data['current_project']	=	$this->lib->getMyThemes($pid);
		if(!$this->data['current_project'])
		{
			$this->url->redirect(array('admin','open','modules',$this->data['module'][0]['ID'].'?notice=unknowProject'));
		}
		$this->data['items_output']		=	$this->lib->getItemsOutput($pid);
		set_page('title','Modifier '.$this->data['current_project'][0]['PROJECT_NAME'].' &raquo; 2TB');
		$this->data['body']			=	$this->load->view($this->data['module_dir'].'/views/items_list',$this->data,true,TRUE,$this);
		return $this->data['body'];
		
	}
	public function media($pid)
	{
		$this->file->js_url		=	$this->url->main_url().MODULES_DIR.$this->data['module'][0]['ENCRYPTED_DIR'].'/js/';
		js_push_if_not_exists('media_script');
		$this->data['current_project']	=	$this->lib->getMyThemes($pid);
		if(!$this->data['current_project'])
		{
			$this->url->redirect(array('admin','open','modules',$this->data['module'][0]['ID'].'?notice=unknowProject'));
		}
		if(isset($_FILES['file_zip']))
		{			
			if($this->lib->uploadFiles($this->input->post('repository'),'file_zip',$this->data['current_project']))
			{
				notice('push',fetch_error('zipUploaded'));
			}
			else
			{
				notice('push',fetch_error('error_occured'));
			}
		}		
		if(isset($_GET['o'],$_GET['action'],$_GET['pid']))
		{
			$o				=	$_GET['o'];
			$action			=	$_GET['action'];
			$pid			=	$_GET['pid'];
			if($o == 'ajax')
			{
				if($action == 'load_dir')
				{
					$this->data['scan']	=	$this->lib->loadDirectory($this->input->post('dossier'),$pid);
					return array(
						'MCO'		=>		TRUE,
						'RETURNED'	=>		json_encode($this->data['scan'])
					);
				}
				if($action == 'delete_element')
				{
					$this->data['exec']	=	$this->lib->unlinkElement($this->input->post('element'),$pid);
					return array(
						'MCO'		=>		TRUE,
						'RETURNED'	=>		json_encode($this->data['exec'])
					);
				}
				if($action == 'open_element')
				{
					$this->data['exec']	=	$this->lib->openElement($this->input->post('element'),$pid);
					return array(
						'MCO'		=>		TRUE,
						'RETURNED'	=>		json_encode($this->data['exec'])
					);
				}
			}
		}
		$this->data['items_output']		=	$this->lib->getItemsOutput($pid);
		
		set_page('title','Gestion des médias '.$this->data['current_project'][0]['PROJECT_NAME'].' &raquo; 2TB');
		
		$this->data['body']			=	$this->load->view($this->data['module_dir'].'/views/media',$this->data,true,TRUE,$this);
		return $this->data['body'];
		
	}
	public function load_item($pid,$file)
	{
		return  array(
			'MCO'		=>		TRUE,
			'RETURNED'	=>		$this->lib->loadItemsOutPut($pid,$file)
		);
	}
	public function save_items($pid)
	{
		$content		=	'tendoo.notice.alert(\'Projet introuvable, ou aucun item chargé.\',\'warning\');';
		if($this->lib->saveItems($pid))
		{
			$content	=	'tendoo.notice.alert(\'Item mis &agrave; jour.\',\'success\')';
		}
		return  array(
			'MCO'		=>		TRUE,
			'RETURNED'	=>		$content
		);
	}
	public function compile($pid)
	{
		if(isset($_GET['o'],$_GET['action'],$_GET['pid']))
		{
			$action	=	$_GET['action'];
			$pid	=	$_GET['pid'];
			$return	=	$this->lib->compile($action,$pid);
			// 
			return array(
				'MCO'		=>		TRUE,
				'RETURNED'	=>		json_encode($return)
			);
		}
		// Redirect If Project is not available
		$this->__redirectIfNotExists($pid);
		// Loading MediaScript Lib
		$this->file->js_url		=	$this->url->main_url().MODULES_DIR.$this->data['module'][0]['ENCRYPTED_DIR'].'/js/';
		js_push_if_not_exists('media_script');
		// Load Project and project's status
		$this->data['current_project']	=	$this->lib->getMyThemes($pid);
		$this->data['isCompiled']		=	$this->lib->hasCompiledZip($pid);
		
		set_page('title','Compiler le thème "'.$this->data['current_project'][0]['PROJECT_NAME'].'" &raquo; 2TB');
		
		$this->data['body']			=	$this->load->view($this->data['module_dir'].'/views/compile',$this->data,true,TRUE,$this);
		return $this->data['body'];
	}
	public function preview($pid)
	{
		if(isset($_FILES['preview']))
		{

			if($this->lib->uploadFilePreview('preview',$pid))
			{
				notice('push',tendoo_success('Aperçu correctement envoyé.'));
			}
			else
			{
				notice('push',fetch_error('error_occured'));
			}
		}
		if($this->input->post('pj_description'))
		{
			if($this->lib->saveProjectDescription($this->input->post('pj_description'),$pid))
			{
				notice('push',fetch_error('done'));
			}
			else
			{
				notice('push',fetch_error('error_occured'));
			}
		}
		$this->__redirectIfNotExists($pid);
		$this->instance->visual_editor->loadEditor(1);
		
		$this->data['pid_description']	=	$this->lib->getProjectDescription($pid);
		$this->data['current_project']	=	$this->lib->getMyThemes($pid);
		set_page('title','Aperçu et Description "'.$this->data['current_project'][0]['PROJECT_NAME'].'" &raquo; 2TB');
		$this->data['body']			=	$this->load->view($this->data['module_dir'].'/views/preview_body',$this->data,true,TRUE,$this);
		return $this->data['body'];
	}
	private function __redirectIfNotExists($pj)
	{
		$pj	=	$this->lib->getMyThemes($pj);
		if(!$pj)
		{
			$this->url->redirect(array('admin','open','modules',$this->data['module'][0]['ID'].'?notice=unknowProject'));
		}
	}
}
