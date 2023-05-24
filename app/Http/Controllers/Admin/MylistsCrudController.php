<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MylistsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MylistsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MylistsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Mylists::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/mylists');
        CRUD::setEntityNameStrings('mylists', 'mylists');
        //set custom view
       // $this->crud->setListView('crud.list_mylists');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('Nom_doc');
        CRUD::column('Emplac_fich');
        CRUD::column('Etablissement');
        CRUD::column('Niveau');
        CRUD::column('client_id');
        CRUD::column('created_at');
        CRUD::column('updated_at');
        //Display an image
        CRUD::addColumn([
            'name' => 'Emplac_fich',
            'name' => 'Nom_doc',
            'type' => 'image',  
            'height' => '100px',
            'width' => '100px',
            'upload' => true,
            'disk' => 'local',
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
        CRUD::setValidation(MylistsRequest::class);

        CRUD::field('Nom_doc');
        CRUD::field('Emplac_fich');
        CRUD::field('Etablissement');
        CRUD::field('Niveau');
        CRUD::field('client_id');
        CRUD::addField([
            'name' => 'Emplac_fich',
            'name' => 'Nom_doc',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'local',
            'rules' => 'image',
            'validation' => [
               'messages' => [
               'image' => 'Le fichier doit être une image',
        ],
        ] 
        ]);
        //add field for id client that is  foreign key
        CRUD::addColumn([
            'label' => "Client",
            'name' => 'client_id', // the db column for the foreign key
            'entity' => 'client', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Clients", // foreign key model
            'placeholder' => 'Sélectionner un client', // placeholder for the select
            
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
