function media(pid){
	/*	_.doAction
		Effectue une requête ajax et reçoit un JSON
		présenté ainsi
			{
				status		:	[],
				alertType	:	[modal,window]
				response	:	[text|object]
				message		:	[error message]
			}
	*/	
	var doAction	=	function(url,callback,object){
		$.ajax(url,{
			beforeSend	:	function(e){
				tendoo.loader.show();
			},
			success		:	function(e){
				tendoo.loader.hide();
				callback(e);
			},
			dataType	:	'json',
			type		:	"POST",
			data		:	object
		})
	}
	
	/*	_.triggerAlert
	*/
	var triggerAlert=	function(object){
		if(object.alertType	==	'notice'){
			if(_.inArray(object.status,['warning','success','danger','info']))
			{
				tendoo.notice.alert(object.message,object.status);
			}			
		};
		if(object.alertType	==	'modal'){
			if(_.inArray(object.status,['warning','success','danger','info']))
			{
				tendoo.modal.alert(object.message,object.status);
			}			
		};
	};
	/*	_.refreshDom
	*/
	var refreshDom	=	function(e){
		$('.explored_dir').remove();
		$('.explorer_panel').append('<table class="table table-hover table-striped m-b-none text-sm explored_dir"></table>');
		$('.explored_dir').html(
		'<thead>'+
			'<tr>'+
				'<td width="10"><input type="checkbox"></td>'+
				'<td width="400">Nom du fichier</td>'+
				'<td width="20">Type</td>'+
				'<td width="20">Opération</td>'+
				'<td>Taille</td>'+
			'</tr>'+
		'</thead>'+
		'<tbody></tbody>'
		);
		_.each(e.response,function(x,y){
			if(!_.inArray(x,['.','..']))
			{
				if(x.type == "fichier")
				{
					$('.explored_dir').find('tbody').append(
					'<tr>'+
						'<td>'+
							'<input type="checkbox" name="'+x.name+'">'+
						'</td>'+
						'<td>'+
							'<a href="javascript:void(0)" data-action="open" data-dir="'+x.dir+'" data-url="'+x.dir+'/'+x.name+'">'+x.title+'</a>'+
						'</td>'+
						'<td>'+
							'<a href="javascript:void(0)">'+x.type+'</a>'+
						'</td>'+
						'<td>'+
							'<a href="javascript:void(0)" data-action="delete" data-url="'+x.dir+'/'+x.name+'">Supprimer</a>'+
						'</td>'+
						'<td>'+
							x.size+
						'</td>'+
					'</tr>'
					);
				}
				else
				{
					$('.explored_dir').find('tbody').append(
					'<tr>'+
						'<td>'+
							'<input type="checkbox" name="'+x.name+'">'+
						'</td>'+
						'<td>'+
							'<a href="javascript:void(0)" data-action="explore" data-dir="'+x.dir+'" data-url="'+x.dir+'/'+x.name+'">'+x.title+'</a>'+
						'</td>'+
						'<td>'+
							'<a href="javascript:void(0)">'+x.type+'</a>'+
						'</td>'+
						'<td>'+
							'<a href="javascript:void(0)" data-action="delete" data-url="'+x.dir+'/'+x.name+'">Supprimer</a>'+
						'</td>'+
						'<td>'+
							'<a href="javascript:void(0)"></a>'+
						'</td>'+
					'</tr>'
					);
				}
			}
		})
	}
	
	/*	_.attachEvent
	*/
	var attachEvent	=	function(){
		// FILE EXPLORER
		if($('[fExplorer]').length > 0)
		{
			$('[fExplorer]').bind('submit',function(){
				// récupération de nom du dossier a explorer.
				datas	=	_.object(['dossier'], [$('[name="dossier"]').val()]);
				doAction($(this).attr("action"),function(e){
					// Do alert by itself
					triggerAlert(e);
					// end Alert By itselft
					// Rafraichir le DOM
					refreshDom(e);
					// Attacher les évènements
					bindUrl();
				},datas)
				return false;
			})
		}
		// COMPILER SCRIPT
		if($('#start_compilation').length >  0)
		{
			var animInterval;
			var __stopCompilation	=	function(error_status){
				if(typeof error_status == 'undefined')
				{
					__pushStatus('-	La création du fichier compressé à échoué. Veuillez recommencer le procéssus');
				}
				else
				{
					__pushStatus(error_status);
				}
				process_launched	=	false;
				clearInterval(animInterval);
			};
			var __pushStatus		=	function(e){
				$('#compile_status').append('<h5>'+e+'</h5>');
			};
			
			// Create Zip file + Assets
			var __step				=	function(event){
				if(_.isArray(event.status))
				{
					if(tools.isDefined(event.status))
					{
						_.each(event.status, function(value,y){
							__pushStatus(value);
						});
					}
				}
				process_launched	=	false; // Should be True
				doAction('?o=ajax&action='+event.action+'&pid='+pid,function(e){
					triggerAlert(e);
					if(e.status == 'success')
					{
						if(_.isArray(e.message))
						{
							_.each(e.message, function(value,y){
								__pushStatus(value);
							});
						}
						else
						{
							__pushStatus(e.message);
						}
						if(e.response.goto == 'finish')
						{
							var message =	'- Compilation terminée...';
							__pushStatus(message);
							return true;
						}
						else
						{
							__step({
								action	:	e.response.goto
							},e); // Adding Assets
						}
					}
					else if(e.status == 'warning')
					{
						__stopCompilation();
					}
				},{});
			};
			var process_launched	=	false;
			$('#start_compilation').bind('click',function(){
				if(process_launched == false)
				{
					$('#compile_status').html('');
					__step({
						action	:	"boot",
						status	:	[
							'- Compilation en cours<span id="anim">...</span>',
							'- Création du Zip et des fichiers de base<span id="anim">...</span>'
						]
					}); // Create Zip file
				}
				else
				{
					tendoo.notice.alert('Le procéssus vient d\'être lancé, veuillez patientez que ce dernier se termine.','warning');
				}
			});
		}
	}
	
	/* 	_.bindUrl
		Ecoute les liens et attache les évènements de parcours, de suppresion, ou d'édition
	*/
	var bindUrl	=	function (){
		$('.explored_dir').find('a[data-url]').bind('click',function(){
			if($(this).data('action') == 'explore')
			{
				newData	=	_.object(['dossier'], [$(this).data('url')]);
				doAction("?o=ajax&action=load_dir&pid="+pid,function(e){
					triggerAlert(e);
					refreshDom(e);
					bindUrl();
				},newData);
			}
			// Supprimer un élément
			else if($(this).data('action') == 'delete')
			{
				if(confirm('Souhaitez-vous supprimer cet élément ?'))
				{
					var $this	=	$(this);
					newData	=	_.object(['element'], [$(this).data('url')]);
					doAction("?o=ajax&action=delete_element&pid="+pid,function(e){
						triggerAlert(e);
						if(e.status == 'success')
						{
							$this.closest('tr').fadeOut(500,function(){
								$(this).remove();
							});
						}
					},newData);
				}
			}
			// Open File on Read Only Mode
			else if($(this).data('action') == 'open')
			{
				var $this	=	$(this);
				newData	=	_.object(['element'], [$(this).data('url')]);
				doAction("?o=ajax&action=open_element&pid="+pid,function(e){
					triggerAlert(e);
					if(e.response.action == 'openFileReader')
					{
						tendoo.window.title('Editeur 2TB').show(
							'<div class="wrapper">'+
								'<form class="form">'+
									'<textarea class="form-control" rows="20">'+e.response.content+'</textarea>'+
								'</form>'+
							'</div>'
						);
					}
					if(e.response.action == 'openMediaViewer')
					{
						var width, height;
						$('<img/>').attr('src',e.response.link).load(function(){
							// Si plus volumineux que l'écran
							width	=	this.width >= device.height ? device.height - 20 : this.width;
							height	=	this.heigth;
							tendoo.window.size(width+50,height+20).title('Visualisateur de média 2TB').show(
								'<div class="wrapper">'+
									'<img src="'+e.response.link+'" alt="image">'+
									'<hr class="line line-dashed">'+
									/*'<form class="form">'+
										'<div class="form-group">'+
											'<input type="button" class="btn btn-warning" value="Supprimer">'+
										'</div>'+
									'</form>'+	*/
								'</div>'
							);
						});
					}
				},newData);
			}
		});
	}
	// 	Start Event
	if(typeof pid == 'undefined')	{
		console.log('Project sans identifiant initialisé. L\'objet n\'a pas pu être initialisé');
		return false;
	}
	
	attachEvent();
};
