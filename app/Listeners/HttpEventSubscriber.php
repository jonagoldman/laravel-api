<?php

namespace App\Listeners;

use Illuminate\Http\Client\Events\RequestSending;
use Illuminate\Http\Client\Events\ResponseReceived;
use Illuminate\Http\Client\Events\ConnectionFailed;
use Illuminate\Events\Dispatcher;

class HttpEventSubscriber
{
    /**
     * Handle request sending events.
     */
    public function handleRequestSending(RequestSending $event): void {}

    /**
     * Handle response received events.
     */
    public function handleResponseReceived(ResponseReceived $event): void {}

    /**
     * Handle connection failed events.
     */
    public function handleConnectionFailed(ConnectionFailed $event): void {}

    /**
     * Register the listeners for the subscriber.
     *
     * @return array<string, string>
     */
    public function subscribe(Dispatcher $events): array
    {
        return [
            RequestSending::class => 'handleRequestSending',
            ResponseReceived::class => 'handleResponseReceived',
            ConnectionFailed::class => 'handleConnectionFailed',
        ];
    }
}
