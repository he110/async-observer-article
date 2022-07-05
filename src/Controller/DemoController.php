<?php

declare(strict_types=1);

namespace App\Controller;

use App\Event\DemoEvent;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{
    /**
     * @Route("/demo")
     */
    public function demoAction(EventDispatcherInterface $dispatcher, LoggerInterface $logger): Response
    {
        $logger->debug('Request has been handled. Let\'s dispatch the message');

        $dispatcher->dispatch(new DemoEvent('Dispatched from controller'));

        $logger->debug('Event has been dispatched. We can return the response');

        return $this->json([
           'status' => 'ok',
        ]);
    }
}
