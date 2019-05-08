<?php
namespace App\Controllers;


use App\Models\Category;
use App\Models\State;
use System\Core\BaseController;

class StatesController extends BaseController
{
    public function index()
    {
        $data = $this->paginate(new State, 2, 'states');

        view('back/states/index', $data);
    }

    public function create() {
        view('back/states/create');
    }

    public function store()
    {
        extract($_POST);

        $state = new State;
        $state->name = $name;
        $state->created_at = date('Y-m-d H:i:s');
        $state->updated_at = date('Y-m-d H:i:s');
        $state->save();

        $_SESSION['message'] = [
            'content' => 'State added',
            'type' => 'success'
        ];

        redirect(url('/states'));
    }

    public function edit($id)
    {
        $state = new State;
        $state->load($id);

        view('back/states/edit', compact('state'));
    }

    public function update($id)
    {
        extract($_POST);

        $state = new State;
        $state->load($id);
        $state->name = $name;
        $state->updated_at = date('Y-m-d H:i:s');
        $state->save();

        $_SESSION['message'] = [
            'content' => 'State added',
            'type' => 'success'
        ];

        redirect(url('/states'));
    }

    public function delete($id)
    {
        $state = new State;
        $state->load($id);
        $state->delete();

        $_SESSION['message'] = [
            'content' => 'State removed.',
            'type' => 'success'
        ];

        redirect(url('/states'));
    }


}