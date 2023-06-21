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
                            @foreach ($allergie as $allergie)
                                <tr>
                                    <td>{{ $allergie->naam }}</td>
                                    <td>{{ $allergie->omschrijving }}</td>
                                    <td>{{ $allergie->volwassenen }}</td>
                                    <td>{{ $allergie->kinderen }}</td>
                                    <td>{{ $allergie->babys }}</td>
                                    <td>{{ $allergie->vertegenwoordiger }}</td>
                                    <td>
                                    </td>
                                </tr>
                            @endforeach
                        @endif


    

