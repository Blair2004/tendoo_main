<?php
class tendoo_store_lib
{
	public function __construct()
	{
		__extends($this);
	}
	public function getTrackedSite($start = null,$end = null)
	{
		if(is_numeric($start) && is_numeric($end))
		{
			$this->db->limit($end,$start);
		}
		else if(is_numeric($start) && !is_numeric($end))
		{
			$this->db->limit($end,$start);
		}			
		$query	=	$this->db->get('tendoo_site_tracker');
		$result	=	$query->result_array();
		return $result;
	}
	public function registerSite($site_name,$site_url,$site_version)
	{
		$query	=	$this->db->where('SITE_NAME',$site_name)->where('SITE_URL',$site_url)->get('tendoo_site_tracker');
		$result	=	$query->result_array();
		if($result)
		{
			$datetime	=	$this->instance->date->datetime();
			return $this->db->where('SITE_NAME',$site_name)->where('SITE_URL',$site_url)->update('tendoo_site_tracker',array(
				'LAST_ACTIVITY'			=>	$datetime,
				'STORE_CONNEXION'		=>	(int)$result[0]['STORE_CONNEXION'] + 1
			));
		}
		else
		{
			$datetime	=	$this->instance->date->datetime();
			return $this->db->insert('tendoo_site_tracker',array(
				'SITE_NAME'				=>	$site_name,
				'SITE_URL'				=>	$site_url,
				'INDEXED_SINCE'			=>	$datetime,
				'LAST_ACTIVITY'			=>	$datetime,
				'STORE_CONNEXION'		=>	1
			));
		}
	}
	public function getMyApps($start = null,$ends = null)
	{
		$this->db->where('AUTHOR',$this->users_global->current('ID'));
		if(is_numeric($start) & is_numeric($ends))
		{
			$this->db->limit($end,$start);
		}
		else if(is_numeric($start) && $ends == null)
		{
			$this->db->where('ID',$start);
		}
		$query	=	$this->db->get('tendoo_apps');
		return $query->result_array();
	}
}