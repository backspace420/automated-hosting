<?php if (erConfigClassLhConfig::getInstance()->getSetting('site','hide_billing') == false && $currentUser->hasAccessTo('lhinstance','billing')) : ?>
<li class="nav-item"><a class="nav-link" href="<?php echo erLhcoreClassDesign::baseurl('instance/billing')?>" ><i class="material-icons">account_balance</i> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('pagelayout/pagelayout','Billing');?></a></li>
<?php endif;?>