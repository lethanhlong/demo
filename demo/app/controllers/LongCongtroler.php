<?php

class LongController extends BaseController {

	public function showWelcome()
	{
		return View::make('hello');

	}