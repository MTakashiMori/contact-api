<?php

namespace App\Services;

use App\Repositories\ContactRepository;

/**
 * Class ContactService
 * @package App\Services
 */
class ContactService extends BaseService
{

    /**
     * ContactService constructor.
     * @param ContactRepository $repository
     */
    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($request)
    {
        $response = collect([
            'message' => __('messages.list'),
            'data' => null,
            'code' => 200
        ]);

        $data = $this->getFileData($request['file']);

        $data = $this->mapFields($data);

        $this->loopAndSaveContacts($data, null);

        return $response;

    }

    private function getFileData($request)
    {
        $temp = tmpfile();
        fwrite($temp, base64_decode(substr($request, strpos($request, "base64,") + 7)));
        $path = stream_get_meta_data($temp)['uri'];

        $open = fopen($path, "r");

        $response = [];

        while (($data = fgetcsv($open, 1000, ",")) !== FALSE)
        {
            array_push($response, $data);
        }

        fclose($open);

        return $response;
    }

    private function mapFields($data)
    {
        $header = $data[0];

        for($i = 1; $i <= (sizeof($data) - 1); $i++) {
            $data[$i] = array_combine($header, $data[$i]);
        }

        array_shift($data);

        return $data;
    }

    private function loopAndSaveContacts($data, $strategy)
    {
        collect($data)->each(function ($item) use ($strategy) {
            $exists = $this->checkDuplicated($item['email']);
//            $strategy
                $this->repository->create($item);
        });
    }

    private function checkDuplicated($item)
    {
        return $this->repository->all(['email' => $item])->exists();
    }
}
