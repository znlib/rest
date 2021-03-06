<?php

namespace ZnLib\Rest\Symfony4\Base;

use ZnLib\Rest\Symfony4\Base\BaseAction;
use ZnLib\Rest\Symfony4\Actions\BaseEntityAction;
use ZnLib\Rest\Symfony4\Actions\CreateAction;
use ZnLib\Rest\Symfony4\Actions\DeleteAction;
use ZnLib\Rest\Symfony4\Actions\IndexAction;
use ZnLib\Rest\Symfony4\Actions\OptionsAction;
use ZnLib\Rest\Symfony4\Actions\UpdateAction;
use ZnLib\Rest\Symfony4\Actions\ViewAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

abstract class BaseCrudApiController
{

    /** @var $service object */
    public $service;

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::class,
            ],
            'create' => [
                'class' => CreateAction::class,
            ],
            'view' => [
                'class' => ViewAction::class,
            ],
            'update' => [
                'class' => UpdateAction::class,
            ],
            'delete' => [
                'class' => DeleteAction::class,
            ],
            'options' => [
                'class' => OptionsAction::class,
            ],
        ];
    }

    public function index(Request $request): JsonResponse
    {
        $actions = $this->actions();
        $actionClass = $actions['index']['class'];
        /** @var BaseAction $action */
        $action = new $actionClass($this->service, $request);
        return $action->run();
    }

    public function create(Request $request): JsonResponse
    {
        $actions = $this->actions();
        $actionClass = $actions['create']['class'];
        /** @var BaseAction $action */
        $action = new $actionClass($this->service, $request);
        return $action->run();
    }

    public function view($id, Request $request): JsonResponse
    {
        $actions = $this->actions();
        $actionClass = $actions['view']['class'];
        /** @var BaseEntityAction $action */
        $action = new $actionClass($this->service, $request, $id);
        return $action->run();
    }

    public function update($id, Request $request): JsonResponse
    {
        $actions = $this->actions();
        $actionClass = $actions['update']['class'];
        /** @var BaseEntityAction $action */
        $action = new $actionClass($this->service, $request, $id);
        return $action->run();
    }

    public function delete($id, Request $request): JsonResponse
    {
        $actions = $this->actions();
        $actionClass = $actions['delete']['class'];
        /** @var BaseEntityAction $action */
        $action = new $actionClass($this->service, $request, $id);
        return $action->run();
    }

    public function options(Request $request): JsonResponse
    {
        $actions = $this->actions();
        $actionClass = $actions['options']['class'];
        /** @var BaseEntityAction $action */
        $action = new $actionClass($this->service, $request);
        return $action->run();
    }

}