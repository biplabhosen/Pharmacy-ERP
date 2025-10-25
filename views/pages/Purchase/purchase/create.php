	<section class="invoice printableArea">
		<div class="row">
			<div class="col-12">
				<div class="bb-1 clearFix">
					<div class="text-end pb-15 d-flex justify-content-between">
						<div>
						<?php
						echo Html::link(["class"=>"btn btn-success", "route"=>"purchase", "text"=>"Manage Purchase"]);
						?>
						</div>
						<div>
							<button class="btn btn-success" type="button"> <span><i class="fa-solid fa-print"></i> Save</span> </button>
							<button id="print2" class="btn btn-warning" type="button"> <span><i class="fa-solid fa-print"></i> Print</span> </button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="page-header">
					<h2 class="d-inline"><span class="fs-30">New Purchase</span></h2>
					<div class="pull-right text-end">
						<h3><?php
							echo date("d M Y H:i:s", time());

							?></h3>
					</div>
				</div>
			</div>
			<!-- /.col -->
		</div>
		<div class="row invoice-info">
			<div class="col-md-6 invoice-col">
				<strong>From</strong>
				<address>
					<strong class="text-blue fs-24">Coup Admin</strong><br>
					<strong class="d-inline">124 cha, Suite 478, Banani, Dhaka-1212</strong><br>
					<strong>Phone: (00) 123-456-7890 &nbsp;&nbsp;&nbsp;&nbsp; Email: info@ffarma.com</strong>
				</address>
			</div>

			<div class="col-sm-12 invoice-col mb-15">
				<div class="invoice-details row no-margin">
					<div class="col-md-6 col-lg-3"><b>Invoice </b>#0154879</div>
					<div class="col-md-6 col-lg-3"><b>Order ID:</b>000</div>
					<div class="col-md-6 col-lg-3"><b>Payment Due:</b> 14/08/2018</div>
					<div class="col-md-6 col-lg-3"><b>Account:</b> 00215487541296</div>
				</div>
			</div>
			<!-- /.col -->
		</div>

		<div class="row mb-4">
			<div class="col-sm-6">
				<h6 class="mb-1">Bill To</h6>
				<?php
				echo Supplier::html_select("supplier");
				?>
				<textarea id="Address" class="form-control form-control-sm mt-2 billAddress" rows="2">Supplier address line 1
            City, Country</textarea>
			</div>
			<div class="col-sm-6 text-sm-end">
				<h6 class="mb-1">Ship To</h6>
				<input id="email" class="form-control form-control-sm" value="Supplier Email">
				<textarea id="phone" class="form-control form-control-sm mt-2 billAddress" rows="2">Supplier Phone</textarea>
			</div>
		</div>



		<div class="row">
			<div class="col-12 table-responsive">
				<table class="table table-bordered">
					<thead >
						<tr class="invoice-details">
							<th>#</th>
							<th>Description</th>
							<th class="text-end">Quantity</th>
							<th class="text-end">Unit Cost</th>
							<th>Expiry Date</th>
							<th class="text-end">Subtotal</th>
							<th class="text-end">Action</th>
						</tr>
						<tr class="no-print">
							<th>1</th>
							<th>
								<?php
								echo Medicine::html_select("medicine");
								?>
							</th class="no-print">

							<th class="no-print text-end">
								<input type="number" min="1" step="" class=" qty form-control form-control-sm" value="1">
							</th>
							<th class="no-print text-end" id="price">0.00</th>
							<th id="strength"><input type="date" class="expity_date form-control form-control-sm " value="">
							</th>
							<th class="no-print text-end sub_total">0.00</th>
							<td class="no-print text-end"><button class="btn btn-md btn-success  add-row">Add</button></td>
						</tr>
						<thead>
						<tbody id="tbody">




						</tbody>
				</table>
			</div>
			<!-- /.col -->
		</div>
		<div class="row">
			<div class="col-12 text-end">
				<p class="lead"><b>Payment Due</b><span class="text-danger"> 14/08/2018 </span></p>

				<div>
					<p>Sub - Total amount : <span id="sub_total"></span></p>
					<p>Discount (18%) :<span id="discount"></span></p>
					<!-- <p>Shipping  :  $110.44</p> -->
				</div>
				<div class="total-payment">
					<h3 id=""><b>Total :<span id="total"></span></b></h3>
				</div>

			</div>
			<!-- /.col -->
		</div>
		<div class="row no-print">
			<div class="col-12">
				<button type="button" id="order" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit
				</button>
			</div>
		</div>
	</section>
	<script src="<?=$base_url?>/js/cart2.js"></script>
	<script>
		$(function() {
			let order = new Cart("purchase")
			printCart();

			$("#supplier").on("change", function() {
				let supplier_id = $(this).val();
				let phone = $(this).find("option:selected").attr("data-phone");
				let email = $(this).find("option:selected").attr("data-email");
				let address = $(this).find("option:selected").attr("data-address");
				// console.log(supplier_id);
				$("#Address").val(address);
				$("#email").val(email);
				$("#phone").val(phone);


			})


			$("#medicine").on("change", function() {
				let medicinen_price = $(this).find("option:selected").attr("data-purchase");
				let price = $("#price").text(medicinen_price);				
				$(".qty").val(1);
				// $("#discount").val(price*.2);
				$(".sub_total").text(medicinen_price);

			})

			$(document).on("change", ".qty", function() {
				let qty = parseFloat($(this).val());
				let price = parseFloat($("#price").text());
				let sub = $(".sub_total").text(Math.round((price * qty)));
			});


			$(".add-row").on("click", () => {
				let medicine_id = $("#medicine").val();
				let medicine_name = $("#medicine").find("option:selected").text();
				let qty = parseFloat($(".qty").val());
				// console.log(qty);

				let price = parseFloat($("#price").text());
				let expity_date = $(".expity_date").val();
				let sub_total = parseFloat($(".sub_total").text());

				console.log(medicine_id, medicine_name, qty, price, sub_total);
				$data = {
					id: medicine_id,
					name: medicine_name,
					qty: qty,
					unit_price: price,
					expity_date: expity_date,
					sub_total: sub_total
				}
				order.AddItem($data);

				printCart()

			})

			function printCart() {
				let data = order.getData();
				console.log(data);
				
				let html = "";
				let total = 0;
				let sub_total = 0;
				// let discount = 0;
				data.forEach((element, i) => {
					// discount += element.qty * element.unit_price * 0.18;
					sub_total += element.qty * element.unit_price;
					total += (element.qty * element.unit_price);
					html += `
					<tr>
							<td>${++i}</td>
							<td>${element.name}</td>
							<td class="text-end">${element.qty}</td>
							<td class="text-end">${element.unit_price}</td>
							<td>${element.expity_date}</td>
							<td class="text-end">${element.qty*element.unit_price}</td>
							<td class="no-print text-end"><button class="btn btn-sm btn-outline-danger remove-row " data-id="${element.id}">Remove</button></td>
						</tr>`



				});

				$("#tbody").html(html);
				$("#sub_total").text(sub_total);
				$("#discount").text(discount);
				$("#total").text(total);




			}


			$(document).on("click", ".remove-row", function() {
				let id = $(this).data("id");
				order.delItem(id);
				printCart()

			})


			$("#order").on("click", () => {
				let supplier_id = $("#supplier").val();
				console.log(supplier_id);
				
				let total_amount = $("#sub_total").text();
				let discount = $("#discount").text();
				let net_amount = $("#total").text();
				let medicines = order.getData();
				console.log(medicines);
				
				let data = {
					supplier_id:supplier_id,
					total_amount:total_amount,
					discount:discount,
					net_amount:net_amount,
					medicines:medicines
				}

				$.ajax({
					url: "<?=$base_url?>/api/Purchase/savePurchase",
					type: "POST",
					data: {
						data: data
					},
					success: function(res) {
						let data = JSON.parse(res);
						if (data.success) {
							console.log(data);

						}
						order.clearItem();
						printCart();
						location.reload()

					},
					error: function(err) {
						console.log(err);

					}
				})





			})








		})
	</script>