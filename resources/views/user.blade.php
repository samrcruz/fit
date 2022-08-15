<html>
    <head>
        <title>test</title>
    </head>
<body>
    <div>
        <form action="{{ route('user.store') }}" method="POST">
            <input type="text" id="name" name="name" value="">
            <input type="text" id="email" name="email" value="">
            <input type="text" id="age" name="age" value="">
            <button type="submit">Save</button>
            @csrf
        </form>
    </div>
</body>
</html>
