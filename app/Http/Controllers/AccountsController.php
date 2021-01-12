<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
{
    public function index()
    {
        $accounts = Account::where('user_id', Auth::user()->id)->get();

        return view('accounts.index', compact('accounts'));
    }

    public function store(Request $request)
    {
        Account::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
        ]);

        return back();
    }

    public function update(Account $account, UpdateAccountRequest $request)
    {
        $request->adding()
            ? $account->addMoney($request->amount)
            : $account->subtractMoney($request->amount);

        return back();
    }

    public function destroy(Account $account)
    {
        $account->delete();

        return back();
    }
}
