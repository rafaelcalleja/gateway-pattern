<?php

namespace WebInterface\Infrastructure\Integration;

use Review\Infrastructure\Http\ReviewController;
use Symfony\Component\HttpFoundation\Request;
use WebInterface\Application\Review;

final class DirectControllerInvocationReview implements Review
{
    /**
     * @var ReviewController
     */
    private $reviewController;

    public function __construct(ReviewController $reviewController)
    {
        $this->reviewController = $reviewController;
    }

    public function reviews(string $productId): array
    {
        $queryParameter = [
            'productId' => $productId,
        ];

        $postParameter = [];

        $response = $this->reviewController->getReviewsAction(
            new Request($queryParameter, $postParameter)
        );

        return json_decode($response->getContent(), true);
    }
}
