<?php

namespace App\Domain\Produit\Repositories;

use App\Domain\Produit\Entities\ProduitEntity;
use App\Models\Image as ImageModel;

class ImageRepository
{
    public function getAllProductImages(ProduitEntity $produitEntity)
    {
        $imagesModel = ImageModel::where("ID_PRODUIT", $produitEntity->id)->pluck("URL")->toArray();
        if (!empty($imagesModel)) {
            $formattedImages = array_map([$this, 'formatUrl'], $imagesModel);
            $produitEntity->setImages($formattedImages);
        }
    }

    public function getAllProductsImages(array $produitsEntity){
        $produitsId = [];

        foreach ($produitsEntity as $produitEntity){
            $produitsId[] = $produitEntity->id;
        }

        $imagesModels = ImageModel::whereIn("ID_PRODUIT", $produitsId)->get();

        foreach ($produitsEntity as $produitEntity){
            $imageModels = [];

            foreach ($imagesModels as $imageModel){
                if ($imageModel->ID_PRODUIT == $produitEntity->id){
                    $imageModels[] = $this->formatUrl($imageModel["URL"]);
                }
            }

            $produitEntity->setImages($imageModels);
        }
    }

    private function formatUrl(string $url): string
    {
        if (str_starts_with($url, '/Laurelin/')) {
            return $url;
        }
        return '/Laurelin' . (str_starts_with($url, '/') ? '' : '/') . $url;
    }
}
