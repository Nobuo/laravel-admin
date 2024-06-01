<?php
namespace App\Services;

use App\Interfaces\StockServiceInterface;

class StockService implements StockServiceInterface
{
    public function checkStock(int $productId, int $quantity): bool
    {
       
        return true;
    }

    public function updateStock(int $productId, int $quantity): void
    {
        \Log::info('Info message');
    }
}