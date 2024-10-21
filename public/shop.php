<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point Shop</title>
    <link rel="stylesheet" href="css/shop.css">
    <style>
    <?php include_once "../css/style.css"?>

        .shop-container {
            padding: 20px;
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-between;
        }

        .shop-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: var(--text-primary);
        }

        .search-bar {
            width: 100%;
            margin: 20px 0;
            text-align: center;
        }

        .search-bar input[type="text"] {
            padding: 10px;
            width: 60%;
            border: 2px solid var(--accent);
            border-radius: 5px;
        }

        .search-bar button {
            padding: 10px 15px;
            background-color: var(--accent);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .shop-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
            width: 70%;
        }

        .item {
            border: 1px solid var(--accent);
            padding: 10px;
            background-color: var(--secondary);
            border-radius: 10px;
            text-align: center;
        }

        .item img {
            width: 100px;
            height: 100px;
            background-color: var(--terciary);
            display: block;
            margin: 0 auto;
        }

        .item .points {
            font-size: 18px;
            margin-top: 10px;
        }

        .filters {
            width: 25%;
            padding: 20px;
            background-color: var(--primary);
            border-radius: 10px;
        }

        .filters h3 {
            margin-bottom: 20px;
            font-size: 20px;
        }

        .filters .filter-section {
            margin-bottom: 20px;
        }

        .filters label {
            font-size: 16px;
        }

        .filters input, .filters select {
            margin-top: 10px;
            padding: 10px;
            width: 100%;
            border: 2px solid var(--accent);
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="shop-header">
        Point Shop
    </div>

    <div class="search-bar">
        <input type="text" placeholder="Search items...">
        <button>Search</button>
    </div>

    <div class="shop-container">
        <div class="shop-grid">
            <div class="item">
                <img src="item-image-placeholder.png" alt="Item Image">
                <div class="points">50 PTS</div>
            </div>
            <div class="item">
                <img src="item-image-placeholder.png" alt="Item Image">
                <div class="points">100 PTS</div>
            </div>
            <div class="item">
                <img src="item-image-placeholder.png" alt="Item Image">
                <div class="points">200 PTS</div>
            </div>
        </div>

        <div class="filters">
            <h3>Filters</h3>
            <div class="filter-section">
                <label for="price">Price</label>
                <select id="price">
                    <option value="asc">Price (Low to High)</option>
                    <option value="desc">Price (High to Low)</option>
                </select>
            </div>
            <div class="filter-section">
                <label>Category</label>
                <input type="checkbox" id="cat1"> Category 1<br>
                <input type="checkbox" id="cat2"> Category 2<br>
                <input type="checkbox" id="cat3"> Category 3<br>
            </div>
            <div class="filter-section">
                <label>Temporary Items</label>
                <input type="checkbox" id="temp"> Show only temporary items
            </div>
        </div>
    </div>
</body>
</html>
