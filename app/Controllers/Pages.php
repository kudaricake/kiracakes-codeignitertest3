<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function about(): string
    {
        $data = [
            'title' => 'About Our Website',
            'message' => 'This page demonstrates a route, controller method, and view working together.',
        ];

        return view('pages/about', $data);
    }
}
