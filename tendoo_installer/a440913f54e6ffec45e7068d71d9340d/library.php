<?php
	class tendoo_theme_builder_projet_lib 
	{
		private $data;
		private $dir;
		private $projects_dir;
		public function __construct($data)
		{
			__extends($this);
			$this->data			=&	$data;
			$this->dir			=	$this->data['module'][0]['ENCRYPTED_DIR'];
			$this->data['dir']	=&	$this->dir;
			$this->projects_dir	=	$this->dir.'/projects';
			$this->data['projects_dir']	=&	$this->projects_dir;
			if(!is_dir(MODULES_DIR.$this->dir.'/projects'))
			{
				mkdir(MODULES_DIR.$this->dir.'/projects');
			}
		}
		public function getMyThemes($start = null, $end = NULL)
		{
			if(is_numeric($start) && is_numeric($end))
			{
				$this->db->limit($end,$start);
			}
			else if(is_numeric($start) && !is_numeric($end))
			{
				$this->db->where('ID',$start);
			}
			$query	=	$this->db->get('tendoo_theme_builder_projet');
			return $query->result_array();
		}
		public function publishProjet($theme_human_name,$theme_namespace,$theme_app_vers,$theme_tendoo_vers,$theme_author,$theme_description)
		{
			$query	=	$this->db->where('PROJET_NAME',$theme_human_name)
						->or_where('PROJET_NAMESPACE')
						->get('tendoo_theme_builder_projet');
			if(count($query->result_array()) == 0)
			{
				/*
					Création du dossier d'installation
				*/
				if(!is_dir($this->projects_dir.'/'.$theme_namespace))
				{
					mkdir($this->projects_dir.'/'.$theme_namespace);
					ob_start();
					$install_sample				=			include($this->dir.'/tools/sample_install.php');
					$install_final				=			ob_get_flush();
					ob_clean();
					file_put_contents($this->projects_dir.'/'.$theme_namespace.'/install.php',"<?php ".$install_final);
				}
				$date							=			$this->instance->date->datetime();
				/*$this->db->insert('tendoo_theme_builder_projet',array(
					'PROJET_NAME'				=>			$theme_human_name,
					'PROJET_NAMESPACE'			=>			$theme_namespace,
					'PROJET_VERSION'			=>			$theme_app_vers,
					'PROJET_TENDOO_VERSION'		=>			$theme_tendoo_vers,
					'AUTHOR'					=>			$this->users_global->current('ID'),
					'DESCRIPTION'				=>			$theme_description,
					'DATE'						=>			$date,
					'DATE_MOD'					=>			$date,
					'PROJET_LOCATION'			=>			$theme_namespace						
				));	*/
			}
			return 'sameThemeNameORNamespaceExist';
		}
	}