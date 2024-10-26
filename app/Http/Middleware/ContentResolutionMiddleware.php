<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\ContentResolverService;

class ContentResolutionMiddleware
{
    protected $contentResolver;

    /**
     * Instantiate the middleware.
     *
     * @param  ContentResolverService  $contentResolver
     */
    public function __construct(ContentResolverService $contentResolver)
    {
        $this->contentResolver = $contentResolver;
    }

    /**
     * Handle an incoming request.
     *
     * Resolves content and injects it into the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure                  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $segments = $request->segments();
        $result = $this->contentResolver->resolve($segments);

        $request->attributes->add([
            'examSet' => $result['examSet'],
            'question' => $result['question'],
            'breadcrumbs' => $result['breadcrumbs'],
        ]);

        return $next($request);
    }
}
