<?php

declare(strict_types=1);

namespace App\Http\Controllers;

final class CodeOfConductController extends Controller
{
    public function __invoke()
    {
        return view('pages.code-of-conduct', ['page' => ['title' => 'Code of Conduct']]);
    }
}
