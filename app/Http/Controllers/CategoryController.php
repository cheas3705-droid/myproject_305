<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('category_name', 'like', '%' . $request->search . '%')
                ->orWhere('note', 'like', '%' . $request->search . '%');
        }

        $categories = $query->latest()->get();

        return view('category.index', compact('categories'));

        //$categories = DB::table('categories')->get(); // SELECT * FROM categories
        //return view("category.index",compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name',
            'note' => 'nullable|string|max:255',
        ], [
            'category_name.unique' => 'ឈ្មោះប្រភេទផលិតផលនេះមានរួចហើយ។',
        ]);

        Category::create($validated);

        return redirect()->route('category.index')->with('success', 'បញ្ចូលបានជោគជ័យ។');
    }

    public function checkName(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name',
        ], [
            'category_name.unique' => 'ឈ្មោះប្រភេទផលិតផលនេះមានរួចហើយ។',
        ]);

        return response()->json(['valid' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::where('id',$id)->firstOrFail();
        return view("category.show")->with("category",$category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name,',
            'note' => 'nullable|string|max:255',
        ]);
        $category = Category::find($id);
        $data = $category->update([
            'category_name' => $request->category_name,
            'note' => $request->note
        ]);
        if($data){
            return redirect()->route('category.index')->with('success', 'បានកែប្រែជោគជ័យ');
        }else{
            return redirect()->route('category.index')->with('error', 'បានកែប្រែបរាជ័យ');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category) {
            $deleted = $category->delete();

            if ($deleted) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'អ្នកលុបបានជោគជ័យ!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'អ្នកលុបបានបរាជ័យ!'
                ], 500);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'មិនបានឃើញទិន្នន័យដែលត្រូវលុប។'
            ], 404);
        }
    }

}
