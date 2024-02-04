<?php


namespace App\Service;


use App\Entity\Product;
use App\Entity\Promotion;
use App\Entity\User;

class StoreManager
{
    public function cloneProduct(Product $product, User $user, $amount):Product
    {
        $newProduct=new Product();
        $newProduct->setName($product->getName());
        $newProduct->setQuantity($amount);
        $newProduct->setImage($product->getImage());
        $newProduct->setUser($user);
        return $newProduct;
    }

    public function areDatesValid(Promotion $promotion)
    {
        $today=(new \DateTime('today'));
        $startDate=$promotion->getStartDate();
        $endDate=$promotion->getEndDate();

        if($startDate<$today || $endDate<$today || $endDate<=$startDate){
            return false;
        }

        return true;
    }
}