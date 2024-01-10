@extends('pelanggan.layout.index')


@section('content')
<style>
    /* template */
    #hotel {
        background: f2f2f2
        height: 100vh;
        width: 100%;
    }

    .catalog-hotel {
        height: 100vh;
        width: 100%;
    }

    .hero-tagline h1 {
        color: #fafafa;
        font-weight: 700;
        font-size: 48px;
        line-height: 72px;

    }

    .hero-tagline p {
        font-size: 18px;
        color: #fafafa;
        width: 90%;
    }

    .hero-tagline h4 {
        color: #fafafa;
        font-size: 18px;
        line-height: 200%
    }
    /* template */

		h1 {
			text-align: center;
		}

		.menu-item {
			display: flex;
			margin-bottom: 20px;
			border: 2px solid #4CAF50;
			border-radius: 4px;
			padding: 10px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color:f2f2f2;
		}

		.menu-item-image {
			flex: 0 0 150px;
			margin-right: 20px;
            margin-top: 50px;
            border-radius:8px;
		}

		.menu-item-image img {
			width: 100%;
			height: auto;
            border-radius:8px;
		}

		.menu-item-details {
			flex: 1;
		}

		.menu-item-title {
			font-size: 20px;
			font-weight: bold;
			margin-bottom: 10px;
		}

		.menu-item-description {
			margin-bottom: 10px;
		}

		.menu-item-price {
			font-weight: bold;
			position: relative;
		}

		.menu-item-price button {
			position: absolute;
			top: 0;
			right: 0;
			width: 30px;
			height: 30px;
			font-weight: bold;
			border: none;
			background-color: transparent;
			cursor: pointer;
		}

		.menu-item-price .decrement {
			left: -35px;
		}

		.menu-item-price .increment {
			right: -35px;
		}

		.checkout-button {
			display: block;
			width: 100%;
			padding: 10px;
			margin-top: 20px;
			background-color: #4CAF50;
			color: white;
			text-align: center;
			text-decoration: none;
			border: none;
			border-radius: px;
			cursor: pointer;
		}


		.container {
			display: flex;
			justify-content: space-between;
			margin-top: 20px;
            
		}

		.catalog-container {
			flex: 1;
			margin-right: 20px;
        
		}

		.cart-container {
			flex: 0 0 300px;
			background-color: #f2f2f2;
			padding: 20px;
		}
        .menu-item-select {
        background-color: transparent;
        border: 2px solid #4CAF50;
        color: #4CAF50;
        padding: 5px 10px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top:10px;
        }

        .menu-item-select:hover {
            background-color: #4CAF50;
            color: white;
        }
        .price-select {
        display: flex;
        align-items: center;
        margin-top: 10px;
        
        }

        .price-select button {
            padding: 5px;
            width: 30px;
            height: 30px;
            font-weight: bold;
            border: none;
            background-color: transparent;
            cursor: pointer;
        }

        .price-select .decrement {
            margin-right: 5px;
        }
        .availability-box {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .check-avail-button{
        background-color: transparent;
        border: 2px solid #4CAF50;
        color: #4CAF50;
        padding: 2px 5px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top:10px;  
        }
        .check-avail-button:hover {
            background-color: #4CAF50;
            color: white;
        }
        

        .available-form1 label {
            margin-bottom: 15px;
            margin-left: 10px;
        }

        .available-form1 input[type="date"],
        .available-form1 button {
            padding: 2px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .available-form1 input[type="select"],
        .available-form1 button {
            padding: 2px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .availability-box h5 {
        margin-top: 20px;
        margin-left: 10px;
        }
        .size-room{
            background-color: #bbd16e;
            border-radius: 3px;
            box-shadow: 35px:

        }
        .col-3 input {
            margin-left: 10px;
            margin-bottom: 10px;
        }
       .form-select select{
        margin: bottom 10px;
       }
       .col-3 button {
        margin-top: 10px;
       }
      
        
	</style>
</head>
<div id="hotel">
        <div class="catalog-hotel">
            <div class="container">
                <div class="catalog-container col-lg-8">
                    <h1>Training Center</h1>
                    <div class="row py-2 m-4">
                        <div class="check">
                            <div class="availability-box col-lg-12 bg-white shadow-4 rounded">
                                <h5 style="">Check Availability</h5>
                                <form id="availability-form col-lg-4">
                                    <div class="available-form1 d-flex row align-items-center">
                                    <div class="col-3">
                                    <label class="form-label" style="margin-bottom: 12px;">Check in date</label>
                                    <input type="date" name="check-in-date" required>
                                </div>
                                <div class="col-3">
                                    <label class="form-label" style="margin-bottom: 12px;">Capacity</label>
                                    <input type="select" name="check-out-date" required>
                                </div>
                                <div class="col-3" style="margin-bottom: 12px;">
                                    <label class="form-label" style="margin-bottom: 12px;">Lantai</label>
                                    <select class="form-select form-select-sm" aria-label="Small select example">
                                        <!-- <option selected>Open this select menu</option> -->
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                        <div class="col-3"style="margin-top:12px;">
                                            <button type="submit" class="check-avail-button">Check</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/hall.jpg') }}" alt="Nama Menu">
                            <div class="size-room" style="font-size: 8px; margin-top:8px">
                                <i class="fas fa-user" style="margin-right: 5px;"></i> Guest 2 person<br>
                                <i class="fas fa-home" style="margin-right: 5px;"></i> Ukuran Ruangan: 100m<sup>2</sup>
                            </div>
                        </div>
                        <div class="menu-item-details">
                            <div class="menu-item-title">Luxury Room | lantai 12</div>
                            <div class="menu-item-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, cumque debitis? Libero hic nam dicta, delectus mollitia porro fugiat quasi laboriosam eligendi exercitationem eum voluptas rem? Architecto suscipit blanditiis vel..</div>
                            <div class="menu-item-price">
                                <span class="price">Rp 50.000</span>
                            </div>
                            <!-- <div class="price-select">
                                <button class="decrement">-</button>
                                <span class="quantity">0</span>
                                <button class="increment">+</button>
                            </div> -->
                            <div class>
                                <button class="menu-item-select"data-bs-toggle="modal" data-bs-target="#staticBackdrop">Book Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/hall.jpg') }}" alt="Nama Menu">
                            <div class="size-room" style="font-size: 8px; margin-top:8px">
                                <i class="fas fa-user" style="margin-right: 5px;"></i> Guest 2 person<br>
                                <i class="fas fa-home" style="margin-right: 5px;"></i> Ukuran Ruangan: 100m<sup>2</sup>
                            </div>
                        </div>
                        <div class="menu-item-details">
                            <div class="menu-item-title">Deluxe room</div>
                            <div class="menu-item-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, sequi. Architecto quam veritatis nemo obcaecati, ducimus illo consequuntur debitis fuga cum assumenda facilis sed ad asperiores. Amet numquam voluptatibus inventore.</div>
                            <div class="menu-item-price">
                                <span class="price"> Rp 75.00</span>
                            </div>
                            <!-- <div class="price-select">
                                <button class="decrement">-</button>
                                <span class="quantity">0</span>
                                <button class="increment">+</button>
                            </div> -->
                            <button class="menu-item-select" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Book Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Keranjang</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>    
            </div>
        </div>

       
    </div>
<!-- Modal -->
<div class="modal fade" id="staticbackdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    
    
    
    
</div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    const decrementButtons = document.querySelectorAll('.decrement');
    const incrementButtons = document.querySelectorAll('.increment');
    const quantityElements = document.querySelectorAll('.quantity');
    const priceElements = document.querySelectorAll('.price');
    const selectButtons = document.querySelectorAll('.menu-item-select');

    decrementButtons.forEach(function(button, index) {
        button.addEventListener('click', function() {
            const quantity = parseInt(quantityElements[index].textContent);
            if (quantity > 0) {
                quantityElements[index].textContent = quantity - 1;
                updatePrice(index);
            }
        });
    });

    incrementButtons.forEach(function(button, index) {
        button.addEventListener('click', function() {
            const quantity = parseInt(quantityElements[index].textContent);
            quantityElements[index].textContent = quantity + 1;
            updatePrice(index);
        });
    });

    selectButtons.forEach(function(button, index) {
        button.addEventListener('click', function() {
            const quantity = parseInt(quantityElements[index].textContent);
            const price = parseFloat(priceElements[index].textContent.slice(3)); // Menghapus "Rp " dari harga
            const totalPrice = quantity * price;
            console.log('Total Harga:', totalPrice.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));
        });
    });

    function updatePrice(index) {
        const quantity = parseInt(quantityElements[index].textContent);
        const price = parseFloat(priceElements[index].textContent.slice(3)); // Menghapus "Rp " dari harga
        const totalPrice = quantity * price;
        priceElements[index].textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');
    }
    });

    </script>
</div>
</body>

</html>