<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::orderBy('office_name')->paginate(4);
        return view('admin.company', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company-create');
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
            'office_name' => 'required|max:255',
            'office_address' => 'required|max:255',
            'contact_name' => 'required|max:255',
            'contact_information' => 'required|max:255',
            'image' => 'image|max:10240|mimes:jpeg,png,jpg',
        ]);

        if($request->file("image")) {
            $validatedData["image"] = $request->file("image")->store("office-images");
        }

        Office::create($validatedData);

        // if($request->file('image')) {
        //     $validatedData['image'] = $request->file('image')->store('public/office-images');
        // }
        // Office::create($validatedData);
        return redirect('/company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $office = Office::find($id);
        return view('admin.company-edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'office_name' => 'required|max:255',
            'office_address' => 'required|max:255',
            'contact_name' => 'required|max:255',
            'contact_information' => 'required|max:255',
        ]);

        Office::whereId($id)->update($validatedData);
        return redirect('/company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $office = Office::find($id);
        if($office->image) {
            Storage::delete($office->image);
        }
        Office::destroy($office->id);
        return redirect("/company");
    }
}
