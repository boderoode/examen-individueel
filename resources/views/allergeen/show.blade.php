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

<div class="table-responsive">
            <table class="table table-hover table-striped table-borderless table-sm table-condensed mx-auto w-auto float-start">
                <tbody>
                    <tr>
                        <th>Naam:</th>
                        <td>{{ $gezin[0]->gezin_naam }}</td>
                    </tr>
                    <tr>
                        <th>Omschrijving:</th>
                        <td>{{ $gezin[0]->gezin_omschrijving }}</td>
                    </tr>
                    <tr>
                        <th>Totaal Aantal Personen:</th>
                        <td>{{ $gezin[0]->totaal_aantal_personen }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Naam</th>
                            <th scope="col">Type persoon</th>
                            <th scope="col">Gezinsrol</th>
                            <th scope="col">Allergie</th>
                            <th scope="col">Wijzig allergie</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($gezin as $persoon)
                                <tr>
                                    <td>{{ $persoon->voornaam }} {{ $persoon->tussenvoegsel }} {{ $persoon->achternaam }}</td>
                                    <td>{{ $persoon->typepersoon }}</td>
                                    {{-- If the IsVertegenwoordig == 1 transform into string saying "Vertegenwoordiger" Else the IsVertegenwoordiger == 0 transform into a string saying "Gezinslid"--}}
                                    <td>{{ $persoon->IsVertegenwoordiger == 1 ? 'Vertegenwoordiger' : 'Gezinslid' }}</td>
                                    <td>{{ $persoon->allergie_omschrijving }}</td>
                                    <td><a href="{{ route('allergeen.edit', $persoon->id) }}" class="btn btn-primary">Wijzig</a></td>
                                    
                                    
                                </tr>
                            @endforeach
                    </tbody>
                </table>
