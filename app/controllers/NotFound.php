<?php

namespace App\Controllers;

use App\Helper\Helper;
use App\Models\Model;

class NotFound {
    protected $helper;
    protected $model;

    public function __construct(Helper $helper, Model $model) {
        $this->helper = $helper;
        $this->model = $model;
    }
    
    public function index() {
        $pageTitle = 'Error 404: Page not found';
        $pageDescription = 'Oops! The page you are looking for does not exist.';
        $pageKeywords = 'error, 404, page, not found';

        $content = __DIR__ . '/../views/pages/404.hytech';
        include_once(__DIR__ . '/../views/layout.hytech');
    }
}
