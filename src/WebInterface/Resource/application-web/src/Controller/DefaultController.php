<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use WebInterface\Application\Catalog;
use WebInterface\Application\Recommendation;
use WebInterface\Application\Review;

class DefaultController
{
    /**
     * @var Catalog
     */
    private $catalog;

    /**
     * @var Review
     */
    private $review;

    /**
     * @var Recommendation
     */
    private $recommendation;

    public function __construct(
        Catalog $catalog,
        Review $review,
        Recommendation $recommendation
    ) {
        $this->catalog = $catalog;
        $this->review = $review;
        $this->recommendation = $recommendation;
    }

    public function index()
    {
        return $this->buildResponse(
            'Local',
            null
        );
    }

    public function reviewShow($review)
    {
        $response = $this->review->reviews($review);

        return $this->buildResponse(
            'Review',
                json_encode($response)
        );

    }

    public function catalogShow($catalog)
    {
        $response = $this->catalog->show($catalog);

        return $this->buildResponse(
            'Catalog',
            json_encode($response)
        );
    }

    public function catalogCreate($catalog, $text)
    {
        $response = $this->catalog->add($catalog, $text);

        return $this->buildResponse(
            'Catalog',
            json_encode($response)
        );

    }

    public function recommendationCreate($recommendation, $text)
    {
        $response = $this->recommendation->addRecommendation($recommendation, $text);

        return $this->buildResponse(
            'Recommendation',
            json_encode($response)
        );
    }

    public function recommendationError()
    {
        $response = $this->recommendation->addRecommendation('', '');

        return $this->buildResponse(
            'Recommendation',
            json_encode($response)
        );
    }

    public function catalogError()
    {
        $response = $this->recommendation->addRecommendation('', '');

        return $this->buildResponse(
            'Recommendation',
            json_encode($response)
        );
    }

    private function buildResponse(string $context, $responseJson)
    {
        return new Response(<<<EOF
<html>
  <body>
    <h3>Applicación Web Optimizada para Desktop</h3>
    <br />Llamada a contexto externo {$context}
    <br />Respuesta: {$responseJson}
    <br /><br />
    <br /><a href="/catalog/show/1">/catalog/show/1</a>
    <br /><a href="/catalog/add/2/description">/catalog/add/2/description</a>
    <br /><a href="/recommendation/create/1/recommended">/recommendation/create/1/recommended</a>
    <br /><a href="/review/show/1">/review/show/1</a>
    <br /><a href="/catalog/error">/catalog/error</a>
    <br /><a href="/recommendation/error">/recommendation/error</a>
  </body>
</html>
EOF
        );

    }
}