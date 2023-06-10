<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PromotionsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Promotions;

/**
 * Class PromotionsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PromotionsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Promotions::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/promotions');
        CRUD::setEntityNameStrings('promotions', 'promotions');
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
        CRUD::column('prix_prom');
        CRUD::addColumn([
        
            'label' => "Produit",
            'name' => 'product_id',
            'entity' => 'product',
            'attribute' => 'name',

            'model' => "App\Models\Product",
        ]);
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
       // $this->crud->addFilter($this->getProductFilter());
    }
    
   
   

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        
        CRUD::setValidation(PromotionsRequest::class);

        CRUD::field('prix_prom');

        //add a field to the product_id column
       //type and select product
       if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $this->crud->addField([
            'name' => 'product_id',
            'value' => $product_id
        ]);
    } else {
        CRUD::addField([
            'label' => "Produit",
            'type' => 'select',
            'name' => 'product_id', // the db column for the foreign key
            'entity' => 'product', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Product", // foreign key model
    
        ]);
    }
        CRUD::field('product_id');
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