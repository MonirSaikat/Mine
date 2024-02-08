<?php

namespace App\Controllers;

class AboutController extends Controller
{
  public function index()
  {
    $pageTitle = 'About US';
    $this->view(data: compact('pageTitle'));
  }
}
