<?php

namespace App;

class Pages
{
    public function getPage($id)
    {
        switch ($id) {
            case '1':
                return 'Hello';
                break;
            case '2':
                return 'About';
                break;
        }

        return 'no page found';
    }
}