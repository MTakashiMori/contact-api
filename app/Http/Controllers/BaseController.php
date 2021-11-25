<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

/**
 * Class ResourcesController
 * @package App\Http\Controllers
 */
class BaseController extends Controller
{
    /**
     * @var array $response
     */
    public $response = [
        'message' => '',
        'data' => '',
        'code' => ''
    ];

    /**
     * @var BaseService $service
     */
    protected $service;

    protected $featureService;

    /**
     * ResourcesController constructor.
     * @param BaseService $service
     */
    public function __construct(BaseService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $response = $this->response;

        try {
            $data = $this->service->all($request->all());
            $response['message'] = $data['message'];
            $response['data'] = $data['data'];
            $response['code'] = $data['code'];
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            $response['data'] = null;
            $response['code'] = is_numeric($e->getCode()) ? $e->getCode() : 500;
        }

        return response()->json([
            'message' => $response['message'],
            'data' => $response['data']
        ], $response['code']);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $response = $this->response;

        try {
            $data = $this->service->find($id);

            $response['message'] = $data['message'];
            $response['data'] = $data['data'];
            $response['code'] = $data['code'];
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            $response['data'] = null;
            $response['code'] = is_numeric($e->getCode()) ? $e->getCode() : 500;
        }

        return response()->json([
            'message' => $response['message'],
            'data' => $response['data']
        ], $response['code']);
    }

    /**ß
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $response = $this->response;

        try {
            $data = $this->service->destroy($id);

            $response['message'] = $data['message'];
            $response['data'] = $data['data'];
            $response['code'] = $data['code'];
        } catch (Exception $e) {
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
