<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Offers;
use App\Models\Catoffers;
use App\Models\User;

class OffersController extends Controller
{




    public function addoffer(request $request)
    {

        $offer = new Offers();
        $offer->description = $request->description;
        $offer->name = $request->name;
        $offer->price = $request->price;
        $offer->duration = $request->duration;
        $offer->category = $request->category;
        $offer->save();
        return redirect('offers');

    }


    public function addcatoffer(request $request)
    {

        $meal = new Catoffers();
        $meal->name = $request->name;
        $meal->save();
        return redirect('dash');

    }

    public function deletecatoffer($id)
    {

        $cat = Catoffers::find($id);
        $cat->delete();
        return redirect('dash');


    }

}