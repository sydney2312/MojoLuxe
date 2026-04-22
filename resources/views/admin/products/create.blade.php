<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; margin: 0; }
        .container { max-width: 800px; margin: auto; padding: 30px; }
        .card { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 6px 18px rgba(0,0,0,0.06); }
        label { font-size: 13px; display: block; margin-top: 14px; color: #444; font-weight: 600; }
        input, textarea, select { width: 100%; padding: 10px; margin-top: 5px; border-radius: 8px; border: 1px solid #ddd; }
        .btn { margin-top: 18px; width: 100%; padding: 12px; background: #111827; color: white; border-radius: 8px; border: none; }
    </style>
</head>
<body>
<div class="container">

    <a href="{{ route('admin.products.index') }}">← Back</a>

    <div class="card">
        <h2>Create Product</h2>

        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf

            <label>Title</label>
            <input type="text" name="title" required>

            <label>Short Description</label>
            <input type="text" name="short_description">

            <label>Full Description</label>
            <textarea name="full_description"></textarea>

            <label>Price</label>
            <input type="number" step="0.01" name="price">

            <label>Quantity</label>
            <input type="number" name="quantity">

            <label>Category</label>
            <input type="text" name="category">

            <label>Classification</label>
            <select name="classification">
                <option value="default">Default</option>
                <option value="exclusive">Exclusive</option>
                <option value="featured">Featured</option>
                <option value="upcoming">Upcoming</option>
            </select>

            <label>Status</label>
            <select name="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>

            <label>Product Image</label>
            <input type="file" name="image" accept="image/*">

            <button type="submit" class="btn">Create Product</button>
        </form>
    </div>

</div>
</body>
</html>
