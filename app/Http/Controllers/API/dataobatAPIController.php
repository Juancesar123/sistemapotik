<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedataobatAPIRequest;
use App\Http\Requests\API\UpdatedataobatAPIRequest;
use App\Models\dataobat;
use App\Repositories\dataobatRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class dataobatController
 * @package App\Http\Controllers\API
 */

class dataobatAPIController extends AppBaseController
{
    /** @var  dataobatRepository */
    private $dataobatRepository;

    public function __construct(dataobatRepository $dataobatRepo)
    {
        $this->dataobatRepository = $dataobatRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/dataobats",
     *      summary="Get a listing of the dataobats.",
     *      tags={"dataobat"},
     *      description="Get all dataobats",
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
     *                  @SWG\Items(ref="#/definitions/dataobat")
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
        $this->dataobatRepository->pushCriteria(new RequestCriteria($request));
        $this->dataobatRepository->pushCriteria(new LimitOffsetCriteria($request));
        $dataobats = $this->dataobatRepository->all();

        return $this->sendResponse($dataobats->toArray(), 'Dataobats retrieved successfully');
    }

    /**
     * @param CreatedataobatAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/dataobats",
     *      summary="Store a newly created dataobat in storage",
     *      tags={"dataobat"},
     *      description="Store dataobat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="dataobat that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/dataobat")
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
     *                  ref="#/definitions/dataobat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatedataobatAPIRequest $request)
    {
        $input = $request->all();

        $dataobats = $this->dataobatRepository->create($input);

        return $this->sendResponse($dataobats->toArray(), 'Dataobat saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/dataobats/{id}",
     *      summary="Display the specified dataobat",
     *      tags={"dataobat"},
     *      description="Get dataobat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of dataobat",
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
     *                  ref="#/definitions/dataobat"
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
        /** @var dataobat $dataobat */
        $dataobat = $this->dataobatRepository->findWithoutFail($id);

        if (empty($dataobat)) {
            return $this->sendError('Dataobat not found');
        }

        return $this->sendResponse($dataobat->toArray(), 'Dataobat retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatedataobatAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/dataobats/{id}",
     *      summary="Update the specified dataobat in storage",
     *      tags={"dataobat"},
     *      description="Update dataobat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of dataobat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="dataobat that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/dataobat")
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
     *                  ref="#/definitions/dataobat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatedataobatAPIRequest $request)
    {
        $input = $request->all();

        /** @var dataobat $dataobat */
        $dataobat = $this->dataobatRepository->findWithoutFail($id);

        if (empty($dataobat)) {
            return $this->sendError('Dataobat not found');
        }

        $dataobat = $this->dataobatRepository->update($input, $id);

        return $this->sendResponse($dataobat->toArray(), 'dataobat updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/dataobats/{id}",
     *      summary="Remove the specified dataobat from storage",
     *      tags={"dataobat"},
     *      description="Delete dataobat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of dataobat",
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
        /** @var dataobat $dataobat */
        $dataobat = $this->dataobatRepository->findWithoutFail($id);

        if (empty($dataobat)) {
            return $this->sendError('Dataobat not found');
        }

        $dataobat->delete();

        return $this->sendResponse($id, 'Dataobat deleted successfully');
    }
}
