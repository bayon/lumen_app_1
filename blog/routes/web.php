<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('foo', function () {
    return 'Hello Lumen Here';
});

$router->post('foo', function () {
    //
});

/*
$router->get($uri, $callback);
$router->post($uri, $callback);
$router->put($uri, $callback);
$router->patch($uri, $callback);
$router->delete($uri, $callback);
$router->options($uri, $callback);

Of course, sometimes you will need to capture segments of the URI within your route. For example, you may need to capture a user's ID from the URL. You may do so by defining route parameters:

$router->get('user/{id}', function ($id) {
    return 'User '.$id;
});
You may define as many route parameters as required by your route:

$router->get('posts/{postId}/comments/{commentId}', function ($postId, $commentId) {
    //
});

Optional Parameters
You may define optional route parameters by enclosing part of the route URI definition in [...]. So, for example, /foo[bar] will match both /foo and /foobar. Optional parameters are only supported in a trailing position of the URI. In other words, you may not place an optional parameter in the middle of a route definition:

$router->get('user[/{name}]', function ($name = null) {
    return $name;
});

Regular Expression Constraints
You may constrain the format of your route parameters by defining a regular expression in your route definition:

$router->get('user/{name:[A-Za-z]+}', function ($name) {
    //
});

Middleware
To assign middleware to all routes within a group, you may use the middleware key in the group attribute array. Middleware will be executed in the order you define this array:

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('/', function ()    {
        // Uses Auth Middleware
    });

    $router->get('user/profile', function () {
        // Uses Auth Middleware
    });
});

Namespaces
Another common use-case for route groups is assigning the same PHP namespace to a group of controllers. You may use the  namespace parameter in your group attribute array to specify the namespace for all controllers within the group:

$router->group(['namespace' => 'Admin'], function() use ($router)
{
    // Using The "App\Http\Controllers\Admin" Namespace...

    $router->group(['namespace' => 'User'], function() use ($router) {
        // Using The "App\Http\Controllers\Admin\User" Namespace...
    });
});

Route Prefixes
The prefix group attribute may be used to prefix each route in the group with a given URI. For example, you may want to prefix all route URIs within the group with admin:

$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('users', function ()    {
        // Matches The "/admin/users" URL
    });
});
You may also use the prefix parameter to specify common parameters for your grouped routes:

$router->group(['prefix' => 'accounts/{accountId}'], function () use ($router) {
    $router->get('detail', function ($accountId)    {
        // Matches The "/accounts/{accountId}/detail" URL
    });
});

*/