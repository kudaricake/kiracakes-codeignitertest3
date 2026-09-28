<?php

namespace App\Controllers;

class Helloworld extends BaseController
{
    public function index(): string
    {
        return view('hello_view');
    }
}
