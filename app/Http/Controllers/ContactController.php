<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class ContactController
 * @package App\Http\Controllers
 */
class ContactController extends BaseController
{

    /**
     * ContactController constructor.
     * @param ContactService $service
     */
    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    /**ß
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $response = $this->response;

        try {
            $data = $this->service->create($request->all());

            $response['message'] = $data['message'];
            $response['data'] = $data['data'];
            $response['code'] = $data['code'];
        } catch (\Exception $e) {
            $response['message'] = $e->getMessage();
            $response['data'] = null;
            $response['code'] = is_numeric($e->getCode()) ? $e->getCode() : 500;
        }

        return response()->json([
            'message' => $response['message'],
            'data' => $response['data']
        ], $response['code']);
    }

}
