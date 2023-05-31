@extends(backpack_view('blank'))

@section('header')
  <div class="container-fluid">
    <h2>
      <span class="text-capitalize">{!! $crud->getHeading() ?? $crud->entity_name_plural !!}</span>
      <small id="datatable_info_stack">{!! $crud->getSubheading() ?? '' !!}</small>
    </h2>
  </div>
@endsection

@section('content')
  <div class="row">
    <div class="{{ $crud->getListContentClass() }}">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nom du client</th>
              <th>Prénom du client</th>
              <th>Téléphone du client</th>
              <th>Produits</th>
              <th>Est traité</th>
            </tr>
          </thead>
          <tbody>
            @foreach($entries as $entry)
            <tr>
              <td>{{ $entry->client->nom }}</td>
              <td>{{ $entry->client->prenom }}</td>
              <td>{{ $entry->client->telephone }}</td>
              <td>
                @foreach($entry->products as $product)
                  {{ $product->name }}<br>
                @endforeach
              </td>
              <td>{{ $entry->estTraite ? 'Oui' : 'Non' }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
