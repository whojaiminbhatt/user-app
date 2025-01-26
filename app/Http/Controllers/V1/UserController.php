<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\V1;
use App\Http\Requests\CreateUserRequests;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use App\Traits\ResponderTrait;
use App\Traits\UserTrait;

class UserController extends Controller
{
    use ResponderTrait, UserTrait;

    protected UserService $userService;
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    //Implementing Repository design pattern here. As the model which has sensitive information should not be directly exposed.
    /* get function which will return all user present in DB.
        @returns JsonResponses
    */
    public function getUsers(): JsonResponse {
        try {
        $users = $this->userService->all();
       
        return $this->positiveResponse('success', $users, 'succcess');
        } catch (\Exception $e) {
            \Log::info("Error in function: " . __FUNCTION__);
            \Log::error($e->getMessage());
            return $this->internalError();
        }
    }

    /* get function which will return user by id.
        @param $id
        @returns JsonResponses
    */
    public function getUserById($id) {
        try {
            $checkIfUserExissts = $this->userService->find($id);
            if ($checkIfUserExissts) {
                return $this->positiveResponse('success', $checkIfUserExissts, 'success');
            } else {
                return $this->negativeResponse('error', null, 'User not found', 404);
            }
        } catch (\Exception $e) {
            \Log::info("Error in function: " . __FUNCTION__);
            \Log::error($e->getMessage());
            return $this->internalError();
        }
    }

    public function add(CreateUserRequests $request) {
        try {
            
            $user = $this->userService->add($this->userDataMapper($request->all()));
            if ($user) {
                return $this->positiveResponse('success', $user, 'User added successfully');
            } else {
                return $this->negativeResponse('error', null, 'User not added', 404);
            }
        } catch (\Exception $e) {
            \Log::info("Error in function: " . __FUNCTION__);
            \Log::error($e->getMessage());
            return $this->internalError();
        }
    }

    public function update(CreateUserRequests $request, $id) {
        try {
            $user = $this->userService->update($id, $request->data);
            if ($user) {
                return $this->positiveResponse('success', $user, 'User updated successfully');
            } else {
                return $this->negativeResponse('error', null, 'User not updated', 404);
            }
        } catch (\Exception $e) {
            \Log::info("Error in function: " . __FUNCTION__);
            \Log::error($e->getMessage());
            return $this->internalError();
        }
    }

    public function delete($id) {
        try {
            $user = $this->userService->delete($id);
            if ($user) {
                return $this->positiveResponse('success', $user, 'User deleted successfully');
            } else {
                return $this->negativeResponse('error', null, 'User not deleted', 404);
            }
        } catch (\Exception $e) {
            \Log::info("Error in function: " . __FUNCTION__);
            \Log::error($e->getMessage());
            return $this->internalError();
        }
    }

}
