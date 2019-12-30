<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;


class PizzaController extends Controller
{
    function add(Request $request)
    {
        try {
            $data = $request->all();

            $exists = Pizza::where('nome', $data['nome'])->first();
            if ($exists) {
                return response()->json(['resultado' => 'JÁ EXISTE'], 200);
            }

            $pizza = new Pizza();

            $pizza->nome = $data['nome'];
            $pizza->tamanho = $data['tamanho'];
            $pizza->sabor = $data['sabor'];

            $pizza->save();

            return response()->json(['resultado' => true], 200);
        } catch (Error $e) {
            return response()->json(['resultado' => 'ERRO AO ADICIONAR'], 250);
        } catch (Exception $e) {
            return response()->json(['resultado' => 'EXCEÇÃO AO ADICIONAR'], 250);
        }
    }

    function edit(Request $request)
    {
        try {
            $data = $request->all();

            $update = Pizza::where('id', $data['id'])->first();

            if ($update) {
                if ($update->nome == $data['nome']) {
                    return response()->json(['resultado' => 'JA EXISTE'], 250);
                } else {
                    $update->update([
                        'nome' => $data['nome'],
                        'tamanho' => $data['tamanho'],
                        'sabor' => $data['sabor'],
                    ]);

                    return response()->json(['resultado' => true], 200);
                }
            } else {
                return response()->json(['resultado' => 'NÃO FOI ENCONTRADO'], 250);
            }
        } catch (Error $e) {
            return response()->json(['resultado' => 'ERRO AO EDITAR'], 250);
        } catch (Exception $e) {
            return response()->json(['resultado' => 'EXCEÇÃO AO EDITAR'], 250);
        }
    }

    function remove(Request $request)
    {
        try {
            $data = $request->all();

            $delete = Pizza::where('id', $data['id'])->delete();

            if ($delete) {
                return response()->json(['resultado' => true], 200);
            } else {
                return response()->json(['resultado' => false], 250);
            }
        } catch (Error $e) {
            return response()->json(['resultado' => 'ERRO AO REMOVER'], 250);
        } catch (Exception $e) {
            return response()->json(['resultado' => 'EXCEÇÃO AO REMOVER'], 250);
        }
    }
}
