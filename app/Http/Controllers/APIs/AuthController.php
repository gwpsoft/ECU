<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use App\User;
use App\Projects;
use Auth;
use JWTAuth;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{

  public function __construct()
  {
    $this->middleware('jwt', ['except' => ['signin', 'signinBySupervisor']]);
  }

  public function signin(Request $request)
  {
    try {
      $token = JWTAuth::attempt($request->only('email', 'password'), [
        'exp' => Carbon::now()->addWeek()->timestamp, // (optional), added token expiry for one week
      ]);

    } catch (JWTException $e) {
      return response() -> json([
        'status' => 0,
        'message' => 'Could Not Authenticate'
      ], 500); // 500 => 'Internal Server Error',
    }

    if(!$token) {
      return response() -> json([
        'status' => 0,
        'message' => 'Could Not Authenticate'
      ], 401); // 401 is unauthorized status code
    }

    // grab the user
    $user = User::where('id', '=', Auth::id())->select('id', 'name', 'email', 'phone', 'contact_id', 'group', 'status','FCM_Token')->first();
$user->TEST = "YESSS";
    // if authenticated
    return response() -> json([
      'status' => 1,
      'message' => 'Authenticated',
      'response' => [
        'user' => $user,
        'token' => $token,
      ]
    ]);
  }


  public function signinBySupervisor(Request $request)
  {
      $rules = [

          'email' => ['required','email'],
          "password" => ['required']
      ];
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
          $er = $validator->errors();
//          return response()->json($er, 201);
          return response()->json([
              'status' => 0,
              'Error' => $er
          ], 201); // 500 => 'Internal Server Error',
      } else {


          try {
              $token = JWTAuth::attempt($request->only('email', 'password'), [
                  'exp' => Carbon::now()->addWeek()->timestamp, // (optional), added token expiry for one week
              ]);

          } catch (JWTException $e) {
              return response()->json([
                  'status' => 0,
                  'message' => 'Could Not Authenticate'
              ], 500); // 500 => 'Internal Server Error',
          }

          if (!$token) {
              return response()->json([
                  'status' => 0,
                  'message' => 'Could Not Authenticate'
              ], 401); // 401 is unauthorized status code
          }

          // grab the user
          $user = User::where('id', '=', Auth::id())->select('id', 'name', 'email', 'phone', 'contact_id', 'group', 'status')->first();

          // if authenticated
          return response()->json([
              'status' => 1,
              'user_info' => $user,
              'Projects' => $this->getProjectsList($user->contact_id),
              'token' => $token
          ], 200);
      }
  }


  public function me()
  {
    try {

      if (! $user = JWTAuth::parseToken()->authenticate()) {
        return response()->json(['user_not_found'], 404);
      }

    } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

      return response()->json(['token_expired'], $e->getStatusCode());

    } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

      return response()->json(['token_invalid'], $e->getStatusCode());

    } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

      return response()->json(['token_absent'], $e->getStatusCode());

    }

    return response()->json(compact('user'));
  }

  public function signout()
  {
    try {
      JWTAuth::invalidate(JWTAuth::getToken());
      return response()->json([
        'status' => 1,
        'message' => "Sign out successfully"
      ], 200);

    } catch (JWTException $e) {
      // something went wrong whilst attempting to encode the token
      return response()->json([
        'status' => 0,
        'message' => 'Failed to logout, please try again.'
      ], 500);
    }
  }

  /**
  * Refresh a token.
  *
  * @return \Illuminate\Http\JsonResponse
  */
  public function refresh()
  {
    return $this->respondWithToken($this->guard()->refresh());
  }

  /**
  * Get the token array structure.
  *
  * @param  string $token
  *
  * @return \Illuminate\Http\JsonResponse
  */
  protected function respondWithToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => $this->guard()->factory()->getTTL() * 60
    ]);
  }

  /**
  * Get the guard to be used during authentication.
  *
  * @return \Illuminate\Contracts\Auth\Guard
  */
  public function guard()
  {
    return Auth::guard();
  }


  ///////////////////// Private functions below /////////////////////

  private function getProjectsList($id)
  {
    return Projects::select('Id', 'Name')->where('Contact_id', '=', $id)->where('Active', '=', '1')->orderBy('Id', 'desc')->get();
  }
    public function setFCM(Request $request)
    {
        //return response()->json($request->input());
        $rules = [

            'FCM_TOKEN' => ['required'],
            "UserID" => ['required']
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $er = $validator->errors();
            return response()->json($er, 201);
        } else {
            $ValidData = $request->input();
        }
        $User = User::find($ValidData['UserID']);
        // return $User;
        if ($User) {
            // return $User;

            $User->FCM_Token = $ValidData['FCM_TOKEN'];
            if($User->save())
            {
                return response()->json([
                    'Message' => "FCM Token Updated Successffuly",
                    'Status' => "Success"
                ], 200);
            }else
            {
                return response()->json([
                    'Message' => "Can not update FCM Token",
                    'Status' => "Success"
                ], 200);
            }
        } else {
            return response()->json([
                'Message' => "User no exist",
                'Status' => "Fail"
            ], 201);
        }
    }
}
