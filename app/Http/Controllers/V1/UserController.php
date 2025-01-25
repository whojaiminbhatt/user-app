<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\V1;
use Illuminate\Http\JsonResponse;
use App\Traits\ResponderTrait;

class UserController extends Controller
{
    use ResponderTrait;

    //Implementing Repository design pattern here. As the model which has sensitive information should not be directly exposed.
    /* get function which will return all user present in DB.
        @returns JsonResponses
    */
    public function getUsers(): JsonResponse {
        return $this->positiveResponse(
            "success", [], 'success'
        );
    }


}
