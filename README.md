# Instalation
For Laravel 5.5
```php
composer require ypl/transistor
```

# Usage

Select a gateway and send an SMS message to recipient via the selected gateway.

```php
Transistor::from('twilio', '+10000000000')->send('+10000000000', 'Test Message');
```

Extend Transistor adding&using your own gateways.
```php
class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register a gateway
        Transistor::extend('nexmo', function (string $senderNumber) {
            return new NexmoGateway($this->app['config']->get('transistor.gateways.nexmo'), $senderNumber);
        });
    }
}

// Use the gateway
Transistor::from('nexmo', '+10000000000')->...
```

# Coming Soon:
* Testing Compatibility
```php
Transistor::fake();

// Sending stuff

Transistor::assertSent('twilio', '+10000000000')->withMessage('bla bla');
```

* Bulk Send
```php
$recipients = [
    '+10000000001',
    '+10000000002' => 'Unique Text',
    '+10000000003',
];

$responses = Transistor::from('twilio', '+10000000000')->send($recipients, 'Bulk Test Message');

$responses->each(function (TwilioResponse $response) {
    //
});

$responses->whereNumber(+10000000001)->getMessageBody(); // Buld Test Message
$responses->whereNumber(+10000000002)->getMessageBody(); // Unique Text
```
