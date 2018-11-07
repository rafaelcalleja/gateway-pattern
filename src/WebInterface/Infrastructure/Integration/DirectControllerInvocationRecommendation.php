<?php

namespace WebInterface\Infrastructure\Integration;

use Recommendation\Infrastructure\Http\RecommendationController;
use Symfony\Component\HttpFoundation\Request;
use WebInterface\Application\Recommendation;

final class DirectControllerInvocationRecommendation implements Recommendation
{
    /**
     * @var RecommendationController
     */
    private $recommendationController;

    public function __construct(RecommendationController $recommendationController)
    {
        $this->recommendationController = $recommendationController;
    }

    public function addRecommendation(string $productId, string $text): array
    {
        $queryParameter = [
            'productId' => $productId,
            'description' => $text,
        ];

        $postParameter = [];

        $response = $this->recommendationController->createRecomendationAction(
            new Request($queryParameter, $postParameter)
        );

        if ($response->getStatusCode() !== 201) {
            return [
                'error' => $response->getStatusCode()
            ];
        }

        return json_decode($response->getContent(), true);
    }
}
