<?php
	class tendoo_theme_builder_projet_lib 
	{
		private $data;
		private $dir;
		private $projects_dir;
		private $allowed_dir	=	array('css','js','img');
		public function __construct($data)
		{
			__extends($this);
			$this->data			=&	$data;
			$this->dir			=	MODULES_DIR.$this->data['module'][0]['ENCRYPTED_DIR'];
			$this->data['dir']	=&	$this->dir;
			$this->projects_dir	=	$this->dir.'/projects';
			$this->data['projects_dir']	=&	$this->projects_dir;
			if(!is_dir($this->dir.'/projects'))
			{
				mkdir($this->dir.'/projects');
			}
			// Global Templating
			include_once($this->dir.'/tools/global_templating.php');
			$this->global_templating	=		$global_templating;
		}
		public function getGlobalTemplating() // ???
		{
			$key	= array_keys($this->global_templating);
			foreach($key as &$v)
			{
				$v	=	str_replace('{','',$v);
				$v	=	str_replace('}','',$v);
			}
			return $key;
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
			// Setting Default App Version while not defined
			$theme_app_vers = $theme_app_vers == FALSE ? 0.1 : $theme_app_vers;
			// Setting Description While not defined
			$theme_description = $theme_description == FALSE ? "Thème sans description" : $theme_description;
			// Setting author You while not defined
			$theme_author = $theme_author == FALSE ? $this->users_global->current('PSEUDO') : $theme_author;
			// Setting tendoo_required_app while not defined
			$theme_description = $theme_description == FALSE ? "Thème sans description" : $theme_description;
			//			
			$theme_namespace	=	$this->instance->string->urilizeText($theme_namespace,'_');
			$query	=	$this->db->where('PROJECT_NAME',$theme_human_name)
						->or_where('PROJECT_NAMESPACE',$theme_namespace)
						->get('tendoo_theme_builder_projet');
			if(count($query->result_array()) == 0)
			{
				/*
					Création du dossier d'installation
				*/
				if(!is_dir($this->projects_dir.'/'.$theme_namespace))
				{
					mkdir($this->projects_dir.'/'.$theme_namespace);
					$theme_dir	=	$this->projects_dir.'/'.$theme_namespace.'/';
					// Creating Install.php
					ob_start();
					$install_sample				=			include($this->dir.'/tools/sample_install.php');
					$install_final				=			ob_get_flush();
					ob_clean();
					file_put_contents($this->projects_dir.'/'.$theme_namespace.'/install.php',"<?php ".$install_final);
					// Creating admin_controller.php
					ob_start();
					$file_sample				=			include($this->dir.'/tools/sample_admin_controller.php');
					$file_final					=			ob_get_flush();
					ob_clean();
					file_put_contents($this->projects_dir.'/'.$theme_namespace.'/admin_controller.php',"<?php ".$file_final);
					// Creating notice.html
					file_put_contents($this->projects_dir.'/'.$theme_namespace.'/notice.html',$theme_description);
					// Creating Library.php
					ob_start();
					$file_sample				=			include($this->dir.'/tools/sample_library.php');
					$file_final					=			ob_get_flush();
					ob_clean();
					file_put_contents($this->projects_dir.'/'.$theme_namespace.'/library.php',"<?php ".$file_final);
					// Creating Dirs
					mkdir($theme_dir.'fonts');
					// Css dir
					mkdir($theme_dir.'css');
						mkdir($theme_dir.'css/globals');
						// sample style.css
						file_put_contents($theme_dir.'css/globals/style.css',"// Sample style");
					mkdir($theme_dir.'js');
						mkdir($theme_dir.'js/globals');
						// sample style.css
						file_put_contents($theme_dir.'js/globals/script.js',"// Sample script");
					mkdir($theme_dir.'extends');
						// sample theme_handler
						ob_start();
						$file_sample				=			include($this->dir.'/tools/sample_theme_handler.php');
						$file_final					=			ob_get_flush();
						ob_clean();
						file_put_contents($theme_dir.'extends/script.php',"<?php ".$file_final);
						mkdir($theme_dir.'extends/items');
							// Copy des items dans le nouveau thème.
							$this->tendoo_admin->copy($this->dir.'/tools/sample_items',$theme_dir.'extends/items');
					mkdir($theme_dir.'images');
					mkdir($theme_dir.'default');
						// sample default. [body],[head],[header],[footer]
						foreach(array('head','header','footer','body') as $e)
						{
							// $e
							ob_start();
							$file_sample				=			include($this->dir.'/tools/sample_'.strtolower($e).'.php');
							$file_final					=			ob_get_flush();
							ob_clean();
							file_put_contents($theme_dir.'default/'.strtolower($e).'.php',"$file_final");
						}
					mkdir($theme_dir.'views');
						// Copy des nouveau éléments
						$this->tendoo_admin->copy($this->dir.'/tools/sample_views',$theme_dir.'views');
				}
				$date							=			$this->instance->date->datetime();
				$this->db->insert('tendoo_theme_builder_projet',array(
					'PROJECT_NAME'				=>			$theme_human_name,
					'PROJECT_NAMESPACE'			=>			$theme_namespace,
					'PROJECT_VERSION'			=>			$theme_app_vers,
					'PROJECT_TENDOO_VERSION'	=>			$theme_tendoo_vers,
					'AUTHOR'					=>			$theme_author,
					'DESCRIPTION'				=>			$theme_description,
					'DATE'						=>			$date,
					'DATE_MOD'					=>			$date,
					'PROJECT_LOCATION'			=>			$theme_namespace						
				));	
				// Récupération des informations du thème crée
				$query	=	$this->db->where('PROJECT_NAME',$theme_human_name)
						->or_where('PROJECT_NAMESPACE',$theme_namespace)
						->get('tendoo_theme_builder_projet');
				$result	=	$query->result_array();
				return $result;
			}
			return 'sameThemeNameORNamespaceExist';
		}
		public function scanTheme($project_namespace,$dir=	'')
		{
			$pdir	=	$this->projects_dir.'/'.$project_namespace.$dir;
			if(is_dir($pdir))
			{
				$array	=	array();
				foreach(scandir($pdir) as $file)
				{
					if(!in_array($file,array('.','..')))
					{
						$array[]	=	array(
							'LOCATION'		=>		$this->projects_dir.'/'.$project_namespace.$dir.'/'.$file,
							'NAME'			=>		$file
						);
					}
				}
				return $array;
			}
			return false;
		}
		public function getOutput($file,$theme)
		{
			$pj	=	$this->getMyThemes($theme);
			if(in_array($file,array('head','header','body','footer')))
			{
				return file_get_contents($this->projects_dir.'/'.strtolower($pj[0]['PROJECT_NAMESPACE']).'/default/'.$file.'.php');
			}
			return false;
		}
		public function editOuput($pid)
		{
			$pj		=	$this->getMyThemes($pid);
			if($pj)
			{
				$post	=	$_POST;
				foreach(array_keys($post) as $key)
				{
					if(in_array($key,array('head','header','footer','body')))
					{
						return file_put_contents($this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'].'/default/'.$key.'.php',$post[$key]);
					}
				}
			}
			return false;
		}
		public function deleteProject($pid)
		{
			$pj	=	$this->getMyThemes($pid);
			if($pj)
			{
				$this->db->where('ID',$pid)->delete('tendoo_theme_builder_projet');
				$this->tendoo_admin->drop($this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE']);
				// Supprimer le fichier Compilé
				if(is_file($this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'].'_compiled.zip'))
				{
					unlink($this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'].'_compiled.zip');
				}
				return true;
			}
			return false;
		}
		public function getItemsOutput($pid)
		{
			$pj	=	$this->getMyThemes($pid);
			if($pj)
			{
				$o	=	array();
				if(is_dir($this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'].'/extends/items'))
				{
					foreach(scandir($this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'].'/extends/items') as $files)
					{
						if(!in_array($files,array('.','..')))
						{
							if(is_file($this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'].'/extends/items/'.$files))
							{
								$id		=	str_replace('.','_',$files);
								$o[]	=	array(
									'NAME'		=>		$files,
									'ID'		=>		$id,
									'CONTENT'	=>		file_get_contents($this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'].'/extends/items/'.$files)
								);
							}
						}
					}
					return $o;
				}
			}
			return false;
		}
		public function loadItemsOutPut($pid,$file)
		{
				$pj							=	$this->getMyThemes($pid);
				if($pj)
				{   
					if(is_file($this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'].'/extends/items/'.$file))
					{
						return $result	=	 (file_get_contents($this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'].'/extends/items/'.$file));
					}
				}
		}
		public function saveItems($pid)
		{
			$pj			=	$this->getMyThemes($pid);
			$pjitems	=	$this->getItemsOutput($pid);
			if($pj)
			{
				// var_dump($_POST);
				foreach(array_keys($_POST) as $k)
				{
					foreach($pjitems as $i)
					{
						if($k == $i['ID'])
						{
							// var_dump($_POST[$i['ID']]);
							return file_put_contents($this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'].'/extends/items/'.$i['NAME'],$_POST[$i['ID']]);
						}
					}
				}
			}
			return false;
		}
		public function uploadFiles($repository,$file,$pj)
		{
			if(in_array($repository,array('css','images','js','fonts')))
			{
				$project_dir_base	=	$this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'];
				$project	=	$this->getMyThemes($pj);
				//				
				if(!is_dir($project_dir_base.'/'.$repository))
				{
					mkdir($project_dir_base.'/'.$repository);
				}
				$config['upload_path'] 		= 	$project_dir_base.'/'.$repository.'/';
				$config['allowed_types'] 	= 	'zip';
				$config['max_size']			= 	'2000';
				$config['file_name']		=	"new_zip_file";
				$config['overwrite']		=	TRUE;
				//
				$this->load->library('upload', $config, null, $this);
				$result	=	$this->upload->do_upload($file);
				if ($result)
				{		
					// Ouverture et décompression
					$zip					=	new ZipArchive;
					$zip->open($project_dir_base.'/'.$repository.'/new_zip_file.zip');
					$zip->extractTo($project_dir_base.'/'.$repository.'/');
					$zip->close();
					// Suppression du fichier envoyé
					unlink($project_dir_base.'/'.$repository.'/new_zip_file.zip');
					return true;
				}
			}
			return false;
		}
		public function loadDirectory($directory,$pj)
		{
			if(!in_array($directory,$this->allowed_dir))
			{
				// return 'unauthorised_dir';
			}
			// Chargement des fichiers contenu dans le dossier (directory) d'un projet (pj)
			$project	=	$this->getMyThemes($pj);
			if(is_dir($this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$directory))
			{
				if($dir		=	opendir($this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$directory))
				{
					$scan	=	scandir($this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$directory);
					$url	=	$this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$directory;
					$final	=	array();
					foreach($scan as $s)
					{
						if(!in_array($s,array('.')))
						{
							if(is_dir($this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$directory.'/'.$s))
							{
								if(!preg_match('#^(\.\.|\w/\.\.)#',$s))
								{
									$final["response"][]	=	array(
										'type'	=>	'dossier',
										'title'	=>	$s == '..' ? '[Dossier Parent]' : $s,
										'name'	=>	$s,
										'dir'	=>	$directory,
										'path'	=>	$this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$directory.'/'.$s,
										'size'	=>	''
									);
								}
							}
							else if(is_file($this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$directory.'/'.$s))
							{
								$final["response"][]	=	array(
									'type'	=>	'fichier',
									'title'	=>	$s,
									'name'	=>	$s,
									'dir'	=>	$directory,
									'path'	=>	$this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$directory.'/'.$s,
									'size'	=>	$this->FileSizeConvert(filesize($this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$directory.'/'.$s))
								);
							}
						}					
					}
					$final['status']		=	'success';
					$final['message']		=	'chargement terminé';
					$final['alertType']		=	'notice';
					return $final;
				}
			}	
			return array(
				'status'	=>	'error',
				'message'	=>	'Cet élément est inaccésible ou introuvable.',
				'alertType'	=>	'window',
				'response'	=>	''
			);
		}
		public function FileSizeConvert($bytes)
		{
			$bytes = floatval($bytes);
			$arBytes = array(
				0 => array(
				"UNIT" => "TB",
				"VALUE" => pow(1024, 4)
				),
				1 => array(
				"UNIT" => "GB",
				"VALUE" => pow(1024, 3)
				),
				2 => array(
				"UNIT" => "MB",
				"VALUE" => pow(1024, 2)
				),
				3 => array(
				"UNIT" => "KB",
				"VALUE" => 1024
				),
				4 => array(
				"UNIT" => "B",
				"VALUE" => 1
				)
			);
			foreach($arBytes as $arItem)
			{
				if($bytes >= $arItem["VALUE"])
				{
					$result = $bytes / $arItem["VALUE"];
					$result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
					break;
				}
			}
			return $result;
		}
		public function unlinkElement($element,$pj)
		{
			$project	=	$this->getMyThemes($pj);
			if($project)
			{
				if(is_file($this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$element))
				{
					if(unlink($this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$element))
					{
						return array(
							'status'	=>	'success',
							'message'	=>	'L\'élément à correctement été supprimé.',
							'alertType'	=>	'notice',
							'response'	=>	''
						);
					}
				}
				else if(is_dir($this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$element))
				{
					if($this->tendoo_admin->drop($this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$element))
					{
						return array(
							'status'	=>	'success',
							'message'	=>	'Le dossier et son contenu ont correctement été supprimés.',
							'alertType'	=>	'notice',
							'response'	=>	''
						);
					}
				}
			}
			return array(
				'status'	=>	'warning',
				'message'	=>	'Cet élément ne peut être supprimé, car il est inaccéssible ou introuvable.',
				'alertType'	=>	'modal',
				'response'	=>	''
			);
		}
		public function openElement($element,$pj)
		{
			$project	=	$this->getMyThemes($pj);
			if($project)
			{
				$file	=	pathinfo($this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$element);
				if(in_array(strtolower($file['extension']),array('js','css','php','html','xml','txt','md')))
				{
					return array(
						'status'	=>	'success',
						'message'	=>	'Ouverture du fichier.',
						'alertType'	=>	'notice',
						'response'	=>	array(
							'action'	=>		'openFileReader',
							'content'	=>		file_get_contents($this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$element)							
						)
					);
				}
				else if(in_array(strtolower($file['extension']),array('png','jpeg','gif','jpg','bmp')))
				{
					return array(
						'status'	=>	'success',
						'message'	=>	'Ouverture du média.',
						'alertType'	=>	'notice',
						'response'	=>	array(
							'action'	=>		'openMediaViewer',
							'link'		=>		$this->url->main_url().$this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$element,
							'content'	=>		file_get_contents($this->projects_dir.'/'.$project[0]['PROJECT_NAMESPACE'].'/'.$element)							
						)
					);
				}
				return array(
					'status'	=>	'success',
					'message'	=>	'Cet élément ne peut être ouvert, car il est inaccéssible, introuvable ou non supporté.',
					'alertType'	=>	'modal',
					'response'	=>	$file
				);
			}
			return array(
				'status'	=>	'warning',
				'message'	=>	'Cet élément ne peut être ouvert, car il est inaccéssible ou introuvable.',
				'alertType'	=>	'modal',
				'response'	=>	''
			);
		}
		public function getProjectDescription($pj)
		{
			$pj	=	$this->getMyThemes($pj);
			if($pj)
			{
				$project_dir	=	$this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'];
				return file_get_contents($project_dir.'/notice.html');
			}
			return false;
		}
		public function saveProjectDescription($element,$pj)
		{
			$pj	=	$this->getMyThemes($pj);
			if($pj)
			{
				$project_dir	=	$this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'];
				file_put_contents($project_dir.'/notice.html',$element);
				return true;
			}
			return false;
		}
		public function uploadFilePreview($input_name,$pj)
		{
			$pj	=	$this->getMyThemes($pj);
			if($pj)
			{
				// Suppression des anciennes images.
				foreach(array('png','jpg') as $extension)
				{
					if(is_file($this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'].'/preview.'.$extension))
					{
						unlink($this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'].'/preview.'.$extension);
					}
				}
				$project_dir				=	$this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'];
				$config['upload_path'] 		= 	$project_dir;
				$config['allowed_types'] 	= 	'jpg|png';
				$config['max_size']			= 	'1000';
				//$config['max_width']  		= 	'710';
				//$config['max_height']  		= 	'200';
				$config['file_name']		=	'preview';
				$config['overwrite']		=	true;
				$this->load->library('upload',$config,null,$this);
				if ($this->upload->do_upload($input_name))
				{
					return true;
				}
			}
			return false;
		}
		public function compile($status,$pj)
		{
			function __copyFiletoZip($dir,$zipObject,$currentDir)
			{
				if(is_dir($dir))
				{
					$openDir	=	opendir($dir);
					while (false !== ($entry = readdir($openDir))) {
						if(!in_array($entry,array('.','..')))
						{
							if(is_dir($dir.'/'.$entry))
							{
								// Looping Dir
								__copyFiletoZip($dir.'/'.$entry,$zipObject,$currentDir.'/'.$entry);
							}
							else if(is_file($dir.'/'.$entry))
							{
								// Getting File Datas
								$fileData	=	pathinfo($dir.'/'.$entry);
								$zipObject->addFile($dir.'/'.$entry,$currentDir.'/'.$fileData['filename'].'.'.$fileData['extension']);
							}
						}
					}
					return true;
				}
				return false;
			}
			function __startTemplating($dir,$zipObject,$tObject,$templatingArray,$currentDir)
			{
				if(is_dir($dir))
				{
					$openDir	=	opendir($dir);
					while (false !== ($entry = readdir($openDir))) {
						if(!in_array($entry,array('.','..')))
						{
							if(is_dir($dir.'/'.$entry))
							{
								// Looping Dir
								__startTemplating($dir.'/'.$entry,$zipObject,$tObject,$templatingArray,$currentDir.'/'.$entry);
							}
							else if(is_file($dir.'/'.$entry))
							{
								// Getting File Datas
								$fileData	=	pathinfo($dir.'/'.$entry);
								$currentFile=	file_get_contents($dir.'/'.$entry);
								
								$fileTemplated	=	$tObject->templating($currentFile,$templatingArray);
								$zipObject->addFromString($currentDir.'/'.$fileData['filename'].'.'.$fileData['extension'],$fileTemplated);
							}
						}
					}
				}
			}
			$pj	=	$this->getMyThemes($pj);
			if($pj)
			{
				$p_dir	=	$this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'];
				$p_zip	=	$this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'].'_compiled.zip';
				if($status == 'boot')
				{
					if(is_numeric(file_put_contents($p_zip,'')))
					{
						$zip	=	new ZipArchive();
						$zip->open($p_zip,ZipArchive::OVERWRITE);
						// Add CSS files
						__copyFiletoZip($p_dir.'/css',$zip,'css');
						// Add JS files
						__copyFiletoZip($p_dir.'/js',$zip,'js');
						// Add CSS files
						__copyFiletoZip($p_dir.'/images',$zip,'images');
						// Add Base File
						$dir	=	opendir($p_dir);
						while (false !== ($entry = readdir($dir))) 
						{
							if(!in_array($entry,array('.','..')))
							{
								if(is_file($p_dir.'/'.$entry))
								{
									$fileData	=	pathinfo($p_dir.'/'.$entry);
									$zip->addFile($p_dir.'/'.$entry,$fileData['filename'].'.'.$fileData['extension']);
								}
							}
						}
						//
						return array(
							'status'	=>	'success',
							'message'	=>	'- Création et copie des fichiers medias terminé',
							'alertType'	=>	'notice',
							'response'	=>	array(
								'goto'		=>		'templatage'
							)
						);
					}
					else
					{
						return array(
							'status'	=>	'warning',
							'message'	=>	'- Une erreur s\'est produite durant la création du fichier Zip.<br> Il est possible que : <ul><li>Le chemin soit inaccessible</li><li>L\'espace disponible est insuffisant.</li></ul>',
							'alertType'	=>	'modal',
							'response'	=>	''
						);
					}
					
				}
				else if($status == 'templatage')
				{
					// 
					if(is_file($p_zip))
					{
						$zip	=	new ZipArchive();
						$zip->open($p_zip);
						$script_file	=	file_get_contents($p_dir.'/extends/script.php');
						// Ajouts des fichiers css et js globaux.
						foreach(array('css','js') as $dir)
						{
							foreach(
								array(
									'globals',
									'caroussel',
									'galleryshowcase',
									'ontopcontent',
									'lastestelement',
									'singleblogpost',
									'blogpost'
								) as $sub_dir)
							{
								if(is_dir($p_dir.'/'.$dir.'/'.$sub_dir))
								{
									$globals_dir		=	scandir($p_dir.'/'.$dir.'/'.$sub_dir);
									/*if($dir == 'js')
									{
									var_dump($globals_dir);
									die();
									}*/
									$final_global_str	=	"";
									if(is_array($globals_dir))
									{
										// Parcours des répertoires disponible dans le dossier css et js. Les sous dossier sont ignorés
										foreach($globals_dir as $file)
										{
											if(is_file($p_dir.'/'.$dir.'/'.$sub_dir.'/'.$file))
											{
												// Retire .css et .js à la fin puisque css_push_if_not_existe ajoute déjà l'extension
												$file	=	str_replace('.css','',$file);
												$file	=	str_replace('.js','',$file);
												if($dir == 'css')
												{
													$final_global_str .= "		theme_cpush(\"".$dir."/".$sub_dir."/".$file."\");\n";
												}
												else
												{
													$final_global_str .= "		theme_jpush(\"".$dir."/".$sub_dir."/".$file."\");\n";
												}
											}
										}
										// Ajout des fichiers repertoriés en fonction de leur dossier dans la méthode __construct() ou un item.
										if($sub_dir	==	'globals')
										{
											if($dir	==	"css")
											{
												$script_file	=	str_replace('/*PUSH_GLOBAL_CSS*/',$final_global_str,$script_file);
											}
											else
											{
												$script_file	=	str_replace('/*PUSH_GLOBAL_JS*/',$final_global_str,$script_file);
											}
										}
										else if(in_array($sub_dir,array('caroussel','galleryshowcase','ontopcontent','lastestelement','singleblogpost','blogpost')))
										{
											if($dir	==	"css")
											{
												$script_file	=	str_replace('/*PUSH_'.strtoupper($sub_dir).'_CSS_IF_NOT_EXISTS*/',$final_global_str,$script_file);
											}
											else
											{
												$script_file	=	str_replace('/*PUSH_'.strtoupper($sub_dir).'_JS_IF_NOT_EXISTS*/',$final_global_str,$script_file);
											}
										}
									}
								}
							}
						}
						$zip->addFromString('extends/script.php',$script_file);
						// Starting Templating On defaults
						__startTemplating($p_dir.'/default',$zip,$this,$this->global_templating,'default');
						
						return array(
							'status'	=>	'success',
							'message'	=>	'- Templatage et copie des fichiers terminés',
							'alertType'	=>	'notice',
							'response'	=>	array(
								'goto'		=>		'templatingItems'
							)
						);
					}
				}
				else if($status == 'templatingItems')
				{
					if(is_file($p_zip))
					{
						$zip	=	new ZipArchive();
						$zip->open($p_zip);
						// Starting Templating On defaults
						__startTemplating($p_dir.'/extends/items',$zip,$this,$this->global_templating,'extends/items');
						
						return array(
							'status'	=>	'success',
							'message'	=>	'- Templatage des items parents et enfants terminés',
							'alertType'	=>	'notice',
							'response'	=>	array(
								'goto'		=>		'finish'
							)
						);
					}
				}
			}
			return	array(
				'status'	=>	'warning',
				'message'	=>	'Une erreur est survenue durant l\'exécution du script. La requête n\'a pas pu être traitée.',
				'alertType'	=>	'modal',
				'response'	=>	'null'
			);
		}
		public function templating($string,$array)
		{
			if($array)
			{
				// Templating Simple Matches
				foreach($array as $key	=>	$value)
				{
					$string	=	str_replace($key,$value,$string);
				}
				// Templating Advanced match with preg_replace
				// Index Loop Content
				$string		=	preg_replace('#\{index_loop_content\[(.+)\]\}#',"<?php echo word_limiter(strip_tags(\$c['CONTENT']),\$1);?>",$string);
				// OTC Loop Content
				$string		=	preg_replace('#\{index_otc_loop_content\[(.+)\]\}#',"<?php echo word_limiter(\$c['CARTEGORY'],\$1);?>",$string);
				// Lt loop text
				$string		=	preg_replace('#\{index_lt_loop_text\[(.+)\]\}#',"<?php echo word_limiter(\$t['CONTENT'],\$1);?>",$string);
				// Blog post Content Limit
				$string		=	preg_replace('#\{blog_post_loop_content\[(.+)\]\}#',"<?php echo word_limiter(strip_tags(\$p['CONTENT']),$1);?>",$string);
				
				
				return $string;
			}
		}
		public function hasCompiledZip($pj)
		{
			$pj	=	$this->getMyThemes($pj);
			if($pj)
			{
				if(is_file($this->projects_dir.'/'.$pj[0]['PROJECT_NAMESPACE'].'_compiled.zip'))
				{
					return true;
				}
				return false;
			}
		}
	}