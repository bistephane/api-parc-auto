<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/clients",
     *     tags={"Clients"},
     *      summary="Affiche tous les clients",
     *      description="Retourne tous les clients",
     *      @OA\Response(
     *          response=200,
     *          description="opération réussi"
     *       )
     * )
     */

    /**
     * Affiche les clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function afficheLesClients()
    {
        $clients = Client::all();

        return response()->json($clients);
    }

    /**
     * @OA\Post(
     *      path="/api/v1/clients",
     *      tags={"Clients"},
     *      summary="ajoute un client",
     *      description="Retourne toutes les information du client",
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
     * Ajoute un client.
     *
     * @param  Request  $request
     * @return Response
     */
    public function ajouteUnClient(Request $request)
    {
        //
        $clients = new Client();

        $clients->nom = $request->nom;
        $clients->prenoms = $request->prenoms;
        $clients->contact = $request->contact;

        $clients->save();

        return response()->json($clients);
    }

    /**
     * @OA\Get(
     *      path="/api/v1/clients/{id}",
     *      tags={"Clients"},
     *      summary="affiche un client",
     *      description="Retourne les information d'un client",
     *      @OA\Parameter(
     *          name="id",
     *          description="Client",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          )
     *       )
     * )
     */

    /**
     * Affiche un client.
     *
     * @param  int  $id
     * @return Response
     */
    public function afficheUnClient($id)
    {
        $clients = Client::find($id);

        return response()->json($clients);
    }

    /**
     * @OA\Put(
     *      path="/api/v1/clients/{id}",
     *      tags={"Clients"},
     *      summary="Mise à jour d'un client ",
     *      description="Retourne la mise à jour des informations d'un client",
     *      @OA\Parameter(
     *          name="id",
     *          description="Client",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *      name="nom",
     *      in="query",
     *      required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *      name="prenoms",
     *      in="query",
     *      required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *      name="contact",
     *      in="query",
     *      required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          
     *       )
     * )
     */

    /**
     * Mise à jour d'un client.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function miseAJourUnClient(Request $request, $id)
    {   
        $clients = Client::find($id);

        $clients->nom = $request->nom;
        $clients->prenoms = $request->prenoms;
        $clients->contact = $request->contact;

        $clients->save();

        return response()->json($clients);
    }
    
    /**
     * @OA\Delete(
     *      path="/api/v1/clients/{id}",
     *      tags={"Clients"},
     *      summary="supprime un client existant",
     *      description="Supprime un client ",
     *      @OA\Parameter(
     *          name="id",
     *          description="Client",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          
     *       )
     * )
     */

    /**
     * Supprimer un client.
     *
     * @param  int  $id
     * @return Response
     */
    public function supprimerUnClient($id)
    {
        $clients = Client::find($id);

        $clients->delete();

        return response()->json($clients);
    }
}
