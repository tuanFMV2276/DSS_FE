<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Price</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    <script>
        function confirmSave() {
            return confirm("Are you sure you want to save the new price?");
        }
    </script>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Add New Price</h1>

        <div class="card mb-4">
            <div class="card-header">
                <h2><i class="fas fa-gem"></i> Diamond Price Information</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('manager.storePrice') }}" method="POST" onsubmit="return confirmSave()">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price"><i class="fas fa-dollar-sign"></i> Price:</label>
                                <input type="text" class="form-control" id="price" name="price" min="0" value="{{ old('price') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="clarity"><i class="fas fa-diamond"></i> Clarity:</label>
                                <select class="form-control" id="clarity" name="clarity" required>
                                    <option value="" disabled selected>Select clarity</option>
                                    <option value="FL" {{ old('clarity') == 'FL' ? 'selected' : '' }}>FL</option>
                                    <option value="IF" {{ old('clarity') == 'IF' ? 'selected' : '' }}>IF</option>
                                    <option value="VVS1" {{ old('clarity') == 'VVS1' ? 'selected' : '' }}>VVS1</option>
                                    <option value="VVS2" {{ old('clarity') == 'VVS2' ? 'selected' : '' }}>VVS2</option>
                                    <option value="VS1" {{ old('clarity') == 'VS1' ? 'selected' : '' }}>VS1</option>
                                    <option value="VS2" {{ old('clarity') == 'VS2' ? 'selected' : '' }}>VS2</option>
                                    <option value="SI1" {{ old('clarity') == 'SI1' ? 'selected' : '' }}>SI1</option>
                                    <option value="SI2" {{ old('clarity') == 'SI2' ? 'selected' : '' }}>SI2</option>
                                    <option value="I1" {{ old('clarity') == 'I1' ? 'selected' : '' }}>I1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="color"><i class="fas fa-palette"></i> Color:</label>
                                <select class="form-control" id="color" name="color" required>
                                    <option value="" disabled selected>Select color</option>
                                    <option value="D" {{ old('color') == 'D' ? 'selected' : '' }}>D</option>
                                    <option value="E" {{ old('color') == 'E' ? 'selected' : '' }}>E</option>
                                    <option value="F" {{ old('color') == 'F' ? 'selected' : '' }}>F</option>
                                    <option value="G" {{ old('color') == 'G' ? 'selected' : '' }}>G</option>
                                    <option value="H" {{ old('color') == 'H' ? 'selected' : '' }}>H</option>
                                    <option value="I" {{ old('color') == 'I' ? 'selected' : '' }}>I</option>
                                    <option value="J" {{ old('color') == 'J' ? 'selected' : '' }}>J</option>
                                    <option value="K" {{ old('color') == 'K' ? 'selected' : '' }}>K</option>
                                    <option value="L" {{ old('color') == 'L' ? 'selected' : '' }}>L</option>
                                    <option value="M" {{ old('color') == 'M' ? 'selected' : '' }}>M</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="origin"><i class="fas fa-globe"></i> Origin:</label>
                                <select class="form-control" id="origin" name="origin" required>
                                    <option value="" disabled selected>Select origin</option>
                                    <option value="Natural" {{ old('origin') == 'Natural' ? 'selected' : '' }}>Natural</option>
                                    <option value="Lab" {{ old('origin') == 'Lab' ? 'selected' : '' }}>Lab</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cut"><i class="fas fa-cut"></i> Cut:</label>
                                <select class="form-control" id="cut" name="cut" required>
                                    <option value="" disabled selected>Select cut</option>
                                    <option value="Excellent" {{ old('cut') == 'Excellent' ? 'selected' : '' }}>Excellent</option>
                                    <option value="Very Good" {{ old('cut') == 'Very Good' ? 'selected' : '' }}>Very Good</option>
                                    <option value="Good" {{ old('cut') == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Fair" {{ old('cut') == 'Fair' ? 'selected' : '' }}>Fair</option>
                                    <option value="Poor" {{ old('cut') == 'Poor' ? 'selected' : '' }}>Poor</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cara_weight"><i class="fas fa-balance-scale"></i> Carat Weight:</label>
                                <input type="number" class="form-control" id="cara_weight" name="cara_weight" min="0" step="0.01" max = "3" value="{{ old('cara_weight') }}" required>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
