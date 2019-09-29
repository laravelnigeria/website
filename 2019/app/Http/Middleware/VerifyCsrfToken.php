<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    protected function inExceptArray($request)
    {
        // Necessary because we want to read the URL from the configuration file and we cannot do it
        // in the properties definition.
        $this->except[] = config('tito.webhook_url');

        return parent::inExceptArray($request);
    }
}
