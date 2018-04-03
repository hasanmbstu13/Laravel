<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\TenantHostname;

class AuthenticateController extends Controller
{
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials']);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token']);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function authenticateTenant(Request $request)
    { 
        $tenantHostname = TenantHostname::where('hostname',strtolower($request->get('tenant')))->first();
        if($tenantHostname===null) {
            return response()->json(['error' => 'unknown_tenant']);
        }
        else {
            return response()->json(['success' => 'valid_tenant']);
            /*$request->tenant = $tenantHostname;
            $request->tenant->hostname = strtolower($request->tenant->hostname);
            LandlordFacade::addTenant('tenant_id', $tenantHostname->tenant_id);*/
        }
        
    }

    public function getAuthUser(Request $request){
        $user = JWTAuth::toUser($request->token);
        return response()->json(['result' => $user]);
    }
}
