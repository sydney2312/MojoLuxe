<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; margin: 0; }
        .container { max-width: 800px; margin: auto; padding: 30px; }
        .card { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 6px 18px rgba(0,0,0,0.06); }
        label { font-size: 13px; display: block; margin-top: 14px; color: #444; font-weight: 600; }
        input, textarea, select { width: 100%; padding: 10px; margin-top: 5px; border-radius: 8px; border: 1px solid #ddd; font-size: 14px; box-sizing: border-box; }
        input:focus, textarea:focus, select:focus { outline: none; border-color: #111827; }
        .btn { display: inline-block; margin-top: 18px; width: 100%; padding: 12px; border: none; background: #111827; color: white; border-radius: 8px; cursor: pointer; font-size: 15px; }
        .btn:hover { opacity: 0.9; }
        .back { display: inline-block; margin-bottom: 15px; text-decoration: none; color: #111827; font-size: 14px; }
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 0 20px; }
    </style>
</head>
<body>
<div class="container">

    <a class="back" href="{{ route('admin.products.index') }}">← Back to Products</a>

    <div class="card">
        <h2 style="margin-top:0;">Edit Product</h2>

        <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Title</label>
            <input type="text" name="title" value="{{ $product->title }}">

            <label>Short Description</label>
            <input type="text" name="short_description" value="{{ $product->short_description }}">

            <label>Full Description</label>
            <textarea name="full_description" rows="3">{{ $product->full_description }}</textarea>

            <div class="grid-2">
                <div>
                    <label>Price</label>
                    <input type="number" step="0.01" name="price" value="{{ $product->price }}">
                </div>
                <div>
                    <label>Quantity</label>
                    <input type="number" name="quantity" value="{{ $product->quantity }}">
                </div>
            </div>

            <div class="grid-2">
                <div>
                    <label>Category</label>
                    <input type="text" name="category" value="{{ $product->category }}">
                </div>
                <div>
                    <label>Classification</label>
                    <select name="classification">
                        @foreach(['default','exclusive','featured','upcoming'] as $c)
                            <option value="{{ $c }}" {{ $product->classification == $c ? 'selected' : '' }}>{{ ucfirst($c) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid-2">
                <div>
                    <label>Status</label>
                    <select name="status">
                        <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div>
                    <label>Replace Image</label>
                    <input type="file" name="image" accept="image/*">
                </div>
            </div>

            <button type="submit" class="btn">Update Product</button>
        </form>
    </div>

</div>
</body>
</html>
