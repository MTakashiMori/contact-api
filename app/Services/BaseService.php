<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;

/**
 * Class Service
 * @package App\Services
 */
class BaseService
{
    /**
     * @var $repository BaseRepository
     */
    protected $repository;

    /**
     * Service constructor.
     * @param $repository
     */
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $request
     * @return Collection
     */
    public function all($request = null)
    {
        isset($request['size']) ?
            $size = $request['size'] :
            $size = 15;

        isset($request['sortBy']) ?
            $field = $request['sortBy'] :
            $field = null;

        isset($request['orderDesc']) ?
            $order = $request['orderDesc'] :
            $order = null;

        unset($request['page']);
        unset($request['size']);
        unset($request['sortBy']);
        unset($request['orderDesc']);

        $response = collect([
            'message' => __('messages.list'),
            'data' => null,
            'code' => 200
        ]);

        $data = $this->repository->all($request, $field, $order)->paginate($size);

        $response['data'] = $data;

        return $response;

    }

    /**
     * @param $id
     * @return Collection
     */
    public function find($id)
    {
        $response = collect([
            'message' => __('messages.list'),
            'data' => null,
            'code' => 200
        ]);

        $data = $this->repository->find($id);

        $response['data'] = $data;

        return $response;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
        $response = collect([
            'message' => __('messages.list'),
            'data' => null,
            'code' => 200
        ]);

        $data = $this->repository->create($request);

        $response['data'] = $data;

        return $response;
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $response = collect([
            'message' => __('messages.updated'),
            'data' => null,
            'code' => 200
        ]);

        $data = $this->repository->update($request, $id);

        $response['data'] = $data;

        return $response;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response = collect([
            'message' => __('messages.list'),
            'data' => null,
            'code' => 200
        ]);

        $response['data'] =  $this->update(['active' => false], $id);

        return $response;
    }

    /**
     * @return mixed
     */
    public function random()
    {
        $data = $this->repository->all(null);
        return $data->get()->random()->id;
    }
}
