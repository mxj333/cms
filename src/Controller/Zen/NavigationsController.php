<?php
namespace App\Controller\Zen;

use App\Controller\Zen\AppController;

class NavigationsController extends AppController {

    public function add() {
        $action = $this->Crud->action();
        $action->config('scaffold.fields', [
            'parent_id',
            'title',
            'url',
            'target' => ['options' => ['_blank' => '_blank', 'new' => 'new', '_parent' => '_parent', '_self' => '_self', '_top' => '_top']],
            'position',
        ]);
        return $this->Crud->execute();
    }

    public function edit() {
        $action = $this->Crud->action();
        $action->config('scaffold.fields', [
            'parent_id',
            'title',
            'url',
            'target' => ['options' => ['_blank' => '_blank', 'new' => 'new', '_parent' => '_parent', '_self' => '_self', '_top' => '_top']],
            'position',
        ]);
        return $this->Crud->execute();
    }
}
