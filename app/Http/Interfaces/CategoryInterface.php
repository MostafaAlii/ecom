<?php
namespace App\Http\Interfaces;
interface CategoryInterface {
    public function index();
    public function store($request);
}