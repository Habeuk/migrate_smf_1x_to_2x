<?php
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

// test file
require_once __DIR__ . '/tests.php';

// addProduct();
/**
 *
 * @see https://code.tutsplus.com/set-up-routing-in-php-applications-using-the-symfony-routing-component--cms-31231t
 */
$routes = include __DIR__ . '/routes/Routes.php';

$context = new RequestContext();
$context->fromRequest(Request::createFromGlobals());

$matcher = new UrlMatcher($routes, $context);

try {
  $parameters = $matcher->match($context->getPathInfo());
  $controller = explode('::', $parameters['_controller']);
  $className = $controller[0];
  $methodName = $controller[1];
  $controllerInstance = new $className();
  $response = call_user_func_array([
    $controllerInstance,
    $methodName
  ], []);
}
catch (ResourceNotFoundException $e) {
  $response = new Response('Page not found', 404);
}
catch (Exception $e) {
  $response = new Response('An error occurred', 500);
}

$response->send();