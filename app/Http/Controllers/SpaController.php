<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class SpaController
 * Контроллер для отображения spa.blade, к которой уже подключается vue
 * @package App\Http\Controllers
 */
class SpaController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('spa');
    }
}