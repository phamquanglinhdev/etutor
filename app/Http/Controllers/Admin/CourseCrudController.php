<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CourseRequest;
use App\Models\Tags;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CourseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CourseCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Course::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/course');
        CRUD::setEntityNameStrings('Khóa học', 'Các khóa học');
        $this->crud->addButtonFromModelFunction('line','ViewOnWeb','viewOnWeb','line');
        $this->crud->denyAccess('show');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        if(backpack_user()->role >0){
            $this->crud->addClause('where', 'user_id', '=', backpack_user()->id);
        }
        CRUD::addColumn(['name' => 'name', 'label' => 'Tên khóa học']);
        CRUD::addColumn(['name' => 'slug', 'label' => 'URL']);
        CRUD::addColumn(['name' => 'price', 'label' => 'Giá']);
        $this->crud->addColumn([
            // any type of relationship
            'name'         => 'tags', // name of relationship method in the model
            'type'         => 'relationship',
            'label'        => 'Nhãn', // Table column heading
            // OPTIONAL
            'entity'    => 'tags', // the method that defines the relationship in your Model
            'attribute' => 'name',
            'model'     => Tags::class, // foreign key model
        ]);

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
        CRUD::setValidation(CourseRequest::class);
        CRUD::addField(['name' => 'name', 'label' => 'Tên khóa học']);
        CRUD::addField(['name' => 'thumbnail', 'label' => 'Ảnh bìa khóa học','type'=>'image','crop'=> true]);
        CRUD::addField(['name' => 'price', 'label' => 'Giá','default'=>'Liên hệ']);
        CRUD::addField(['name' => 'slug', 'label' => 'URL','type'=>'hidden'],);
        CRUD::addField(['name' => 'description', 'label' => 'Giới thiệu','type'=>'ckeditor']);
        CRUD::addField(['name' => 'learning', 'label' => 'Phương pháp học','type'=>'ckeditor']);
        CRUD::addField(['name' => 'content', 'label' => 'Nội dung','type'=>'ckeditor']);
        $this->crud->addField([
            // any type of relationship
            'name'         => 'tags', // name of relationship method in the model
            'type'         => 'relationship',
            'label'        => 'Nhãn', // Table column heading
            // OPTIONAL
            'entity'    => 'tags', // the method that defines the relationship in your Model
            'attribute' => 'name',
            'model'     => Tags::class, // foreign key model
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
