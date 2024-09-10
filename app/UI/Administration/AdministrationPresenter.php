<?php

namespace App\UI\Administration;

use App\Services\AdministrationService;
use Nette\Application\UI\Presenter;
use Nette\Utils\Paginator;
use Tracy\Debugger;

class AdministrationPresenter extends Presenter
{
    private AdministrationService $administrationService;

    public function __construct(AdministrationService $administrationService)
    {
        parent::__construct();
        $this->administrationService = $administrationService;
    }

    public function actionDefault(int $page = 1)
    {
        $user = $this->getUser();

        if (!$user->isLoggedIn()) {
            $this->redirect('Home:default');
        }

        $clientInfosCount = $this->administrationService->getClientInfosCount();

        $paginator = new Paginator();
        $paginator->setItemCount($clientInfosCount);
        $paginator->setItemsPerPage(10);
        $paginator->setPage($page);

        $clientInfos = $this->administrationService->getClientInfos($paginator->getLength(), $paginator->getOffset());
        $this->template->clientInfos = $clientInfos;
        $this->template->paginator = $paginator;
    }
}