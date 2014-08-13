<?php
class Tendoo_admin extends Libraries
{
	protected $getpages;
	private $heritedObj					=	array(); // 0.9.7
	public function __construct()
	{
		parent::__construct();
		__extends($this);
		$this->instance					=	get_instance();
		if(!isset($this->users_global))
		{
			$this->load->library('users_global');
		}
	}
/**********************************************************************************************************************
												Controlers Methods
**********************************************************************************************************************/
	private $reservedControllers			=	array('admin','login','logoff','install','account','error','registration','tendoo_index');
	public function countPages()
	{
		$query	=	$this->db->get('tendoo_controllers');
		return $query->num_rows();
	}
	public function get_pages($e= '')
	{
		return $this->tendoo->getPage($e);
	}
	public function controller($name,$cname,$mod,$title,$description,$main,$obj = 'create',$id = '',$visible	=	'TRUE',$childOf= 'none',$page_link	=	'',$keywords = '')
	{
		if(in_array($cname,$this->reservedControllers)): return 'cantUserReservedCNames'; endif; // ne peut utiliser les cname reservés.
		if($childOf == strtolower($cname)) : return 'cantHeritFromItSelf' ;endif; // Ne peut être sous menu de lui même
		$currentPosition=	$childOf;
		if($main == 'TRUE' && $childOf != 'none'):return 'cantSetChildAsMain';endif; // Il ne faut pas définir un sous menu comme page principale
		$this		->db->select('*')
					->from('tendoo_controllers');
		$query		=	$this->db->get();
		
		if($query->num_rows > 0)
		{
			foreach($query->result_array() as $q)
			{
				if(strtolower($q['PAGE_CNAME'])	==	strtolower($cname) && $obj == 'create')
				{
					return 'c_name_already_found';
				}
				if(strtolower($q['PAGE_NAMES']) == strtolower($name) && $obj == 'create')
				{
					return 'name_already_found';
				}
				if($q['PAGE_MAIN'] == 'TRUE' && $main == 'TRUE')
				{
					if($main == 'TRUE' && $childOf == 'none')
					{
						$e['PAGE_MAIN']	=	'FALSE';
						$this 	->db->where('ID',$q['ID'])
										->update('tendoo_controllers',$e);
					}
				}
			}
		}
		$options				=	$this->instance->options->get();
		$e['PAGE_CNAME']		=	strtolower($cname);
		$e['PAGE_NAMES']		=	strtolower($name);
		$e['PAGE_TITLE']		=	$title;
		$e['PAGE_DESCRIPTION']	=	$description;
		$e['PAGE_MAIN']			=	$query->num_rows > 0 ? $main == 'TRUE' && $childOf != 'none' ? 'FALSE' : $main : 'TRUE'; // Les sous menu ne devrait pas intervenir en tant que principale.
		$e['PAGE_MODULES']		=	$mod; // SI le controleur doit rediriger vers une page, alors on enregistre la page sinon on enregistre le module.
		$e['PAGE_VISIBLE']		=	$visible;
		$e['PAGE_PARENT']		=	$childOf == $name ? 'none' : $childOf;
		$e['PAGE_LINK']			=	$page_link;
		$e['PAGE_KEYWORDS']		=	$keywords;
		// var_dump($e);
		// Nous créons plus les positions via l'interface PHP, mais directement depuis javaScript
		if($obj == 'create')
		{
			if($this->db->insert('tendoo_controllers',$e))
			{
				$query			=	$this->db->where('PAGE_MAIN','TRUE')->get('tendoo_controllers');
				if($query->num_rows == 0): 		
					return "no_main_controller_created";
				endif;
					return 'controler_created';
			}
		}
		return 'error_occured';
	}
	public function getChildren($child,$compress = FALSE)
	{
		if(is_array($child))
		{
			foreach($child as $g)
			{
				if($compress == FALSE)
				{
				?>
				<li class="dd-item" controllers c_id="<?php echo $g['ID'];?>" c_name="<?php echo $g['PAGE_NAMES'];?>" c_cname="<?php echo $g['PAGE_CNAME'];?>" c_title="<?php echo $g['PAGE_TITLE'];?>">
					<input type="hidden" controller_title name="controller[title][]" value="<?php echo $g['PAGE_TITLE'];?>">
					<input type="hidden" controller_description name="controller[description][]" value="<?php echo $g['PAGE_DESCRIPTION'];?>">
					<input type="hidden" controller_main name="controller[main][]" value="<?php echo $g['PAGE_MAIN'];?>">
					<input type="hidden" controller_module name="controller[module][]" value="<?php echo is_array($g['PAGE_MODULES']) ? $g['PAGE_MODULES'][0]['NAMESPACE'] : $g['PAGE_MODULES'];?>">
					<input type="hidden" controller_parent name="controller[parent][]" value="<?php echo $g['PAGE_PARENT'];?>">
					<input type="hidden" controller_name name="controller[name][]" value="<?php echo $g['PAGE_NAMES'];?>">
					<input type="hidden" controller_cname name="controller[cname][]" value="<?php echo $g['PAGE_CNAME'];?>">
					<input type="hidden" controller_keywords name="controller[keywords][]" value="<?php echo $g['PAGE_KEYWORDS'];?>">
					<input type="hidden" controller_link name="controller[link][]" value="<?php echo $g['PAGE_LINK'];?>">
					<input type="hidden" controller_visible name="controller[visible][]" value="<?php echo $g['PAGE_VISIBLE'];?>">
					<input type="hidden" controller_id name="controller[id][]" value="<?php echo $g['ID'];?>">
					<div class="dd-handle"><?php echo $g['PAGE_NAMES'];?>
						<span id="controller_priority_status">
						<?php
						if($g['PAGE_MAIN'] == 'TRUE')
						{
							?>
							- <small>Index</small>
							<?php
						}
						?>
						</span>
						<span class="controller_name">
						</span>
						<div style="float:right">
							<button class="edit_controller dd-nodrag btn btn-primary btn-sm" type="button"><i class="fa fa-plus"></i></button>
							<button class="remove_controller dd-nodrag btn btn-warning btn-sm" type="button"><i class="fa fa-times"></i></button>												
						</div>
					</div>
					<ol class="dd-list">
						<?php
						$this->getChildren($g['PAGE_CHILDS']);
						?>
					</ol>
				</li>
				<?php
				}
				else
				{
					?><li class="dd-item" controllers c_id="<?php echo $g['ID'];?>" c_name="<?php echo $g['PAGE_NAMES'];?>" c_cname="<?php echo $g['PAGE_CNAME'];?>" c_title="<?php echo $g['PAGE_TITLE'];?>"><input type="hidden" controller_title name="controller[title][]" value="<?php echo $g['PAGE_TITLE'];?>"><input type="hidden" controller_description name="controller[description][]" value="<?php echo $g['PAGE_DESCRIPTION'];?>"><input type="hidden" controller_main name="controller[main][]" value="<?php echo $g['PAGE_MAIN'];?>"><input type="hidden" controller_module name="controller[module][]" value="<?php echo is_array($g['PAGE_MODULES']) ? $g['PAGE_MODULES'][0]['NAMESPACE'] : $g['PAGE_MODULES'];?>"><input type="hidden" controller_parent name="controller[parent][]" value="<?php echo $g['PAGE_PARENT'];?>"><input type="hidden" controller_name name="controller[name][]" value="<?php echo $g['PAGE_NAMES'];?>"><input type="hidden" controller_cname name="controller[cname][]" value="<?php echo $g['PAGE_CNAME'];?>"><input type="hidden" controller_keywords name="controller[keywords][]" value="<?php echo $g['PAGE_KEYWORDS'];?>"><input type="hidden" controller_link name="controller[link][]" value="<?php echo $g['PAGE_LINK'];?>"><input type="hidden" controller_visible name="controller[visible][]" value="<?php echo $g['PAGE_VISIBLE'];?>"><input type="hidden" controller_id name="controller[id][]" value="<?php echo $g['ID'];?>"><div class="dd-handle"><?php echo $g['PAGE_NAMES'];?><span id="controller_priority_status"><?php
					if($g['PAGE_MAIN'] == 'TRUE')
					{
						?>- <small>Index</small><?php
					}
					?></span><span class="controller_name"></span><div style="float:right"><button class="edit_controller dd-nodrag btn btn-primary btn-sm" type="button"><i class="fa fa-plus"></i></button> <button class="remove_controller dd-nodrag btn btn-warning btn-sm" type="button"><i class="fa fa-times"></i></button></div></div><ol class="dd-list"><?php 
					$this->getChildren($g['PAGE_CHILDS'],TRUE); ?></ol></li><?php
				}
				
			}
		}
	}
	public function get_controller($id)
	{
		$query	=	$this->db->where('ID',$id)->get('tendoo_controllers');
		return $query->result_array();
	}
	public function createControllers($controller)
	{
		if(is_array($controller))
		{
			$restructured_controllers	=	array();
			$keys	=	array_keys($controller);
			foreach($keys as $v)
			{
				$id		=	0;
				foreach($controller[$v] as $s)
				{
					$restructured_controllers[$id][$v]	=	$controller[$v][$id];
					$id++;
				}
			}
			// Raccourcis
			$s	=	$restructured_controllers;
			// var_dump(count($s));
			// Supprimer les controlleurs déjà existant
			$this->db->where('ID >',0)->delete('tendoo_controllers');
			// Création des nouveaux controlleurs
			if($s)
			{
				$arraynotice	=	array();
				foreach($s as $_s)
				{
					// var_dump($_s);
					$arraynotice[]	=	$this->controller(
						$name	=	$_s['name'],
						$cname	=	$_s['cname'],
						$mod	=	$_s['module'],
						$title	=	$_s['title'],
						$description	=	$_s['description'],
						$main	=	$_s['main'] == '' ? 'FALSE' : $_s['main'],
						$obj 	= 'create',
						$id 	= '',
						$visible	=	$_s['visible'],
						$childOf	= 	$_s['parent'],
						$page_link	=	$_s['link'],
						$keywords 	= 	$_s['keywords']
					);
				}
				// Création terminé
				return $arraynotice;
			}
		}
		return false;
	}
/**********************************************************************************************************************
												End Controlers Methods
**********************************************************************************************************************/
/**********************************************************************************************************************
												File Manager Methods
**********************************************************************************************************************/
	private $system_dir	=	array('tendoo_themes/','tendoo_core/','tendoo_installer/','tendoo_modules/','tendoo_assets/');
	public function drop($source)
	{
		if(in_array($source,$this->system_dir))
		{
			return false;
		}
		if(is_dir($source))
		{
			if($open	=	opendir($source))
			{
				while(($content	=	readdir($open)) !== FALSE)
				{
					if(is_file($source.'/'.$content))
					{
						unlink($source.'/'.$content);
					}
					if(is_dir($source.'/'.$content) && !in_array($content,array('..','.')))
					{
						$this->drop($source.'/'.$content);
					}
				}
				closedir($open);
			}
			rmdir($source);
		}
		return true;
	}
	public function extractor($source,$destination,$dir_limit = 10)
	{
		if(!is_dir($destination))
		{
			mkdir($destination);
		}
		if(is_file($source))
		{
			copy($source,$destination);
			unlink($source);
		}
		if(is_dir($source))
		{
			if($open	=	opendir($source))
			{
				while(($content	=	readdir($open)) !== FALSE)
				{
					if(is_file($source.'/'.$content))
					{
						copy($source.'/'.$content,$destination.'/'.$content);
						unlink($source.'/'.$content);
					}
					if(is_dir($source.'/'.$content) && !in_array($content,array('..','.')))
					{
						if($dir_limit > 0)
						{
							if(!is_dir($destination.'/'.$content))
							{
								mkdir($destination.'/'.$content);
							}
							$this->extractor($source.'/'.$content,$destination.'/'.$content,$dir_limit-1);
						}
						else
						{
							$this->drop($source.'/'.$content);
						}
					}
				}
				closedir($open);
			}
		}
		if(!rmdir($source))
		{
			$this->drop($source);
		}
	}
	public function copy($source,$destination,$dir_limit = 10)
	{
		if(!is_dir($destination))
		{
			mkdir($destination);
		}
		if(is_dir($source))
		{
			if($open	=	opendir($source))
			{
				while(($content	=	readdir($open)) !== FALSE)
				{
					if(is_file($source.'/'.$content))
					{
						copy($source.'/'.$content,$destination.'/'.$content);
					}
					if(is_dir($source.'/'.$content) && !in_array($content,array('..','.')))
					{
						if($dir_limit > 0)
						{
							if(!is_dir($destination.'/'.$content))
							{
								mkdir($destination.'/'.$content);
							}
							$this->copy($source.'/'.$content,$destination.'/'.$content,$dir_limit-1);
						}
					}
				}
				closedir($open);
			}
		}
	}
/**********************************************************************************************************************
												End File Methods
**********************************************************************************************************************/
/**********************************************************************************************************************
												Menu Methods
**********************************************************************************************************************/
	public function menuExtendsAfter($e) // Ajout menu après le menu systeme
	{
		$this->leftMenuExtentionAfter = $e;
	}
	public function menuExtendsBefore($e) // Ajout avant le menu système
	{
		$this->leftMenuExtentionBefore = $e;
	}
	public function parseMenuBefore()
	{
		return $this->leftMenuExtentionBefore;
	}
	public function parseMenuAfter()
	{
		return $this->leftMenuExtentionAfter;
	}
/**********************************************************************************************************************
												End Menu Methods
**********************************************************************************************************************/
/**********************************************************************************************************************
												Module Methods
**********************************************************************************************************************/
	public function getSpeModuleByNamespace($namespace) // La même méthode pour Tendoo ne recupère que ce qui est déjà activé.
	{
		$this->db		->select('*')
							->from('tendoo_modules')
							->where('NAMESPACE',$namespace);
		$query				= $this->db->get();
		$data				= $query->result_array();
		if(count($data) > 0)
		{
			return $data;
		}
		return false;
	}
	public function count_modules()
	{
		$query				=	$this->db->get('tendoo_modules');
		return $query->num_rows();
	}
	public function moduleActivation($id,$install_dir = "using_id")
	{
		if($install_dir == "using_id")
		{
			$mod	=	$this->getSpeMod($id,TRUE);
			if($mod)
			{
				$this->db->where('ID',$id)->update('tendoo_modules',array(
					'ACTIVE'	=>	1
				));
				return $mod;
			}
			return false;
		}
		else if($install_dir	==	"using_namespace")
		{
			$mod	=	$this->getSpeModuleByNamespace($id);
			if($mod)
			{
				$this->db->where('NAMESPACE',$id)->update('tendoo_modules',array(
					'ACTIVE'	=>	1
				));
				return $mod;
			}
			return false;
		}
	}
	public function moduleUnactivate($id,$install_dir = "using_id")
	{
		if($install_dir == "using_id")
		{
			$mod	=	$this->getSpeMod($id,TRUE);
			if($mod)
			{
				$this->db->where('ID',$id)->update('tendoo_modules',array(
					'ACTIVE'	=>	0
				));
				return $mod;
			}
			return false;
		}
		else if($install_dir	==	"using_namespace")
		{
			$mod	=	$this->getSpeModuleByNamespace($id);
			if($mod)
			{
				$this->db->where('NAMESPACE',$id)->update('tendoo_modules',array(
					'ACTIVE'	=>	0
				));
				return $mod;
			}
			return false;
		}
	}
	public function get_modules($start = NULL,$end = NULL)
	{
		$this->db		->select('*')
							->from('tendoo_modules');
		if(is_numeric($start) && is_numeric($end))
		{
			$this->db	->limit($end,$start);	
		}
		$query				= $this->db->get();
		return $query->result_array();
	}
	public function get_bypage_module()
	{
		$this->db		->select('*')
							->where('TYPE','BYPAGE')
							->where('ACTIVE',1) // on recupère uniquement les modules activés.
							->from('tendoo_modules');
		$query				= $this->db->get();
		return $query->result_array();
	}
	// Module methods
	public function uninstall_module($id)
	{
		$Module		=	$this->getSpeMod($id,TRUE);
		if($Module !== FALSE)
		{
			if(is_file(MODULES_DIR.$Module[0]['ENCRYPTED_DIR'].'/uninstall.php'))
			{
				include_once(MODULES_DIR.$Module[0]['ENCRYPTED_DIR'].'/uninstall.php');
			}
			$this->drop(MODULES_DIR.$Module[0]['ENCRYPTED_DIR']);
			return	$this->db->delete('tendoo_modules',array('ID'=>$id));
		}
	}
	public function getSpeMod($value,$byid = TRUE)
	{
		$this->db		->select('*')
							->from('tendoo_modules');
		if($byid == TRUE)
		{
			$this->db->where('ID',$value);
		}
		else
		{
			$this->db->where('NAMESPACE',$value);
		}
							
		$query				= $this->db->get();
		$data				=	 $query->result_array();
		if(count($data) > 0)
		{
			return $data;
		}
		return false;		
	}
	public function getAppImgIco($appNameSpace)
	{
		$app	=	$this->getSpeModuleByNamespace($appNameSpace);
		if($app)
		{
			$file	=	MODULES_DIR.$app[0]['ENCRYPTED_DIR'].'/app_icon.';
			foreach(array('png','jpg','gif') as $g)
			{
				if(is_file($file.$g))
				{
					return $this->url->main_url().$file.$g;
				}
			}
		}
		return false;
	}
	public function getAppIcon()
	{
		$globalMod	=	$this->get_modules();
		$finalIcons	=	array();
		if(is_array($globalMod))
		{
			foreach($globalMod as $modules)
			{
				if($modules['HAS_ICON'] == "1")
				{
					$files	=	MODULES_DIR.$modules['ENCRYPTED_DIR'].'/config/icon_config.php';
					if(is_file($files))
					{
						include($files);
						if(isset($ICON_CONFIG))
						{
							$finalIcons[]	=	$ICON_CONFIG;
						}
					}
				}
			}
			return $finalIcons;
		}
		return false;
	}
	public function saveVisibleIcons($availableIcons)
	{
		$content	=	'$icons	=	array();';
		if(is_array($availableIcons))
		{
			foreach($availableIcons as $a)
			{
				$content	.=	'$icons[]	=	"'.$a.'";';
			}
			return $this->db->update('tendoo_options',array('ADMIN_ICONS'=>$content));
		}
		return false;
	}
	// New 0.9.8
	/*
		Recupère tous les modules qui exécute un script hors interface embarqué.
		Renvoi un tableau avec le nom du module et le code renvoyé par le 
	*/
	public function getModByOutputScripting($start,$end)
	{
		if(is_numeric($start) && is_numeric($end))
		{
			$this->db->limit($end,$start);
		}
		$this->db->where('HAS_OUTPUT_SCRIPTING','1')->get('tendoo_modules');
	}
/**********************************************************************************************************************
												End Module Methods
**********************************************************************************************************************/
/**********************************************************************************************************************
												Privilege Methods
**********************************************************************************************************************/
	public function get_global_info()
	{
		// About Controllers;
		$this	->db->select('*')
					->from('tendoo_controllers');
		$query = $this->db->get();
		// About Themes
		$tendoo_themes_request		=	$this->db->where('ACTIVATED','TRUE')->get('tendoo_themes');
		// Array Error Contener
		$array	=	array();
		if(count($tendoo_themes_request->result_array()) == 0)
		{
			$array[]	= 'no_theme_selected';
		}
		if($query->num_rows == 0)
		{
			$array[]	= 'no_page_set';
		}
		else
		{
			foreach($query->result() as $r)
			{
				$result[]	=	$r->PAGE_MAIN;
			}
			if(!in_array('TRUE',$result))
			{
				$array[]	=	'no_main_page_set';
			}
		}
		$priv	=	$this->getPrivileges();
		if(count($priv) == 0)
		{
			$array[]		=	'no_priv_created';
		}
		return $array;					
	}
	public function countPrivileges()
	{
		return count($this->getPrivileges());
	}
	public function getPrivileges($start = NULL,$end = NULL)
	{
		if($start != NULL && $end != NULL)
		{
			$this->db->limit($end,$start);
		}
		else if($start != NULL && $end == NULL)
		{
			$this->db->where('PRIV_ID',$start);
		}
		$query	=	$this->db->get('tendoo_admin_privileges');
		return $query->result_array();
	}
	public function create_privilege($name,$description,$priv_id,$is_selectable)
	{
		$query	=	$this->db->where('HUMAN_NAME',$name)->get('tendoo_admin_privileges');
		if(count($query->result_array()) == 0)
		{
			$array	=	array(
				'HUMAN_NAME'	=>	$name,
				'DESCRIPTION'	=>	$description,
				'DATE'			=>	$this->instance->date->datetime(),
				'PRIV_ID'		=>	$priv_id,
				'IS_SELECTABLE'	=>	in_array((int)$is_selectable,array(0,1)) ? $is_selectable : 0
			);
			return $this->db->insert('tendoo_admin_privileges',$array);
		}
		return false;
	}
	public function edit_privilege($priv_id,$name,$description,$is_selectable)
	{
		$query	=	$this->db->where('PRIV_ID',$priv_id)->get('tendoo_admin_privileges');
		if(count($query->result_array()) > 0)
		{
			$array	=	array(
				'HUMAN_NAME'	=>	$name,
				'DESCRIPTION'	=>	$description,
				'IS_SELECTABLE'	=>	in_array((int)$is_selectable,array(0,1)) ? $is_selectable : 0
			);
			return $this->db->where('PRIV_ID',$priv_id)->update('tendoo_admin_privileges',$array);
		}
		return false;
	}
	public function deletePrivilege($privid)
	{
		$query	=	$this->db->where('PRIVILEGE',$privid)->get('tendoo_users');
		if(count($query->result_array()) == 0)
		{
			if($this->db->where('PRIV_ID',$privid)->delete('tendoo_admin_privileges'))
			{
				return 'done';
			}
			return 'error_occured';
		}
		return 'cannotDeleteUsedPrivilege';
	}
	public function getPrivId()
	{
		while(true)
		{
			$id	=	rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9);
			$query	=	$this->db->where('PRIVILEGE',$id)->get('tendoo_users');
			if(count($query->result_array()) == 0)
			{
				break;
			}
		}		
		return $id;
	}
	public function hasPriv()
	{
		$priv	=	$this->getPrivileges();
		if(count($priv) > 0)
		{
			return true;
		}
		return false;
	}
	public function addActionToPriv($query,$context)
	{
		eval($query);
		if(count($EVALUABLE) > 0)
		{
			foreach($EVALUABLE as $key	=> $value)
			{
				$type_namespace	=	$context;
				$type_ref_priv	=	$key;
				foreach($value as $_key =>	$_value)
				{
					$type_action	=	$_key;
					$type_action_v	=	$value;
					$query	=	$this->db->where('TYPE_NAMESPACE',$type_namespace)->where('REF_TYPE_ACTION',$type_action)->where('REF_PRIVILEGE',$type_ref_priv)->get('tendoo_privileges_actions');
					if(count($query->result_array()) > 0)
					{
						$this->db->where('TYPE_NAMESPACE',$type_namespace)->where('REF_TYPE_ACTION',$type_action)->where('REF_PRIVILEGE',$type_ref_priv)->update('tendoo_privileges_actions',array(
							'TYPE_NAMESPACE'	=>	$type_namespace,
							'REF_TYPE_ACTION'	=>	$_key,
							'REF_ACTION_VALUE'	=>	$_value,
							'REF_PRIVILEGE'		=>	$type_ref_priv
						));
					}
					else
					{
						$this->db->insert('tendoo_privileges_actions',array(
							'TYPE_NAMESPACE'	=>	$type_namespace,
							'REF_TYPE_ACTION'	=>	$_key,
							'REF_ACTION_VALUE'	=>	$_value,
							'REF_PRIVILEGE'		=>	$type_ref_priv
						));
					}														
				}
			}
			return true;
		}
		return false;
	}
	public function addActionToPriv_MTW($query,$context)
	{
		eval($query);
		if(count($EVALUABLE) > 0)
		{
			foreach($EVALUABLE as $key	=> $value)
			{
				$type_namespace	=	$context;
				$type_ref_priv	=	$key;
				foreach($value as $__key	=>	$__value) // $__key is object_namespace
				{
					foreach($__value as $_key =>	$_value)
					{
						$type_action	=	$_key;
						$type_action_v	=	$value;
						$query	=	$this->db->where('TYPE_NAMESPACE',$type_namespace)->where('REF_TYPE_ACTION',$type_action)->where('REF_PRIVILEGE',$type_ref_priv)->where('OBJECT_NAMESPACE',$__key)->get('tendoo_privileges_actions');
						if(count($query->result_array()) > 0)
						{
							$this->db->where('TYPE_NAMESPACE',$type_namespace)->where('REF_TYPE_ACTION',$type_action)->where('REF_PRIVILEGE',$type_ref_priv)->update('tendoo_privileges_actions',array(
								'TYPE_NAMESPACE'	=>	$type_namespace,
								'REF_TYPE_ACTION'	=>	$_key,
								'REF_ACTION_VALUE'	=>	$_value,
								'OBJECT_NAMESPACE'	=>	$__key,
								'REF_PRIVILEGE'		=>	$type_ref_priv
							));
						}
						else
						{
							$this->db->insert('tendoo_privileges_actions',array(
								'TYPE_NAMESPACE'	=>	$type_namespace,
								'REF_TYPE_ACTION'	=>	$_key,
								'REF_ACTION_VALUE'	=>	$_value,
								'OBJECT_NAMESPACE'	=>	$__key,
								'REF_PRIVILEGE'		=>	$type_ref_priv
							));
						}	
					}
				}
			}
			return true;
		}
		return false;
	}
	public function adminAccess($action_namespace,$action,$privilege,$object_namespace = '')
	{
		$query	=	$this->db->where('OBJECT_NAMESPACE',$object_namespace)->where('TYPE_NAMESPACE',$action_namespace)->where('REF_TYPE_ACTION',$action)->where('REF_PRIVILEGE',$privilege)->get('tendoo_privileges_actions');
		$result = $query->result_array();
		if(count($result) > 0)
		{
			if($result[0]['REF_ACTION_VALUE']	== 'true')
			{
				return true;
			}
			return false;
		}
	}
	public function getValueForPrivNameAndSystem($system,$action,$priv)
	{
		$query	=	$this->db->where('TYPE_NAMESPACE',$system)->where('REF_TYPE_ACTION',$action)->where('REF_PRIVILEGE',$priv)->get('tendoo_privileges_actions');
		$result	=	$query->result_array();
		if(count($result) > 0)
		{
			return $result[0];
		}
		return array();
	}
	public function getModuleAction($mod_namespace)
	{
		$query	=	$this->db->where('MOD_NAMESPACE',$mod_namespace)->get('tendoo_modules_actions');
		$result	=	$query->result_array();
		if(count($result) > 0)
		{
			return $result;
		}
		return false;
	}
	public function createModuleAction($mod_namespace,$action,$action_name,$action_description) // Create action for modules
	{
		$query	=	$this->db
			->where('MOD_NAMESPACE',$mod_namespace)
			->where('ACTION',$action)
			->get('tendoo_modules_actions');
		$result	=	$query->result_array();
		if(count($result) > 0)
		{
			return $this->db
			->where('MOD_NAMESPACE',$mod_namespace)
			->where('ACTION',$action)
			->update('tendoo_modules_actions',array(
				'ACTION_NAME'			=>	$action_name,
				'ACTION_DESCRIPTION'	=>	$action_description
			));
		}
		return $this->db->insert('tendoo_modules_actions',array(
			'MOD_NAMESPACE'			=>	$mod_namespace,
			'ACTION'				=>	$action,
			'ACTION_NAME'			=>	$action_name,
			'ACTION_DESCRIPTION'	=>	$action_description
		));
	}
	public function getPublicPrivilege()
	{
		$query	=	$this->db->where('IS_SELECTABLE',1)->get('tendoo_admin_privileges');
		return $query->result_array();
	}
	public function isPublicPriv($priv_id)
	{
		$priv	=	$this->getPrivileges($priv_id);
		if($priv)
		{
			if($priv[0]['IS_SELECTABLE'] == "1")
			{
				return true;
			}
		}
		return false;
	}
	public function actionAccess($action,$module_namespace) // Vérifie si l'utilisateur actuel peut acceder au module par l'action
	{
		if(!$this->instance->users_global->isSuperAdmin()	&& !$this->adminAccess('modules',$action,$this->instance->users_global->current('PRIVILEGE'),$module_namespace))
		{
			return false;
		}
		return true;
	}
	public function privilegeStats()
	{
		$_privilege	=	array();
		$query		=	$this->db->get('tendoo_admin_privileges');
		$result		=	$query->result_array();
		if(count($result) > 0)
		{
			foreach($result as $r) // Parcours les privileges
			{
				$_query		=	$this->db->where('PRIVILEGE',$r['PRIV_ID'])->get('tendoo_users');
				$_result	=	$_query->result_array();
				$__query	=	$this->db->get('tendoo_users');
				$__result	=	$__query->result_array();
				$_privilege[]	=	array(
					'TOTALUSER'		=>		count($_result),
					'POURCENTAGE'	=>		count($_result) / count($__result) * 100,
					'PRIV_NAME'		=>		$r['HUMAN_NAME']
				);
			}
		}
		return $_privilege;
	}
