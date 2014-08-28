<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('account',[

		'before' => 'auth.token',

		function(){

			$user = Sentry::getUser();

			$token = $user->tokens()->where('client',BrowserDetect::toString())->first();

			return Response::json(array('user' => $user->toArray(), 'token' => $token->toArray()));

		}

	]);

Route::get('restaurants',[

		'before' => 'auth.token',

		function(){

			$restaurants = [];

			for($i = 0; $i < 10; $i++)
			{
				$restaurant['name'] = 'rest_'.$i;
				$restaurant['location'] = 'loc_'.$i;

				$restaurants[] = $restaurant;
			}

			return Response::json($restaurants,200);

		}

	]);
