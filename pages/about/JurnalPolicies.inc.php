<?php

use APP\pages\about\AboutHandler;
use APP\template\TemplateManager;

import('pages.about.AboutHandler');

class JurnalPolicies extends AboutHandler
{
    function __construct()
    {
        parent::__construct();
    }

    public function jurnalPolices($args, $request)
    {
        $this->setupTemplate($request);
        $templateMgr = TemplateManager::getManager($request);
        $templateMgr->display('plugins/themes/immersion/frontend/pages/jurnalPolicies.tpl');
    }
}
