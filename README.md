# Transistor

Transistor provides a friendly way to call 3rd party SMS services with single request/response interfaces.

```php
Transistor::from('twilio', '+10000000000')->send('+10000000000', 'Test Message');
```

# Instalation
For Laravel 5.5
```php
composer require ypl/transistor
```

# TODO:
* Add custom gateways
```php
// Register a gateway
Transistor::gateway('nexmo', function () {
    return new NexmoGateway();
});

// Use the gateway
Transistor::from('nexmo', '+10000000000')...
```
* Testing Compatibility
```php
Transistor::shouldSend('twilio', '+10000000000')->withMessage('bla bla');
```
