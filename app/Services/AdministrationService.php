<?php

namespace App\Services;

use App\Entities\ClientInfo;
use App\Repositories\AdministrationRepository;
use Tracy\Debugger;

class AdministrationService
{
    private AdministrationRepository $administrationRepository;

    public function __construct(AdministrationRepository $administrationRepository)
    {
        $this->administrationRepository = $administrationRepository;
    }

    public function getClientInfos(int $limit, int $offset): array
    {
        $clientInfos = $this->administrationRepository->getClientInfos($limit, $offset);
        return $this->mapClientInfos($clientInfos);
    }

    public function mapClientInfos(array $clientInfos): array
    {
        $clientInfosEntities = [];
        foreach ($clientInfos as $clientInfo) {
            $clientInfosEntities[] = new ClientInfo(
                $clientInfo->id,
                $clientInfo->name,
                $clientInfo->email,
                $clientInfo->phone,
                $clientInfo->age,
                $clientInfo->created_at,
            );
        }

        return $clientInfosEntities;
    }

    public function getClientInfosCount(): int
    {
        return $this->administrationRepository->getClientInfosCount();
    }
}