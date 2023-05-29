<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Order::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order');
        CRUD::setEntityNameStrings('order', 'orders');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    { 
        //show all informations of the client
        CRUD::addColumn([
            'name' => 'nom',
            'type' => 'select',
            'label' => 'Nom du client',
            'entity' => 'client',
            'attribute' => 'nom',
            'model' => "App\Models\Client",
        ]);
        
        CRUD::addColumn([
            'name' => 'prenom',
            'type' => 'select',
            'label' => 'Prenom du client',
            'entity' => 'client',
            'attribute' => 'prenom',
            'model' => "App\Models\Client",
        ]);
        CRUD::addColumn([
            'name' => 'telephone',
            'type' => 'select',
            'label' => 'Telephone du client',
            'entity' => 'client',
            'attribute' => 'telephone',
            'model' => "App\Models\Client",
        ]);
               
        CRUD::column('product_id');
        CRUD::column('quantity');
        CRUD::column('total');
        //show if the order is treated or not
        CRUD::addColumn([
            'name' => 'estTraite',
            'type' => 'boolean',
            'label' => 'est Traite',
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
        CRUD::setValidation(OrderRequest::class);
        
        CRUD::field('client_id');
        //chose multiple products
        CRUD::addField([
            'name' => 'product_id',
            'label' => 'Produit',
            'type' => 'select_multiple',
            'entity' => 'product',
            'attribute' => 'name',
            'model' => "App\Models\Product",
        ]);

        CRUD::field('quantity');
        CRUD::field('total');
        CRUD::field('estTraite');
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }
    //setshowoperation
    protected function setupShowOperation()
    {
        CRUD::setValidation(OrderRequest::class);
        
        CRUD::addColumn([
            'name' => 'nom',
            'type' => 'select',
            'label' => 'Nom du client',
            'entity' => 'client',
            'attribute' => 'nom',
            'model' => "App\Models\Client",
        ]);
        
        CRUD::addColumn([
            'name' => 'prenom',
            'type' => 'select',
            'label' => 'Prenom du client',
            'entity' => 'client',
            'attribute' => 'prenom',
            'model' => "App\Models\Client",
        ]);
        CRUD::addColumn([
            'name' => 'telephone',
            'type' => 'select',
            'label' => 'Telephone du client',
            'entity' => 'client',
            'attribute' => 'telephone',
            'model' => "App\Models\Client",
        ]);
     
        CRUD::Column('client_id');
        CRUD::Column('product_id');
        CRUD::Column('quantity');
        CRUD::Column('total');
        CRUD::Column('estTraite');
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
