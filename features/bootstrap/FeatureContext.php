<?php

use Behat\MinkExtension\Context\MinkContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * This context class contains the definitions of the steps used by the demo
 * feature file. Learn how to get started with Behat and BDD on Behat's website.
 *
 * @see http://behat.org/en/latest/quick_start.html
 */
class FeatureContext extends MinkContext
{
    /**
     * @var KernelInterface
     */
    private $kernel;

    /**
     * @var Response|null
     */
    private $response;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @When a demo scenario sends a request to :path
     */
    public function aDemoScenarioSendsARequestTo(string $path)
    {
        $this->response = $this->kernel->handle(Request::create($path, 'GET'));
    }

    /**
     * @Then the response should be received
     */
    public function theResponseShouldBeReceived()
    {
        if ($this->response === null) {
            throw new \RuntimeException('No response received');
        }
    }

    /**
     * @Given /^the "([^"]*)" field should contain the attribute "([^"]*)" with value="([^"]*)"$/
     */
    public function theFieldShouldContainTheAttributeWithValue($field, $attribute, $expectedValue)
    {
        $field = $this->fixStepArgument($field);
        $node = $this->assertSession()->fieldExists($field);
        if (!$node->hasAttribute($attribute)) {
            throw new RuntimeException(sprintf('Attribute "%s" not found on field "%s"', $attribute, $field));
        }
        $actualValue = $node->getAttribute($attribute);
        if ($actualValue != $expectedValue) {
            throw new RuntimeException(sprintf('Attribute "%s" was expected to have value "%s", but have "%s"', $attribute, $expectedValue, $actualValue));
        }
    }

    /**
     * @Then page loads successfully
     */
    public function pageLoadsSuccessfully()
    {
        $this->assertResponseStatus(200);
    }
}
