<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $successStatus;
    private $createdStatus;
    private $unAuthorizedStatus;
    private $forbiddenStatus;
    private $notFoundStatus;
    private $unProcessableEntryStatus;
    private $serverErrorStatus;

    public function __construct() {
        $this->successStatus=200;
        $this->createdStatus=201;
        $this->unAuthorizedStatus=401;
        $this->forbiddenStatus=403;
        $this->notFoundStatus=404;
        $this->unProcessableEntryStatus = 422;
        $this->serverErrorStatus = 500;
    }

    public function getUsers(Request $request){
        $response['success'] = false;
        $data = [];
        if($request->method() !== "GET"){
            $response['message'] = 'Method not allowed!';
            return response()->json($response, $this->forbiddenStatus);
        }
        try{
            $users = User::all();
            if($users){
                return response()->json([
                    'success' => true,
                    'message' => null,
                    'data' => $users,
                ], $this->successStatus);
            }else{
                throw new \Exception('Not found.', $this->notFoundStatus);
            }
        } catch (\Exception $e){
            $response['message'] = $e->getMessage();
            return response()->json($response, $e->getCode());
        }
    }

    public function createUser(Request $request){
        $response['success'] = false;
        if($request->method() !== "POST"){
            $response['message'] = 'Method not allowed!';
            return response()->json($response, $this->forbiddenStatus);
        }
        try{
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'mobile' => 'required|string',
                'email' => 'required|email|unique:users,email,',
                'password' => 'required|min:8',
            ]);
            if ($validator->fails()) {
                $response['response'] = $validator->messages();
                return response()->json($response, $this->unProcessableEntryStatus);
            }

            $data = $request->except('_token');
            $user = User::create($data);
            if($user){
                return response()->json([
                    'success' => true,
                    'message' => 'Data saved successfully.',
                    'data' => $user,
                ], $this->createdStatus);
            }else{
                throw new \Exception('Not found.', $this->notFoundStatus);
            }
        } catch (\Exception $e){
            $response['message'] = $e->getMessage();
            return response()->json($response, $this->serverErrorStatus);
        }
    }

    public function editUser(Request $request, $id){
        $response['success'] = false;
        if($request->method() !== "PUT"){
            $response['message'] = 'Method not allowed!';
            return response()->json($response, $this->forbiddenStatus);
        }
        try{
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'mobile' => 'required|string',
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'required|min:8',
            ]);
            if ($validator->fails()) {
                $response['response'] = $validator->messages();
                return response()->json($response, $this->unProcessableEntryStatus);
            }

            $data = $request->except('_token');
            $user = User::where('id', $id)->update($data);
            if($user){
                return response()->json([
                    'success' => true,
                    'message' => 'Data updated successfully.',
                    'data' => $user,
                ], $this->createdStatus);
            }else{
                throw new \Exception('Not found.', $this->notFoundStatus);
            }
        } catch (\Exception $e){
            $response['message'] = $e->getMessage();
            return response()->json($response, $this->serverErrorStatus);
        }
    }

    public function deleteUser(Request $request){
        $response['success'] = false;
        if($request->method() !== "DELETE"){
            $response['message'] = 'Method not allowed!';
            return response()->json($response, $this->forbiddenStatus);
        }
        try{
            $validator = Validator::make($request->all(),[
                'user_id' => 'required|numeric',
            ]);
            if ($validator->fails()) {
                $response['response'] = $validator->messages();
                return response()->json($response, $this->unProcessableEntryStatus);
            }

            $user = User::find($request->user_id);
            if($user){
                $user->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Data deleted successfully.',
                ], $this->successStatus);
            }else{
                throw new \Exception('Not found.', $this->notFoundStatus);
            }
        } catch (\Exception $e){
            $response['message'] = $e->getMessage();
            return response()->json($response, $this->serverErrorStatus);
        }
    }
}
