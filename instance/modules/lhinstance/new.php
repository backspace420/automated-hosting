<?php

$tpl = erLhcoreClassTemplate::getInstance( 'lhinstance/new.tpl.php');
$Instance = new erLhcoreClassModelInstance();

$cfgSite = erConfigClassLhConfig::getInstance();
$tpl->set('locales',$cfgSite->getSetting('site', 'available_site_access' ));

if ( isset($_POST['Cancel_departament']) ) {
    erLhcoreClassModule::redirect('instance/list');
    exit;
}

if (isset($_POST['Save_departament']))
{
	$definition = array(
        'Address' => new ezcInputFormDefinitionElement(
            ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
        ),
        'Email' => new ezcInputFormDefinitionElement(
            ezcInputFormDefinitionElement::OPTIONAL, 'validate_email'
        ),
        'Request' => new ezcInputFormDefinitionElement(
            ezcInputFormDefinitionElement::OPTIONAL, 'string'
        ),
        'RequestUsed' => new ezcInputFormDefinitionElement(
            ezcInputFormDefinitionElement::OPTIONAL, 'int'
        ),
        'Status' => new ezcInputFormDefinitionElement(
            ezcInputFormDefinitionElement::OPTIONAL, 'int',array('min_range' => 0)
        ),
        'Expires' => new ezcInputFormDefinitionElement(
            ezcInputFormDefinitionElement::OPTIONAL, 'string'
        ),
		'DateFormat' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),
		'DateHourFormat' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),
		'DateAndHourFormat' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),
		'UserTimeZone' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),
		'FrontSiteaccess' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),
		'Language' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),
		'UserTimeZone' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),
		'ResellerTitle' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),
		'ResellerMaxRequest' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),
		'ResellerMaxInstance' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),
		'ResellerSecretHash' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),
		'ResellerRequest' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),
		'Reseller' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'boolean'
		),
	    'files_supported' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),
		'atranslations_supported' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),
		'cobrowse_supported' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),			
		'feature_1_supported' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),			
		'feature_2_supported' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		),			
		'feature_3_supported' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::OPTIONAL, 'string'
		)		
    );

    $form = new ezcInputForm( INPUT_POST, $definition );
    $Errors = array();
    
    if ( $form->hasValidData( 'ResellerTitle' ) )
    {
    	$Instance->reseller_tite = $form->ResellerTitle;
    }
    
    if ( $form->hasValidData( 'ResellerMaxRequest' ) )
    {
    	$Instance->reseller_max_instance_request = $form->ResellerMaxRequest;
    }
    
    if ( $form->hasValidData( 'files_supported' ) && $form->files_supported == true )
    {
        $Instance->files_supported = 1;
    } else {
        $Instance->files_supported = 0;
    }
    
    if ( $form->hasValidData( 'atranslations_supported' ) && $form->atranslations_supported == true )
    {
        $Instance->atranslations_supported = 1;
    } else {
        $Instance->atranslations_supported = 0;
    }
    
    if ( $form->hasValidData( 'cobrowse_supported' ) && $form->cobrowse_supported == true )
    {
        $Instance->cobrowse_supported = 1;
    } else {
        $Instance->cobrowse_supported = 0;
    }
    
    if ( $form->hasValidData( 'feature_1_supported' ) && $form->feature_1_supported == true )
    {
        $Instance->feature_1_supported = 1;
    } else {
        $Instance->feature_1_supported = 0;
    }
    
    if ( $form->hasValidData( 'feature_2_supported' ) && $form->feature_2_supported == true )
    {
        $Instance->feature_2_supported = 1;
    } else {
        $Instance->feature_2_supported = 0;
    }
    
    if ( $form->hasValidData( 'feature_3_supported' ) && $form->feature_3_supported == true )
    {
        $Instance->feature_3_supported = 1;
    } else {
        $Instance->feature_3_supported = 0;
    }
    
    if ( $form->hasValidData( 'ResellerMaxInstance' ) )
    {
    	$Instance->reseller_max_instances = $form->ResellerMaxInstance;
    }
    
    if ( $form->hasValidData( 'ResellerSecretHash' ) )
    {
    	$Instance->reseller_secret_hash = $form->ResellerSecretHash;
    }
    
    if ( $form->hasValidData( 'ResellerRequest' ) )
    {
    	$Instance->reseller_request = $form->ResellerRequest;
    }
    
    if ( $form->hasValidData( 'Reseller' ) && $form->Reseller == true )
    {
    	$Instance->is_reseller = $form->Reseller;
    }
    
    if ( $form->hasValidData( 'Language' ) )
    {
    	$Instance->locale = $form->Language;
    }
    
    if ( $form->hasValidData( 'DateFormat' ) )
    {
    	$Instance->date_format = $form->DateFormat;
    }
    
    if ( $form->hasValidData( 'DateHourFormat' ) )
    {
    	$Instance->date_hour_format = $form->DateHourFormat;
    }
    
    if ( $form->hasValidData( 'DateAndHourFormat' ) )
    {
    	$Instance->date_date_hour_format = $form->DateAndHourFormat;
    }
    
    if ( $form->hasValidData( 'UserTimeZone' ) )
    {
    	$Instance->time_zone = $form->UserTimeZone;
    }
    
    if ( $form->hasValidData( 'FrontSiteaccess' ) )
    {
    	$Instance->siteaccess = $form->FrontSiteaccess;
    }
    
    if ( $form->hasValidData( 'Address' ) && erLhcoreClassInstance::instanceExists($form->Address) == false )
    {
        $Instance->address = $form->Address;
    } else {
    	$Errors[] = 'Instance exists';
    }

    if ( $form->hasValidData( 'Email' ) )
    {
        $Instance->email = $form->Email;
    } else {
    	$Errors[] = 'Please enter valid e-mail';
    }

    if ( $form->hasValidData( 'Request' ) )
    {
        $Instance->request = $form->Request;
    }

    if ( $form->hasValidData( 'RequestUsed' ) )
    {
        $Instance->request_used = $form->RequestUsed;
    }

    if ( $form->hasValidData( 'Status' ) )
    {
        $Instance->status = $form->Status;
    }

    if (!isset($_POST['csfr_token']) || !$currentUser->validateCSFRToken($_POST['csfr_token'])) {
     	erLhcoreClassModule::redirect('instance/list');
    	exit;
    }

    if ( $form->hasValidData( 'Expires' ) && ($time = strtotime($form->Expires)) !== false )
    {
    	$Instance->expires = $time;
    } else {
    	$Errors[] = 'Please enter valid date';
    }

    if (count($Errors) == 0)
    {
        $Instance->saveThis();
        erLhcoreClassModule::redirect('instance/list');
        exit ;

    }  else {
        $tpl->set('errors',$Errors);
    }
}

$tpl->set('instance',$Instance);

$Result['content'] = $tpl->fetch();

$Result['path'] = array(
array('url' => erLhcoreClassDesign::baseurl('system/configuration'),'title' => erTranslationClassLhTranslation::getInstance()->getTranslation('department/new','System configuration')),
array('url' => erLhcoreClassDesign::baseurl('instance/list'),'title' => erTranslationClassLhTranslation::getInstance()->getTranslation('instance/edit','Instances')),
array('title' => erTranslationClassLhTranslation::getInstance()->getTranslation('instance/edit','New instance')),
);

?>