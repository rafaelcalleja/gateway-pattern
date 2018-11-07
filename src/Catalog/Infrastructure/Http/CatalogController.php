<?php

namespace Catalog\Infrastructure\Http;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class CatalogController
{
    /**
     * @return JsonResponse
     */
    public function showCatalogAction(Request $request): JsonResponse
    {
        $productId = $request->get('productId');

        if ($productId) {
            return new JsonResponse([
                'product_id' => $productId,
                'text' => "{$productId}_text",
            ], 200);
        }

        return new JsonResponse([], 401);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function addCatalogAction(Request $request): JsonResponse
    {
        $productId = $request->get('productId');

        if ($productId) {
            return new JsonResponse([], 201);
        }

        return new JsonResponse([], 401);
    }
}
