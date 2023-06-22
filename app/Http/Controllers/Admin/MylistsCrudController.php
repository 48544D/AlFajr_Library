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
       
           //add a reference field
        CRUD::addColumn('reference');
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
     
        //add a column that shows the boolean estTraite
        CRUD::addColumn([
            'label' => "Etat",
            'name' => 'estTraite', // the db column for the foreign key
            'type' => 'boolean',
            'options' => [0 => 'En attente', 1 => 'Traitée'],
            'wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry, $related_key) {
                    return $entry->estTraite ? 'badge badge-success' : 'badge badge-warning';
                },
                'style' => 'height: 28px;font-size: 15px;color:white;width: 100px;',
            ],
        ]);
        CRUD::addColumn([
            'label' => "Fichier",
            'name' => "Emplac_fich",
            'type' => 'image',
            'upload' => true,
            'disk' => 'local',
            'width' => '100px',
            'height' => '150px',
        ]);
         //remove show button
        $this->crud->removeButton('show');
        $this->crud->addButtonFromView('line', 'download', 'download', 'beginning');
        $this->crud->addClause('orderBy', 'estTraite', 'asc');
        //add button to validate the order in the end of the line
        $this->crud->addButtonFromView('line', 'valider', 'valider', 'end');
        
        
       // $this->crud->addButtonFromView('Emplac_fich', 'download', 'download', 'beginning');


        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }
    public function valider($id)
    {
            $mylists = \App\Models\Mylists::findOrFail($id); 
            if($mylists->estTraite == 0)
            {
                $mylists->estTraite = 1; 
                $mylists->save(); 
            }
            return redirect()->back();
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
        ]);
        CRUD::field('reference');
        CRUD::addField('estTraite');

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
