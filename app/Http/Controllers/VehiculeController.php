<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicule;
class VehiculeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/vehicules",
     *     description="Home page",
     *     tags={"Vehicules"},
     *      summary="Affiche tous les vehicules",
     *      description="Retourne tous les clients",
     *      @OA\Response(
     *          response=200,
     *          description="opération réussi"
     *       )
     * )
     */

    /**
     * Affiche les vehicules.
     *
     * @return Response
     */
    public function afficheLesVehicules()
    {
        $vehicules = Vehicule::all();

        return response()->json($vehicules);
    }

    /**
     * @OA\Post(
     *      path="/api/v1/vehicules",
     *      tags={"Vehicules"},
     *      summary="Ajoute un vehicule",
     *      description="Retourne les informations d'un vehicule",
     *      @OA\Parameter(
     *      name="marque",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *    @OA\Parameter(
     *      name="modele",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="annee",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="date"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="type",
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
     * Ajoute un vehicule.
     *
     * @param  Request  $request
     * @return Response
     */
    public function ajouteUnVehicule(Request $request)
    {
        $vehicules = new Vehicule();

        $vehicules->marque = $request->marque;
        $vehicules->modele = $request->modele;
        $vehicules->annee = $request->annee;
        $vehicules->type = $request->type;

        $vehicules->save();
    }

    /**
     * @OA\Get(
     *      path="/api/v1/vehicules/{id}",
     *      tags={"Vehicules"},
     *      summary="Affiche un vehicule",
     *      description="Retourne les informations d'un vehicule",
     *      @OA\Parameter(
     *          name="id",
     *          description="Project id",
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
     * Affiche un vehicule.
     *
     * @param  int  $id
     * @return Response
     */
    public function afficheUnVehicule($id)
    {
        $vehicules = Vehicule::find($id);

        return response()->json($vehicules);
    }

    /**
     * @OA\Put(
     *      path="/api/v1/vehicules/{id}",
     *      tags={"Vehicules"},
     *      summary="Mise à jour d'un vehicule ",
     *      description="Retourne la mise à jour des informations d'un vehicule",
     *      @OA\Parameter(
     *          name="id",
     *          description="Project id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          
     *       )
     * )
     */

    /**
     * Mise à jour d'un vehicule.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function miseAJourUnVehicule(Request $request, $id)
    {
        $vechicules = Vehicule::find($id);

        $vehicules->marque = $request->marque;
        $vehicules->modele = $request->modele;
        $vehicules->annee = $request->annee;
        $vehicules->type = $request->type;

        $vehicules->save();
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/vehicules/{id}",
     *      tags={"Vehicules"},
     *      summary="Supprime un vehicule",
     *      description="Supprime un vehicule",
     *      @OA\Parameter(
     *          name="id",
     *          description="Project id",
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
     * Supprimer un vehicule.
     *
     * @param  int  $id
     * @return Response
     */
    public function supprimerUnVehicule($id)
    {
        $vehicules = Vehicule::find($id);

        $vehicules->delete();

        return response()->json($vehicules);
    }
}
