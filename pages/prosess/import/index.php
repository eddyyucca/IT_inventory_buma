<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <!-- import bootstrap  -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
                integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        </head>
        
        <body>
            <br>
            <!-- membuat container dengan lebar colomn col-lg-10  -->
            <div class="container col-lg-10">
                <!-- membuat tulisan alert berwarna hijau dengan tulisan di tengah  -->
                <h3 class="alert alert-success text-center" role="alert">
                    Tutorial Import File Excel ke Database MySQL
                </h3>
                <br>
                <?php 
                if(isset($_GET['berhasil'])){
                    echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
                }
                ?>
                <!-- membuat card untuk membungkus tabel bootstrap  -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <!-- membuat form input file -->
                                <form method="post" enctype="multipart/form-data" action="proses_upload.php">
                                    Pilih File:
                                    <input class="form-control" name="fileexcel" type="file" required="required">
                                    <br>
                                    <button class="btn btn-sm btn-info" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </body>
        
        </html>