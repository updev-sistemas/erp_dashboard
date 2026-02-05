<?php

namespace App\Http\Controllers\Dashboard;

use App\DTOs\EnterpriseSupporViewDto;
use App\DTOs\PaymentInfoDto;
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

        $payloads = [];
        $formatter = new NumberFormatter('pt_BR', NumberFormatter::CURRENCY);

        $allMethods = [];
        foreach ($enterprises as $enterprise) {
            $demo = $enterprise->demonstratives->first();
            if ($demo) {
                $data = json_decode($demo->payload, true);
                $payments = array_get($data, 'pagamentos.pagamentosDia', []);
                foreach ($payments as $pay) {
                    $methodName = $pay['descricao'] ?? null;
                    if ($methodName && !in_array($methodName, $allMethods)) {
                        $allMethods[] = $methodName;
                    }
                }
            }
        }

        sort($allMethods);

        foreach ($enterprises as $enterprise) {
            $demo = $enterprise->demonstratives->first();

            $target = new EnterpriseSupporViewDto();
            $target->enterprise = $enterprise;
            $target->payments = [];
            $target->totalSales =  0;
            $target->totalCountSales =  0;
            $target->avgTicket =  0;

            if ($demo) {
                $data = json_decode($demo->payload, true);


                $target->totalSales =  array_get($data, 'lucrosPresumidos.relatorioVendas.concluidas.valorVendas', 0);
                $target->totalCountSales =  array_get($data, 'lucrosPresumidos.relatorioVendas.concluidas.quantidadeVendas', 0);
                $target->avgTicket =  array_get($data, 'lucrosPresumidos.relatorioVendas.concluidas.ticketMedio', 0);

                $currentStorePayments = collect(array_get($data, 'pagamentos.pagamentosDia', []))
                    ->pluck('value', 'descricao')
                    ->all();

                foreach ($allMethods as $method) {
                    $payData = new PaymentInfoDto();
                    $payData->description = $method;

                    $_value = $currentStorePayments[$method] ?? 0;
                    $payData->value = $formatter->formatCurrency($_value, 'BRL');

                    $target->payments[] = $payData;
                }
            } else {
                foreach ($allMethods as $method) {
                    $payData = new PaymentInfoDto();
                    $payData->description = $method;
                    $payData->value = $formatter->formatCurrency(0, 'BRL');
                    $target->payments[] = $payData;
                }
            }

            $payloads[] = $target;
        }

        $collection = collect($payloads);

        $_totalSales = $collection->avg('totalSales');
        $_totalCountSales = $collection->avg('totalCountSales');
        $_avgTicket = $collection->avg('avgTicket');

        $totalSales = $formatter->formatCurrency($_totalSales, 'BRL');
        $avgTicket = $formatter->formatCurrency($_avgTicket, 'BRL');
        $totalCountSales = intval($_totalCountSales);


        return view('dashboard.home')
            ->with('user', $user)
            ->with('totalSales', $totalSales)
            ->with('totalCountSales', $totalCountSales)
            ->with('avgTicket', $avgTicket)
            ->with('collection', $collection);
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
