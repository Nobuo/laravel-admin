<?php

namespace App\Interfaces;

interface StockServiceInterface
{
    public function checkStock(int $productId, int $quantity): bool;
    public function updateStock(int $productId, int $quantity): void;
}