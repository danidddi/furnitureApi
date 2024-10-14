<?php

namespace App\Http\Controllers;

use App\Http\Requests\FurnitureRequest;
use App\Services\FurnitureService;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class FurnitureController extends Controller
{

    protected FurnitureService $furnitureService;

    public function __construct(FurnitureService $furnitureService)
    {
        $this->furnitureService = $furnitureService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $filters = request()->only(['min_price', 'max_price', 'stock']);
        $perPage = request()->input('per_page', 10);

        $furniture = $this->furnitureService->getFurnitures($filters, $perPage);

        return response()->json($furniture);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FurnitureRequest $request): JsonResponse
    {
        $furniture = $this->furnitureService->createFurniture($request->validated());
        return response()->json($furniture, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        $furniture = $this->furnitureService->find($id);

        if (!$furniture)
            return response()->json(['msg' => "Мебель с заданным айди ($id) не найдена!"], 404);

        return response()->json($furniture);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FurnitureRequest $request, $id): JsonResponse
    {
        $furniture = $this->furnitureService->find($id);

        if (!$furniture)
            return response()->json(['msg' => "Мебель с заданным айди ($id) не найдена!"], 404);

        $this->furnitureService->updateFurniture($furniture, $request->validated());
        return response()->json($furniture);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $furniture = $this->furnitureService->find($id);

        if (!$furniture)
            return response()->json(['msg' => "Мебель с заданным айди ($id) не найдена!"], 404);

        $furniture->delete();
        return response()->noContent();
    }
}
