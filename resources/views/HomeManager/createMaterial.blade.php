<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Create Diamond Shell</h2>
        <form id="product-form" action="{{ route('manager.storeMaterial') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name"><i class="fas fa-tag"></i> Name</label>
                <input type="text" class="form-control" id="material_name" name="name" value="" required pattern="^[\p{L}\d\s]{1,30}$" title="Material name should'nt contain any special characters and no more than 30 characters!.">
            </div>

            <div class="form-group">
                <label for="quantity"><i class="fas fa-sort-numeric-up"></i> Price</label>
                <input type="number" class="form-control" id="material_price" name="price" value="" min="0" max="99999999" required>
            </div>

            <div class="form-group">
                <label for="status"><i class="fas fa-toggle-on"></i> Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_active" value="1" {{ 'checked'}} required>
                    <label class="form-check-label" for="status_active">Active</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0" required>
                    <label class="form-check-label" for="status_inactive">Inactive</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"> Save</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function previewImage(event) {
            var preview = document.getElementById('image-preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.onload = function() {
                URL.revokeObjectURL(preview.src) // free memory
            }
        }
    </script>
</body>

</html>
