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
        <h2>Create Product</h2>
        <form id="product-form" action="{{ route('manager.storeProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="product_code"><i class="fas fa-barcode"></i> Product Code</label>
                <input type="text" class="form-control" id="product_code" name="product_code"
                    value="{{ $newProductCode }}" readonly>
            </div>

            <div class="form-group">
                <label for="product_name"><i class="fas fa-tag"></i> Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name') }}" required pattern="^[\p{L}\d\s]{8,20}$" title="Product name should not contain special characters and between 8 - 20 characters.">
            </div>

            <div class="form-group">
                <label for="image"><i class="fas fa-image"></i> Image</label>
                <input type="file" class="form-control-file" id="file-input" name="image" onchange="previewImage(event)" accept="image/*">
                <img id="image-preview" style="max-width: 200px; margin-top: 10px;">
            </div>

            <div class="form-group">
                <label for="main_diamond_id"><i class="fas fa-gem"></i> Main Diamond ID</label>
                <select class="form-control" id="main_diamond_id" name="main_diamond_id" required>
                    <option value="">Select Main Diamond</option>
                    @foreach ($mainDiamonds as $diamond)
                        @if ($diamond['status'] == 1)
                            <option value="{{ $diamond['id'] }}" {{ old('main_diamond_id') == $diamond['id'] ? 'selected' : '' }}>
                                {{ $diamond['id'] }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="extra_diamond_id"><i class="fas fa-gem"></i> Extra Diamond ID</label>
                <select class="form-control" id="extra_diamond_id" name="extra_diamond_id">
                    <option value="">Select Extra Diamond</option>
                    @foreach ($extraDiamonds as $diamond)
                        @if ($diamond['status'] == 1)
                            <option value="{{ $diamond['id'] }}" {{ old('extra_diamond_id') == $diamond['id'] ? 'selected' : '' }}>
                                {{ $diamond['id'] }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="number_ex_diamond"><i class="fas fa-cubes"></i> Number of Extra Diamonds</label>
                <input type="number" class="form-control" id="number_ex_diamond" name="number_ex_diamond" value="{{ old('number_ex_diamond') }}" min="0" title="Number of extra diamonds should not exceed the available quantity.">
                <small>Available: <span id="available-extra-diamonds">0</span></small>
            </div>

            <div class="form-group">
                <label for="quantity"><i class="fas fa-sort-numeric-up"></i> Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="1" readonly>
            </div>

            <div class="form-group">
                <label for="diamond_shell_id"><i class="fas fa-box"></i> Diamond Shell ID</label>
                <select class="form-control" id="diamond_shell_id" name="diamond_shell_id" required>
                    <option value=''>Select Diamond Shell</option>
                    @foreach ($diamondShells as $shell)
                        @if ($shell['status'] == 1)
                            <option value="{{ $shell['id'] }}" {{ old('diamond_shell_id') == $shell['id'] ? 'selected' : '' }}>
                                {{ $shell['id'] }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group" style="display: none;">
                <label for="size"><i class="fas fa-ruler"></i> Size</label>
                <input type="text" class="form-control" id="size" name="size" value="{{ old('size') }}">
            </div>

            <div class="form-group">
                <label for="price_rate"><i class="fas fa-dollar-sign"></i> Price Rate</label>
                <input type="number" step="0.01" class="form-control" id="price_rate" name="price_rate" value="{{ old('price_rate') }}" required>
            </div>

            <div class="form-group">
                <label for="status"><i class="fas fa-toggle-on"></i> Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_active" value="1" {{ old('status') == 1 ? 'checked' : '' }} required>
                    <label class="form-check-label" for="status_active">Active</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0" {{ old('status') == 0 ? 'checked' : '' }} required>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var extraDiamondSelect = document.getElementById('extra_diamond_id');
            var numberExDiamondInput = document.getElementById('number_ex_diamond');
            var availableDiamondsSpan = document.getElementById('available-extra-diamonds');

            // Store the extra diamonds data as a JavaScript object
            var extraDiamonds = @json($extraDiamonds);

            extraDiamondSelect.addEventListener('change', function() {
                var selectedDiamondId = this.value;

                if (selectedDiamondId) {
                    var availableQuantity = extraDiamonds[selectedDiamondId]?.quantity || 0;
                    availableDiamondsSpan.textContent = availableQuantity;
                    numberExDiamondInput.max = availableQuantity;
                } else {
                    // Clear the input values if "Select Extra Diamond" is chosen
                    availableDiamondsSpan.textContent = '0';
                    numberExDiamondInput.value = '0';
                    numberExDiamondInput.max = '0';
                }
            });

            // Trigger the change event on page load to initialize the values
            extraDiamondSelect.dispatchEvent(new Event('change'));
        });
    </script>
</body>

</html>
