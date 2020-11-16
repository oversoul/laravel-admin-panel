<?php

namespace Aecodes\LaravelAdminPanel\Responses;

use Illuminate\Config\Repository;
use Aecodes\AdminPanel\Responses\Renderer;

class BladeRenderer extends Renderer
{

	/**
	 * Render the output.
	 *
	 * @return string
	 */
	public function render()
	{
		$layout = $this->data['layout'];

		return view('panel::default', [
			'data'            => new Repository($this->data),
			'buildAttributes' => function ($items) {
				$attributes = [];

				foreach ($items as $key => $value) {
					$attributes[] = "{$key}=\"{$value}\"";
				}

				return implode(' ', $attributes);
			}
		]);
	}

}