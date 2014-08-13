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
        <aside class="bg-light lter">
            <section class="vbox">
                <section class="scrollable wrapper">
                    <section class="panel pos-rlt clearfix">
                        <header class="panel-heading text-center">
                            <ul class="nav nav-pills pull-right">
                                <li> <a class="panel-toggle text-muted active" href="javascript:void(0)"> <i class="fa fa-caret-down text-active"></i> <i class="fa fa-caret-up text"></i> </a> </li>
                            </ul>
                            <ul class="toggle-section nav nav-pills pull-left">
                            </ul>
                            Entête (head.php)</header>
                        <div style="min-height: 50px;" id="HEADZONE" class="panel-body clearfix ui-sortable">
                            <form method="POST" class="form">
                            	<hr class="line line-dashed">
                                <textarea id="head_textarea" name="head" style="display:none;"><?php echo $load_head;?></textarea>
                                <hr class="line line-dashed">
                                <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
                            </form>
                            <script>
							$(document).ready(function(){
								$(this).data('showHeadBinded','true');
								var cm	=	CodeMirror.fromTextArea(document.getElementById('head_textarea'),{
									mode				:	"htmlmixed",
									indentWithTabs		:	true,
									lineNumbers			:	true,
									lineWrapping		:	true,
									name				:	"SuperHead"
								});
								/*CodeMirror.showHint(cm,function(cm,e){
									return {
										list	:	["bonjour","bonsoir","salue","non","oui","assia","voila","encore","puis","debout","assis"]
									}
								},{
								});*/
								var headmenu	=	CONTEXT_MENU;
								$("#HEADZONE .CodeMirror").contextmenu({
									delegate: "textarea",
									
									menu: headmenu,
									select: function(event, ui) {
										cm.replaceSelection(ui.cmd);
										// alert("select " + ui.cmd + " on " + ui.target.text());
									},
									// Handle menu selection to implement a fake-clipboard
									// Implement the beforeOpen callback to dynamically change the entries
									beforeOpen: function(event, ui) {
										//
									}
								});
								// 
								var elements =	<?php echo json_encode($templating);?>;
                                // var elements = ['span', 'div', 'h1', 'h2', 'h3'];
								/*$('.CodeMirror textarea').textcomplete([
									{ // html
										mentions: elements,
										match: /\B\{(\w*)$/,
										search: function (term, callback) {
											callback($.map(this.mentions, function (mention) {
												return mention.indexOf(term) === 0 ? mention : null;
											}));
										},
										index: 1,
										replace: function (mention) {
											return '{' + mention + '}';
										}
									}
								]);*/
							});
						
							</script> 
							<style type="text/css">
							.ui-helper-hidden
							{
								z-index:4000!important;
							}
							</style>
                        </div>
                    </section>
					<section class="panel pos-rlt clearfix">
                        <header class="panel-heading text-center">
                            <ul class="nav nav-pills pull-right">
                                <li> <a class="panel-toggle text-muted active" href="javascript:void(0)"> <i class="fa fa-caret-down text-active"></i> <i class="fa fa-caret-up text"></i> </a> </li>
                            </ul>
                            <ul class="toggle-section nav nav-pills pull-left">
                            </ul>
                            Tête (header.php)</header>
                        <div style="min-height: 50px;" id="HEADER" class="panel-body clearfix ui-sortable">
                            <form method="POST" class="form">
                            	<textarea id="header_editor" name="header" style="display:none;"><?php echo $load_header;?></textarea>
                                <hr class="line line-dashed">
                                <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
                            </form>
                            <script>
							$(document).ready(function(){
								var header	=	CodeMirror.fromTextArea(document.getElementById('header_editor'),{
									mode				:	"htmlmixed",
									indentWithTabs		:	true,
									lineNumbers			:	true,
									lineWrapping		:	true,
									name				:	"SuperHead"
								});
								/*CodeMirror.showHint(header,function(header,e){
									return {
										list	:	["bonjour","bonsoir","salue","non","oui","assia","voila","encore","puis","debout","assis"]
									}
								},{
								});*/
								var headermenu	=	CONTEXT_MENU;
								$("#HEADER .CodeMirror").contextmenu({
									delegate: "textarea",
									
									menu: headermenu,
									select: function(event, ui) {
										header.replaceSelection(ui.cmd);
										// alert("select " + ui.cmd + " on " + ui.target.text());
									},
									// Handle menu selection to implement a fake-clipboard
									// Implement the beforeOpen callback to dynamically change the entries
									beforeOpen: function(event, ui) {
										//
									}
								});
							});
							</script> 
                        </div>
                    </section>
					<section class="panel pos-rlt clearfix">
                        <header class="panel-heading text-center">
                            <ul class="nav nav-pills pull-right">
                                <li> <a class="panel-toggle text-muted active" href="javascript:void(0)"> <i class="fa fa-caret-down text-active"></i> <i class="fa fa-caret-up text"></i> </a> </li>
                            </ul>
                            <ul class="toggle-section nav nav-pills pull-left">
                            </ul>
                            Corps (body.php)</header>
                        <div style="min-height: 50px;" id="BODY" class="panel-body clearfix ui-sortable">
                            <form method="POST" class="form">
                            	<textarea name="body" id="body_textarea" style="display:none;"><?php echo $load_body;?></textarea>
                                <hr class="line line-dashed">
                                <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
                            </form>
                            <script>
							$(document).ready(function(){
								var bodyEditor	=	CodeMirror.fromTextArea(document.getElementById('body_textarea'),{
									mode				:	"htmlmixed",
									indentWithTabs		:	true,
									lineNumbers			:	true,
									lineWrapping		:	true
								});
								/*CodeMirror.showHint(bodyEditor,function(bodyEditor,e){
									return {
										list	:	["bonjour","bonsoir","salue","non","oui","assia","voila","encore","puis","debout","assis"]
									}
								},{
								});*/
								
								var bodymenu	=	CONTEXT_MENU;
								$("#BODY .CodeMirror").contextmenu({
									delegate: "textarea",
									
									menu: bodymenu,
									select: function(event, ui) {
										bodyEditor.replaceSelection(ui.cmd);
										// alert("select " + ui.cmd + " on " + ui.target.text());
									},
									// Handle menu selection to implement a fake-clipboard
									// Implement the beforeOpen callback to dynamically change the entries
									beforeOpen: function(event, ui) {
										//
									}
								});
							});
						
							</script> 
                        </div>
                    </section>
					<section class="panel pos-rlt clearfix">
                        <header class="panel-heading text-center">
                            <ul class="nav nav-pills pull-right">
                                <li> <a class="panel-toggle text-muted active" href="javascript:void(0)"> <i class="fa fa-caret-down text-active"></i> <i class="fa fa-caret-up text"></i> </a> </li>
                            </ul>
                            <ul class="toggle-section nav nav-pills pull-left">
                            </ul>
                            Pied (Footer.php)</header>
                        <div style="min-height: 50px;" id="FOOTER" class="panel-body clearfix ui-sortable">
                            <form method="POST" class="form">
                            	<textarea name="footer" id="footer_editor" style="display:none;"><?php echo $load_footer;?></textarea>
                                <hr class="line line-dashed">
                                <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
                            </form>
                            <script>
							$(document).ready(function(){
								var footerEditor	=	CodeMirror.fromTextArea(document.getElementById('footer_editor'),{
									mode				:	"htmlmixed",
									indentWithTabs		:	true,
									lineNumbers			:	true,
									lineWrapping		:	true
								});
								var footermenu	=	CONTEXT_MENU;
								$("#FOOTER .CodeMirror").contextmenu({
									delegate: "textarea",
									
									menu: footermenu,
									select: function(event, ui) {
										footerEditor.replaceSelection(ui.cmd);
										// alert("select " + ui.cmd + " on " + ui.target.text());
									},
									// Handle menu selection to implement a fake-clipboard
									// Implement the beforeOpen callback to dynamically change the entries
									beforeOpen: function(event, ui) {
										//
									}
								});
							});
							</script> 
                        </div>
                    </section>
			   </section>
            </section>
        </aside>
        <!-- /.aside --> <!-- .aside --> 
        <!-- /.aside -->
    </section>
    <section> </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="body"></a> </section>
