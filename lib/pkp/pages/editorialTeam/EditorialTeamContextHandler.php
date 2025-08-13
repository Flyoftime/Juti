<?php

/**
 * @file pages/editorialTeam/editorialTeamContextHandler.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2003-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class editorialTeamContextHandler
 *
 * @ingroup pages_editorialTeam
 *
 * @brief Handle requests for context-level editorialTeam functions.
 */

namespace PKP\pages\editorialTeam;

use APP\core\Application;
use APP\facades\Repo;
use APP\handler\Handler;
use APP\template\TemplateManager;
use PKP\security\authorization\ContextRequiredPolicy;
use PKP\security\Role;

class editorialTeamContextHandler extends Handler
{
    /**
     * @see PKPHandler::authorize()
     */
    public function authorize($request, &$args, $roleAssignments)
    {
        $context = $request->getContext();
        if (!$context || !$context->getData('restrictSiteAccess')) {
            $templateMgr = TemplateManager::getManager($request);
            $templateMgr->setCacheability(TemplateManager::CACHEABILITY_PUBLIC);
        }

        $this->addPolicy(new ContextRequiredPolicy($request));
        return parent::authorize($request, $args, $roleAssignments);
    }

    /**
     * Display editorialTeam page.
     *
     * @param array $args
     * @param \PKP\core\PKPRequest $request
     */
    public function index($args, $request)
    {
        $templateMgr = TemplateManager::getManager($request);
        $this->setupTemplate($request);
        $templateMgr->display('frontend/pages/editorialTeam.tpl');
    }


}
