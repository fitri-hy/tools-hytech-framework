<?php

namespace App\Controllers;

use App\Helper\Helper;
use App\Models\Model;

class Controller {
    protected $helper;
    protected $model;

    public function __construct(Helper $helper, Model $model) {
        $this->helper = $helper;
        $this->model = $model;
    }
    
    public function index() {
        $pageTitle = 'Welcome to HyTech Framework';
        $pageDescription = 'HyTech Framework is a PHP framework with an MVC model';
        $pageKeywords = 'hytech, framework, website, php';

        $content = __DIR__ . '/../views/pages/home.hytech';
        include_once(__DIR__ . '/../views/layout.hytech');
    }
}