<?php

namespace Spark\Configuration;

use Auryn\Injector;
use Spark\Configuration\ConfigurationInterface;
use Spark\NativeSession;
use Spark\SessionInterface;

class SessionConfiguration implements ConfigurationInterface
{
    /**
     * @inheritDoc
     */
    public function apply(Injector $injector)
    {
        $injector->share(SessionInterface::class);

        $injector->alias(
            SessionInterface::class,
            NativeSession::class
        );

        $injector->prepare(NativeSession::class, [$this, 'prepareSession']);
    }

    /**
     * Initialize the session
     *
     * @param NativeSession $session
     * @param Injector $injector
     *
     * @return void
     */
    public function prepareSession(NativeSession $session, Injector $injector)
    {
        // It seems impossible to test this, since it has to be run in a web
        // server to really be useful and PHPUnit will prevent the session
        // headers working properly. One possible way to test it is by using
        // runkit to mock the [native function][1], but that seems extreme and
        // requires installation of a PECL extension.
        //
        // [1]: https://github.com/tcz/phpunit-mockfunction
        //
        // @codeCoverageIgnoreStart
        if ($this->canSessionStart() && $this->isCli() === false) {
            $this->startSession();
        }
        // @codeCoverageIgnoreEnd
    }

    /**
     * Start a new session
     *
     * @return void
     *
     * @codeCoverageIgnore
     */
    protected function startSession()
    {
        session_start();
    }

    /**
     * Check if a session can be started
     *
     * @return boolean
     */
    private function canSessionStart()
    {
        return session_status() === PHP_SESSION_NONE;
    }

    /**
     * Check if we are running in a command line context
     *
     * @return boolean
     */
    private function isCli()
    {
        return php_sapi_name() === 'cli';
    }
}
