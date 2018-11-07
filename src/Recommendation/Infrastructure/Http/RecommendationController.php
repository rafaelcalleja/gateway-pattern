<?php

namespace Recommendation\Infrastructure\Http;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class RecommendationController
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function createRecomendationAction(Request $request): JsonResponse
    {
        $productId = $request->get('productId');
        $description = $request->get('description');

        if ($productId && $description) {
            return new JsonResponse([], 201);
        }

        return new JsonResponse([], 401);
    }
}
