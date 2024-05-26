<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use OpenFoodFacts\Laravel\Facades\OpenFoodFacts;


class PantryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }


    public function showItems() {
        //  angemeldeten Benutzer abrufen
        $user = Auth::user();
        $pantry = $user->pantry;
        $items = $pantry->items ?? [];
        //$item = Item::find($item);
        return view('pantry.pantry', ['user' => $user, 'pantry' => $pantry, 'items' => $items]);
    }

    public function showItem($id) {
        $item = Item::find($id);
        return view('pantry.pantryItem', ['item' => $item]);
    }

    public function scanItem()
    {
       
        return view('pantry.scan', ['redirect' => route('showResults')]);
    }


    public function scanCode(Request $request)
    {
        $barcode = $request->input('barcode');
        $arr = OpenFoodFacts::barcode($barcode);
        session(['scan_results' => $arr]);
        return response()->json(['redirect' => route('showResults')]);
    }

    public function showResults()
    {
       
        $results = session('scan_results', []);
        //product_name
        //dd($results); 
        //$results['generic_name_de'] ||
        $name = isset($results['product_name_de']) ? $results['product_name_de'] : ''; 
        $product_quantity = isset($results['product_quantity']) ? $results['product_quantity'] : '';
        $quantity = isset($results['quantity']) ? $results['quantity'] : '';
        $unitLetter = substr($quantity, -1);
        
        if ($unitLetter == 'g') {
            $unit = 'Gramm';
        } else if ($unitLetter == 'l') {
            $unit = 'Milliliter';
        } else {
            $unit = '';
        }


        return view('pantry.scanResults', ['name' => $name, 'quantity' => $quantity, 'product_quantity' =>  $product_quantity, 'unit' => $unit]);
    }

    public function createItem()
    {
        return view('pantry/pantryAddItem', []);
    }

    /**
     * Add a new item to the pantry.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addItem(Request $request)
    {
        $user = Auth::user();
        $pantry = $user->pantry;

        $request->validate([
            'name' => 'required|string',
            'weight' => 'required|integer',
            'unit' => 'nullable|in:Gramm,Milliliter',
            'expiry_date' => 'nullable|date',
        ]);

        Item::create([
            'name' => $request->input('name'),
            'weight' => $request->input('weight'),
            'unit' => $request->input('unit'),
            'expiry_date' => $request->input('expiry_date'),
            'pantry_id' => $pantry->id,
        ]);

        return redirect()->route('items.show')->with('success', 'Hinzufügen erfolgreich');
    }


    public function editItem($id)
    {
        $item = Item::findOrFail($id);
        return view('editItem', ['item' => $item]);
    }


    public function updateItem(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'weight' => 'required|integer',
            'unit' => 'nullable|in:Gramm,Milliliter',
            'expiry_date' => 'nullable|date',
        ]);

        $item = Item::findOrFail($id);
        $item->update([
            'name' => $request->input('name'),
            'weight' => $request->input('weight'),
            'unit' => $request->input('unit'),
            'expiry_date' => $request->input('expiry_date'),
        ]);

        return redirect()->route('items.show')->with('success', 'Item updated successfully.');
    }



    public function deleteItem($id)
    {
        $item = Item::findOrFail($id);

        if ($item) {
            $item->delete();
            return redirect()->route('items.show')->with('success', 'Item deleted successfully.');
        } else {
            return redirect()->route('items.show')->with('error', 'Item not found.');
        }
    }


}
