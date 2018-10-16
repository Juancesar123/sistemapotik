<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesatuanAPIRequest;
use App\Http\Requests\API\UpdatesatuanAPIRequest;
use App\Models\satuan;
use App\Repositories\satuanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class satuanController
 * @package App\Http\Controllers\API
 */

class satuanAPIController extends AppBaseController
{
    /** @var  satuanRepository */
    private $satuanRepository;

    public function __construct(satuanRepository $satuanRepo)
    {
        $this->satuanRepository = $satuanRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/satuans",
     *      summary="Get a listing of the satuans.",
     *      tags={"satuan"},
     *      description="Get all satuans",
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
     *                  @SWG\Items(ref="#/definitions/satuan")
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
        $this->satuanRepository->pushCriteria(new RequestCriteria($request));
        $this->satuanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $satuans = $this->satuanRepository->all();

        return $this->sendResponse($satuans->toArray(), 'Satuans retrieved successfully');
    }

    /**
     * @param CreatesatuanAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/satuans",
     *      summary="Store a newly created satuan in storage",
     *      tags={"satuan"},
     *      description="Store satuan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="satuan that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/satuan")
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
     *                  ref="#/definitions/satuan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatesatuanAPIRequest $request)
    {
        $input = $request->all();

        $satuans = $this->satuanRepository->create($input);

        return $this->sendResponse($satuans->toArray(), 'Satuan saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/satuans/{id}",
     *      summary="Display the specified satuan",
     *      tags={"satuan"},
     *      description="Get satuan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of satuan",
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
     *                  ref="#/definitions/satuan"
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
        /** @var satuan $satuan */
        $satuan = $this->satuanRepository->findWithoutFail($id);

        if (empty($satuan)) {
            return $this->sendError('Satuan not found');
        }

        return $this->sendResponse($satuan->toArray(), 'Satuan retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatesatuanAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/satuans/{id}",
     *      summary="Update the specified satuan in storage",
     *      tags={"satuan"},
     *      description="Update satuan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of satuan",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="satuan that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/satuan")
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
     *                  ref="#/definitions/satuan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatesatuanAPIRequest $request)
    {
        $input = $request->all();

        /** @var satuan $satuan */
        $satuan = $this->satuanRepository->findWithoutFail($id);

        if (empty($satuan)) {
            return $this->sendError('Satuan not found');
        }

        $satuan = $this->satuanRepository->update($input, $id);

        return $this->sendResponse($satuan->toArray(), 'satuan updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/satuans/{id}",
     *      summary="Remove the specified satuan from storage",
     *      tags={"satuan"},
     *      description="Delete satuan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of satuan",
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
        /** @var satuan $satuan */
        $satuan = $this->satuanRepository->findWithoutFail($id);

        if (empty($satuan)) {
            return $this->sendError('Satuan not found');
        }

        $satuan->delete();

        return $this->sendResponse($id, 'Satuan deleted successfully');
    }
}
