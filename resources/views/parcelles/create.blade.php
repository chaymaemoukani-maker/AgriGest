<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une parcelle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">
<h3>Ajouter une parcelle</h3>
</div>

<div class="card-body">

<form action="{{ route('parcelles.store') }}" method="POST">

@csrf

<div class="mb-3">
<label>Nom</label>
<input type="text" name="nom" class="form-control">
</div>

<div class="mb-3">
<label>Culture</label>
<input type="text" name="culture" class="form-control">
</div>

<div class="mb-3">
<label>Superficie</label>
<input type="number" step="0.01" name="superficie" class="form-control">
</div>

<div class="mb-3">
<label>Date de plantation</label>
<input type="date" name="date_plantation" class="form-control">
</div>

<div class="mb-3">
<label>Statut</label>

<select name="statut" class="form-select">

<option>en culture</option>
<option>récoltée</option>
<option>en jachère</option>

</select>

</div>

<button class="btn btn-success">
Enregistrer
</button>

<a href="{{ route('parcelles.index') }}"
class="btn btn-secondary">
Retour
</a>

</form>

</div>

</div>

</div>

</body>
</html>