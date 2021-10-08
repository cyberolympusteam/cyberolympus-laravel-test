<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Customer;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($type = null, Request $request)
    {
        $selectedType = "customers";
        if ($type && in_array($type, ['customers', 'agents'])) {
            $selectedType = $type;
        }

        // query params
        $limit = $request->limit ?? 10;
        $search = $request->search;

        $users = User::where(function ($q) use ($selectedType) {
            return $q->where('account_type', ($selectedType == 'customers') ? 4 : 3)
                ->orWhere('account_role', ($selectedType == 'customers') ? 'customer' : 'agent');
        })
            ->when($search, function ($q) use ($selectedType, $search) {
                return $q->where('first_name', "LIKE", "%${search}%")
                    ->orWhere('last_name', "LIKE", "%${search}%");
            })
            ->paginate($limit);

        return view('users.index')->with([
            'type' => $selectedType,
            'datas' => ($selectedType == 'customers') ? $this->getCutomers($users) : $this->getAgents($users),
        ]);
    }

    private function getCutomers($users)
    {
        foreach ($users as $k => $v) {
            $v['customer'] = Customer::where('id', $v->id)
                ->first();
            $users[$k] = $v;
        }

        return $users;
    }

    private function getAgents($users)
    {
        foreach ($users as $k => $v) {
            $v['agent'] = Agent::where('id', $v->id)
                ->first();
            $users[$k] = $v;
        }

        return $users;
    }
}
