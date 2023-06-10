<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderDetailsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderDetailsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderDetailsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\OrderDetails::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order-details');
        CRUD::setEntityNameStrings('order details', 'order details');
       
        
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
       /* if (isset($_GET['order_id'])) {
            $orderID = $_GET['order_id'];
            $this->crud->addClause('where', 'order_id', '=', $orderID);
        }*/
        if (request()->has('order_id')) {
            $orderID = request()->input('order_id');
            $this->crud->addClause('where', 'order_id', '=', $orderID);
        } 
        //add order reference
        CRUD::addColumn([
            'name' => 'order_id',
            'label' => 'Référence',
            'type' => 'select',
            'entity' => 'order',
            'attribute' => 'reference',
            'model' => "App\Models\Order",
            'limit' => 100, // Set a limit to the displayed characters
            'wrapper' => ['class' => 'text-truncate'],
            'visibleInTable' => true,
            'table' => [
                'attributes' => [
                    'data-toggle' => 'tooltip',
                    'title' => '{!! $entry->order_id !!}',
                ],
            ],
        ]);
        CRUD::addColumn([
            'name' => 'product_name',
            'label' => 'Nom du produit',
            'type' => 'select',
            'entity' => 'product',
            'attribute' => 'name',
            'model' => "App\Models\Product",
            'limit' => 100, // Set a limit to the displayed characters
            'wrapper' => ['class' => 'text-truncate'],
            'visibleInTable' => true,
            'table' => [
                'attributes' => [
                    'data-toggle' => 'tooltip',
                    'title' => '{!! $entry->product_name !!}',
                ],
            ],
        ]);
        CRUD::addColumn([
            'name' => 'quantity',
            'type' => 'number',
            'label' => 'Quantité',
        ]);
    
        CRUD::addColumn([
            'name' => 'price',
            'type' => 'number',
            'label' => 'Prix total',
        ]);
        //remove create button
        $this->crud->removeButton('create');
         
    }
    
        

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(OrderDetailsRequest::class);

        //order id foreign key from order table
        //product id foreign key from product table
        CRUD::addField([
            'name' => 'order_id',
            'label' => 'Id de l\'ordre',
            'type' => 'select',
            'entity' => 'order',
            'attribute' => 'id',
            'model' => "App\Models\order",
        ]);

        CRUD::addField([
            'name' => 'product_id',
            'label' => 'Id de produit',
            'type' => 'select',
            'entity' => 'Product',
            'attribute' => 'name',
            'model' => "App\Models\Product",
        ]);
        CRUD::field('quantity');
        CRUD::field('price');
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
