<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('updateCasal')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$casal->id}}">
        <input type="text" value="{{$casal->nom}}" name='nom'>
        <input type="date" value="{{$casal->data_inici}}" name='data_inici'>
        <input type="date" value="{{$casal->data_final}}" name='data_final'>
        <input type="number" value="{{$casal->n_places}}" name='n_places'>
        <select name="ciutat" id="ciutat">
            @foreach($ciutats as $ciutat)
                <option value="{{$ciutat->id}}">{{$ciutat->nom}}</option>
            @endforeach
        </select>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>