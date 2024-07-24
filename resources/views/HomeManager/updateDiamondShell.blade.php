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
        <h2>Update Extra Diamond</h2>
        <form id="product-form" action="{{ route('manager.updateDiamondShell', $diamond_shell['id']) }}" method="POST" 
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name"><i class="fas fa-tag"></i> Name</label>
                <input type="text" class="form-control" id="diamond_shell_name" name="name" value="{{ old('name', $diamond_shell['name']) }}" required pattern="^[\p{L}\d\s]{1,30}$" title="Diamond Shell name should'nt contain any special characters and be no more than 30 characters!.">
            </div>

            <div class="form-group">
                <label for="image"><i class="fas fa-image"></i> Image</label>
                <input type="file" class="form-control-file" id="file-input" name="image"
                    onchange="previewImage(event)" accept="image/*">
                @if ($diamond_shell['image'])
                    <img src="{{ asset('/Picture_Product/' . $diamond_shell['image']) }}" alt="Main Diamond Image"
                        style="max-width: 200px; margin-top: 10px;" id="image-preview">
                        <input type="hidden" id="default-image" name="image" value="{{ $diamond_shell['image'] }}">
                @else
                    <img id="image-preview" style="max-width: 200px; margin-top: 10px;">
                @endif
            </div>

            <div class="form-group">
                <label for="prcice"><i class="fas fa-sort-numeric-up"></i> Price</label>
                <input type="number" class="form-control" id="diamond_shell_price" name="price" value="{{ old('price', $diamond_shell['price']) }}" min="0" max="99999999" step="500000" required>
            </div>

            <div class="form-group">
                <label for="material_id"><i class="fas fa-gem"></i>Material ID</label>
                <select class="form-control" id="material_id" name="material_id" required>
                    <option value="">Select Material ID</option>
                    @foreach ($material_id as $material)
                        @if ($material['status'] == 1 || $material['id'] == $diamond_shell['main_diamond_id'])
                            <option value="{{ $diamond['id'] }}"
                                {{ old('material_id', $diamond_shell['material_id']) == $material['id'] ? 'selected' : '' }}>
                                {{ $material['id'] }}</option>
                        @endif
                    @endforeach
                    <input type="hidden" id="old-diamond" name="old_main_diamond" value="{{ $product['main_diamond_id'] }}">
                </select>
            </div>

            <div class="form-group">
                <label for="prcice"><i class="fas fa-sort-numeric-up"></i> Weight</label>
                <input type="number" class="form-control" id="diamond_shell_weight" name="price" value="{{ old('weight', $diamond_shell['weight']) }}" min="0" max="5" step="0.01" placeholder="gram" required>
            </div>

            <div class="form-group">
                <label for="status"><i class="fas fa-toggle-on"></i> Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_active" value="1" {{ old('status', $diamond_shell['status']) == 1 ? 'checked' : '' }} required>
                    <label class="form-check-label" for="status_active">Active</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0" {{ old('status', $diamond_shell['status']) == 0 ? 'checked' : '' }} required>
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
</body>

</html>
