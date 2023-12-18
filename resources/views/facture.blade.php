<!-- resources/views/facture.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        /* Styles pour la facture */
    </style>
</head>
<body>
    <h1>Facture</h1>

    <p>Achat commande n° {{ $commande->id }}</p>

    <table>
        <thead>
            <tr>
                <th>Article</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Date achat</th>
                <th>Montant Total</th>
            </tr>
        </thead>
        <tbody>
           
                <tr>
                    <td>{{ $articles->commandes->produits->nom }}</td>
                    <td>{{ $articles->quantite }}</td>
                    <td>{{ $commandes->prixVente }}</td>
                    <td>{{ $articles->dateSortie}}</td>
                    <td>{{ $articles->prixSortie}}</td>
                </tr>
           
        </tbody>
    </table>

    <p>Merci d'etre passer chez nous</p>

    <!-- Autres informations de la facture -->

</body>
</html>
