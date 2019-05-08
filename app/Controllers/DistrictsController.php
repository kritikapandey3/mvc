<?php
namespace App\Controllers;


use App\Models\Category;
use App\Models\District;
use App\Models\State;
use System\Core\BaseController;

class DistrictsController extends BaseController
{
    public function index()
    {
        $data = $this->paginate(new District, 10, 'districts');

        view('back/districts/index', $data);
    }

    public function create() {
        $state = new State;
        $states = $state->select('id, name')->get();
        view('back/districts/create', compact('states'));
    }

    public function store()
    {
        extract($_POST);

        $district = new District;
        $district->name = $name;
        $district->state_id = $state_id;
        $district->created_at = date('Y-m-d H:i:s');
        $district->updated_at = date('Y-m-d H:i:s');
        $district->save();

        $_SESSION['message'] = [
            'content' => 'District added',
            'type' => 'success'
        ];

        redirect(url('/districts'));
    }

    public function edit($id)
    {
        $state = new State;
        $states = $state->select('id, name')->get();

        $district = new District;
        $district->load($id);

        view('back/districts/edit', compact('states', 'district'));
    }

    public function update($id)
    {
        extract($_POST);

        $district = new District;
        $district->load($id);
        $district->name = $name;
        $district->state_id = $state_id;
        $district->updated_at = date('Y-m-d H:i:s');
        $district->save();

        $_SESSION['message'] = [
            'content' => 'District updated.',
            'type' => 'success'
        ];

        redirect(url('/districts'));
    }

    public function delete($id)
    {
        $district = new District;
        $district->load($id);
        $district->delete();

        $_SESSION['message'] = [
            'content' => 'District removed.',
            'type' => 'success'
        ];

        redirect(url('/districts'));
    }


}