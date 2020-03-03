<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function index()
    {
        return Category::ordered()->get();
    }

    public function store(Request $request)
    {
        $this->handleValidate($request);

        $category = new Category();
        $category->fill($request->all());
        $category->save();

        return $this->successNotify();
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return $this->deleteNotify();
    }

    public function fieldUpdate(Request $request, Category $category, $field)
    {
        $category->update([$field => $request->data]);

        return $this->successNotify();
    }

    public function published(Category $category)
    {
        $category->published = $category->published == 1 ? 0 : 1;
        $category->save();

        return $this->successNotify();
    }


    public function handleValidate($request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if ($validator->fails()) {
            abort(403, $validator->errors()->first());
        }

        return $validator->getData();
    }


}
