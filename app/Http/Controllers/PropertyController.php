<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::paginate(4);
        return view('admin.estate', compact('properties'));
    }

    public function search(Request $request)
    {
        $title = $request->input('search');
        $search = ucfirst($title);
        $properties = Property::all();
        if($search == 'Buy') {
            $category = Category::where('name', 'Sale')->first();
            $properties = Property::where('category_id', $category->id)->paginate(4)->withQueryString();
        } elseif($search == 'Rent') {
            $category = Category::where('name', 'Rent')->first();
            $properties = Property::where('category_id', $category->id)->paginate(4)->withQueryString();
        } else {
            if($search == 'House') {
                $building = Building::where('name', 'House')->first();
                $properties = Property::where('building_id', $building->id)->paginate(4)->withQueryString();
            } else if($search == 'Apartment') {
                $building = Building::where('name', 'Apartment')->first();
                $properties = Property::where('building_id', $building->id)->paginate(4)->withQueryString();
            } else {
                $properties = Property::where('address', 'like', '%' . $search . '%')->paginate(4)->withQueryString();
            }
            // $properties = Property::where('address', 'like', '%' . $search . '%')->paginate(4)->withQueryString();
        }

        return view('property.index', compact('properties', 'title'));
    }

    public function buy()
    {
        $category = Category::where('name', 'Sale')->first();
        $properties = Property::where('category_id', $category->id)->paginate(4)->withQueryString();
        return view('property.buy', compact('properties'));
    }

    public function rent()
    {
        $category = Category::where('name', 'Rent')->first();
        $properties = Property::where('category_id', $category->id)->paginate(4)->withQueryString();
        return view('property.rent', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.estate-create', [
            'categories' => Category::all(),
            'buildings' => Building::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_type' => 'required|in:Rent,Sale',
            'building_type' => 'required|in:House,Apartment',
            'price' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
        ]);


        if($request->file("image")) {
            $validatedData["image"] = $request->file("image")->store("real-estate-images");
        }

        $property = new Property();
        $category = Category::where('name', $validatedData['category_type'])->first();
        $building = Building::where('name', $validatedData['building_type'])->first();

        $property->image = $validatedData["image"];
        $property->price = $validatedData["price"];
        $property->address = $validatedData["address"];
        $property->category_id = $category->id;
        $property->building_id = $building->id;
        $property->save();

        // Property::create($validatedData);

        return redirect('/real-estate')->with('success', 'Property created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find($id);
        return view('admin.estate-edit', [
            'property' => $property,
            'categories' => Category::all(),
            'buildings' => Building::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|in:1,2',
            'building_id' => 'required|in:1,2',
            'price' => 'required',
            'address' => 'required',
        ]);

        $property = Property::find($id);
        $property->update($validatedData);

        return redirect('/real-estate')->with('success', 'Property updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        if($property->image) {
            Storage::delete($property->image);
        }
        Property::destroy($property->id);
        return redirect("/real-estate");

        // return redirect("/real-estate")->with("success", "Post has been deleted!");
    }
}
