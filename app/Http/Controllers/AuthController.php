<?php

namespace App\Http\Controllers;

use App\Models\User;
//use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    //

    public function register(Request $request)
    {   
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('API Token')->plainTextToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, ' User uspesno registrovan!');

    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            $user=Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['name'] = $user->name;

            return $this->sendResponse($success, ' User uspesno ulogovan!');
 
        }else{
        return $this->sendError('Neautorizovan pristup! ', ['error'=>'Unauthorised!']);

        }
    }
}
/*class AuthController extends Controller
{
    //use BaseController;

    public function register(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);

        return $this->sendResponse([
            'token' => $user->createToken('API Token')->plainTextToken
        ]);
    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return $this->sendError('Credentials not match', 401);
        }

        return $this->sendResponse([
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }
}
*/

