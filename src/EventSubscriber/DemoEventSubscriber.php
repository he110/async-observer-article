<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Event\DemoEvent;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class DemoEventSubscriber implements EventSubscriberInterface
{
    use LoggerAwareTrait;

    public function __construct(LoggerInterface $logger)
    {
        $this->setLogger($logger);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            DemoEvent::class => 'onDemoEvent',
        ];
    }

    public function onDemoEvent(DemoEvent $event): void
    {
        $this->logger->debug('Event has been handled by the sync subscriber', [
            'some_data' => $event->getSomeString(),
        ]);
    }
}
