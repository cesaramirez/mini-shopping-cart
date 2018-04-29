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
