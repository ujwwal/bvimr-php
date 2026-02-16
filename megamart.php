<?php
// Multi-dimensional associative array
$products = array(
    "P001" => array(
        "name" => "Laptop",
        "price" => 55000,
        "category" => "Electronics",
        "stock" => 10,
        "image" => "https://placehold.co/300x200/2c3e50/fff?text=Laptop"
    ),
    "P002" => array(
        "name" => "Smartphone",
        "price" => 20000,
        "category" => "Electronics",
        "stock" => 25,
        "image" => "https://placehold.co/300x200/e74c3c/fff?text=Phone"
    ),
    "P003" => array(
        "name" => "Running Shoes",
        "price" => 3000,
        "category" => "Fashion",
        "stock" => 50,
        "image" => "https://placehold.co/300x200/3498db/fff?text=Shoes"
    ),
    "P004" => array(
        "name" => "Headphones",
        "price" => 2500,
        "category" => "Electronics",
        "stock" => 15,
        "image" => "https://placehold.co/300x200/9b59b6/fff?text=Audio"
    ),
     "P005" => array(
        "name" => "Smart Watch",
        "price" => 5000,
        "category" => "Electronics",
        "stock" => 8,
        "image" => "https://placehold.co/300x200/f1c40f/333?text=Watch"
    )
);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P. Megamart | Your One Stop Shop</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --accent-color: #e74c3c;
            --text-color: #333;
            --bg-color: #f8f9fa;
            --card-bg: #ffffff;
        }
        
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        /* Navigation */
        nav {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .logo { font-size: 1.5rem; font-weight: bold; }
        .nav-links a { color: white; text-decoration: none; margin-left: 20px; transition: color 0.3s; }
        .nav-links a:hover { color: var(--accent-color); }
        .cart-icon { position: relative; cursor: pointer; }
        .cart-count { background: var(--accent-color); color: white; border-radius: 50%; padding: 2px 6px; font-size: 0.8rem; position: absolute; top: -8px; right: -10px; }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(44, 62, 80, 0.7), rgba(44, 62, 80, 0.7)), url('https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 4rem 1rem;
            margin-bottom: 2rem;
        }
        .hero h1 { font-size: 2.5rem; margin-bottom: 1rem; }
        .btn-cta { background: var(--accent-color); color: white; padding: 10px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: transform 0.2s; }
        .btn-cta:hover { transform: translateY(-2px); box-shadow: 0 4px 8px rgba(0,0,0,0.2); }

        /* Main Container */
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .section-title { text-align: center; margin-bottom: 2rem; color: var(--primary-color); position: relative; }
        .section-title::after { content: ''; display: block; width: 50px; height: 3px; background: var(--accent-color); margin: 10px auto; }

        /* Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            padding-bottom: 3rem;
        }

        .product-card {
            background: var(--card-bg);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .product-image {
            height: 200px;
            width: 100%;
            object-fit: cover;
            background-color: #ddd;
        }

        .product-info { padding: 1.5rem; flex-grow: 1; display: flex; flex-direction: column; }
        .product-category { font-size: 0.85rem; color: #7f8c8d; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px; }
        .product-title { font-size: 1.2rem; margin-bottom: 10px; font-weight: 600; }
        .product-meta { display: flex; justify-content: space-between; align-items: center; margin-top: auto; }
        .product-price { color: var(--primary-color); font-weight: bold; font-size: 1.3rem; }
        .product-stock { font-size: 0.9rem; color: #27ae60; }
        .low-stock { color: #e74c3c; }

        .btn-add {
            display: block;
            width: 100%;
            padding: 10px;
            background: var(--primary-color);
            color: white;
            border: none;
            text-align: center;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 15px;
            border-radius: 5px;
        }
        .btn-add:hover { background: #34495e; }

        /* Footer */
        footer { background: var(--primary-color); color: white; padding: 2rem 0; text-align: center; margin-top: auto; }
        footer p { opacity: 0.8; font-size: 0.9rem; }
    </style>
</head>
<body>

    <nav>
        <div class="logo"><i class="fas fa-shopping-bag"></i> P. Megamart</div>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#">Shop</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </div>
        <div class="cart-icon">
            <i class="fas fa-shopping-cart fa-lg"></i>
            <span class="cart-count">3</span>
        </div>
    </nav>

    <header class="hero">
        <h1>Welcome to P. Megamart</h1>
        <p>Discover the best products at unbeatable prices.</p>
        <br>
        <a href="#products" class="btn-cta">Shop Now</a>
    </header>

    <div class="container" id="products">
        <h2 class="section-title">Featured Products</h2>
        
        <div class="product-grid">
            <?php foreach($products as $id => $product): ?>
            <div class="product-card">
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
                <div class="product-info">
                    <span class="product-category"><?php echo $product['category']; ?></span>
                    <h3 class="product-title"><?php echo $product['name']; ?></h3>
                    <div class="product-meta">
                        <span class="product-price">₹<?php echo number_format($product['price']); ?></span>
                        <span class="product-stock <?php echo ($product['stock'] < 10) ? 'low-stock' : ''; ?>">
                            <?php echo ($product['stock'] > 0) ? 'In Stock: '.$product['stock'] : 'Out of Stock'; ?>
                        </span>
                    </div>
                    <button class="btn-add">Add to Cart</button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> P. Megamart. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>