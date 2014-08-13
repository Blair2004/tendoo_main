<?php
class tendoo_widget_administrator_module_controller
{
	protected 	$data;
	private 	$news;
	private 	$core;
	private 	$tendoo;
	
	public function __construct($data)
	{
		$this->instance					=		get_instance();
		$this->data					=		$data;
	}
}
?>