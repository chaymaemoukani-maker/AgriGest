<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails de la parcelle</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root{
            --forest-900:#1E3A2B; --forest-700:#2F5233;
            --wheat-500:#D4A72C; --wheat-600:#B98F1D;
            --clay-500:#B5652B; --clay-600:#96501F;
            --sky-500:#3E7CB1;
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
        .card-band{padding:1.5rem 1.75rem;color:#fff;}
        .card-band.status-culture{background:var(--forest-700);}
        .card-band.status-recoltee{background:var(--wheat-600);}
        .card-band.status-jachere{background:var(--clay-600);}
        .card-band .eyebrow{font-size:.72rem;text-transform:uppercase;letter-spacing:.08em;opacity:.8;}
        .card-band h1{font-size:1.5rem;margin-top:.2rem;}
        .card-body{padding:1.75rem;}

        .dossier dl{display:grid;grid-template-columns:170px 1fr;row-gap:1.1rem;margin:0;}
        .dossier dt{font-size:.72rem;text-transform:uppercase;letter-spacing:.05em;color:var(--ink-400);font-weight:700;align-self:center;}
        .dossier dd{margin:0;font-family:'IBM Plex Mono',monospace;font-size:1rem;align-self:center;}
        .dossier hr{border:none;border-top:1px solid var(--parchment-200);margin:.2rem 0;grid-column:1/-1;}

        .status-chip{display:inline-flex;align-items:center;gap:.35rem;font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.04em;padding:.3rem .7rem;border-radius:99px;}
        .status-chip.culture{background:rgba(47,82,51,.1);color:var(--forest-700);}
        .status-chip.recoltee{background:rgba(212,167,44,.18);color:var(--wheat-600);}
        .status-chip.jachere{background:rgba(181,101,43,.12);color:var(--clay-600);}

        .form-actions{display:flex;gap:.6rem;margin-top:1.75rem;}
        .btn{display:inline-flex;align-items:center;gap:.4rem;border:none;border-radius:8px;padding:.65rem 1.15rem;font-family:'Inter',sans-serif;font-weight:600;font-size:.88rem;cursor:pointer;text-decoration:none;transition:transform .12s ease;}
        .btn:hover{transform:translateY(-1px);}
        .btn-secondary{background:var(--parchment-100);color:var(--ink-900);border:1px solid var(--parchment-200);}
        .btn-warning{background:var(--wheat-500);color:var(--ink-900);}
        .btn-warning:hover{background:var(--wheat-600);color:var(--ink-900);}
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

    @php
        $bandClass = $parcelle->statut == 'en culture' ? 'status-culture' : ($parcelle->statut == 'récoltée' ? 'status-recoltee' : 'status-jachere');
        $chipClass = $parcelle->statut == 'en culture' ? 'culture' : ($parcelle->statut == 'récoltée' ? 'recoltee' : 'jachere');
        $chipLabel = $parcelle->statut == 'en culture' ? 'En culture' : ($parcelle->statut == 'récoltée' ? 'Récoltée' : 'En jachère');
    @endphp

    <div class="card">

        <div class="card-band {{ $bandClass }}">
            <span class="eyebrow">Fiche parcelle</span>
            <h1><i class="bi bi-map"></i> {{ $parcelle->nom }}</h1>
        </div>

        <div class="card-body">

            <div class="dossier">
                <dl>

                    <dt>Nom</dt>
                    <dd>{{ $parcelle->nom }}</dd>
                    <hr>

                    <dt>Culture</dt>
                    <dd>{{ $parcelle->culture }}</dd>
                    <hr>

                    <dt>Superficie</dt>
                    <dd>{{ $parcelle->superficie }} ha</dd>
                    <hr>

                    <dt>Date de plantation</dt>
                    <dd>{{ $parcelle->date_plantation }}</dd>
                    <hr>

                    <dt>Statut</dt>
                    <dd>
                        <span class="status-chip {{ $chipClass }}">{{ $chipLabel }}</span>
                    </dd>

                </dl>
            </div>

            <div class="form-actions">
                <a href="{{ route('parcelles.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
                <a href="{{ route('parcelles.edit', $parcelle->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Modifier
                </a>
            </div>

        </div>

    </div>

</div>

</body>
</html>