/**********************************************************************************************************************
												End Privilege Methods
**********************************************************************************************************************/
/**********************************************************************************************************************
												Restore Methods
**********************************************************************************************************************/
	public function cmsRestore($password)
	{
		$query		=	$this->db->where('PRIVILEGE','NADIMERPUS')->get('tendoo_users');
		$result	=	$query->result_array();
		if(count($result) > 0)
		{
			if($result[0]['PASSWORD'] != sha1($password))
			{
				return false;
			}
		}
		else
		{
			return false;
		}
		// Removing modules
		$modules	=	$this->get_modules();
		if(count($modules) > 0)
		{
			foreach($modules as $m)
			{
				$this->uninstall_module($m['ID']);
			}
		}
		$this->db->query('TRUNCATE `tendoo_modules`');
		// Removing Themes
		$themes		=	$this->getThemes();
		if(count($themes) > 0)
		{
			foreach($themes as $t)
			{
				$this->uninstall_theme($t['ID']);
			}
		}
		$this->db->query('TRUNCATE `tendoo_themes`');
		return true;
	}
	public function cmsHardRestore()
	{
		// Removing modules
		$this->db->query('TRUNCATE `tendoo_modules`');
		$this->drop(MODULES_DIR);
		mkdir(MODULES_DIR);
		mkdir(MODULES_DIR.'Tendoo_mod_install');
		// Removing Themes
		$this->db->query('TRUNCATE `tendoo_themes`');
		$this->drop(THEMES_DIR);
		mkdir(THEMES_DIR);
		mkdir(THEMES_DIR.'temp');
		return true;
	}
