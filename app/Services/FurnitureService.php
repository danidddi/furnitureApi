<?php
namespace App\Services;

use App\Models\Furniture;

class FurnitureService
{
    public function getFurnitures($filters, $perPage = 10)
    {
        $query = Furniture::query();

        // фильтрация по цене
        if (isset($filters['min_price']))
            $query->where('cost', '>=', $filters['min_price']);

        if (isset($filters['max_price']))
            $query->where('cost', '<=', $filters['max_price']);

        // фильтрация по наличию на складе
        if (isset($filters['stock'])){
            $stock = $filters['stock'] != 0;
            $query->where('stock',  $stock);
        }

        return $query->latest()->paginate($perPage);
    }

    public function createFurniture(array $data)
    {
       return Furniture::create($data);
    }

    public function updateFurniture(Furniture $furniture, array $data)
    {
        $furniture->update($data);
        return $furniture;
    }

    public function find($id)
    {
        return Furniture::find($id);
    }

}
