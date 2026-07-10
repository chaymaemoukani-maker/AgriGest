<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registre des parcelles</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root{
            --forest-900:#1E3A2B; --forest-700:#2F5233; --forest-600:#3C6B41;
            --wheat-500:#D4A72C; --wheat-600:#B98F1D;
            --clay-500:#B5652B; --clay-600:#96501F;
            --sky-500:#3E7CB1; --sky-600:#2F6390;
            --parchment-50:#F7F3E8; --parchment-100:#EFE8D5; --parchment-200:#E3D9BC;
            --ink-900:#22201B; --ink-600:#5B5748; --ink-400:#8A8471;
        }
        *{box-sizing:border-box;}
        body{margin:0;font-family:'Inter',sans-serif;background:var(--parchment-50);color:var(--ink-900);}
        h1,h2,h3{font-family:'Fraunces',serif;margin:0;}

        .topbar{background:var(--forest-900);color:var(--parchment-50);padding:1rem 2rem;display:flex;align-items:center;gap:.75rem;border-bottom:4px solid var(--wheat-500);}
        .topbar .word{font-family:'Fraunces',serif;font-weight:600;font-size:1.25rem;}
        .topbar .tagline{font-size:.72rem;color:var(--parchment-200);letter-spacing:.06em;text-transform:uppercase;margin-left:.35rem;padding-left:.35rem;border-left:1px solid rgba(247,243,232,.3);}

        .page{max-width:1080px;margin:0 auto;padding:2.5rem 1.5rem 4rem;}
        .page-head{display:flex;justify-content:space-between;align-items:flex-end;gap:1rem;margin-bottom:2rem;flex-wrap:wrap;}
        .eyebrow{text-transform:uppercase;letter-spacing:.08em;font-size:.72rem;color:var(--forest-700);font-weight:700;}
        .page-head h1{font-size:2rem;margin-top:.25rem;}
        .sub{color:var(--ink-600);margin:.3rem 0 0;font-size:.9rem;}

        .btn{display:inline-flex;align-items:center;gap:.4rem;border:none;border-radius:8px;padding:.6rem 1.1rem;font-family:'Inter',sans-serif;font-weight:600;font-size:.85rem;cursor:pointer;text-decoration:none;transition:transform .12s ease;}
        .btn:hover{transform:translateY(-1px);}
        .btn-primary{background:var(--forest-700);color:var(--parchment-50);}
        .btn-primary:hover{background:var(--forest-900);color:var(--parchment-50);}
        .btn-view{background:var(--sky-500);color:#fff;}
        .btn-view:hover{background:var(--sky-600);color:#fff;}
        .btn-edit{background:var(--wheat-500);color:var(--ink-900);}
        .btn-edit:hover{background:var(--wheat-600);color:var(--ink-900);}
        .btn-danger{background:transparent;color:var(--clay-600);border:1px solid var(--clay-500);}
        .btn-danger:hover{background:var(--clay-500);color:#fff;}
        .btn-sm{padding:.4rem .7rem;font-size:.78rem;border-radius:6px;}

        .field-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(270px,1fr));gap:1.25rem;}
        .field-card{background:#fff;border-radius:10px;border:1px solid var(--parchment-200);padding:1.25rem;box-shadow:0 1px 3px rgba(34,32,27,.06);border-top:5px solid var(--ink-400);transition:box-shadow .15s ease, transform .15s ease;}
        .field-card:hover{box-shadow:0 6px 18px rgba(34,32,27,.1);transform:translateY(-2px);}
        .field-card.status-culture{border-top-color:var(--forest-700);}
        .field-card.status-recoltee{border-top-color:var(--wheat-500);}
        .field-card.status-jachere{border-top-color:var(--clay-500);}

        .status-chip{display:inline-flex;align-items:center;gap:.3rem;font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.04em;padding:.25rem .6rem;border-radius:99px;}
        .status-chip.culture{background:rgba(47,82,51,.1);color:var(--forest-700);}
        .status-chip.recoltee{background:rgba(212,167,44,.18);color:var(--wheat-600);}
        .status-chip.jachere{background:rgba(181,101,43,.12);color:var(--clay-600);}

        .field-card h2{font-size:1.12rem;margin:.65rem 0 .15rem;}
        .field-card .culture-line{color:var(--ink-600);font-size:.84rem;display:flex;align-items:center;gap:.35rem;margin-bottom:.85rem;}
        .field-meta{display:flex;gap:1.4rem;margin:0 0 1rem;}
        .field-meta div{display:flex;flex-direction:column;}
        .field-meta dt{font-size:.66rem;text-transform:uppercase;letter-spacing:.05em;color:var(--ink-400);}
        .field-meta dd{margin:0;font-family:'IBM Plex Mono',monospace;font-size:.9rem;}
        .field-actions{display:flex;gap:.5rem;flex-wrap:wrap;}

        .empty-state{text-align:center;padding:4.5rem 1rem;color:var(--ink-600);border:1px dashed var(--parchment-200);border-radius:12px;background:#fff;}
        .empty-state i{font-size:2.5rem;color:var(--parchment-200);}
        .empty-state p{margin:.75rem 0 1.25rem;}
    </style>
</head>
<body>

<div class="topbar">
    <svg width="26" height="26" viewBox="0 0 28 28">
        <rect x="1" y="1" width="8" height="8" rx="1.5" fill="var(--forest-700)"/>
        <rect x="10" y="1" width="8" height="8" rx="1.5" fill="var(--wheat-500)"/>
        <rect x="19" y="1" width="8" height="8" rx="1.5" fill="var(--sky-500)"/>
        <rect x="1" y="10" width="8" height="8" rx="1.5" fill="var(--wheat-500)"/>
        <rect x="10" y="10" width="8" height="8" rx="1.5" fill="var(--clay-500)"/>
        <rect x="19" y="10" width="8" height="8" rx="1.5" fill="var(--forest-700)"/>
        <rect x="1" y="19" width="8" height="8" rx="1.5" fill="var(--sky-500)"/>
        <rect x="10" y="19" width="8" height="8" rx="1.5" fill="var(--forest-700)"/>
        <rect x="19" y="19" width="8" height="8" rx="1.5" fill="var(--wheat-500)"/>
    </svg>
    <span class="word">Parcelles</span>
    <span class="tagline">Registre des cultures</span>
</div>

<div class="page">

    <div class="page-head">
        <div>
            <span class="eyebrow">Registre</span>
            <h1>Mes parcelles</h1>
            <p class="sub">{{ $parcelles->count() }} parcelle(s) suivie(s)</p>
        </div>
        <a href="{{ route('parcelles.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Nouvelle parcelle
        </a>
    </div>

    @if($parcelles->isEmpty())

        <div class="empty-state">
            <i class="bi bi-flower3"></i>
            <p>Aucune parcelle enregistrée pour le moment.</p>
            <a href="{{ route('parcelles.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Ajouter la première parcelle
            </a>
        </div>

    @else

        <div class="field-grid">

            @foreach($parcelles as $parcelle)

                @php
                    $statusClass = $parcelle->statut == 'en culture' ? 'status-culture' : ($parcelle->statut == 'récoltée' ? 'status-recoltee' : 'status-jachere');
                    $chipClass = $parcelle->statut == 'en culture' ? 'culture' : ($parcelle->statut == 'récoltée' ? 'recoltee' : 'jachere');
                    $chipIcon = $parcelle->statut == 'en culture' ? 'bi-seedling' : ($parcelle->statut == 'récoltée' ? 'bi-basket' : 'bi-cloud-sun');
                    $chipLabel = $parcelle->statut == 'en culture' ? 'En culture' : ($parcelle->statut == 'récoltée' ? 'Récoltée' : 'En jachère');
                @endphp

                <article class="field-card {{ $statusClass }}">

                    <span class="status-chip {{ $chipClass }}">
                        <i class="bi {{ $chipIcon }}"></i> {{ $chipLabel }}
                    </span>

                    <h2>{{ $parcelle->nom }}</h2>
                    <p class="culture-line"><i class="bi bi-flower2"></i> {{ $parcelle->culture }}</p>

                    <dl class="field-meta">
                        <div>
                            <dt>Superficie</dt>
                            <dd>{{ $parcelle->superficie }} ha</dd>
                        </div>
                        <div>
                            <dt>Plantée le</dt>
                            <dd>{{ $parcelle->date_plantation }}</dd>
                        </div>
                    </dl>

                    <div class="field-actions">
                        <a href="{{ route('parcelles.show',$parcelle->id) }}" class="btn btn-view btn-sm">
                            <i class="bi bi-eye"></i> Voir
                        </a>
                        <a href="{{ route('parcelles.edit',$parcelle->id) }}" class="btn btn-edit btn-sm">
                            <i class="bi bi-pencil"></i> Modifier
                        </a>
                        <form action="{{ route('parcelles.destroy',$parcelle->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette parcelle ?')">
                                <i class="bi bi-trash"></i> Supprimer
                            </button>
                        </form>
                    </div>

                </article>

            @endforeach

        </div>

    @endif

</div>

</body>
</html>