/**********************************************************************************************************************
												End Restore Methods
**********************************************************************************************************************/
/**********************************************************************************************************************
												Settings Methods
**********************************************************************************************************************/
	private $statsLimitation	=	5;
	public function editSiteName($e)
	{
		return $this->db->update('tendoo_options',array('SITE_NAME'=>$e));
	}
	public function editRegistration($e)
	{
		if(is_numeric($e))
		{
			$e =	($e >= 0 && $e <= 1) ? $e : 0;
		}
		else
		{
			$e	=	0;
		}
		return $this->db->update('tendoo_options',array('ALLOW_REGISTRATION'=>$e));
	}
	public function editLogoUrl($e)
	{
		return $this->db->update('tendoo_options',array('SITE_LOGO'=>$e));
	}
	public function editTimeZone($e)
	{
		return $this->db->update('tendoo_options',array('SITE_TIMEZONE'=>$e));
	}
	public function editTimeFormat($e)
	{
		return $this->db->update('tendoo_options',array('SITE_TIMEFORMAT'=>$e));
	}
	public function editPrivilegeAccess($e)
	{
		$int	=	is_numeric((int)$e) && in_array((int)$e,array(0,1))  ? $e : 0;
		return $this->db->update('tendoo_options',array('ALLOW_PRIVILEGE_SELECTION'=>$int));
	}
	public function editAllowAccessToPublicPriv($e)
	{
			$int	=	is_numeric((int)$e) && in_array((int)$e,array(0,1))  ? $e : 0;
		return $this->db->update('tendoo_options',array('PUBLIC_PRIV_ACCESS_ADMIN'=>$int));
	}
	public function toogleStoreConnexion()
	{
		$option =	$this->db->get('tendoo_options');
		$result	=	$option->result_array();
		if($result[0]['CONNECT_TO_STORE'] == '0')
		{
			$this->db->update('tendoo_options',array(
				'CONNECT_TO_STORE'			=>		'1'
			));
		}
		else
		{
			$this->db->update('tendoo_options',array(
				'CONNECT_TO_STORE'			=>		'0'
			));
		}
	}
