<?php

use App\Entity\User;
use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Driver\BrowserKitDriver;
use Behat\Mink\Exception\UnsupportedDriverActionException;
use Behat\MinkExtension\Context\MinkContext;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

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

    /**
     * @Given /^I am logged in as "([^"]*)"$/
     * @throws UnsupportedDriverActionException
     */
    public function iAmLoggedInAs($username)
    {
        $driver = $this->getSession()->getDriver();
        if (!$driver instanceof BrowserKitDriver) {
            throw new UnsupportedDriverActionException('This step is only supported by the BrowserKitDriver', $driver);
        }

        $client = $driver->getClient();
        $client->getCookieJar()->set(new Cookie(session_name(), true));

        $session = $client->getContainer()->get('session');

        $user = $this->kernel->getContainer()->get('fos_user.user_manager')->findUserByUsername($username);
        $providerKey = $this->kernel->getContainer()->getParameter('fos_user.firewall_name');

        $token = new UsernamePasswordToken($user, null, $providerKey, $user->getRoles());
        $session->set('_security_' . $providerKey, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $client->getCookieJar()->set($cookie);
    }

    /**
     * @Given /^the following user are defined:$/
     */
    public function theFollowingUserAreDefined(TableNode $table)
    {
        $hash = $table->getHash();
        foreach ($hash as $row) {
            $userManager = $this->kernel->getContainer()->get('fos_user.user_manager');
            /** @var User $user */
            $user = $userManager->createUser();
            $user->setFirstName("first name");
            $user->setLastName("last name");
            $user->setEmail($row['email']);
            $user->setUsername($row['email']);
            $user->setPlainPassword("P@ssw0rd");
            $user->addRole($row['role']);
            $user->setEnabled(true);

            $userManager->updateUser($user);
        }
    }
}
