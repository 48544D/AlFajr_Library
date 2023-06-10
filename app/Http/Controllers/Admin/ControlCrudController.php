<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ControlRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ControlCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ControlCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Control::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/control');
        CRUD::setEntityNameStrings('control', 'controls');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        
        CRUD::addColumn([
            'name' => 'PanierActif',
            'type' => 'boolean',
            'label' => 'Etat de panier',
            'options' => [0 => 'désactivé', 1 => 'actif'],
            'wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry, $related_key) {
                    return $entry->PanierActif ? 'badge badge-success' : 'badge badge-danger';
                },
                'style' => 'height: 28px;font-size: 15px;color:white;width: 100px;',
            ],
        ]);
        CRUD::addColumn([
            'name' => 'MaListeActive',
            'type' => 'boolean',
            'label' => 'Etat de service ma liste',
            'options' => [0 => 'désactivé', 1 => 'actif'],
            'wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry, $related_key) {
                    return $entry->MaListeActive ? 'badge badge-success' : 'badge badge-danger';
                },
                'style' => 'height: 28px;font-size: 15px;color:white;width: 100px;',
            ],
        ]);
        //remove add button
        CRUD::removeButton('create');
        //remove delete button
        CRUD::removeButton('delete');

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
        CRUD::setValidation(ControlRequest::class);
        $this->crud->denyAccess(['create']);
        CRUD::field('PanierActif');
        CRUD::field('MaListeActive');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }
    //setupdeleteoperation
    protected function setupDeleteOperation()
    {
        $this->crud->denyAccess(['delete']);
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
