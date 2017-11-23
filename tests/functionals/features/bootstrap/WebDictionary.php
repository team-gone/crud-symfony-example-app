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

    protected function find($type, $selector)
    {
        return $this->getSession()->getPage()->find($type, $selector);
    }
    
    /**
     * @When When I click on the text :text
     */
    public function whenIClickOnTheText($text)
    {
    	throw new PendingException();
        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', '//a[text()="'. $text .'"]')
        );
        if (null === $element) {
            throw new \InvalidArgumentException(sprintf('Cannot find text: "%s"', $text));
        }
        $element->click();
    }
}