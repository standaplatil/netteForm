<?php

declare(strict_types=1);

namespace App\UI\Home;

use App\Services\ClientInfoService;
use Nette;
use Nette\Application\UI\Form;


final class HomePresenter extends Nette\Application\UI\Presenter
{
    private ClientInfoService $clientInfoService;

    public function __construct(
        ClientInfoService $clientInfoService
    ) {
        parent::__construct();
        $this->clientInfoService = $clientInfoService;
    }

    public function actionDefault()
    {

    }

    /**
     * @return Form
     */
    protected function createComponentClientForm(): Form
    {
        $form = new Form;
        $form->addText('name', 'Jméno:');
        $form->addText('email', 'E-mail:');
        $form->addText('phone', 'Telefon:');
        $form->addInteger('age', 'Věk:');
        return $form;
    }

    public function handleAddClientInfo(): void
    {
        $values = $this->getHttpRequest()->getPost();
        $errors = $this->validateFormData($values);

        if (count($errors) > 0) {
            $this->sendResponse(new Nette\Application\Responses\JsonResponse(['error' => $errors]));
        }

        $this->clientInfoService->saveClientInfo($values);
        $this->sendResponse(new Nette\Application\Responses\JsonResponse(['success' => true]));

    }

    public function validateFormData(array $values): array
    {
        $errors = [];
        if (trim($values['name']) === '') {
            $errors[] = "empty-name";
        }

        if (trim($values['email']) === '') {
            $errors[] = "empty-email";
        } elseif (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "invalid-email";
        }

        if (trim($values['phone']) === '') {
            $errors[] = "empty-phone";
        }

        if (trim($values['age']) === '') {
            $errors[] = "empty-age";
        }

        return $errors;
    }
}
