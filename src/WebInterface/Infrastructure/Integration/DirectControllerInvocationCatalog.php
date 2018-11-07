<?php

namespace WebInterface\Infrastructure\Integration;

use Catalog\Infrastructure\Http\CatalogController;
use Symfony\Component\HttpFoundation\Request;
use WebInterface\Application\Catalog;

final class DirectControllerInvocationCatalog implements Catalog
{
    /**
     * @var CatalogController
     */
    private $catalogController;

    public function __construct(CatalogController $catalogController)
    {
        $this->catalogController = $catalogController;
    }

    public function show(string $productId): array
    {
        $queryParameter = [
            'productId' => $productId,
        ];

        $postParameter = [];

        $response = $this->catalogController->showCatalogAction(
            new Request($queryParameter, $postParameter)
        );

        return json_decode($response->getContent(), true);
    }

    public function add(string $productId, string $description): array
    {
        $queryParameter = [
            'productId' => $productId,
            'description' => $description,
        ];

        $postParameter = [];

        $response = $this->catalogController->addCatalogAction(
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
