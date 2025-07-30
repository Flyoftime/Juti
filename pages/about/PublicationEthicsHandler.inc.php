<?php

use APP\pages\about\AboutHandler;
use APP\template\TemplateManager;

import('pages.about.AboutHandler');

class PublicationEthicsHandler extends AboutHandler {
    function __construct() {
        parent::__construct();
    }

  public function publicationEthics($args, $request)
{
    $this->setupTemplate($request);
    $templateMgr = TemplateManager::getManager($request);
    $templateMgr->display('plugins/themes/immersion/frontend/pages/publicationEthics.tpl');
}

}
