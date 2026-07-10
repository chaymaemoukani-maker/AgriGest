<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AgriGest</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#4CAF50,#81C784);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .card{
            border:none;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,.2);
        }

        .icon{
            font-size:70px;
        }

        .btn-success{
            border-radius:30px;
            padding:12px 30px;
        }
    </style>

</head>
<body>

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card p-5 text-center">

                <div class="icon">
                    🌱
                </div>

                <h1 class="text-success fw-bold mt-3">
                    AgriGest
                </h1>

                <p class="lead text-secondary">
                    Application de gestion des parcelles agricoles
                </p>

                <hr>

                <div class="row mt-4">

                    <div class="col-md-6 mb-3">

                        <div class="card bg-success text-white p-3">

                            <h5>🌾 Gestion</h5>

                            <p>
                                Ajouter, modifier et supprimer vos parcelles.
                            </p>

                        </div>

                    </div>

                    <div class="col-md-6 mb-3">

                        <div class="card bg-light p-3">

                            <h5>📊 Suivi</h5>

                            <p>
                                Consulter les cultures, superficies et statuts.
                            </p>

                        </div>

                    </div>

                </div>

                <a href="{{ route('parcelles.index') }}" class="btn btn-success btn-lg mt-4">
                    Accéder à l'application
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>