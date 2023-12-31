<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function index($seller_id);
    public function create();
    public function store($request);
    public function edit(int $id);
    public function update($request, int $id);
    public function destroy(int $id);
}
