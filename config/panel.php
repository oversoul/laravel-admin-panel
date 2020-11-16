<?php
/**
 * Config panel admin.
 */

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Session;

return [
	'renderer' => 'blade',

	'renderers' => [
		'json'    => Aecodes\AdminPanel\Responses\JsonRenderer::class,
		'default' => Aecodes\AdminPanel\Responses\DefaultRenderer::class,
		'blade'   => Aecodes\LaravelAdminPanel\Responses\BladeRenderer::class,
	],

	'classes' => [

		'link'   => 'inline-flex ml-1 items-center justify-center px-3 py-2 border text-base rounded-md',

		'button' => 'inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out',
		
	],

	'menu' => function () {
		return [];
	},

	'old_value' => function ($name, $default) {
		return old($name, $default);
	},

	'errors' => function () {
		return Session::get('errors', new MessageBag)->all();
	}

];