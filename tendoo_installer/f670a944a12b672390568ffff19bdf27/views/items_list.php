<?php echo $lmenu;?>

<section id="content">
<section class="vbox">
<?php echo $inner_head;?>
<section class="scrollable" id="pjax-container">
    <section class="hbox stretch"> <!-- .aside -->
        <aside class="aside">
            <section class="vbox">
                <section>
                    <section>
                        <section id="mail-nav" class="hidden-xs">
                            <?php include(MODULES_DIR.$module[0]['ENCRYPTED_DIR'].'/views/menu_plus.php');?>
                        </section>
                    </section>
                </section>
            </section>
        </aside>
        <!-- /.aside --> <!-- .aside -->
		<style type="text/css">
		.ui-helper-hidden
		{
			z-index:4000!important;
		}
		</style>
        <aside class="bg-light lter">
            <section class="vbox">
                <section class="scrollable wrapper">
					
					<header class="header">
						<form class="fileLoader" role="form" method="POST">
							<div class="input-group">
							  <select name="loadFile" class="form-control">
				<?php
				if(count($items_output) > 0)
				{
					foreach($items_output as $i)
					{
				?>
				<option value="<?php echo $i['NAME'];?>"><?php echo $i['ID'];?></option>
				<?php
					}
				}
				?>
					</select>
							  <span class="input-group-btn">
								<button class="btn btn-default" type="submit">Charger</button>
							  </span>
							</div>
						</form>
						<?php echo $this->notice->parse_notice();?>  <?php echo fetch_error_from_url();?> <?php echo validation_errors(); ?>
					</header>
					<script>
						var editor_area	=	{};
						var loaded_file	=	'';
						$('.fileLoader').submit(function(){
							$.ajax('<?php echo $this->url->site_url(array('admin','open','modules',$module[0]['ID'],'load_item',$current_project[0]['ID']));?>/'+$(this).find('select').val(),{
								success	:	function(e){
									tendoo.notice.alert('Ficher chargé.','success');
									$('.unique_editor')
									.html('')
									.append('<textarea name="" rows="24" id="editor_area" class="file_editor_ide form-control"></textarea>')
									.append('<hr class="line line-dashed">')
									.append('<input type="submit" value="Enregistrer vos modifications" class="btn <?php echo theme_class();?>">');
									$('#editor_area').html(e);
									// Editor Area Used
									editor_area = CodeMirror.fromTextArea(document.getElementById("editor_area"), {
										lineNumbers: true,
										extraKeys: {"Ctrl-Space": "autocomplete"},
										mode: "text/html"
									});
									loaded_file	=	$('[name="loadFile"]').val();
									var headmenu	=	CONTEXT_MENU;
									$(".unique_editor .CodeMirror").contextmenu({
										delegate: "textarea",
										
										menu: headmenu,
										select: function(event, ui) {
											editor_area.replaceSelection(ui.cmd);
											// alert("select " + ui.cmd + " on " + ui.target.text());
										},
										// Handle menu selection to implement a fake-clipboard
										// Implement the beforeOpen callback to dynamically change the entries
										beforeOpen: function(event, ui) {
											//
										}
									});
								}
							});
							return false;
						});
						
					</script>
					
					<hr class="line line-dashed">
					<form method="POST" class="form unique_editor" action="<?php echo $this->url->site_url(array('admin','open','modules',$module[0]['ID'],'save_items',$current_project[0]['ID']));?>">
						<div class="file_editor_ide text-center"><h4>Veuillez choisir et charger un fichier</h4></div>
					</form>
		
				<script>
				$(document).ready(function(){
					$('.unique_editor').submit(function(){
						var object =	_.object([$('[name="loadFile"]').val()],[editor_area.getValue()]);							
						$.ajax($(this).attr('action'),{
							beforeSend	:	function(){
							},
							success		:	function(e){
							},
							type		:	"POST",
							dataType	:	"script",
							data		:	object
						});
						return false;
					});
					$('.heho').addClass('collapse');
				});
				</script>
				</section>
            </section>
        </aside>
        <!-- /.aside --> <!-- .aside --> 
        <!-- /.aside -->
    </section>
    <section> </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="body"></a> </section>
