<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Meals;
use App\Models\Catmeals;
use App\Models\User;

class MealsController extends Controller
{




    public function addmeal(request $request)
    {

        $meal = new Meals();
        $meal->description = $request->description;
        $meal->name = $request->name;
        $meal->price = $request->price;
        $meal->image = $request->file('image')->store('image', 'public');
        $meal->save();
        return redirect('meals');

    }

    public function addcatmeal(request $request)
    {

        $meal = new Catmeals();
        $meal->name = $request->name;
        $meal->save();
        return redirect('dash');

    }

    public function deletecatmeal($id)
    {

        $cat = Catmeals::find($id);
        $cat->delete();
        return redirect('dash');


    }



}