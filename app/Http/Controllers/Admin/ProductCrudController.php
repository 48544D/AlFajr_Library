<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('product', 'products');
        if(backpack_user()->hasRole('admin')){
            CRUD::allowAccess('show');
            CRUD::allowAccess('revisions');
            CRUD::allowAccess('update');
            CRUD::allowAccess('delete');
            CRUD::allowAccess('list');
            CRUD::allowAccess('create');}
        else{
            //deny access with message
            CRUD::denyAccess(['show', 'revisions', 'update', 'delete', 'list', 'create']);
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //list with label
        CRUD::column('reference')->label('Référence');
        CRUD::column('name')->label('Nom');
        CRUD::column('price')->label('Prix'); 
        CRUD::addColumn([
            'label' => "Image de produit",
            'name' => "image",
            'type' => 'image',
            'upload' => true,
            'disk' => 'local',
        ]);
        CRUD::column('sub_category_id')->label('Sous catégorie');
        CRUD::column('stock')->label('Disponible');
        $this->crud->addButtonFromView('line', 'promo', 'promotion', 'end');
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }
    //redirect from product to promotion
    public function promotion($id)
    {
        $admin=backpack_url();
        return redirect($admin.'/promotions/create?product_id='.$id);
    }
    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProductRequest::class);
        CRUD::field('reference')->label('Référence');
        CRUD::field('name')->label('Nom');
        CRUD::field('price')->label('Prix');
        CRUD::addField([
            'label' => "Image de produit",
            'name' => "image",
            'type' => 'upload',
            'upload' => true,
            'disk' => 'local',
            'rules' => 'image',
            'validation' => [
               'messages' => [
               'image' => 'Le fichier doit être une image',
        ],
    ],
        ]);
        //field subcategory from subcategory table
        CRUD::addField([
            'label' => "Sous catégorie",
            'name' => 'sub_category_id', // the db column for the foreign key
            'entity' => 'subCategory', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\SubCategory", // foreign key model
            'attributes' => [
                'placeholder' => 'Sélectionnez une sous catégorie'
            ]
        ]);
        //est displonible
        CRUD::field('estDisponible')->label('Disponible');

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
