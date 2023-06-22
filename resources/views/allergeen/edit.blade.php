<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
    {{-- Alerts --}}
    {{-- Success --}}
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        {{-- Error --}}
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif



    {{-- Form --}}

    <form action="{{ route('allergeen.update', $persoon->id) }}" method="POST">
        @csrf
          @method('PUT')
            <div class="form-group">
              <label for="naam">Allergie </label>

                 {{--make a option field for the baan_nummer column in the reservering table --}}
                  <select name="naam" id="naam">
                      <option value="">Selecteer Allergie</option>
                                <option value="soja">Soja</option>
                                <option value="lactose">Lactose</option>
                                <option value="hazelnoten">Hazelnoten</option>
                                <option value="pindas">Pinda's</option>
                                <option value="gluten">Gluten</option>
                  </select>
                      <button type="submit" class="btn btn-primary">Sla op!</button>
            </div>

          
     </form>

            