<!DOCTYPE html>
<html lang="en">

<?php
$Shape_diamond = array("Round" , "Oval" , "Emerald" , "True" , "Princess" , "Cushion" , "Pear" , "Heart");
$Clarity_diamond = array("IF" , "VVS1" , "VVS2" , "VS1" , "VS2");
$Origin_diamond = array("Natural" , "Lab");
$Color_diamond = array("D" , "E" , "F" , "J" );
$Cut_diamond = array("Excellent" , "Very Good" , "Good" , "Poor" );
$Polish_diamond = array("Excellent" , "Very Good" , "Good" , "Poor" );
$Symmetry_diamond = array("Excellent" , "Very Good" , "Good" , "Poor" );
$Culet_diamond = array("None" , "Small" , "Medium" , "Large" );
$Flourescence_diamond = array("None" , "Faint" , "Medium" , "Strong" );
?>
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
        <form id="product-form" action="{{ route('manager.storeDiamondShell') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name"><i class="fas fa-tag"></i> Name</label>
                <select class="form-control" id="diamond_shell_name" name="name" required>
                    <option value="Nhẫn Kim Cương Nam" selected>Nhẫn Kim Cương Nam</option>
                    <option value="Nhẫn Kim Cương Nữ" >Nhẫn Kim Cương Nữ</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image"><i class="fas fa-image"></i> Image</label>
                <input type="file" class="form-control-file" id="file-input" name="image" onchange="previewImage(event)" accept="image/*" required>
                <img id="image-preview" style="max-width: 200px; margin-top: 10px;">
            </div>

            <div class="form-group">
                <label for="material_id"><i class="fas fa-gem"></i> Material ID</label>
                <select class="form-control" id="material_id" name="material_id" required>
                    <option value="">Select Material ID</option>
                    @foreach ($material as $mat)
                        @if ($mat['status'] == 1)
                            <option value="{{ $mat['id'] }}" {{ old('material_id') == $mat['id'] ? 'selected' : '' }}>
                                {{ $mat['id'] }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="prcice"><i class="fas fa-sort-numeric-up"></i> Weight</label>
                <input type="number" class="form-control" id="diamond_shell_weight" name="weight" value="" min="0" max="5" step="0.01" placeholder="gram" required>
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
