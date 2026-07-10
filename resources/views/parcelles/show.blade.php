<!DOCTYPE html>
<html>
<head>
    <title>Détails de la parcelle</title>
</head>
<body>

<h2>Détails de la parcelle</h2>

<p><strong>Nom :</strong> {{ $parcelle->nom }}</p>

<p><strong>Culture :</strong> {{ $parcelle->culture }}</p>

<p><strong>Superficie :</strong> {{ $parcelle->superficie }}</p>

<p><strong>Date de plantation :</strong> {{ $parcelle->date_plantation }}</p>

<p><strong>Statut :</strong> {{ $parcelle->statut }}</p>

<a href="{{ route('parcelles.index') }}">Retour</a>

</body>
</html>