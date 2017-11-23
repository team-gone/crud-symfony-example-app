<?php

namespace Tests\Functionals\Contexts;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Tests\Functionals\FeatureContext;
use Tests\Functionals\UserDictionary;
use Tests\Functionals\WebDictionary;

/**
 * Defines application features from the specific context.
 */
class Video extends FeatureContext
{
	use UserDictionary;
}