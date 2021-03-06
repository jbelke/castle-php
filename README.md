[![Latest Stable Version](https://poser.pugx.org/castle/castle-php/v/stable.svg)](https://packagist.org/packages/castle/castle-php) [![Total Downloads](https://poser.pugx.org/castle/castle-php/downloads.svg)](https://packagist.org/packages/castle/castle-php) [![License](https://poser.pugx.org/castle/castle-php/license.svg)](https://packagist.org/packages/castle/castle-php)

[![Build Status](https://travis-ci.org/castle/castle-php.png)](https://travis-ci.org/castle/castle-php)
[![Code Climate](https://codeclimate.com/github/castle/castle-php.png)](https://codeclimate.com/github/castle/castle-php)
[![Coverage Status](https://coveralls.io/repos/castle/castle-php/badge.png?branch=master)](https://coveralls.io/r/castle/castle-php?branch=master)

# PHP SDK for Castle

**[Castle](https://castle.io) adds real-time monitoring of your authentication stack, instantly notifying you and your users on potential account hijacks.**

## Getting started

Obtain the latest version of the Castle PHP bindings with:

```bash
git clone https://github.com/castle/castle-php
```

To get started, add the following to your PHP script:

```php
require_once("/path/to/castle-php/lib/Castle.php");
```

Configure the library with your Castle API secret.

```php
Castle::setApiKey('YOUR_API_SECRET');
```

## Errors
Whenever something unexpected happens, an exception is thrown to indicate what went wrong.

| Name                             | Description     |
|:---------------------------------|:----------------|
| `Castle_Error`                  | A generic error |
| `Castle_RequestError`           | A request failed. Probably due to a network error |
| `Castle_ApiError`               | An unexpected error for the Castle API |
| `Castle_SecurityError`          | The session signature doesn't match, either it has been tampered with or the Castle API key has been changed. |
| `Castle_ConfigurationError`     | The Castle secret API key has not been set |
| `Castle_UnauthorizedError`      | Wrong Castle API secret key |
| `Castle_ChallengeRequiredError` | You need to prompt the user for Two-step verification |
| `Castle_BadRequest`             | The request was invalid. For example if a challenge is created without the user having MFA enabled. |
| `Castle_ForbiddenError`         | The user has entered the wrong code too many times and a new challenge has to be requested. |
| `Castle_NotFoundError`          | The resource requestd was not found. For example if a session has been revoked. |
| `Castle_UserUnauthorizedError`  | The user is locked or has entered the wrong credentials |
| `Castle_InvalidParametersError` | One or more of the supplied parameters are incorrect. Check the response for more information. |




