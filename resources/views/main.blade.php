<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Casals de la Generealitat de Catalunya</h1>
    <a href="{{route('add.casal.form')}}">Añadir</a>
    <table>
        <tr>
            <th>Nom</th>
            <th>Data inici</th>
            <th>Data final</th>
            <th>Num places</th>
            <th>Ciutat</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    @foreach($casals as $casal)
        <tr>
            <td>{{$casal->nom}}</td>
            <td>{{$casal->data_inici}}</td>
            <td>{{$casal->data_final}}</td>
            <td>{{$casal->n_places}}</td>
            <td>{{$casal->ciutat}}</td>
            <td><a href="{{route('edit.casal.form', ['casalId' => $casal->id])}}">Editar</a></td>
            <td><a href="{{route('deleteCasal', ['casalId' => $casal->id])}}">Eliminar</a></td>
        </tr>
    @endforeach
    </table>
    <a href="{{route('logout')}}">Salir</a>
    <footer>Carrer Almogavers 34, 08034 Barcelona</footer>
</body>
</html>