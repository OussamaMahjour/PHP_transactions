<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            position: absolute;
            top: 50%;
            left:50%;
            transform: translate(-50%,-50%);
            border: 1px solid black;
            width: 500px;
            text-align: center;
        }
        .container div{
            border: 1px solid black;
            padding: 1rem;
        }
        
    </style>
</head>
<body>
    <form method="post" action="dashboard" enctype="multipart/form-data">
<div class="container">
<div class="file">
<h3>Get From File</h3>
    <input type="file" name="csvFile">
    <button type="Submit" name="method" value="file">Upload</button>
</div>

<div class="db">
    <h3>Get From database</h3>
    <button type="Submit" name="method" value="database">Database</button>
</div></div>
</form>
</body>
</html>




