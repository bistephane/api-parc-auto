<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Achat;

class AchatController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/achats",
     *     tags={"Achats"},
     *      summary="Affiche tous les achats",
     *      description="Retourne tous les achats",
     *      @OA\Response(
     *          response=200,
     *          description="opération réussi"
     *       )
     * )
     */

    /**
     * Affiche les achats.
     *
     * @return Response
     */
    public function afficheLesAchats()
    {
        $achats = Achat::all();

        return response()->json($achats);
    }

    /**
     * @OA\Post(
     *      path="/api/v1/achats",
     *      tags={"Achats"},
     *      summary="ajoute un achat",
     *      description="Retourne toutes les information d'un achat",
     *      @OA\Parameter(
     *      name="nom",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="prenoms",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="contact",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *         )
     *       )
     * )
     */

    /**
     * Ajoute un Achat.
     *
     * @param  Request  $request
     * @return Response
     */
    public function ajouteUnAchat(Request $request)
    {
        //
        $achats = new Achat();
        $achats->client_id = $request->client_id;
        $achats->vehicule_id = $request->vehicule_id;
        $achats->date = $request->date;
        $achats->prixht = $request->prixht;

        $achats->save();

        return response()->json($achats);
    }
}
