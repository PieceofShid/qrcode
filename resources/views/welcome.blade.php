<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
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
            <div class="row">
                <div class="col-12">
                    <div id="reader"></div>
                </div>
            </div>
            <br>
            <label for="text">no space</label>
            <input type="text" name="text" id="text" style="width: 100%">
            <br>
            <label for="text1">with space</label>
            <input type="text" name="text1" id="text1" style="width: 100%">
            <br>
            <label for="text2">slice</label>
            <input type="text" name="text2" id="text2" style="width: 100%">
            {{-- <div class="row mt-5">
                <form class="form-inline" action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                      <input type="text" class="form-control" name="name" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group mb-2 ml-1">
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
                      </div>
                      <div class="form-group mb-2 ml-1">
                        <input type="number" class="form-control" name="phone" placeholder="Masukkan Nomor Telephone">
                      </div>
                      <div class="form-group mb-2 ml-1">
                        <input type="file" name="qrcode" id="qrcode" accept="image/*">
                      </div>
                      <textarea name="text" id="text"></textarea>
                    <button type="submit" class="btn btn-primary ml-1 mb-2">Create</button>
                  </form>
                <br>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">QR code</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($data as $data)
                     <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>
                            <a href="{{ route('generate',$data->id) }}" class="btn btn-primary">Generate</a>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
            </div> --}}
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
        {{-- <script>
            const html5QrCode = new Html5Qrcode("reader");
            // File based scanning
            const fileinput = document.getElementById('qrcode');
            fileinput.addEventListener('change', e => {
            if (e.target.files.length == 0) {
                // No file selected, ignore 
                return;
            }

            const imageFile = e.target.files[0];
            // Scan QR Code
            html5QrCode.scanFile(imageFile, true)
            .then(decodedText => {
                // success, use decodedText
                var code = decodedText;
                const lgt = code.replace(/\s/g, '');
                console.log(lgt);
                $('#text').val(lgt);
                $('#text1').val(code);
            })
            .catch(err => {
                // failure, handle it.
                console.log(`Error scanning file. Reason: ${err}`)
            });
            });
        </script> --}}
        <script>
          function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            // console.log(`Code matched = ${decodedText}`, decodedResult);
            var code = decodedText;
            const lgt = code.replace(/\s/g, '');
            var slice = lgt.slice(10, 16);
            console.log(lgt);
            $('#text').val(lgt);
            $('#text1').val(code);
            $('#text2').val(slice);
          }

          function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            console.warn(`Code scan error = ${error}`);
          }

          let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader",
            { fps: 10, qrbox: {width: 250, height: 250} },
            /* verbose= */ false);
          html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        </script>
    </body>
</html>