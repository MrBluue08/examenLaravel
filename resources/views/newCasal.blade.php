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
    <form action="{{route('add.casal')}}" method='post'>
        @csrf
        <input type="text" name='nom'>
        <input type="date" name='data_inici'>
        <input type="date" name='data_final'>
        <input type="number" name='n_places'>
        <select name="ciutat" id="ciutat">
            @foreach($ciutats as $ciutat)
                <option value="{{$ciutat->id}}">{{$ciutat->nom}}</option>
            @endforeach
        </select>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>