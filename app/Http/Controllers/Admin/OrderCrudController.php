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
            'label' => 'Nom',
            'entity' => 'client',
            'attribute' => 'nom',
            'model' => "App\Models\Client",
        ]);
        CRUD::addColumn([
            'name' => 'prenom',
            'type' => 'select',
            'label' => 'Prenom',
            'entity' => 'client',
            'attribute' => 'prenom',
            'model' => "App\Models\Client",
        ]);
        CRUD::addColumn([
            'name' => 'telephone',
            'type' => 'select',
            'label' => 'Telephone',
            'entity' => 'client',
            'attribute' => 'telephone',
            'model' => "App\Models\Client",
        ]);
        
        //CRUD::column('total_quant')->label('Quantité totale');
        CRUD::column('total_price')->label('Prix total');
        CRUD::addColumn([
            'name' => 'estTraite',
            'type' => 'boolean',
            'label' => 'Etat de la commande',
            'options' => [0 => 'En attente', 1 => 'Traité'],
            'wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry, $related_key) {
                    return $entry->estTraite ? 'badge badge-success' : 'badge badge-warning';
                },
                'style' => 'height: 28px;font-size: 15px;color:white;width: 100px;',
            ],
        ]);
        //hide appecu button from actions section
        $this->crud->removeButton('show');
        $this->crud->addButtonFromView('line', 'details', 'details', 'beginning');
        $this->crud->addClause('orderBy', 'estTraite', 'asc');
        //add button to validate the order in the end of the line
        $this->crud->addButtonFromView('line', 'valider', 'valider', 'end');

               
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }
    public function details($id)
    {
        if (isset($_GET['order_id'])) {
            unset($_GET['order_id']); // Remove the order_id from the query parameters
        }
        return redirect('admin/order-details?order_id='.$id);
    }



    //function to validate the order and handles errors
    public function valider($id)
{
        $order = \App\Models\Order::findOrFail($id); 
        $order->estTraite = 1; 
        $order->save(); 
        return redirect('admin/order');
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
        CRUD::field('total_quant');
        CRUD::field('total_price');
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
     
       // CRUD::Column('client_id');
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
