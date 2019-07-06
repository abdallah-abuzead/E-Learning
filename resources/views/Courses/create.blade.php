<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <title>home instructor</title>


    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">




<style>
    .contant{

        height: 500px;
        width: 70%;
        background-color:whitesmoke;
        margin-left: 150px;
        padding: 20px;
        margin-top: 80px;

    }

    body{
        background-color: #284257;
        color: black;
    }

</style>

</head>
<body>
<div class="contant">
    <center><h1>add New course</h1></center>
    <h4>please insert data</h4>

    <form action="/Courses/create" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="from-group">
            <label for="Subject"> Subject </label>
            <input type="text" name="Subject" id="Subject" class="form-control"/>
        </div>
        <div class="from-group">
            <label for="videoName"> videos Name</label>
            <input type="text" name="videoName" id="videoName" class="form-control"/>
        </div>

        <div class="from-group">
            <label for="uploadVideo">upload videos </label>

            <input type="file" class="form-control" name="uploadVideo" id="uploadVideo"  multiple>
        </div>

        <div class="from-group">
            <label for="pdfName"> pdf Name</label>
            <input type="text" name="pdfName" id="pdfName" class="form-control"/>
        </div>

        <div class="from-group">
            <label for="uploadPdf">upload pdf </label>

            <input type="file" class="form-control" name="uploadPdf" id="uploadPdf"  multiple>
        </div>


        <input type="submit" value="save" class="btn btn-primary">
        <input type="reset" value="cancel" class="btn btn-danger">
    </form>

</div>
</body>
</html>
