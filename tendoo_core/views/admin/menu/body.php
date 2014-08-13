    <div id="body" class="padding20" style="background:inherit">
    	<div class="tile bg-color-greenPureDark">
        	<div class="tile-content" style="text-align:center;" data-url="<?php echo $this->instance->url->site_url('admin/index');?>">
                <i class="fa fa-home" style="font-size:100px;"></i>
                <div class="brand">Accueil</div>
            </div>
        </div>
    	<div class="tile double bg-color-orangeDark">
        	<div class="tile-content" data-url="<?php echo $this->instance->url->site_url('admin/pages');?>">
                <h4><strong>Gestionnaire des pages</strong></h4>
                <br>
                <p>Créer et modifier des pages,ajoutez des modules, supprimer des pages, d&eacute;finir comme index.</p>
                <div class="brand">
                	<div class="padding10">
                    	<i class="fa fa-book font-30"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- data-role="tile-slider" data-param-direction="up" data-param-period="5000" data-param-duration="500" -->
    	<div class="tile double bg-color-blueDark">
        	<div class="tile-content" data-url="<?php echo $this->instance->url->site_url('admin/modules');?>">
                <h4><strong>Gestionnaire de modules</strong></h4>
                <br>
                <p>Ex&eacute;cution et d&eacute;sintallation de modules.</p>
                <div class="brand">
                	<div class="padding10">
                    	<i class="fa fa-tab font-30"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="tile double bg-color-orangeDark">
        	<div class="tile-content" data-url="<?php echo $this->instance->url->site_url('admin/installer');?>">
                <h4><strong>Installer une application Tendoo</strong></h4>
                <br>
                <p>Installer une application Tendoo (Th&egrave;me ou Module)</p>
                <div class="brand">
                	<div class="padding10">
                    	<i class="fa fa-download font-30"></i>
                    </div>
                </div>
            </div>
        </div>
    	<div class="tile double bg-color-pink">
        	<div class="tile-content" data-url="<?php echo $this->instance->url->site_url('admin/themes');?>">
                <h4><strong>Gestionnaire de th&egrave;mes</strong></h4>
                <br>
                <p>Activer et d&eacute;sintaller les th&egrave;mes.</p>
                <div class="brand">
                	<div class="padding10">
                    	<i class="fa fa-finder font-30"></i>
                    </div>
                </div>
            </div>
        </div>
    	<div class="tile double bg-color-pinkDark">
        	<div class="tile-content" data-url="<?php echo $this->instance->url->site_url('admin/setting');?>">
                <h4><strong>Param&ecirc;tres et configurations</strong></h4>
                <br>
                <p>D&eacute;finir le nom du site, le lien vers le logo, le fuseau horaire, format de l'heure, activer ou non le message d'accueil.</p>
                <div class="brand">
                	<div class="padding10">
                    	<i class="fa fa-equalizer font-30"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="tile bg-color-yellowDark">
        	<div class="tile-content" style="text-align:center;" data-url="<?php echo $this->instance->url->site_url('logoff');?>">
                <i class="fa fa-exit" style="font-size:100px;color:#000;"></i>
                <div class="brand" style="color:#333;">Deconnexion</div>
            </div>
        </div>
    	<div class="tile double bg-color-green">
        	<div class="tile-content" data-url="<?php echo $this->instance->url->site_url('admin/system');?>">
                <h4><strong>Syst&egrave;me et restauration</strong></h4>
                <br>
                <p>Cr&eacute;ation et gestion de super administrateur, restauration du CMS.<br />Cr&eacute;ation de privil&egrave;ges, affectation d'action.</p>
                <div class="brand">
                	<div class="padding10">
                    	<i class="fa fa-key font-30"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="tile bg-color-bluePureDark">
        	<div class="tile-content" style="text-align:center;" data-url="<?php echo $this->instance->url->site_url('index');?>">
                <i class="fa fa-arrow-right-3" style="font-size:100px;"></i>
                <div class="brand">Retour au site</div>
            </div>
        </div>
        <div class="tile double bg-color-purple">
        	<div class="tile-content" data-url="#">
                <h4>A propos de Tendoo</h4>
                <br />
                <p>D&eacute;tails sur la version, d&eacute;tails sur les fonctionnalit&eacute;s, Manuel d'utilisation, Auteurs et contributeurs</p>
                <div class="brand">
                	<div class="padding10">
                    	<i class="fa fa-support font-30"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="tile double bg-color-teal">
        	<div class="tile-content" data-url="<?php echo $this->instance->url->site_url('learning');?>">
                <h4>Manuel d'utilisation</h4>
                <br />
                <p>Nouveau ou ancien ? apprennez &agrave; utiliser tendoo.</p>
                <div class="brand">
                	<div class="padding10">
                    	<i class="fa fa-eye font-30"></i>
                    </div>
                </div>
            </div>
        </div>
        <?php echo fetch_error_from_url_by_modal();?>
    </div>