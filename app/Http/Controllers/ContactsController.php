<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactsController extends Controller
{
    public function index() {
        // return Inertia::render('Contacts', [
        //     'contacts' => User::query()
        //         ->when(Request::input('search'), function ($query, $search) {
        //             $query->where('name', 'like', "%{$search}%");
        //         })
        //         ->paginate(10)
        //         ->withQueryString()
        // ]);

        //dd($request->all());

        //logger(request()->all());

       

        $query = User::query();

        if(request('search')) {
            $query->where('name', 'like', '%'.request('search').'%');
        }

        if(request()->filled(['field', 'direction'])) {
            // logger("has sort");
            request()->validate([
                'direction' => ['in:asc,desc'],
                'field' => ['in:name,id,email']
            ]);

            $query->orderBy(request('field'), request('direction'));
        }

        // logger(request()->all());
        return Inertia::render('Contacts', [
            'contacts' => $query->paginate(10)->withQueryString(),
            'filters' => request()->all(['search', 'field', 'direction'])
        ]);
    }
}
