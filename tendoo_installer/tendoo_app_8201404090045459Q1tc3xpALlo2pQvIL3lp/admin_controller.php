<?php
/// -------------------------------------------------------------------------------------------------------------------///
global $NOTICE_SUPER_ARRAY;
/// -------------------------------------------------------------------------------------------------------------------///
$or['unknowContactMessage']			=	tendoo_error('Discussion introuvable ou indisponible.');

/// -------------------------------------------------------------------------------------------------------------------///
$NOTICE_SUPER_ARRAY = $or;
/// -------------------------------------------------------------------------------------------------------------------///

class tendoo_store_admin_controller
{
	public function __construct($data)
	{
		__extends($this);
		$this->data						=&	$data;
		
		$this->module_dir				=	MODULES_DIR.$data['module'][0]['ENCRYPTED_DIR'];
		$this->module_namespace			=	$data['module'][0]['NAMESPACE']; // retreive namespace
		$this->module_id				=	$data['module'][0]['ID'];
		include_once($this->module_dir.'/library.php');
		$this->lib						=	new tendoo_store_lib();
		$this->tendoo_admin->menuExtendsBefore($this->load->view($this->module_dir.'/views/menu',$this->data,true,TRUE));
		$this->data['inner_head']		=	$this->load->view('admin/inner_head',$this->data,true);
		$this->data['lmenu']			=	$this->load->view(VIEWS_DIR.'/admin/left_menu',$this->data,true,TRUE);
		
	}
	public function index($page	=	1,$action = "",$element	=	'')
	{
		if($this->tendoo_admin->actionAccess('tendoo_store','tendoo_store_manage') === FALSE)
		{
			$this->url->redirect(array('admin','open','modules',$this->module_id,'index?notice=accessDenied'));
		}
		$this->data['countSite']		=	count($this->lib->getTrackedSite());
		$this->data['paginate']			=	$this->tendoo->paginate(10,$this->data['countSite'],1,'','',$page,$this->url->site_url(array('admin','open','modules',$this->module_id,'index')).'/',$ajaxis_link=null);
		if($this->data['paginate'][3] == FALSE): $this->url->redirect(array('error','code','page404'));endif; // redirect if page incorrect

		$this->data['getSite']		=	$this->lib->getTrackedSite();
		set_page('title',$this->data['module'][0]['HUMAN_NAME'].' - Liste des sites');
		
		$this->data['body']			=	$this->load->view($this->module_dir.'/views/body',$this->data,true,TRUE);
		return $this->data['body'];
	}
	public function apps($page = 'mine',$page = 1)
	{
		if($page == 'submit')
		{
			if($this->tendoo_admin->actionAccess('tendoo_store','tendoo_app_submit') === FALSE)
			{
				$this->url->redirect(array('admin','open','modules',$this->module_id,'index?notice=accessDenied'));
			}
			set_page('title',$this->data['module'][0]['HUMAN_NAME'].' - Liste des sites');
		
			$this->data['body']			=	$this->load->view($this->module_dir.'/views/submit_app',$this->data,true,TRUE);
			return $this->data['body'];
		}
		else if($page == 'mine')
		{
			if($this->tendoo_admin->actionAccess('tendoo_store','tendoo_app_submit') === FALSE)
			{
				$this->url->redirect(array('admin','open','modules',$this->module_id,'index?notice=accessDenied'));
			}
			$this->data['countMyApps']	=	count($this->lib->getMyApps());
			$this->data['paginate']			=	$this->tendoo->paginate(10,$this->data['countMyApps'],1,'','',$page,$this->url->site_url(array('admin','open','modules',$this->module_id,'apps','mine')).'/',$ajaxis_link=null);
			if($this->data['paginate'][3] == FALSE): $this->url->redirect(array('error','code','page404'));endif; // redirect if page incorrect
			
		}
		else
		{
			$this->url->redirect(array('error','code','page404'));
		}
	}
}
