<?php

// src/AppBundle/EventListener/ExceptionListener.php

namespace AppBundle\EventListener;

use Psr\Log\LoggerInterface;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ExceptionListener extends ExceptionHandler {

    private $logger;
    private $prevExceptionHandler;

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;

        // Set our handle method as fatal exception handler.
        // It is required to extend Symfony\Component\Debug\ExceptionHandler
        $this->prevExceptionHandler = set_exception_handler(array($this, 'handle'));
    }

    public function onKernelException(GetResponseForExceptionEvent $event) {
        // You get the exception object from the received event
        $exception = $event->getException();
//        $message = sprintf(
//            'My Error says: %s with code: %s',
//            $exception->getMessage(),
//            $exception->getCode()
//        );
        $this->logger->error($exception->getMessage());
        $message = "An exception has occured.";

        // Customize your response object to display the exception details
        $response = new JsonResponse($message);

        // HttpExceptionInterface is a special type of exception that
        // holds status code and header details
        if ($exception instanceof HttpExceptionInterface) {
            $response->setStatusCode($exception->getStatusCode());
            $response->headers->replace($exception->getHeaders());
        } else {
            $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // Send the modified response object to the event
        $event->setResponse($response);
    }

    public function handle(Exception $exception) {
        // Call our custom handler.
        $this->onFatalErrorException($exception);

        // Call exception handler that was overridden.
        // Or try to call parent::handle($exception)
        if (is_array($this->prevExceptionHandler) && $this->prevExceptionHandler[0] instanceof ExceptionHandler) {
            $this->prevExceptionHandler[0]->handle($exception);
        }
    }

    public function onFatalErrorException(Exception $exception) {
        // Do anything you want...
        $this->logger->error('Fatal exception: ' . $exception->getMessage());
    }

}
