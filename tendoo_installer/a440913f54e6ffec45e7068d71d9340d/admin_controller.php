<?php
/// -------------------------------------------------------------------------------------------------------------------///
global $NOTICE_SUPER_ARRAY;
/// -------------------------------------------------------------------------------------------------------------------///
$or['sameThemeNameORNamespaceExist']			=	tendoo_error('Un thème possédant le même nom ou le même espace nom existe d&eacute;j&agrave;. Veuillez choisir un autre nom ou espace nom.');
/// -------------------------------------------------------------------------------------------------------------------///
$NOTICE_SUPER_ARRAY = $or;
/// -------------------------------------------------------------------------------------------------------------------///

class tendoo_theme_builder_admin_controller
{
	public function __construct($data)
	{
		$this->instance						=	get_instance();
		$this->tendoo					=	$this->instance->tendoo;
		$this->moduleNamespace			=	$data['module'][0]['NAMESPACE']; // retreive namespace
		$this->tendoo_admin				=&	$this->instance->tendoo_admin;
		$this->data						=&	$data;
		$this->notice					=&	$this->instance->notice;
		$this->data['module_dir']		=	MODULES_DIR.$this->data['module'][0]['ENCRYPTED_DIR'];
		$this->lib						=	new tendoo_theme_builder_projet_lib($this->data);
		$this->data['lib']				=&	$this->lib;
		
		$this->instance->tendoo_admin->menuExtendsBefore($this->instance->load->view($this->data['module_dir'].'/views/menu',$this->data,true,TRUE));
		$this->data['inner_head']		=	$this->instance->load->view('admin/inner_head',$this->data,true);
		$this->data['lmenu']			=	$this->instance->load->view(VIEWS_DIR.'/admin/left_menu',$this->data,true,TRUE);
		if(!$this->instance->users_global->isSuperAdmin()	&& !$this->tendoo_admin->adminAccess('modules','widgetsMastering',$this->instance->users_global->current('PRIVILEGE')))
		{
			$this->instance->url->redirect(array('admin','index?notice=access_denied'));
		}
	}
	public function index($page	=	1,$action = "",$element	=	'')
	{
		/*$this->instance->file->js_push('jquery-ui-1.8.23.custom.min');
		$this->instance->file->js_url	=	$this->instance->url->main_url().$this->data['module_dir'].'/js/';
		$this->instance->file->js_push('tewi_script');
		
		$this->instance->file->css_url	=	$this->instance->url->main_url().$this->data['module_dir'].'/css/';
		$this->instance->file->css_push('style');*/
		set_page('title','Tendoo Theme Builder &raquo; Tendoo');
		
		$this->data['body']			=	$this->instance->load->view($this->data['module_dir'].'/views/body',$this->data,true,TRUE);
		return $this->data['body'];
	}
}
