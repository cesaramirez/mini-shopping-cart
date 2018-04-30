<?php

$router->namespace('API\V1\Auth')
       ->prefix('v1/auth')
       ->group(function ($router) {
           $router->middleware('guest:api')->group(function ($router) {
               $router->post('login', 'LoginController@login');
               $router->post('register', 'RegisterController@register');
               $router->post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
               $router->post('password/reset', 'ResetPasswordController@reset');
           });
           $router->middleware('auth:api')->group(function ($router) {
               $router->post('logout', 'LoginController@logout');
               $router->post('me', 'LoginController@me');
           });
       });

$router->namespace('API\V1')
       ->prefix('v1')
       ->group(function ($router) {
           $router->get('products', 'ProductsController@index');
           $router->get('cart', 'CartsController@index');
           $router->post('cart', 'CartsController@store');
           $router->delete('cart', 'CartsController@deleleAll');
           $router->delete('cart/{productId}', 'CartsController@destroy');
           $router->post('checkout', 'CartsController@checkout');
       });
