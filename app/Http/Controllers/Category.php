<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Category extends Controller
{
    public function store($name, $description) 
    {
        return $name."_".$description;
    }
}
