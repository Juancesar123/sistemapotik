<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtransaksi_obatAPIRequest;
use App\Http\Requests\API\Updatetransaksi_obatAPIRequest;
use App\Models\transaksi_obat;
use App\Repositories\transaksi_obatRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class transaksi_obatController
 * @package App\Http\Controllers\API
 */

class transaksi_obatAPIController extends AppBaseController
{
    /** @var  transaksi_obatRepository */
    private $transaksiObatRepository;

    public function __construct(transaksi_obatRepository $transaksiObatRepo)
    {
        $this->transaksiObatRepository = $transaksiObatRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/transaksiObats",
     *      summary="Get a listing of the transaksi_obats.",
     *      tags={"transaksi_obat"},
     *      description="Get all transaksi_obats",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/transaksi_obat")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->transaksiObatRepository->pushCriteria(new RequestCriteria($request));
        $this->transaksiObatRepository->pushCriteria(new LimitOffsetCriteria($request));
        $transaksiObats = $this->transaksiObatRepository->all();

        return $this->sendResponse($transaksiObats->toArray(), 'Transaksi Obats retrieved successfully');
    }

    /**
     * @param Createtransaksi_obatAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/transaksiObats",
     *      summary="Store a newly created transaksi_obat in storage",
     *      tags={"transaksi_obat"},
     *      description="Store transaksi_obat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="transaksi_obat that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/transaksi_obat")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/transaksi_obat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createtransaksi_obatAPIRequest $request)
    {
        $input = $request->all();

        $transaksiObats = $this->transaksiObatRepository->create($input);

        return $this->sendResponse($transaksiObats->toArray(), 'Transaksi Obat saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/transaksiObats/{id}",
     *      summary="Display the specified transaksi_obat",
     *      tags={"transaksi_obat"},
     *      description="Get transaksi_obat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of transaksi_obat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/transaksi_obat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var transaksi_obat $transaksiObat */
        $transaksiObat = $this->transaksiObatRepository->findWithoutFail($id);

        if (empty($transaksiObat)) {
            return $this->sendError('Transaksi Obat not found');
        }

        return $this->sendResponse($transaksiObat->toArray(), 'Transaksi Obat retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updatetransaksi_obatAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/transaksiObats/{id}",
     *      summary="Update the specified transaksi_obat in storage",
     *      tags={"transaksi_obat"},
     *      description="Update transaksi_obat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of transaksi_obat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="transaksi_obat that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/transaksi_obat")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/transaksi_obat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updatetransaksi_obatAPIRequest $request)
    {
        $input = $request->all();

        /** @var transaksi_obat $transaksiObat */
        $transaksiObat = $this->transaksiObatRepository->findWithoutFail($id);

        if (empty($transaksiObat)) {
            return $this->sendError('Transaksi Obat not found');
        }

        $transaksiObat = $this->transaksiObatRepository->update($input, $id);

        return $this->sendResponse($transaksiObat->toArray(), 'transaksi_obat updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/transaksiObats/{id}",
     *      summary="Remove the specified transaksi_obat from storage",
     *      tags={"transaksi_obat"},
     *      description="Delete transaksi_obat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of transaksi_obat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var transaksi_obat $transaksiObat */
        $transaksiObat = $this->transaksiObatRepository->findWithoutFail($id);

        if (empty($transaksiObat)) {
            return $this->sendError('Transaksi Obat not found');
        }

        $transaksiObat->delete();

        return $this->sendResponse($id, 'Transaksi Obat deleted successfully');
    }
}
