<?php

namespace WebInterface\Application;

interface Recommendation
{
    public function addRecommendation(string $productId, string $text): array;
}