/**********************************************************************************************************************
												End Settings Methods
**********************************************************************************************************************/
/**********************************************************************************************************************
												System Methods
**********************************************************************************************************************/
	private $sys_not_array	=	array();
	public function system_not($title,$content,$link,$date,$thumb)
	{
		$this->sys_not_array[]	=	array(
			'TITLE'				=>	$title,
			'CONTENT'			=>	$content,
			'LINK'				=>	$link,
			'DATE'				=>	$date,
			'THUMB'				=>	$thumb
		);
	}
	public function get_sys_not()
	{
		return $this->sys_not_array;
	}
/**********************************************************************************************************************
												End System Methods
**********************************************************************************************************************/
/**********************************************************************************************************************
												Theming Methods
**********************************************************************************************************************/
	public function countThemes()
	{
		$query	=	$this->db->get('tendoo_themes');
		return count($query->result_array());
	}
	public function getThemes($start = NULL,$end = NULL,$filter	=	'using_id')
	{
		if(is_numeric($start) && is_numeric($end))
		{
			$this->db->limit($end,$start);
		}
		else if(is_numeric($start) && !is_numeric($end))
		{
			if($filter == 'using_id')
			{
				$this->db->where('ID',$start);
			}
			else if($filter == 'using_namespace')
			{
				$this->db->where('NAMESPACE',$start);
			}
		}
		$query	=	$this->db->get('tendoo_themes');
		return $query->result_array();
	}
	public function isTheme($id)
	{
		$query	=	$this->db->where('ID',$id)->get('tendoo_themes');
		if(count($query->result_array()) > 0)
		{
			$data	=	$query->result_array();
			if($data[0]['ACTIVATED']	==	'')
			{
				$data[0]['ACTIVATED'] = 'Inactif';
			}
			else if($data[0]['ACTIVATED']	==	'TRUE')
			{
				$data[0]['ACTIVATED'] = 'Actif';
			}
			else
			{
				$data[0]['ACTIVATED'] = 'Statut incompr&eacute;hensible';
			}
			return $data;
		}
		return false;
	}
	public function setDefault($id)
	{
		$theme	=	$this->isTheme($id);
		if($theme)
		{
			$this->db->update('tendoo_themes',array('ACTIVATED'=>''));
			$this->db->where('ID',$id)->update('tendoo_themes',array('ACTIVATED'=>'TRUE'));
			return 'defaultThemeSet';
		}
		return 'unknowTheme';
	}
	public function uninstall_theme($id)
	{
		$theme	=	$this->isTheme($id);
		if($theme)
		{
			if(is_file(THEMES_DIR.$theme[0]['ENCRYPTED_DIR'].'/uninstall.php'))
			{
				include_once(THEMES_DIR.$Module[0]['ENCRYPTED_DIR'].'/uninstall.php');
			}
			$this->db->where('ID',$id)->delete('tendoo_themes');
			$this->drop(THEMES_DIR.$theme[0]['ENCRYPTED_DIR']);
			return 'done';
		}
		return 'unknowTheme';
	}
	public function getThemeThumb($id)
	{
		$access	=	$this->url->main_url().ASSETS_DIR.'img/theme_default.png';
		$theme	=	$this->getThemes($id);
		if($theme)
		{
			if(is_file(THEMES_DIR.$theme[0]['ENCRYPTED_DIR'].'/preview.png'))
			{
				$access	= $this->url->main_url().THEMES_DIR.$theme[0]['ENCRYPTED_DIR'].'/preview.png';
			}
			else if(is_file(THEMES_DIR.$theme[0]['ENCRYPTED_DIR'].'/preview.jpg'))
			{
				$access	= $this->url->main_url().THEMES_DIR.$theme[0]['ENCRYPTED_DIR'].'/preview.jpg';
			}
		}
		return $access;
	}
	public function getActiveTheme()
	{
		$query	=	$this->db->where('ACTIVATED','TRUE')->get('tendoo_themes');
		return $query->result_array();
	}
	public function getActiveThemeSupportedItems()
	{
		// Default Featuring
		$supportedItems		=	array();
		$supportedItems		= 	array(
			'parents_items'	=>	FALSE,
			'childs_items'	=>	FALSE
		);
		// authorised Childs
		$authorisedChildItems	=	array('carousssel','lastestElements','featuredElements','tabShowCase','listElements','galleryShowCase','aboutUs','Partners');
		$authorisedParentItems	=	array('index','blog','contact');
		$active				=	$this->getActiveTheme();
		$compatibilityFile	=	THEMES_DIR.$active[0]['ENCRYPTED_DIR'].'/supported_items.php';
		if(file_exists($compatibilityFile))
		{
			include_once($compatibilityFile);
			if(isset($PARENTS_ITEMS))
			{
				foreach($PARENTS_ITEMS as $PI)
				{
					// Est-ce que ces éléments sont autorisés ?
					if(in_array($PI,$authorisedParentItems))
					{
						$supportedItems['parents_items'][]	=	$PI;
					}
				}
			}
			if(isset($CHILDS_ITEMS))
			{
				foreach($CHILDS_ITEMS as $CI)
				{
					// Est-ce que ces éléments sont autorisés ?
					if(in_array($CI,$authorisedChildItems))
					{
						$supportedItems['childs_items'][]	=	$CI;
					}
				}
			}
		}
		return $supportedItems;
	}
