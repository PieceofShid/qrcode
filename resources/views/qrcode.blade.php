<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Generate QR Code Engine Export</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center mt-5">
                <div class="col text-left">
                    {!!QrCode::backgroundColor(255, 255, 255)->margin(2)->format('svg')->size(200)->generate($slice)!!}
                    <br>
                    <span class="font-weight-bold">{{$slice}}</span>
                    <br>
                    <br>
                    <label for="result">Hasil scan original</label>
                    <input type="text" id="result" class="form-control" value="{{$result}}" readonly>
                    <br>
                    <a href="{{ url('/')}}" class="btn btn-sm btn-warning">Cancel</a>
                    <button type="button" class="btn btn-sm btn-success" onclick="download()">save</button>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script>
            function download(){
            img = new Image(),
            serializer = new XMLSerializer(),
            svgStr = serializer.serializeToString(document.getElementsByTagName('svg')[0]);

            img.src = 'data:image/svg+xml;base64,'+window.btoa(svgStr);

            // You could also use the actual string without base64 encoding it:
            //img.src = "data:image/svg+xml;utf8," + svgStr;
            var w=400;
            var h=400;
            var canvas = document.createElement("canvas");
            canvas.width = w;
            canvas.height = h;

            img.onload = () => {
                canvas.getContext("2d").drawImage(img,0,0,w,h);

                execute(canvas);
            }};

            function execute(canvas){
            var imgURL = canvas.toDataURL("image/png");

            var dlLink = document.createElement('a');
                dlLink.download = "image";
                dlLink.href = imgURL;
                dlLink.dataset.downloadurl = ["image/png", dlLink.download, dlLink.href].join(':');

                document.body.appendChild(dlLink);
                dlLink.click();
                document.body.removeChild(dlLink);

                setInterval(() => {
                    location.href = "{{ url('/')}}";                    
                }, 4000);
            }

        </script>
    </body>
</html>