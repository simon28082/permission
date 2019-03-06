<?php

namespace CrCms\Permission\Handlers\Role;

use CrCms\Foundation\Handlers\AbstractHandler;
use CrCms\Permission\Repositories\RoleRepository;
use CrCms\Foundation\Handlers\Contracts\HandlerContract;
use CrCms\Foundation\Transporters\Contracts\DataProviderContract;

class RoleFieldsListHandler extends AbstractHandler implements HandlerContract
{
    /**
     * @param DataProviderContract $provider
     * @return array
     */
    public function handle(DataProviderContract $provider): array
    {
        /* @var RoleRepository $repository */
        $repository = $this->app->make(RoleRepository::class);

        $role = $repository->byIntIdOrFail($provider->get('id'));

        return $repository->roleFields($role)->pluck('id')->toArray();
    }
}
