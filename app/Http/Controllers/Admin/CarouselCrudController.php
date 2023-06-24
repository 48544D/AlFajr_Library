<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarouselRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CarouselCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CarouselCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Carousel::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/carousel');
        CRUD::setEntityNameStrings('carousel', 'carousels');
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
        //decsription column
        CRUD::addColumn([
            'name' => 'description',
            'type' => 'text',
            'label' => 'Description',
        ]);
        CRUD::addColumn([
            'label' => "Image de carousel",
            'name' => "image",
            'type' => 'Image',
            'upload' => true,
            'disk' => 'local',
            'width' => '100px',
            'height' => '150px',
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
        CRUD::setValidation(CarouselRequest::class);
       
        $carouselCount = \App\Models\Carousel::count();
        if($carouselCount >= 3){
           //set abort with message
              abort(403, 'Vous ne pouvez pas ajouter plus de 3 images');

            
        }
        //description column
        CRUD::addField([
            'name' => 'description',
            'type' => 'text',
            'label' => 'Description',
        ]);
        CRUD::addField([
            'label' => "Image de carousel",
            'name' => "image",
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
            /*'rules' => 'image',
            'validation' => [
               'messages' => [
               'image' => 'Le fichier doit être une image',
        ],
    ],*/
        ]);
        //call mutator
        
    
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
