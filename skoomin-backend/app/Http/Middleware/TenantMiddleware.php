<?php

namespace App\Http\Middleware;

use Closure;
use App\TenantHostname;
use HipsterJazzbo\Landlord\Facades\Landlord;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $tenantHostname = TenantHostname::where('hostname',strtolower(parse_url($request->root(),PHP_URL_HOST)))->first();
        if($tenantHostname===null) {
            return response()->json(['error' => 'unknown_tenant']);
        }
        else {

            // Set the tenant id to every request made
            $request->tenant = $tenantHostname;
            $request->tenant->hostname = strtolower($request->tenant->hostname);
            Landlord::addTenant('tenant_id', $tenantHostname->tenant_id);

            return $next($request);
        }
        
    }
}
