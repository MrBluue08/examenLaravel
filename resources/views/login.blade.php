<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <div>
        <div>
            <div>
                <h3>Login</h3>
                <form action="{{route('auth')}}" method="post">
                    @csrf
                    <div>
                        <label for="id">Nick:</label>
                        @if($error=='nick')
                            <input type="text" id="nick" name="nick">
                            <div>
                                Usuario inexistente o desactivado
                            </div>
                        @else
                            <input type="text" id="nick" name="nick">
                        @endif
                    </div>
                    <div>
                        <label for="passwd">Password:</label>
                        @if($error=='passwd')
                            <input type="password" id="passwd" name="passwd">
                            <div>
                                Contraseña incorrecta
                            </div>
                        @else
                            <input type="password" id="passwd" name="passwd">
                        @endif
                    </div>
                    <div>
                        <button type="submit">Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
