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

    {{-- maak een foreach loop met de data uit mijn gezin, persoon en allergies --}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12">
                    <div class="row">
                        <h5 class="mt-5 mb-5 mx-auto text-float-left">Overzicht van de allergieën van de gezinnen</h5>
                        <form action="{{ route('allergeen.index') }}" method="GET">
                            <select name="naam">
                                <option value="">Selecteer Allergie</option>
                                <option value="soja">Soja</option>
                                <option value="lactose">Lactose</option>
                                <option value="hazelnoten">Hazelnoten</option>
                                <option value="pindas">Pinda's</option>
                                <option value="gluten">Gluten</option>
                            </select>
                            <button type="submit">Zoeken</button>
                        </form>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Naam</th>
                            <th scope="col">Omschrijving</th>
                            <th scope="col">Volwassenen</th>
                            <th scope="col">Kinderen</th>
                            <th scope="col">Baby's</th>
                            <th scope="col">Vertegenwoordiger</th>
                            <th scope="col">Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($allergie->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center"><div class="alert alert-warning" role="alert">
                                   Er zijn geen gezinnen gevonden met deze allergie  
                            </div></td>
                            </tr>
                        @else
                            @foreach ($allergie as $item)
                                <tr>
                                    <td>{{ $item->gezin_naam }}</td>
                                    <td>{{ $item->allergie_omschrijving }}</td>
                                    <td>{{ $item->aantal_volwassenen }}</td>
                                    <td>{{ $item->aantal_kinderen }}</td>
                                    <td>{{ $item->aantal_babys }}</td>
                                    <td>{{ $item->IsVertegenwoordiger }}</td>
                                    <td>
                                        {{-- add a empty bootstrap button --}}
                                        <a href="{{ route('allergeen.show', $item->id) }}" class="btn btn-primary">Bekijk</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
