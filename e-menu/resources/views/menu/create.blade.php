<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Menu</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #ddd; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 300px;">
        <h1 style="text-align: center; margin-bottom: 20px;">Create Menu Item</h1>
        <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
            @csrf <!-- Tambahkan CSRF token untuk keamanan -->
            <div style="margin-bottom: 15px;">
                <label for="menuImage" style="display: block; margin-bottom: 5px; font-weight: bold;">Menu Image</label>
                <input type="file" id="menuImage" name="menuImage" accept="image/*" required style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="menuName" style="display: block; margin-bottom: 5px; font-weight: bold;">Menu Name</label>
                <input type="text" id="menuName" name="menuName" required style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="menuPrice" style="display: block; margin-bottom: 5px; font-weight: bold;">Menu Price</label>
                <input type="number" id="menuPrice" name="menuPrice" step="0.01" required style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="menuStatus" style="display: block; margin-bottom: 5px; font-weight: bold;">Status</label>
                <select id="menuStatus" name="menuStatus" required style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="available">Tersedia</option>
                    <option value="unavailable">Habis</option>
                </select>
            </div>
            <button type="submit" style="width: 100%; padding: 10px; background-color: #5cb85c; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">Create Menu</button>
        </form>
    </div>
</body>
</html>
