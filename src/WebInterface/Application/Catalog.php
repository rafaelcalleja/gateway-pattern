<?php

namespace WebInterface\Application;

interface Catalog
{
    public function show(string $productId): array;

    public function add(string $productId, string $description): array;
}
