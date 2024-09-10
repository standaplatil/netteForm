<?php

namespace App\Services;

use App\Repositories\ClientInfoRepository;

class ClientInfoService
{
    private ClientInfoRepository $clientInfoRepository;

    public function __construct(ClientInfoRepository $clientInfoRepository)
    {

        $this->clientInfoRepository = $clientInfoRepository;
    }

    public function saveClientInfo($clientInfo): void
    {
        $this->clientInfoRepository->createNewRecord(
            $clientInfo["name"],
            $clientInfo["email"],
            $clientInfo["phone"],
            $clientInfo["age"]
        );
    }
}