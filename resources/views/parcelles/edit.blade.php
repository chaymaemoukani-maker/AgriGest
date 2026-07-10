<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une parcelle</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">
            <h3>✏️ Modifier une parcelle</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('parcelles.update', $parcelle->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control"
                           value="{{ old('nom', $parcelle->nom) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Culture</label>
                    <input type="text" name="culture" class="form-control"
                           value="{{ old('culture', $parcelle->culture) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Superficie</label>
                    <input type="number" step="0.01" name="superficie"
                           class="form-control"
                           value="{{ old('superficie', $parcelle->superficie) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Date de plantation</label>
                    <input type="date" name="date_plantation"
                           class="form-control"
                           value="{{ old('date_plantation', $parcelle->date_plantation) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Statut</label>

                    <select name="statut" class="form-select">

                        <option value="en culture"
                            {{ $parcelle->statut == 'en culture' ? 'selected' : '' }}>
                            En culture
                        </option>

                        <option value="récoltée"
                            {{ $parcelle->statut == 'récoltée' ? 'selected' : '' }}>
                            Récoltée
                        </option>

                        <option value="en jachère"
                            {{ $parcelle->statut == 'en jachère' ? 'selected' : '' }}>
                            En jachère
                        </option>

                    </select>

                </div>

                <button type="submit" class="btn btn-warning">
                    💾 Modifier
                </button>

                <a href="{{ route('parcelles.index') }}" class="btn btn-secondary">
                    Retour
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>