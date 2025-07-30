<?php

/**
 * @defgroup pages_editorialTeam editorialTeam page
 */

/**
 * @file pages/editorialTeam/index.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2003-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @ingroup pages_editorialTeam
 *
 * @brief Handle requests for editorialTeam the journal functions.
 *
 */

use APP\pages\editorialTeam\editorialTeamHandler;

switch ($op) {
    case 'reviewers':
        return new editorialTeamHandler();
    default:
        return new editorialTeamHandler(); 
}