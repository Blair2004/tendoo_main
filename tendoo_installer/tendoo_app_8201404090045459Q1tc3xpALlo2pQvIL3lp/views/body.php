<?php echo $lmenu;?>
<section id="content">
    <section class="vbox"><?php echo $inner_head;?>
        
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
                    <section class="panel">
                        <div class="panel-heading"> Les des messages </div>
                        <table class="table table-striped b-t text-sm">
                            <thead>
                                <tr>
                                    <th width="150">Nom du site</th>
                                    <th>Url du Site</th>
                                    <th>Indexé depuis</th>
                                    <th>Dernière Activité</th>
                                    <th>Nombre de connexion au Store</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
							if($getSite)
							{
								foreach($getSite as $f)
								{
								?>
                                <tr>
                                	<td><?php echo urldecode($f['SITE_NAME']);?></a></td>
                                    <td><?php echo $f['SITE_URL'];?></td>
                                    <td><?php echo $this->instance->date->time($f['INDEXED_SINCE']);?></td>
                                    <td><?php echo $this->instance->date->time($f['LAST_ACTIVITY']);?></td>
                                    <td><?php echo $f['STORE_CONNEXION'];?></td>
                                </tr>
                                <?php
								}
							}
							else
							{
								?>
                                <tr>
                                	<th colspan="5">Aucun site indexé.</th>
                                </tr>
                                <?php
							}
							?>
                            </tbody>
                        </table>
                    </section>
                </section>
            </section>
        </section>
        <footer class="footer bg-white b-t">
                <div class="row m-t-sm text-center-xs">
                    <div class="col-sm-4">
                        
                    </div>
                    <div class="col-sm-4 text-center">  </div>
                    <div class="col-sm-4 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <?php 
					if(is_array($paginate[4]))
					{
						foreach($paginate[4] as $p)
						{
							?>
                            <li class="<?php echo $p['state'];?>"><a href="<?php echo $p['link'];?>"><?php echo $p['text'];?></a></li>
                            <?php
						}
					}
				?>
                        </ul>
                    </div>
                </div>
            </footer>
        </section>
        </section>
        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
