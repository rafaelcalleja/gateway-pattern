<?php

namespace WebInterface\Application;

interface Review
{
    public function reviews(string $productId): array;
}
