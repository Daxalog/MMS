<form action="/import" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    Upload CSV
    <input type="file" name="ExcelFile" required/> <br />
    <button class="btn btn-primary" type="submit">Upload</button>
</form>