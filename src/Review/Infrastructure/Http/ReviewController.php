<?php

namespace Review\Infrastructure\Http;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class ReviewController
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getReviewsAction(Request $request): JsonResponse
    {
        $productId = $request->get('productId');

        if ($productId) {
            return new JsonResponse([
                'product_id' => $productId,
                'review' => "{$productId}_review",
            ], 200);
        }

        return new JsonResponse([], 401);
    }
}
