<?php

declare(strict_types=1);

namespace App\Tests\Shared\Infrastructure\Behat;

use App\Tests\Shared\Infrastructure\Mink\MinkHelper;
use App\Tests\Shared\Infrastructure\Mink\MinkSessionRequestHelper;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Mink\Session;
use Behat\MinkExtension\Context\RawMinkContext;
use RuntimeException;

final class ApplicationContext extends RawMinkContext implements Context
{
    private MinkHelper $sessionHelper;
    private Session $minkSession;
    private MinkSessionRequestHelper $request;

    private array $parameters = [];

    public function __construct(Session $session)
    {
        $this->minkSession = $session;
        $this->sessionHelper = new MinkHelper($this->minkSession);
        $this->request = new MinkSessionRequestHelper(new MinkHelper($session));
    }

    /**
     * @Given the query parameter :name is :value
     */
    public function theQueryParameterIs(string $name, string $value): void
    {
        $this->parameters[$name] = $value;
    }

    /**
     * @Given I make a :method request to :path
     */
    public function iMakeARequestTo(string $path, string $method): void
    {
        $this->request->sendRequest($method, $this->locatePath($path), ['parameters' => $this->parameters]);
        $this->parameters = [];
    }

    /**
     * @Given I make a :method request to :path with body
     */
    public function iMakeARequestToWithBody(string $path, string $method, PyStringNode $body): void
    {
        $this->request->sendRequestWithPyStringNode($method, $this->locatePath($path), $body);
    }

    /**
     * @Then the response content should be
     */
    public function theResponseShouldBe(PyStringNode $expectedResponse): void
    {
        $expected = $this->sanitizeJson($expectedResponse->getRaw());
        $actual = $this->sanitizeJson($this->sessionHelper->getResponse());

        if ($expected !== $actual) {
            throw new RuntimeException(
                sprintf("The outputs does not match!\n\n-- Expected:\n%s\n\n-- Actual:\n%s", $expected, $actual)
            );
        }
    }

    /**
     * @Then the response content should has :number items
     */
    public function theResponseContentShouldHasItems(int $number): void
    {
        $content = $this->sanitizeJson($this->sessionHelper->getResponse()) ?? '';
        $responseData = json_decode($content);

        if (count($responseData) !== (int) $number) {
            throw new RuntimeException(
                sprintf('The number of items should be %s and there are %s elements', $number, count($responseData))
            );
        }
    }

    /**
     * @Then the response content should be empty
     */
    public function theResponseContentShouldBeEmpty(): void
    {
        $actual = trim($this->sessionHelper->getResponse());

        if (false === empty($actual)) {
            throw new RuntimeException(
                sprintf("The outputs it's not empty!\n\n-- Actual:\n%s", $actual)
            );
        }
    }

    /**
     * @Then the response status code should be :code
     */
    public function theResponseStatusCodeShouldBe(int $code): void
    {
        if ($code !== $this->minkSession->getStatusCode()) {
            throw new RuntimeException(
                sprintf(
                    'The status code <%s> does not match the expected <%s>',
                    $this->minkSession->getStatusCode(),
                    $code
                )
            );
        }
    }

    private function sanitizeJson(string $json): ?string
    {
        return json_encode(json_decode(trim($json), true)) ?: null;
    }
}
