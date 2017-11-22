<?php

namespace Tests\Functionals;

/**
* 
*/
trait WebDictionary
{
    /**
     * @When I click on :arg1
     */
    public function clickCss($selector)
    {
        $link = $this->find('css', $selector);
        $link->click();
        return $this;
    }
}