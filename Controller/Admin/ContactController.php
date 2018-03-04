<?php
namespace Controller\Admin;

use Core\View as View;
use Lazer\Classes\Database as DB;

class ContactController {
    public function index() {
        $contacts = DB::table('contacts')->findAll();
        $view     = new View('admin/contact/list', ['contacts' => $contacts]);
        print $view;
    }
}