<?php declare(strict_types=1);

namespace Handlers;

use Components\Auth;
use Components\Database;
use Components\Template;

class Contacts extends Handler
{
    public function handle(): string
    {
        if (!Auth::userIsAuthenticated()) {
            return (new Login)->handle();
        }
        $user = Auth::getUser();
        $formError = [];
        $formData = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $formError = $this->processForm();
            if (!$formError) {
                $this->requestRedirect('/contacts');
                return '';
            }
            $formData = $_POST;
        } elseif (!empty($_GET['edit'])) {
            $formData = Database::instance()->getOwnContactById($user->getId(), (int)$_GET['edit']);
        } elseif (!empty($_GET['delete'])) {
            Database::instance()->deleteOwnContactById($user->getId(), (int)$_GET['delete']);
            $this->requestRedirect('/contacts');
            return '';
        }
        return (new Template('contacts'))->render([
            'user' => $user,
            'contacts' => Database::instance()->getOwnContacts($user->getId()),
            'formError' => $formError,
            'formData' => $formData,
        ]);
    }

    public function getTitle(): string
    {
        return 'Contacts - ' . parent::getTitle();
    }

    private function processForm(): array
    {
        $formErrors = [];
        if (empty($_POST['name'])) {
            $formErrors['name'] = 'The name is mandatory.';
        } elseif (strlen($_POST['name']) < 2) {
            $formErrors['name'] = 'At least two characters are required for name.';
        }
        if (!filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL)) {
            $formErrors['email'] = 'The email is invalid.';
        }
        if (!empty($_POST['phone']) && trim($_POST['phone'], '+-() 1234567890')) {
            $formErrors['phone'] = 'The phone has invalid characters.';
        }
        if (strlen($_POST['address']) > 255) {
            $formErrors['address'] = 'The address exceeds 255 characters.';
        }

        if (!$formErrors) {
            if (!empty($_POST['id']) && ($contactId = (int)$_POST['id'])) {
                Database::instance()->updateContact($contactId, Auth::getUser()->getId(), $_POST['name'], $_POST['email'], $_POST['phone'] ?? '', $_POST['address'] ?? '');
            } else {
                Database::instance()->addContact(Auth::getUser()->getId(), $_POST['name'], $_POST['email'], $_POST['phone'] ?? '', $_POST['address'] ?? '');
            }
        }

        return $formErrors;
    }
}
