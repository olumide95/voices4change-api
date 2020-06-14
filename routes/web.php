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
use App\Submission;
$router->get('/', function () use ($router) {
    return 'Api service reached';
});


$router->post('/submit', 'SubmissionController@submit');
$router->get('/export', 'SubmissionController@export');