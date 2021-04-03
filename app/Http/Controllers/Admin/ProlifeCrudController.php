<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProlifeRequest;
use App\Models\Prolife;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProlifeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProlifeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Prolife::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/prolife');
        CRUD::setEntityNameStrings('Hố sơ', 'Hồ sơ');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addClause('where', 'user_id', '=', backpack_user()->id);
        $request = Prolife::where('user_id','=',backpack_user()->id)->first();
        if(isset($request)){
            $this->crud->denyAccess('create');
            $this->crud->addColumn([
                'name' => 'user_id',
                'type' => 'select',
                'label' => 'Giảng viên',
                'model' => "App\Models\User",
                'attribute' => 'name',
                'entity' => 'users']);
            CRUD::addColumn([
                'name' => 'national',
                'label' => 'Type',
                'type'=>'select_from_array',
                'options'=>['Giáo viên Việt Nam','Giáo viên Philipines','Giáo viên bản ngữ']
            ]);
        }

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
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProlifeRequest::class);
        CRUD::addField(['name' => 'user_id', 'type' => 'hidden','default'=>backpack_user()->id]);
        CRUD::addField(['name' => 'level', 'type' => 'ckeditor','label'=>'Trình độ (nhập theo từng dòng)']);
        CRUD::addField(['name' => 'teaching', 'type' => 'ckeditor','label'=>'Lịch dạy (Nhập theo dòng hoặc tự tạo bảng)']);
        CRUD::addField([
            'name' => 'national',
            'label' => 'Type',
            'type'=>'select_from_array',
            'options'=>['Giáo viên Việt Nam','Giáo viên Philipines','Giáo viên bản ngữ']
        ]);
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}