<?php
class tendoo_store_module_controller
{
	public function __construct($data)
	{
		__extends($this);
		$this->data			=&	$data;
		$this->module_dir	=	MODULES_DIR.$data['module'][0]['ENCRYPTED_DIR'];
		include_once($this->module_dir.'/library.php');
		$this->lib			=	new tendoo_store_lib();
	}
	public function index()
	{
		$this->data['module_content']		=	$this->load->view(MODULES_DIR.$this->data['module'][0]['ENCRYPTED_DIR'].'/views/common_main',$this->data,FALSE,TRUE);
	}
	public function connect()
	{
		if(isset($_POST['site_url'],$_POST['site_name'],$_POST['site_version']))
		{
			// Simulation
			$this->data['tendoo_cms_lastest']	=	array(
				'version'	=>	0.98
			);
			$this->data['tracked_site_url']		=	$site_url		=	$_POST['site_url'];
			$this->data['tracked_site_name']	=	$site_name		=	$_POST['site_name'];
			$this->data['tracked_site_version']	=	$site_version	=	$_POST['site_version'];
			$this->lib->registerSite($site_name,$site_url,$site_version);
			$this->data['module_content']		=	$this->load->view(MODULES_DIR.$this->data['module'][0]['ENCRYPTED_DIR'].'/views/common_connect',$this->data,FALSE,TRUE);
		}
	}
}
?>