<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    function newOrder(Request $request)
    {
        try {
            $data = $request->all();

            $order = new Order();

            $order->telefone = $data['telefone'];
            $order->endereco = $data['endereco'];
            $order->preco = $data['preco'];
            $order->pizza_id = $data['pizza_id'];

            $order->save();
            return response()->json(['resultado' => true], 200);
        } catch (Error $e) {
            return response()->json(['resultado' => 'ERRO NOVA VENDA'], 250);
        } catch (Exception $e) {
            return response()->json(['resultado' => 'EXCEPTION NOVA VENDA'], 250);
        }
    }
}
