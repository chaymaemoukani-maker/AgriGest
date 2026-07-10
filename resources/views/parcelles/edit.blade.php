<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier une parcelle</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root{
            --forest-900:#1E3A2B; --forest-700:#2F5233;
            --wheat-500:#D4A72C; --wheat-600:#B98F1D;
            --clay-500:#B5652B; --clay-600:#96501F;
            --parchment-50:#F7F3E8; --parchment-100:#EFE8D5; --parchment-200:#E3D9BC;
            --ink-900:#22201B; --ink-600:#5B5748; --ink-400:#8A8471;
        }
        *{box-sizing:border-box;}
        body{margin:0;font-family:'Inter',sans-serif;background:var(--parchment-50);color:var(--ink-900);}
        h1,h2,h3{font-family:'Fraunces',serif;margin:0;}

        .topbar{background:var(--forest-900);color:var(--parchment-50);padding:1rem 2rem;display:flex;align-items:center;gap:.75rem;border-bottom:4px solid var(--wheat-500);}
        .topbar .word{font-family:'Fraunces',serif;font-weight:600;font-size:1.25rem;}
        .topbar .tagline{font-size:.72rem;color:var(--parchment-200);letter-spacing:.06em;text-transform:uppercase;margin-left:.35rem;padding-left:.35rem;border-left:1px solid rgba(247,243,232,.3);}

        .page{max-width:640px;margin:0 auto;padding:2.5rem 1.5rem 4rem;}

        .card{background:#fff;border-radius:12px;border:1px solid var(--parchment-200);box-shadow:0 2px 8px rgba(34,32,27,.06);overflow:hidden;}
        .card-band{padding:1.5rem 1.75rem;color:#fff;background:var(--wheat-600);}
        .card-band h1{font-size:1.4rem;}
        .card-band p{margin:.25rem 0 0;font-size:.82rem;opacity:.85;}
        .card-body{padding:1.75rem;}

        .field{margin-bottom:1.1rem;}
        .field label{display:block;font-size:.78rem;font-weight:700;text-transform:uppercase;letter-spacing:.04em;color:var(--ink-600);margin-bottom:.35rem;}
        .field input,.field select{width:100%;padding:.6rem .75rem;border:1px solid var(--parchment-200);border-radius:8px;font-family:'Inter',sans-serif;font-size:.92rem;background:var(--parchment-50);color:var(--ink-900);}
        .field input:focus,.field select:focus{outline:2px solid var(--wheat-600);outline-offset:1px;background:#fff;}

        .form-actions{display:flex;gap:.6rem;margin-top:1.5rem;}
        .btn{display:inline-flex;align-items:center;gap:.4rem;border:none;border-radius:8px;padding:.65rem 1.15rem;font-family:'Inter',sans-serif;font-weight:600;font-size:.88rem;cursor:pointer;text-decoration:none;transition:transform .12s ease;}
        .btn:hover{transform:translateY(-1px);}
        .btn-warning{background:var(--wheat-500);color:var(--ink-900);}
        .btn-warning:hover{background:var(--wheat-600);color:var(--ink-900);}
        .btn-secondary{background:var(--parchment-100);color:var(--ink-900);border:1px solid var(--parchment-200);}
    </style>
</head>
<body>

<div class="topbar">
    <svg width="26" height="26" viewBox="0 0 28 28">
        <rect x="1" y="1" width="8" height="8" rx="1.5" fill="var(--forest-700)"/>
        <rect x="10" y="1" width="8" height="8" rx="1.5" fill="var(--wheat-500)"/>
        <rect x="19" y="1" width="8" height="8" rx="1.5" fill="#3E7CB1"/>
        <rect x="1" y="10" width="8" height="8" rx="1.5" fill="var(--wheat-500)"/>
        <rect x="10" y="10" width="8" height="8" rx="1.5" fill="var(--clay-500)"/>
        <rect x="19" y="10" width="8" height="8" rx="1.5" fill="var(--forest-700)"/>
        <rect x="1" y="19" width="8" height="8" rx="1.5" fill="#3E7CB1"/>
        <rect x="10" y="19" width="8" height="8" rx="1.5" fill="var(--forest-700)"/>
        <rect x="19" y="19" width="8" height="8" rx="1.5" fill="var(--wheat-500)"/>
    </svg>
    <span class="word">Parcelles</span>
    <span class="tagline">Registre des cultures</span>
</div>

<div class="page">

    <div class="card">

        <div class="card-band">
            <h1><i class="bi bi-pencil-square"></i> Modifier une parcelle</h1>
            <p>Mettre à jour la fiche de {{ $parcelle->nom }}</p>
        </div>

        <div class="card-body">

            <form action="{{ route('parcelles.update', $parcelle->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="field">
                    <label>Nom</label>
                    <input type="text" name="nom" class="form-control"
                           value="{{ old('nom', $parcelle->nom) }}">
                </div>

                <div class="field">
                    <label>Culture</label>
                    <input type="text" name="culture" class="form-control"
                           value="{{ old('culture', $parcelle->culture) }}">
                </div>

                <div class="field">
                    <label>Superficie (ha)</label>
                    <input type="number" step="0.01" name="superficie"
                           class="form-control"
                           value="{{ old('superficie', $parcelle->superficie) }}">
                </div>

                <div class="field">
                    <label>Date de plantation</label>
                    <input type="date" name="date_plantation"
                           class="form-control"
                           value="{{ old('date_plantation', $parcelle->date_plantation) }}">
                </div>

                <div class="field">
                    <label>Statut</label>
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

                <div class="form-actions">
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-save"></i> Modifier
                    </button>
                    <a href="{{ route('parcelles.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>