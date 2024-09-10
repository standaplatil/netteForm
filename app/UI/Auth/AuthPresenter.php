<?php

namespace App\UI\Auth;

use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use Nette\Security\AuthenticationException;

class AuthPresenter extends Presenter
{
    public function actionLogin(): void
    {

    }

    public function actionLogout(): void
    {
        $user = $this->getUser();
        $user->logout();
        $this->redirect("Home:");
    }

    protected function createComponentLoginForm(): Form
    {
        $form = new Form;
        $form->addText('username', 'Uživatelské jméno:')
            ->setRequired("Uživatelské jméno je povinné.");
        $form->addPassword('password', 'Heslo:')
            ->setRequired("Heslo je povinné.");

        $form->onSuccess[] = [$this, 'formSucceeded'];

        return $form;
    }

    public function formSucceeded(Form $form, $data): void
    {
        $user = $this->getUser();

        try {
            $user->login($data->username, $data->password);
        } catch (AuthenticationException $e) {
            $this->flashMessage('Uživatelské jméno nebo heslo je nesprávné');
            $this->redirect('this');
        }

        $this->flashMessage('Byl jste úspěšně přihlášen.');
        $this->redirect('Home:');
    }
}