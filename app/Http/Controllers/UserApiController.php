<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UserApiController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'telephone' => $request->telephone,
                'date_of_birth' => $request->date_of_birth,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];

            $userRepository = New UserRepository(new User());
            $user = $userRepository->store($data);

            $response = ['data' => 'User created'];
            $code = 201;

            return response()->json($response, $code);
        }
        catch (\Exception $ex) {
            return response()->json(['error' => 'ERROR'], 500);
        }
    }

    public function show($id) : User
    {
        try {
            return User::findOrFail($id);
        }
        catch (ModelNotFoundException $e){
            throw new NotFoundException ($e);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $userRepository = New UserRepository(new User());
            $userData = $userRepository->find($request->id);
            $userData->delete();

            return response()->json(['data' => 'User deleted'], 200);
        }
        catch (Exception $e){
            return response()->json(['data' => $e->getMessage()], 404);
        }
    }

    public function update(Request $request)
    {
        try{
            $data =[
                'name' => request('name'),
                'telephone' => request('telephone'),
                'date_of_birth' => request('date_of_birth'),
                'username' => request('username'),
                'email' => request('email')
            ];

            $userRepo = new UserRepository(new User());
            $findUser = $userRepo->find($request->id);
            $updateUser = $findUser->update($data);
        
            if ($updateUser) {
                $response = ['data' => 'User updated'];
                $code = 200;

                return response()->json($response, $code);
            }
        }
        catch (\Exception $e) {
            if ($e instanceof NotFoundException) {
                $code = 404;
                $message = ['date' => 'Not found'];
            }
            else {
                $code = 406;
                $message = ['data' => $e];
            }
            return response()->json($message, $code);
        }
    }
}
