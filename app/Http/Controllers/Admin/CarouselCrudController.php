<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarouselRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Intervention\Image\Facades\Image;
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
        
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('path');
        //Display the image in the list
        $this->crud->addColumn([
            'name' => 'IMAGE',
            'label' => 'Image',
            'type' => 'image',
            'height' => '100px',
            'width' => '100px',
            //'prefix' => public_path('storage/app/public/images/carousel'),
        ]);

        
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
        //Upload the image in the /storage/app/public/images/carousel
        CRUD::addField([
            'name' => 'path',
            'label' => 'Image',
            'type' => 'upload',
            'upload' => true,
            //store in storage/app/public/images/carousel of the project
            'disk' => 'local',
            'local' => [
                'driver' => 'local',
                'root' => public_path('storage/images/carousel'),
                // Other disk options...
            ],
            'path' => 'storage/images/carousel',
            'prefix' => 'storage/images/carousel',
            'rules' => 'image',
            'validation' => [
               'messages' => [
               'image' => 'Le fichier doit être une image',
        ],
        ] 
        
        ]); 

        
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
