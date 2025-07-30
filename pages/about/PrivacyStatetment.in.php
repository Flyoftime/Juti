<?php

use APP\pages\about\AboutHandler;
use APP\template\TemplateManager;

import('pages.about.AboutHandler');

class PrivacyStatetment extends AboutHandler
{
    function __construct()
    {
        parent::__construct();
    }

    public function privacyStatement($args, $request)
    {
        $this->setupTemplate($request);
        $templateMgr = \APP\template\TemplateManager::getManager($request);
        $templateMgr->display('plugins/themes/immersion/templates/frontend/pages/privacyStatement.tpl');
    }
}
