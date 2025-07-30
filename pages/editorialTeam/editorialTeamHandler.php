<?php

/**
 * @file pages/editorialTeam/editorialTeamHandler.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2003-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class editorialTeamHandler
 *
 * @ingroup pages_editorialTeam
 *
 * @brief Handle requests for journal editorialTeam functions.
 */

namespace APP\pages\editorialTeam;

use APP\core\Application;
use APP\subscription\SubscriptionTypeDAO;
use APP\template\TemplateManager;
use PKP\db\DAORegistry;

class editorialTeamHandler extends \PKP\pages\editorialTeam\editorialTeamContextHandler
{
    /**
     * Display about subscriptions page.
     *
     * @param array $args
     * @param \APP\core\Request $request
     */
    public function subscriptions($args, $request)
    {
        $templateMgr = TemplateManager::getManager($request);
        $this->setupTemplate($request);
        $journal = $request->getJournal();
        /** @var SubscriptionTypeDAO */
        $subscriptionTypeDao = DAORegistry::getDAO('SubscriptionTypeDAO');

        if ($journal) {
            $paymentManager = Application::getPaymentManager($journal);
            if (!($journal->getData('paymentsEnabled') && $paymentManager->isConfigured())) {
                $request->redirect(null, 'index');
            }
        }

        $templateMgr->assign([
            'subscriptionAdditionalInformation' => $journal->getLocalizedData('subscriptionAdditionalInformation'),
            'subscriptionMailingAddress' => $journal->getData('subscriptionMailingAddress'),
            'subscriptionName' => $journal->getData('subscriptionName'),
            'subscriptionPhone' => $journal->getData('subscriptionPhone'),
            'subscriptionEmail' => $journal->getData('subscriptionEmail'),
            'individualSubscriptionTypes' => $subscriptionTypeDao->getByInstitutional($journal->getId(), false, false)->toArray(),
            'institutionalSubscriptionTypes' => $subscriptionTypeDao->getByInstitutional($journal->getId(), true, false)->toArray(),
        ]);
        $templateMgr->display('frontend/pages/subscriptions.tpl');
    }
    public function reviewers($args, $request)
    {
        $this->setupTemplate($request);
        $templateMgr = \APP\template\TemplateManager::getManager($request);
        $templateMgr->display('frontend/pages/reviewers.tpl');
    }
    public function journalPolicies($args, $request)
    {
        $this->setupTemplate($request);
        $templateMgr = \APP\template\TemplateManager::getManager($request);
        $templateMgr->display('frontend/pages/journalPolicies.tpl');
    }

    public function privacyStatement($args, $request)
    {
        $this->setupTemplate($request);
        $templateMgr = TemplateManager::getManager($request);
        $templateMgr->display('frontend/pages/privacyStatement.tpl');
    }
}
