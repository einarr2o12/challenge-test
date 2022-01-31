<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ResponserTraits
{
    public function responseNotFound($message = 'Not Found')
    {
        return response()->json([
            'status'  => Response::HTTP_NOT_FOUND,
            'message' => $message
        ]);
    }

    public function responseInternalError($message = 'Server Error')
    {
        return response()->json([
            'status'  => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message' => $message
        ]);
    }

    public function responseSuccess($data)
    {
        return response()->json($data);
    }

    public function responseSuccessWithStatusCode($message = 'successful')
    {
        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => $message
        ]);
    }
}
