<?php

use App\Core\Controller;

class AboutController extends Controller
{
    function Index()
    {
        $this->view("/admin/about/index");
    }
}
