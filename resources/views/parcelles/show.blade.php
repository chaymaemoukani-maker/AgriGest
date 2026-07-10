<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de la parcelle</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-success text-white">
            <h3>🌱 Détails de la parcelle</h3>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="30%">Nom</th>
                    <td>{{ $parcelle->nom }}</td>
                </tr>

                <tr>
                    <th>Culture</th>
                    <td>{{ $parcelle->culture }}</td>
                </tr>

                <tr>
                    <th>Superficie</th>
                    <td>{{ $parcelle->superficie }} ha</td>
                </tr>

                <tr>
                    <th>Date de plantation</th>
                    <td>{{ $parcelle->date_plantation }}</td>
                </tr>

                <tr>
                    <th>Statut</th>
                    <td>
                        @if($parcelle->statut == 'en culture')
                            <span class="badge bg-success">En culture</span>

                        @elseif($parcelle->statut == 'récoltée')
                            <span class="badge bg-primary">Récoltée</span>

                        @else
                            <span class="badge bg-warning text-dark">En jachère</span>
                        @endif
                    </td>
                </tr>

            </table>

            <a href="{{ route('parcelles.index') }}" class="btn btn-secondary">
                ⬅ Retour
            </a>

            <a href="{{ route('parcelles.edit', $parcelle->id) }}" class="btn btn-warning">
                ✏ Modifier
            </a>

        </div>

    </div>

</div>

</body>
</html>