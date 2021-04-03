<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CofigRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CofigCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CofigCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Cofig::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/cofig');
        CRUD::setEntityNameStrings('Cài đặt', 'Cài đặt');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->denyAccess('create');
        CRUD::addColumn(['name' => 'host_mail', 'label'=>'Email của trang']);
        CRUD::addColumn(['name' => 'host_phone', 'label'=>'HotLine']);
        CRUD::addColumn(['name' => 'description', 'label'=>'Giới thiệu ngắn (dùng để SEO)']);
        CRUD::addColumn(['name' => 'keyword', 'label'=>'Từ khóa của trang (dùng để SEO,cách nhau bằng dấu phảy)']);
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
        CRUD::setValidation(CofigRequest::class);

        CRUD::addField(['name' => 'host_mail', 'label'=>'Email của trang']);
        CRUD::addField(['name' => 'host_phone', 'label'=>'HotLine']);
        CRUD::addField(['name' => 'description', 'label'=>'Giới thiệu ngắn (dùng để SEO)','type'=>'textarea']);
        CRUD::addField(['name' => 'keyword', 'label'=>'Từ khóa của trang (dùng để SEO,cách nhau bằng dấu phảy)','type'=>'text']);

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
