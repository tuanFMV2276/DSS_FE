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
        <h2>Create Main Diamond</h2>
        <form id="product-form" action="{{ route('manager.storeMainDiamond') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="shape"><i class="fas fa-box"></i> Shape</label>
                <select class="form-control" id="diamond_shape" name="shape" required>
                <option value="" disabled selected>Select Shape</option>
                @foreach ($Shape_diamond as $shape)
                <option value="{{ $shape }}" {{ old('shape') ==  $shape ? 'selected' : '' }}>
                    {{ $shape }}
                </option>
                @endforeach
            </select>
            </div>

            <div class="form-group">
                <label for="origin"><i class="fas fa-box"></i> Origin</label>
                <select class="form-control" id="diamond_origin" name="origin" required>
                <option value="" disabled selected>Select origin</option>
                @foreach ($Origin_diamond as $origin)
                <option value="{{ $origin }}" {{ old('origin') ==  $origin ? 'selected' : '' }}>
                    {{ $origin }}
                </option>
                @endforeach
            </select>
            </div>

            <div class="form-group">
                <label for="cara_weight"><i class="fas fa-balance-scale"></i> Cara Weight:</label>
                <input type="number" step="0.01" class="form-control" id="cara_weight" name="cara_weight" value="" min = "0" max = "3" required>
            </div>

            <div class="form-group">
                <label for="clarity"><i class="fas fa-box"></i> Clarity:</label>
                <select class="form-control" id="diamond_clarity" name="clarity" required>
                <option value="" disabled selected>Select clarity</option>
                @foreach ($Clarity_diamond as $clarity)
                <option value="{{ $clarity }}" {{ old('clarity') ==  $clarity ? 'selected' : '' }}>
                    {{ $clarity }}
                </option>
                @endforeach
            </select>
            </div>

            <div class="form-group">
                <label for="color"><i class="fas fa-box"></i> Color:</label>
                <select class="form-control" id="diamond_color" name="color" required>
                <option value="" disabled selected>Select color</option>
                @foreach ($Color_diamond as $color)
                <option value="{{ $color }}" {{ old('color') ==  $color ? 'selected' : '' }}>
                    {{ $color }}
                </option>
                @endforeach
            </select>
            </div>

            <div class="form-group">
                <label for="image"><i class="fas fa-image"></i> Image</label>
                <input type="file" class="form-control-file" id="file-input" name="image" onchange="previewImage(event)" accept="image/*">
                <img id="image-preview" style="max-width: 200px; margin-top: 10px;">
            </div>

            <div class="form-group">
                <label for="description"><i class="fas fa-tag"></i> Description</label>
                <input type="text" class="form-control" id="diamond_describe" name="describe" value="" required pattern="^[\p{L}\d\s]{1,100}$" title="Diamond description should'nt contain any special characters!.">
            </div>

            <div class="form-group">
                <label for="quantity"><i class="fas fa-sort-numeric-up"></i> Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="1" readonly>
            </div>

            <div class="form-group">
                <label for="cut"><i class="fas fa-cut"></i> Cut:</label>
                <select class="form-control" id="cut" name="cut" required>
                    <option value="" disabled selected>Select cut</option>
                    @foreach($Cut_diamond as $cut)
                    <option value="{{ $cut }}" {{ old('cut') ==  $cut  ? 'selected' : '' }}>
                        {{ $cut }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="polish"><i class="fas fa-cut"></i> Polish:</label>
                <select class="form-control" id="polish" name="polish" required>
                    <option value="" disabled selected>Select Polish</option>
                    @foreach($Polish_diamond as $polish)
                    <option value="{{ $polish }}" {{ old('polish') ==  $polish  ? 'selected' : '' }}>
                        {{ $polish }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="symmetry"><i class="fas fa-cut"></i> Symmetry:</label>
                <select class="form-control" id="symmetry" name="symmetry" required>
                    <option value="" disabled selected>Select Symmetry</option>
                    @foreach($Symmetry_diamond as $symmetry)
                    <option value="{{ $symmetry }}" {{ old('symmetry') ==  $symmetry  ? 'selected' : '' }}>
                        {{ $symmetry }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="diamond_measurements"><i class="fas fa-ruler-combined"></i> Measurements:</label>
                <input type="text" class="form-control" id="diamond_measurements" name="measurements" placeholder="ex: 10x10x10" value="" pattern="^{0-10}x{0-10}x{0-10}$" required>
            </div>

            <div class="form-group">
                <label for="symmetry"><i class="fas fa-cut"></i> Culet:</label>
                <select class="form-control" id="culet" name="culet" required>
                    <option value="" disabled selected>Select Culet</option>
                    @foreach($Culet_diamond as $culet)
                    <option value="{{ $culet }}" {{ old('culet') ==  $culet  ? 'selected' : '' }}>
                        {{ $culet }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="symmetry"><i class="fas fa-cut"></i> Fluorescence:</label>
                <select class="form-control" id="fluorescence" name="fluorescence" required>
                    <option value="" disabled selected>Select Fluorescence</option>
                    @foreach($Flourescence_diamond as $fluorescence)
                    <option value="{{ $fluorescence }}" {{ old('fluorescence') ==  $fluorescence  ? 'selected' : '' }}>
                        {{ $fluorescence }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="status"><i class="fas fa-toggle-on"></i> Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_active" value="1" {{ 'checked'}}  required>
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
