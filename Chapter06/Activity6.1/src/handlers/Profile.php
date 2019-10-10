<?php declare(strict_types=1);

namespace Handlers;

class Profile extends Handler
{
    public function handle(): string
    {
        if (!array_key_exists('username', $_SESSION)) {
            return (new Login)->handle();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST'
            && isset($_POST['do'])
            && $_POST['do'] === 'get-support'
        ) {
            $formErrors = $this->processContactForm($_POST);
            if (!count($formErrors)) {
                $this->requestRefresh();
                return '';
            }
        }
        return (new \Components\Template('profile'))->render([
            'username' => $_SESSION['username'],
            'formErrors' => $formErrors ?? null,
            'sentForms' => $_SESSION['sentForms'] ?? [],
            'formCsrfToken' => $this->getCsrfToken(),
        ]);
    }

    private function processContactForm(array $data): ?array
    {
        list($form, $errors) = $this->validateForm($data);
        if (!count($errors)) {
            $_SESSION['sentForms'][] = [
                'dateAdded' => date('Y-m-d'),
                'timeAdded' => date(DATE_COOKIE),
                'form' => $form,
            ];
        }
        return $errors;
    }

    private function validateForm(array $data): array
    {
        $errors = [];
        if (!isset($data['csrf-token']) || $data['csrf-token'] !== $this->getCsrfToken()) {
            $errors['form'] = 'Invalid token, please refresh the page and try again.';
        } elseif (($_SESSION['userdata']['level'] === 'STANDARD')
            && $this->hasSentFormToday($_SESSION['sentForms'] ?? [])
        ) {
            $errors['form'] = 'You are only allowed to send one form per day.';
        }

        $name = trim($data['name'] ?? '');
        if (empty($name)) {
            $errors['name'] = 'The name cannot be empty.';
        }
        if (empty($data['email'] ?? '')) {
            $errors['email'] = 'The email cannot be empty.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'The email address is invalid.';
        }
        $message = trim($data['message'] ?? '');
        if (!$message) {
            $errors['message'] = 'The message cannot be empty.';
        }
        if (strlen($message) <= 40) {
            $errors['message'] = 'The message is too short.';
        }
        $form = [
            'name' => $name,
            'email' => $data['email'],
            'message' => $message,
        ];
        return [$form, $errors];
    }

    private function getCsrfToken(): string
    {
        if (!isset($_SESSION['csrf-token'])) {
            $_SESSION['csrf-token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf-token'];
    }

    private function hasSentFormToday(array $sentForms): bool
    {
        $today = date('Y-m-d');
        foreach ($sentForms as $sentForm) {
            if ($sentForm['dateAdded'] === $today) {
                return true;
            }
        }
        return false;
    }

    public function getTitle(): string
    {
        return 'Profile - ' . parent::getTitle();
    }

    private function requestRefresh()
    {
        $this->requestRedirect($_SERVER['REQUEST_URI']);
    }
}
