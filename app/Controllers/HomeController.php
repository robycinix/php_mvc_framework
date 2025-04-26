<?php
namespace App\Controllers;

use Core\Controller;
use Core\Request;

class HomeController extends Controller {
    public function index(Request $request) {
        return $this->view('home', ['message' => 'Benvenuto nel tuo framework!']);
    }
}
