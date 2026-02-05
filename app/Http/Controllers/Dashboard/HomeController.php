<?php

namespace App\Http\Controllers\Dashboard;

use App\Enterprise;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use NumberFormatter;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $enterprises = Auth::user()->enterprises;

        $_totalSales = $enterprises->avg('total_sales');
        $_totalCountSales = $enterprises->avg('amount_sales');
        $_avgTicket = $enterprises->avg('ticket_medio');

        $formatter = new NumberFormatter('pt_BR', NumberFormatter::CURRENCY);
        $totalSales = $formatter->formatCurrency($_totalSales, 'BRL');
        $avgTicket = $formatter->formatCurrency($_avgTicket, 'BRL');
        $totalCountSales = intval($_totalCountSales);

        return view('dashboard.home')
            ->with('user', $user)
            ->with('totalSales', $totalSales)
            ->with('totalCountSales', $totalCountSales)
            ->with('avgTicket', $avgTicket)
            ->with('collection', $enterprises);
    }


    public function edit($id)
    {
        $enterprise = Enterprise::find($id);

        if ($enterprise == null) {
            session()->flash('WARN',"Empresa {$id} não foi localizada.");
            return redirect()->route("env_ctm");
        }

        if ($enterprise->user->id != Auth::id()) {
            session()->flash('WARN',"Empresa {$id} não foi localizada.");
            return redirect()->route("env_ctm");
        }

        return view('dashboard.edit')->with('enterprise', $enterprise);
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
        try
        {
            $enterprise = Enterprise::find($id);

            if ($enterprise == null) {
                session()->flash('WARN',"Empresa {$id} não foi localizada.");
                return redirect()->route("env_ctm");
            }

            if ($enterprise->user->id != Auth::id()) {
                session()->flash('WARN',"Empresa {$id} não foi localizada.");
                return redirect()->route("env_ctm");
            }

            $enterprise->fill($request->all());
            $enterprise->save();

            session()->flash('SUCCESS', 'Empresa atualizada com sucesso.');

            return redirect()->route('view_enterprise_edt',['id' => $enterprise->id]);
        }
        catch (\Exception $ex) {
            session()->flash('ERROR','Ocorreu um erro ao atualizar a empresa.');

            logger('Tentativa de atualizar uma empresa');
            logger($request->all());
            logger($ex);

            return redirect()->route('env_ctm');
        }
    }
}
