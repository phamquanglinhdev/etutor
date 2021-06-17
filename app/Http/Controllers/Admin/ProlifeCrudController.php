<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProlifeRequest;
use App\Models\Option;
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
        if(backpack_user()->role==1){
            $this->crud->addClause('where', 'user_id', '=', backpack_user()->id);
        }else{
            $this->crud->addColumn([
                'name' => 'user_id',
                'type' => 'select',
                'label' => 'Giảng viên',
                'model' => "App\Models\User",
                'attribute' => 'name',
                'entity' => 'users']);
        }
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

            $this->crud->addColumn([
                // any type of relationship
                'name'         => 'options', // name of relationship method in the model
                'type'         => 'relationship',
                'label'        => 'Tag Giáo Viên', // Table column heading
                // OPTIONAL
                'entity'    => 'options', // the method that defines the relationship in your Model
                'attribute' => 'name',
                'model'     => Option::class, // foreign key model
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
        $celendar='<table border="1" cellpadding="0" cellspacing="0" style="width:100%">
	<tbody>
		<tr>
			<td>&nbsp;</td>
			<th>Mon</th>
			<th>Tue</th>
			<th>Wed</th>
			<th>Thu</th>
			<th>Fri</th>
			<th>Sat</th>
			<th>Sub</th>
		</tr>
		<tr>
			<th>Mor</th>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<th>Atf</th>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<th>Eve</th>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>

<p>&nbsp;</p>
            ';
        $table='<table id="salary" border="1" cellpadding="0" cellspacing="0" style="width:500px">
	<thead>
		<tr>
			<th scope="row">Số giờ đăng k&yacute;</th>
			<th scope="col">Học ph&iacute;/Giờ</th>
			<th scope="col">Tổng học ph&iacute;</th>
			<th class="sub" scope="col">Ghi ch&uacute;</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th scope="row">&nbsp;</th>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td rowspan="3">&nbsp;</td>
		</tr>
		<tr>
			<th scope="row">&nbsp;</th>
			<td>&nbsp;</td>
			<td>&nbsp;</td>

		</tr>
		<tr>
			<th scope="row">&nbsp;</th>
			<td>&nbsp;</td>
			<td>&nbsp;</td>

		</tr>
	</tbody>
</table>

<p>&nbsp;</p>';
        CRUD::setValidation(ProlifeRequest::class);
        CRUD::addField(['name' => 'user_id', 'type' => 'hidden','default'=>backpack_user()->id]);
        CRUD::addField(['name' => 'price', 'type' => 'number','label'=>'Học phí / Giờ']);
        CRUD::addField(['name' => 'description', 'type' => 'ckeditor','label'=>'Giới thiệu ngắn']);
        CRUD::addField(['name' => 'level', 'type' => 'ckeditor','label'=>'Trình độ (nhập theo từng dòng)']);
        $request = Prolife::where('user_id','=',backpack_user()->id)->first();
        if(isset($request)){
            CRUD::addField(['name' => 'celendar', 'type' => 'ckeditor','label'=>'Lịch dạy (Nhập theo dòng hoặc tự tạo bảng)']);
            CRUD::addField(['name' => 'salary', 'type' => 'ckeditor','label'=>'Bảng học phí']);
        }else{
            CRUD::addField(['name' => 'celendar', 'type' => 'ckeditor','label'=>'Lịch dạy (Nhập theo dòng hoặc tự tạo bảng)','value'=>$celendar]);
            CRUD::addField(['name' => 'salary', 'type' => 'ckeditor','label'=>'Bảng học phí','value'=>$table]);
        }

        $this->crud->addField([
            // any type of relationship
            'name'         => 'options', // name of relationship method in the model
            'type'         => 'relationship',
            'label'        => 'Tag Giáo Viên', // Table column heading
            // OPTIONAL
            'entity'    => 'options', // the method that defines the relationship in your Model
            'attribute' => 'name',
            'model'     => Option::class, // foreign key model
        ]);
        CRUD::addField(['name' => 'video', 'type' => 'text','label'=>'Mã nhúng video dạy thử']);
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
