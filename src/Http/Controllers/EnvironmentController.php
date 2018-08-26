<?php

namespace Marianvlad\NovaEnvCard\Http\Controllers;

use Illuminate\Http\Request;

class EnvironmentController
{
	public function show()
	{
		return file_get_contents(base_path('.env'));
	}

	public function update(Request $request)
	{
		file_put_contents(base_path('.env'), $request->value);
	}
}