<?php echo $lmenu;?>

<section id="content">
    <section class="vbox"><?php echo $inner_head;?>
        <footer class="footer bg-white b-t">
            <div class="row m-t-sm text-center-xs">
                <div class="col-sm-2" id="ajaxLoading"> </div>
                <div class="col-sm-6 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                    </ul>
                </div>
                <div class="col-sm-4"> <a class="btn btn-sm btn-primary pull-right" href="javascript:void(0)" id="submit_changes">Enregistrer vos modifications</a> </div>
            </div>
        </footer>
        <section class="scrollable" id="pjax-container">
            <header>
                <div class="row b-b m-l-none m-r-none">
                    <div class="col-sm-4">
                        <h4 class="m-t m-b-none"><?php echo get_page('title');?></h4>
                        <p class="block text-muted"><?php echo get_page('description');?></p>
                    </div>
                </div>
            </header>
            <section class="vbox">
                <section class="wrapper"> <?php echo output('notice');?>  <?php echo fetch_error_from_url();?> <?php echo validation_errors(); ?>
                    <div class="row">
                        <div class="col-lg-9">
                            <section class="panel pos-rlt clearfix">
                                <header class="panel-heading">
                                    <ul class="nav nav-pills pull-right">
                                        <li> <a class="panel-toggle text-muted active" href="javascript:void(0)"> <i class="fa fa-caret-down text-active"></i> <i class="fa fa-caret-up text"></i> </a> </li>
                                    </ul>
                                    Mes thèmes 
								</header>
                                <div class="table-responsive ">
                                    <table class="table table-striped m-b-none panel-body">
                                        <thead>
                                            <tr>
                                                <th width="20"><input type="checkbox"></th>
                                                <th width="200">Nom du projet</th>
                                                <th>Date de cr&eacute;ation</th>
                                            </tr>
                                        </thead>
                                        
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </section>
        </section>
    </section>
</section>
<a href="javascript:void(0)" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
</section>
