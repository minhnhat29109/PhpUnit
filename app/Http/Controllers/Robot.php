<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Robot extends Controller
{
    private function greeting($name, $address)
    {
        return $name.' '.$address;
    }

}
