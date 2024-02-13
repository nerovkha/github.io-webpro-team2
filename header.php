<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <link rel = "stylesheet" href= "nerov.css">

</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid main-container">
        <div class="row nav-container">
            <div class="col-12 col-md-6">
                <header class="h1 text-white"><a class="Home-page text-white" href="index.html">Joo-marketti</a></header>
            </div>
            <div class="col-6">
                <nav class="navbar navbar-expand-md bg-body-tertiary">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active text-white" aria-current="page" href="index.html">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Shop
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="drinks.html">Drinks</a></li>
                                  <li><a class="dropdown-item" href="bakedgoods.html">Baked Goods</a></li>
                                  <li><a class="dropdown-item" href="eggsndairy.html">Eggs and Diary </a></li>
                                  <li><a class="dropdown-item" href="vegetables.html">Vegetables</a></li>
                                </ul>
                              </li>
                            <!-- Drop down bar for latter -->
                            <li class="nav-item">
                                <a class="nav-link text-white" href="liam.html">Shopping Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="contact.html">Contact Us</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>