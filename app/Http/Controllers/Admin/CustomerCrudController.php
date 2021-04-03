<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use http\Env\Request;

/**
 * Class CustomerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CustomerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    public function __construct(){
        $this->middleware('boss');
        parent::__construct();
    }
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Customer::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/customer');
        CRUD::setEntityNameStrings('Khách hàng', 'Những khách hàng');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    public function save($request){
        return print_r($request);
    }
    protected function setupListOperation()
    {
        $this->crud->denyAccess('create');
        $this->crud->denyAccess('update');
        CRUD::addColumn(['name' => 'name', 'label'=>'Tên']);
        CRUD::addColumn(['name' => 'email', 'label'=>'EMail']);
        CRUD::addColumn(['name' => 'phone', 'label'=>'Số điện thoại']);
        CRUD::addColumn(['name' => 'message', 'label'=>'Lời nhắn']);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
//    protected function setupCreateOperation()
//    {
//        CRUD::setValidation(CustomerRequest::class);
//
//        /**
//         * Fields can be defined using the fluent syntax or array syntax:
//         * - CRUD::field('price')->type('number');
//         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
//         */
//    }
//
//    /**
//     * Define what happens when the Update operation is loaded.
//     *
//     * @see https://backpackforlaravel.com/docs/crud-operation-update
//     * @return void
//     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

}
