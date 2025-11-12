<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    protected $categoryService;

    // Injeção do service
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    // Página principal (listar todas)
    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('categories.index', compact('categories'));
    }

    // Formulário de criação
    public function create()
    {
        return view('categories.create_update');
    }

    // Criar nova categoria
    public function store(CategoryRequest $request)
    {
        $this->categoryService->create($request->validated());
        return redirect()->route('categories.index');
    }

    // Formulário de edição
    public function edit($id)
    {
        $category = $this->categoryService->getById($id);
        return view('categories.create_update', compact('category'));
    }

    // Atualizar categoria existente
    public function update(CategoryRequest $request, $id)
    {
        $this->categoryService->update($id, $request->validated());
        return redirect()->route('categories.index');
    }

    // Excluir categoria
    public function destroy($id)
    {
        $this->categoryService->delete($id);
        return redirect()->route('categories.index');
    }
}
