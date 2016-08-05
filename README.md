# Happyr LinkedIn bundle

This is a very small bundle that registers a service for the [LinkedIn client](https://github.com/Happyr/LinkedIn-API-client).

### Installation

See the installation note at the [LinkedIn client (installation)](https://github.com/Happyr/LinkedIn-API-client#installation).

For a simple installation of all components, you can run this Composer command: ([why?](http://php-http.readthedocs.io/en/latest/httplug/users.html))
```bash
composer require php-http/curl-client guzzlehttp/psr7 php-http/message happyr/linkedin-bundle
```

You will get some great debugging and easier set up if you install the [HTTPlugBundle](https://github.com/php-http/HttplugBundle).

### Usage 

```yaml
happyr_linkedin:
  app_id: 'xxx'
  app_secret: 'yyy'
  request_format: 'json' # Default
  response_format: 'array' # Default
  http_client: 'httplug.client' # Service ID for an object implementing Http\Client\HttpClient 
  http_message_factory: 'httplug.message_factory' # Service ID for an object implementing Http\Message\MessageFactory
```

```php
$linkedin = $this->get('happyr.linkedin');
$user = $linkedin->get('v1/people/~:(firstName,lastName)');
```

For more info look at the libraries repository: https://github.com/Happyr/LinkedIn-API-client

### Authentication

The easiest way to implement LinkedIn Authentication is to use Symfony's Guard component. 
