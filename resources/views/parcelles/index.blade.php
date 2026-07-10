<!DOCTYPE html>
<html>
<head>
    <title>Liste des parcelles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <h1 class="text-center text-success mb-4">
        🌱 Liste des parcelles
    </h1>

    <a href="{{ route('parcelles.create') }}" class="btn btn-success mb-3">
        Ajouter une parcelle
    </a>

    <table class="table table-bordered table-hover table-striped shadow">

        <thead class="table-success">

        <tr>
            <th>Nom</th>
            <th>Culture</th>
            <th>Superficie</th>
            <th>Date</th>
            <th>Statut</th>
            <th width="250">Actions</th>
        </tr>

        </thead>

        <tbody>

        @foreach($parcelles as $parcelle)

        <tr>

            <td>{{ $parcelle->nom }}</td>

            <td>{{ $parcelle->culture }}</td>

            <td>{{ $parcelle->superficie }} ha</td>

            <td>{{ $parcelle->date_plantation }}</td>

            <td>

                @if($parcelle->statut=="en culture")

                    <span class="badge bg-success">
                        En culture
                    </span>

                @elseif($parcelle->statut=="récoltée")

                    <span class="badge bg-primary">
                        Récoltée
                    </span>

                @else

                    <span class="badge bg-warning text-dark">
                        En jachère
                    </span>

                @endif

            </td>

            <td>

                <a href="{{ route('parcelles.show',$parcelle->id) }}"
                   class="btn btn-info btn-sm">
                    Voir
                </a>

                <a href="{{ route('parcelles.edit',$parcelle->id) }}"
                   class="btn btn-warning btn-sm">
                    Modifier
                </a>

                <form action="{{ route('parcelles.destroy',$parcelle->id) }}"
                      method="POST"
                      style="display:inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Supprimer cette parcelle ?')">
                        Supprimer
                    </button>

                </form>

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

</div>

</body>
</html>