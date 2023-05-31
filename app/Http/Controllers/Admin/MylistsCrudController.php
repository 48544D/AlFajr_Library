<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MylistsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use \Backpack\CRUD\app\Http\Controllers\Operations\FetchOperation;

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
    //Setup a new route

    public function setup()
    {
        CRUD::setModel(\App\Models\Mylists::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/mylists');
        CRUD::setEntityNameStrings('mylists', 'mylists');
        $this->crud->addButtonFromView('line', 'download', 'download', 'beginning');
       // $this->crud->setView('crud.list_mylists');
       //search for a specific product
       
    
    }
   
    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */

   
    public function download($id)
    {
       if($id){
        $mylist = \App\Models\Mylists::find($id);
        $file_path =$mylist->Emplac_fich;
        $file_path = str_replace('/', '\\', $file_path); 
        return response()->download(app_path('\..\public\storage\\'.$file_path));
       }
       else{
        return redirect()->back();
       }
    }

    protected function setupListOperation()
    {   
       // CRUD::column('Nom_doc');
       // CRUD::column('Emplac_fich');
        // CRUD::column('Etablissement');
        CRUD::column('Niveau');
        CRUD::column('client_id');
        CRUD::addColumn([
            'label' => "Prenom du client",
            'name' => 'Nom_id', // the db column for the foreign key
            'entity' => 'client', // the method that defines the relationship in your Model
            'attribute' => 'prenom', 
            'model' => "App\Models\Clients", // foreign key model   
        ]);
       // CRUD::column('created_at');
        //CRUD::column('updated_at');
        //Display an image
      /*  CRUD::addColumn([
            'label'=>'Image',
            'name'=>'Emplac_fich',
            'type'=>'image',
            'upload'=>true,
            'path'=>"public/uploads/mylists",
        ]);*/

        //display the name of the client
        CRUD::addColumn([
            'label' => "Nom du client",
            'name' => 'client_id', // the db column for the foreign key
            'entity' => 'client', // the method that defines the relationship in your Model
            'attribute' => 'name', 
            'model' => "App\Models\Clients", // foreign key model
           
        ]);
        
        
       // $this->crud->addButtonFromView('Emplac_fich', 'download', 'download', 'beginning');


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

        /* Fields can be defined using the fluent syntax or array syntax:
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
