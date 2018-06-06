# Instalation
For Laravel 5.5
```
composer require ypl/transistor
```

This package provides a friendly way to call 3rd party SMS services with single request/response interfaces.

```
Transistor::from('twilio', '+10000000000')->send('+10000000000', 'Test Message');
```
# TODO:
* Add custom gateways
```
// Register a gateway
Transistor::gateway('nexmo', function () {});

// Use the gateway
Transistor::from('nexmo', '+10000000000')...
```
* Testing Compatibility
```
Transistor::shouldSend('twilio', '+10000000000')->withMessage('bla bla');
```
