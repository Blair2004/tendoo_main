<?php 
class tendoo_update
{
	// Expect tendoo_code
	function __construct(){
		__extends($this);
		get_instance()->load->library('curl');
		$this->curl	=	get_instance()->curl;
	}
	function check(){
		// Get Repo from Blair2004
		// http://api.github.com/repos/Blair2004/tendoo-cms/releases
		$json_api	=	$this->curl->security(false)->get( 'https://api.github.com/repos/Blair2004/tendoo-cms/releases' );
		if( $json_api != '' ){
			$array_api	=	json_decode( $json_api , true );
			$lastest_release	=	return_if_array_key_exists( 0 , $array_api );
			$release_tag_name	=	return_if_array_key_exists( 'tag_name' , $lastest_release );
			$release_id			=	(float) substr( $release_tag_name , 1 );
			$lastest_release	=	array(
				'id'			=>	$release_id,
				'name'			=>	return_if_array_key_exists( 'name' , $lastest_release ),
				'description'	=>	return_if_array_key_exists( 'body' , $lastest_release ),
				'beta'			=>	return_if_array_key_exists( 'prerelease' , $lastest_release ),
				'published'		=>	return_if_array_key_exists( 'published_at' , $lastest_release ),
				'link'			=>	return_if_array_key_exists( 'zipball_url' , $lastest_release ),
			);
			$tendoo_update[ 'core' ] = $lastest_release;
			set_data( 'tendoo_update' , $tendoo_update );
		}
		$core_id			=	(float) get( 'core_id' );
		if( $tenoo_update = get_data( 'tendoo_update' ) ) // file_exists('tendoo_core/exec_file.php')
		{
			$array	=	array();
			// Setting Core Warning
			if( $release		=	return_if_array_key_exists( 'core' , $tendoo_update ) ){
				if( true ){ // $release[ 'id' ] == $core_id
					if( $release[ 'beta' ] == false ){
						$array[]	=	array(
							'link'		=>	$release[ 'link' ],
							'content'	=>	$release[ 'description' ],
							'title'		=>	$release[ 'name' ],
							'date'		=>	$release[ 'published' ]
						);
					}
				}
			}
			return $array;
		}
		return false;
	}
	/**
		Mise à jour du système sans affecter les modules. peut rendre certains modules incompatible.
		Opère suppression des dossiers "tendoo_assets" et "tendoo_core" et "index.php" remplacé par la version téléchargée.
	**/
	function updateinstance(){
		
	}
}