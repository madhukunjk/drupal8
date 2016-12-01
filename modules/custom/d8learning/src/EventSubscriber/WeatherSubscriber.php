<?php

namespace Drupal\d8learning\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Kernel\kernelEvents;

class WeatherSubscriber implements EventSubscriberInterface {

	public static function getsubscribedEvent() {
	  $events[kernelEvents::RESPONSE][] = array(addCorsHeader);
	  return $events;
	}

	public static function addCorsHeader(FilterResponseEvent $events) {
		$response = $event->getResponse();
		//$request = $event->getRequest();
		//$request->getMethod();
        $response->headers->add(['Access-Control-Allow-Origin' => '*']);
	}
}