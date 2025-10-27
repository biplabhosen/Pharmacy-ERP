	<section class="invoice printableArea">
		<div class="row">
			<div class="col-12">
				<div class="bb-1 clearFix">
					<div class="text-end pb-15 d-flex justify-content-between">
						<div>
							<?php
							echo Html::link(["class" => "btn btn-success", "route" => "order", "text" => "Manage Order"]);
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
					<h2 class="d-inline"><span class="fs-30">New order</span></h2>
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
				echo Customer::html_select("customer");
				?>
				<textarea id="Address" class="form-control form-control-sm mt-2 billAddress" rows="2">Customer address line 1
            City, Country</textarea>
			</div>
			<div class="col-sm-6 text-sm-end">
				<h6 class="mb-1">Ship To</h6>
				<input id="shipTo" class="form-control form-control-sm" value="Customer Receiver (optional)">
				<textarea id="shipAddress" class="form-control form-control-sm mt-2 billAddress" rows="2">Shipping address</textarea>
			</div>
		</div>

		<div id="alert-box"></div>


		<div class="row">
			<div class="col-12 table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Description</th>
							<th class="text-end">Quantity</th>
							<th class="text-end">Unit Cost</th>
							<th>Discout</th>
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
								<input type="number" min="1" step="" class=" qty form-control form-control-md" value="1">
							</th>
							<th class="no-print text-end" id="price">0.00</th>
							<th id="strength"><input type="number" class="discount form-control form-control-sm" value="0">
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
	<script src="<?= $base_url ?>/js/cart2.js"></script>
	<script>
		$(function() {
			let order = new Cart("cart")
			printCart();

			$("#customer").on("change", function() {
				let customer_id = $(this).val();
				// alert(customer_id)

				$.ajax({
					url: "<?= $base_url ?>/api/customer/find",
					type: "GET",
					data: {
						id: customer_id
					},
					success: function(res) {
						// console.log(res);
						let data = JSON.parse(res).customer;
						console.log(data.address);

						$(".billAddress").val(data.address);


					},
					error: function(err) {
						console.log(err);

					}


				})



			})
			$("#medicine").on("change", function() {
				let medicinen_price = $(this).find("option:selected").attr("data-price");
				let price = $("#price").text(medicinen_price);
				$(".qty").val(1);
				// $("#discount").val(price*.2);
				$(".sub_total").text(medicinen_price);

			})

			$(document).on("change", ".qty", ".discount", function() {
				let qty = parseFloat($(this).val());

				let price = parseFloat($("#price").text());
				// console.log(price, qty);
				// let discount=parseFloat($(".discount").val()) ;
				let sub = $(".sub_total").text(Math.round((price * qty)));
			});

			// $(".qty").on("change",()=>{
			// 	alert(console.log($(this).val()));
			// let subTotal=$(this).val();
			// console.log(subTotal);

			// $(".sub_total").text(subTotal);


			// })


			// $(document).on("change", ".tax, .discount, .qty ", function() {
			// 	let qty = $(".qty").val()
			// 	let discount = $(".discount").val()
			// 	let tax = $(".tax").val()
			// 	let price = $(".price").val();
			// 	$(".line-total").text(Math.round((price * qty) + tax - discount));
			// });


			$(".add-row").on("click", () => {
				let medicine_id = $("#medicine").val();
				let medicine_name = $("#medicine").find("option:selected").text();
				let qty = parseFloat($(".qty").val());
				// console.log(qty);

				let price = parseFloat($("#price").text());
				let discount = parseFloat($(".discount").val());
				let sub_total = parseFloat($(".sub_total").text());

				console.log(medicine_id, medicine_name, qty, price, sub_total);
				$data = {
					id: medicine_id,
					name: medicine_name,
					qty: qty,
					unit_price: price,
					discount: discount,
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
				let discount = 0;
				data.forEach((element, i) => {
					discount += element.qty * element.unit_price * 0.18;
					sub_total += element.qty * element.unit_price;
					total += (element.qty * element.unit_price);
					html += `
					<tr>
							<td>${++i}</td>
							<td>${element.name}</td>
							<td class="text-end">${element.qty}</td>
							<td class="text-end">${element.unit_price}</td>
							<td>${element.discount}</td>
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
				let customer_id = $("#customer").val();
				let total_amount = $("#sub_total").text();
				let discount = $("#discount").text();
				let net_amount = $("#total").text();
				let products = order.getData();

				let data = {
					customer_id: customer_id,
					total_amount: total_amount,
					discount: discount,
					net_amount: net_amount,
					products: products
				}

				$.ajax({
					url: "<?= $base_url ?>/api/order/save_order",
					type: "POST",
					data: {
						data: data
					},
					success: function(res) {
						let result = JSON.parse(res);
						// Detect message type based on response
						let alertType = "info"; // default color (blue)
						if (result.success === true) {
							alertType = "success"; // green
						} else if (result.success === false) {
							alertType = "danger"; // red
						} else if (result.warning) {
							alertType = "warning"; // yellow
						}

						$("#alert-box").html(`
							<div class="alert alert-${alertType} alert-dismissible fade show" role="alert">
								${result.message || "Operation completed."}
							</div>
						`);
								// <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

						setTimeout(() => {
							$(".alert").alert('close');
						}, 3000);
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