/**********************************************************************************************************************
												End Theming Methods
**********************************************************************************************************************/


/**********************************************************************************************************************
												Install Methods
**********************************************************************************************************************/
	private $leftMenuExtentionBefore 	= '';
	private $leftMenuExtentionAfter 	= '';
	public function encrypted_name()
	{
		$alphabet	=	array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','W','X','Y','Z','1','2','3','4','5','6','7','8','9');
		$index		=	count($alphabet)-1;
		return 'tendoo_app_'.rand(0,9).date('Y').date('m').date('d').date('H').date('i').date('s').$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)].$alphabet[rand(0,$index)];
	}
	// New methods
	private $appAllowedType					=	array('MODULE','THEME');
	private $appModuleAllowedTableField		=	array('NAMESPACE','HAS_WIDGET','HAS_MENU','HAS_API','HAS_ICON','HUMAN_NAME','AUTHOR','DESCRIPTION','TYPE','TENDOO_VERS','ENCRYPTED_DIR','APP_VERS');
	private $appThemeAllowedTableField		=	array('NAMESPACE','HUMAN_NAME','AUTHOR','DESCRIPTION','TENDOO_VERS','ENCRYPTED_DIR','APP_VERS');
	public function tendoo_installer($source)
	{
		$this->load->library('upload',null,null,$this);
		function Unzip($zip)
		{
			$myZip						=	new ZipArchive;
			$myZip->open($zip);
			if($myZip->getStatusString() == 'No error')
			{
				$installDir				=	INSTALLER_DIR;
				$temporaryDir			=	explode('.',$zip);
				$temporaryDir			=	explode('/',$temporaryDir[0]);
				$temporaryDir			=	$temporaryDir[1];
				if(!is_dir($installDir.$temporaryDir))
				{
					mkdir($installDir.$temporaryDir);
				}
				if($myZip->extractTo($installDir.$temporaryDir))
				{
					$notice	=	 fopen($installDir.$temporaryDir.'/notice.html','r');
					$myZip->close();
					unlink($zip);
					return array(
						'temp_dir'		=> $temporaryDir,
						'notice'		=> fread($notice,filesize($installDir.$temporaryDir.'/notice.html'))
					);
				}
				else
				{
					$myZip->close();
					unlink($zip);
					$this->drop($installDir.$temporaryDir);
					return 'errorOccurred';
				}
				$myZip->close();
			}
			$myZip->close();
			if(is_file($zip))
			{
				unlink($zip);
			}
			return 'CorruptedArchive';
		}
		$config['upload_path'] = INSTALLER_DIR;
		$config['allowed_types'] = 'zip';
		$config['max_size']	= '2048';
		$config['encrypt_name']	=	TRUE;
		$this->load->library('upload',$config);
		if($this->upload->do_upload($source))
		{
			$appFile	=	Unzip(INSTALLER_DIR.$this->upload->file_name);
			include_once(INSTALLER_DIR.$appFile['temp_dir'].'/install.php');
			ob_clean(); // remove outputform install.php
			$temp_dir	=	INSTALLER_DIR.$appFile['temp_dir'];
			
			$appInfo	=	$this->datas(); // got declared info datas
			$appInfo['appTableField']['ENCRYPTED_DIR']	=	$appFile['temp_dir'];
			if(in_array($appInfo['appType'],$this->appAllowedType))
			{
				if($appInfo['appType'] == 'MODULE')
				{
					if(count($appInfo['appTableField']) > 0)
					{
						foreach(array_keys($appInfo['appTableField']) as $_appTableField)
						{
							if(!in_array($_appTableField,$this->appModuleAllowedTableField))
							{
								$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
								notice('push',fetch_error('invalidApp'));
								return 'invalidApp';
							}
						}
					}
					else
					{
						$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
						notice('push',fetch_error('invalidApp'));
						return 'invalidApp';
					}
					if($appInfo['appTendooVers'] <= $this->instance->id())
					{
						$this->db		->select('*')
											->from('tendoo_modules')
											->where('NAMESPACE',$appInfo['appTableField']['NAMESPACE']);
						$query = $this->db->get();
						// -----------------------------------------------------------------------------------------
						if($query->num_rows == 0)
						{
							if(is_array($appInfo['appSql']))
							{
								foreach($appInfo['appSql'] as $sql)
								{
									$this->db->query($sql);
								}
							}
							$this->db->insert('tendoo_modules',$appInfo['appTableField']);
							if(is_dir($temp_dir))
							{
								$this->extractor($temp_dir,MODULES_DIR.$appFile['temp_dir']);
								notice('push',fetch_error('moduleInstalled'));
								$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
								
								if(array_key_exists('appAction',$appInfo)) // If this app allow action for privileges
								{
									for($i = 0;$i < count($appInfo['appAction']);$i++)
									{
										if(
										!array_key_exists('mod_namespace',$appInfo['appAction'][$i]) ||
										!array_key_exists('action',$appInfo['appAction'][$i]) ||
										!array_key_exists('action_name',$appInfo['appAction'][$i]) ||
										!array_key_exists('action_description',$appInfo['appAction'][$i])
										)
										{
											notice('push',fetch_error('creatingHiddenControllerFailure'));
											return 'installFailed';
										}
										$this->createModuleAction(
											$appInfo['appAction'][$i]['mod_namespace'],
											$appInfo['appAction'][$i]['action'],
											$appInfo['appAction'][$i]['action_name'],
											$appInfo['appAction'][$i]['action_description']
										);
									}
								}
								if(array_key_exists('appHiddenController',$appInfo)) // Créer un controlleur pendant l'installation
								{
									if(is_array($appInfo['appHiddenController']))
									{
									if(
										!array_key_exists('NAME',$appInfo['appHiddenController']) ||
										!array_key_exists('CNAME',$appInfo['appHiddenController']) ||
										!array_key_exists('ATTACHED_MODULE',$appInfo['appHiddenController']) ||
										!array_key_exists('TITLE',$appInfo['appHiddenController']) ||
										!array_key_exists('DESCRIPTION',$appInfo['appHiddenController'])
										)
										{
											notice('push',fetch_error('creatingHiddenControllerFailure'));
											return 'installFailed';
										}
									$this->controller(
										$appInfo['appHiddenController']['NAME'],
										$appInfo['appHiddenController']['CNAME'],
										$appInfo['appHiddenController']['ATTACHED_MODULE'],
										$appInfo['appHiddenController']['TITLE'],
										$appInfo['appHiddenController']['DESCRIPTION'],
										FALSE,
										'create',
										null,
										'FALSE'
									); // Creating hidden Controller
								}
								}
								return 'moduleInstalled';
							}
						}
						else
						{
							notice('push',fetch_error('module_alreadyExist'));
							$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
							return 'module_alreadyExist';
						}
					}
					notice('push',fetch_error('NoCompatibleModule'));
					$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
					return 'NoCompatibleModule';
				}
				else if($appInfo['appType'] == 'THEME')
				{
					if(count($appInfo['appTableField']) > 0)
					{
						foreach(array_keys($appInfo['appTableField']) as $_appTableField)
						{
							if(!in_array($_appTableField,$this->appThemeAllowedTableField))
							{
								$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
								notice('push',fetch_error('invalidApp'));
								
								return 'invalidApp';
							}
						}
					}
					else
					{
						$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
						notice('push',fetch_error('invalidApp'));
						return 'invalidApp';
					}
					if($appInfo['appTendooVers'] <= $this->instance->id())
					{
						$this->db		->select('*')
											->from('tendoo_themes')
											->where('NAMESPACE',$appInfo['appTableField']['NAMESPACE']);
						$query = $this->db->get();
						// -----------------------------------------------------------------------------------------
						if($query->num_rows == 0)
						{
							if(is_array($appInfo['appSql']))
							{
								foreach($appInfo['appSql'] as $sql)
								{
									$this->db->query($sql);
								}
							}
							$this->db->insert('tendoo_themes',$appInfo['appTableField']);
							if(is_dir($temp_dir))
							{
								$this->extractor($temp_dir,THEMES_DIR.$appFile['temp_dir']);
								notice('push',fetch_error('theme_installed'));
								$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
								return 'theme_installed';
							}
						}
						else
						{
							notice('push',fetch_error('theme_alreadyExist'));
							$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
							return 'theme_alreadyExist';
						}
					}
					notice('push',fetch_error('NoCompatibleTheme'));
					$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
					return 'NoCompatibleTheme';
				}
			}
			$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
			notice('push',fetch_error('invalidApp'));
			return 'invalidApp';
		}
		return 'errorOccured';
	}
	public function tendoo_core_installer($appFile)
	{
		include_once(INSTALLER_DIR.$appFile['temp_dir'].'/install.php');
		ob_clean();
		
		$temp_dir	=	INSTALLER_DIR.$appFile['temp_dir'];
		
		$appInfo	=	$this->datas(); // got declared info datas
		$appInfo['appTableField']['ENCRYPTED_DIR']	=	$appFile['temp_dir'];
		
		if(in_array($appInfo['appType'],$this->appAllowedType))
		{
			if($appInfo['appType'] == 'MODULE')
			{
				if(count($appInfo['appTableField']) > 0)
				{
					foreach(array_keys($appInfo['appTableField']) as $_appTableField)
					{
						if(!in_array($_appTableField,$this->appModuleAllowedTableField))
						{
							$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
							return 'invalidApp';
						}
					}
				}
				else
				{
					$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
					return 'invalidApp';
				}
				if($appInfo['appTendooVers'] <= $this->instance->id())
				{					
					$this->db		->select('*')
										->from('tendoo_modules')
										->where('NAMESPACE',$appInfo['appTableField']['NAMESPACE']);
					$query = $this->db->get();
					// -----------------------------------------------------------------------------------------
					if($query->num_rows == 0)
					{
						if(is_array($appInfo['appSql']))
						{
							foreach($appInfo['appSql'] as $sql)
							{
								$this->db->query($sql);
							}
						}
						$this->db->insert('tendoo_modules',$appInfo['appTableField']);
						if(is_dir($temp_dir))
						{
							$this->extractor($temp_dir,MODULES_DIR.$appFile['temp_dir']);
							notice('push',fetch_error('moduleInstalled'));
							$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
							if(array_key_exists('appAction',$appInfo)) // If this app allow action for privileges
							{
								for($i = 0;$i < count($appInfo['appAction']);$i++)
								{
									if(
									!array_key_exists('mod_namespace',$appInfo['appAction'][$i]) ||
									!array_key_exists('action',$appInfo['appAction'][$i]) ||
									!array_key_exists('action_name',$appInfo['appAction'][$i]) ||
									!array_key_exists('action_description',$appInfo['appAction'][$i])
									)
									{
										return 'addingActionFailure';
									}
									$this->createModuleAction(
										$appInfo['appAction'][$i]['mod_namespace'],
										$appInfo['appAction'][$i]['action'],
										$appInfo['appAction'][$i]['action_name'],
										$appInfo['appAction'][$i]['action_description']
									);
								}
							}
							if(array_key_exists('appHiddenController',$appInfo))
							{
								if(is_array($appInfo['appHiddenController']))
								{
									if(
										!array_key_exists('NAME',$appInfo['appHiddenController']) ||
										!array_key_exists('CNAME',$appInfo['appHiddenController']) ||
										!array_key_exists('ATTACHED_MODULE',$appInfo['appHiddenController']) ||
										!array_key_exists('TITLE',$appInfo['appHiddenController']) ||
										!array_key_exists('DESCRIPTION',$appInfo['appHiddenController'])
										)
									{
										notice('push',fetch_error('creatingHiddenControllerFailure'));
									}
									$this->controller(
										$appInfo['appHiddenController']['NAME'],
										$appInfo['appHiddenController']['CNAME'],
										$appInfo['appHiddenController']['ATTACHED_MODULE'],
										$appInfo['appHiddenController']['TITLE'],
										$appInfo['appHiddenController']['DESCRIPTION'],
										FALSE,
										'create',
										null,
										'FALSE'
									); // Creating hidden Controller
							}
							}
							return 'moduleInstalled';
						}
					}
					else
					{
						$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
						return 'module_alreadyExist';
					}
				}
				$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
				return 'NoCompatibleModule';
			}
			else if($appInfo['appType'] == 'THEME')
			{
				if(count($appInfo['appTableField']) > 0)
				{
					foreach(array_keys($appInfo['appTableField']) as $_appTableField)
					{
						if(!in_array($_appTableField,$this->appThemeAllowedTableField))
						{
							$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
							return 'invalidApp';
						}
					}
				}
				else
				{
					$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
					return 'invalidApp';
				}
				if($appInfo['appTendooVers'] <= $this->instance->id())
				{
					$this->db		->select('*')
										->from('tendoo_themes')
										->where('NAMESPACE',$appInfo['appTableField']['NAMESPACE']);
					$query = $this->db->get();
					// -----------------------------------------------------------------------------------------
					if($query->num_rows == 0)
					{
						if(is_array($appInfo['appSql']))
						{
							foreach($appInfo['appSql'] as $sql)
							{
								$this->db->query($sql);
							}
						}
						$this->db->insert('tendoo_themes',$appInfo['appTableField']);
						if(is_dir($temp_dir))
						{
							$this->extractor($temp_dir,THEMES_DIR.$appFile['temp_dir']);
							$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
							return 'theme_installed';
						}
					}
					else
					{
						$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
						return 'theme_alreadyExist';
					}
				}
				$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
				return 'NoCompatibleTheme';
			}
		}
		$this->drop(INSTALLER_DIR.$appFile['temp_dir']);
		return 'invalidApp';
	}
	public function tendoo_url_installer($link,$type = 'default') // install through a link
	{
		$zip	=	new ZipArchive;
		$file	=	file($link);
		$encryptedName		=	$this->encrypted_name();
		$fileTemporaryName	=	INSTALLER_DIR.$encryptedName.'.zip';
		$file	=	file_get_contents($link);
		$new	=	fopen($fileTemporaryName,'a+');
		fwrite($new,$file);
		fclose($new);
		$file		=	$zip->open($fileTemporaryName);
		if($file)
		{
			mkdir(INSTALLER_DIR.$encryptedName);
			$zip->extractTo(INSTALLER_DIR.$encryptedName);
			$zip->close();
			if($type == 'github')
			{
				$parcour				=	0;
				$openDir_1				=	opendir(INSTALLER_DIR.$encryptedName);
				while(false !==($file	=	readdir($openDir_1)))
				{
					if(is_dir(INSTALLER_DIR.$encryptedName.'/'.$file) && !in_array($file,array('.','..')))
					{
						$this->extractor(INSTALLER_DIR.$encryptedName.'/'.$file,INSTALLER_DIR.$encryptedName);
					}
					if($parcour == 2){
						break;
					}
					$parcour++;
				}
			}
			unlink($fileTemporaryName);
		}
		$appFile				=		array();
		$appFile['temp_dir']	=		$encryptedName;
		return $this->tendoo_core_installer($appFile);
	}
	// Install New Methods
	public function installSession()
	{
		/* 
		/*	START A NEW INSTALL SESSION
		*/
		unset($this->appType);
		unset($this->appVers);
		unset($this->appTendooVers);
		$this->appTableField	=	array();
		$this->appSql			=	array();
		$this->appAction		=	array();
	}
	private $appType;
	public function appType($type)
	{
		$this->appType	=	$type;
	}
	private $appSql	=	array();
	public function appSql($sql)
	{
		$this->appSql[]	=	$sql;
	}
	private $appVers;
	public function appVers($version)
	{
		$this->appVers	=	$version;
	}
	private $appTendooVers;
	public function appTendooVers($version)
	{
		$this->appTendooVers	=	$version;
	}
	private $appTableField	=	array();
	public function appTableField($fields)
	{
		$this->appTableField	=	$fields; // File information such as NAMESPACE, HUMAN_NAME, DESCRIPTION and others
		$this->appTableField['APP_VERS']	=	$this->appVers;
	}
	private $appAction		=	array();
	public function appAction($action)
	{
		$this->appAction[]	=	$action;
	}
	public function datas()
	{
		$finalArray	=	 array(
			'appType'			=>	$this->appType, // [module or theme]
			'appTableField'		=>	$this->appTableField, // got App infos
			'appVers'			=>	$this->appVers, // App version
			'appTendooVers'		=>	$this->appTendooVers, // Tendoo required version.
		);
		if($this->appAction == true)
		{
			$finalArray['appAction']	=	$this->appAction;
		}
		if($this->appSql == true)
		{
			$finalArray['appSql']	=	$this->appSql;
		}
		else
		{
			$finalArray['appSql']	=	false;
		}
		return $finalArray;
	}
}