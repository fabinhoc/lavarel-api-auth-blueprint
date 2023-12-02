<?php

namespace App\Traits;

trait ApiResponser
{
    /**
     * Return a success JSON response.
     *
     * @param  array|string  $data
     * @param  string  $message
     * @param  int|null  $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function success($data, string $message = null, int $code = 200)
    {
        return response()->json([
            'status' => 'Success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    /**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  int  $code
     * @param  array|string|null  $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function error(string $message = null, int|string $code, $data = null)
    {
        $code = intval($code);
        if (!in_array($code, [400, 500, 401, 422, 404, 403, 501]))
            $code = 500;

        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'errors' => $data
        ], $code);
    }
}
