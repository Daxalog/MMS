<form action="/import" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    Upload CSV
    <input type="file" name="ExcelFile" required/> <br />
    <button class="btn btn-primary" type="submit">Upload</button>
    <br/>
    <br/>
    <div>
        @isset($messages)
            @foreach($messages as $message)
                <div class="alert alert-success" role="alert">
                    {{$message}}
                </div>
            @endforeach
        @endisset
        @isset($errors)
            @foreach($errors as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endisset
    </div>
</form>