<?php

namespace CrCms\Permission\Http\Api\Controllers;

use CrCms\Foundation\Helpers\InstanceConcern;
use CrCms\Foundation\Services\ResponseTrait;
use CrCms\Foundation\Transporters\Contracts\DataProviderContract;
use CrCms\Permission\Handlers\Field\DestroyHandler;
use CrCms\Permission\Handlers\Field\ListHandler;
use CrCms\Permission\Handlers\Field\ShowHandler;
use CrCms\Permission\Handlers\Field\StoreHandler;
use CrCms\Permission\Handlers\Field\UpdateHandler;
use CrCms\Permission\Http\Api\Resources\FieldResource;
use CrCms\Permission\Http\Requests\Field\StoreRequest;
use CrCms\Permission\Http\Requests\Field\UpdateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

/**
 * Class FieldController
 */
class FieldController extends Controller
{
    use ResponseTrait, InstanceConcern;

    /**
     * @param DataProviderContract $provider
     * @return JsonResponse
     */
    public function index(DataProviderContract $provider): JsonResponse
    {
        return $this->response()->paginator(
            $this->app->make(ListHandler::class)->handle($provider),
            FieldResource::class,
            ['only' => ['id', 'field', 'name', 'created_at']]
        );
    }

    /**
     * @param DataProviderContract $provider
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function show(DataProviderContract $provider)
    {
        return $this->response()->resource(
            $this->app->make(ShowHandler::class)->handle($provider),
            FieldResource::class
        );
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(StoreRequest $request)
    {
        return $this->response()->resource(
            $this->app->make(StoreHandler::class)->handle($request),
            FieldResource::class
        );
    }

    /**
     * @param UpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function update(UpdateRequest $request)
    {
        return $this->response()->resource(
            $this->app->make(UpdateHandler::class)->handle($request),
            FieldResource::class
        );
    }

    /**
     * @param DataProviderContract $provider
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(DataProviderContract $provider)
    {
        $this->app->make(DestroyHandler::class)->handle($provider);

        return $this->response()->noContent();
    }
}
