	<!-- echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]); -->
	<section class="invoice printableArea">
		<div class="row">
			<div class="col-12">
				<div class="bb-1 clearFix">
					<div class="text-end pb-15">
						<button class="btn btn-success" type="button"> <span><i class="fa-solid fa-print"></i> Save</span> </button>
						<button id="print2" class="btn btn-warning" type="button"> <span><i class="fa-solid fa-print"></i> Print</span> </button>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="page-header">
					<h2 class="d-inline"><span class="fs-30">Create order</span></h2>
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
			<!-- /.col -->
			<!-- <div class="col-md-6 invoice-col text-end">
				<strong>To</strong>
				<address>
					<strong class="text-blue fs-24"><?php
													// echo (Customer::find($order->customer_id)->name);
													?></strong><br>
					<?php
					// echo Customer::find($order->customer_id)->address
					?><br>
					<strong>Phone: <?php
									// echo (Customer::find("$order->customer_id")->phone);
									?> &nbsp;&nbsp;&nbsp;&nbsp; Email: <?php
																		// echo (Customer::find("$order->customer_id")->email);
																		?></strong>
				</address>
			</div> -->
			<!-- /.col -->
			<div class="col-sm-12 invoice-col mb-15">
				<div class="invoice-details row no-margin">
					<div class="col-md-6 col-lg-3"><b>Invoice </b>#0154879</div>
					<div class="col-md-6 col-lg-3"><b>Order ID:</b>000<?php
																		//   echo $order->id
																		?></div>
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



		<div class="row">
			<div class="col-12 table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Description</th>
							<th>Strength</th>
							<th class="text-end">Quantity</th>
							<th class="text-end">Unit Cost</th>
							<th class="text-end">Subtotal</th>
							<th class="text-end">Action</th>
						</tr>
						<tr>
							<th>1</th>
							<th>
								<?php
								echo Medicine::html_select("medicine");
								?>
							</th>
							<th id="strength">
								
							</th>
							<th class="text-end">
								<input type="number" min="0" step="" class="form-control form-control-sm qty" value="1">
							</th>
							<th class="text-end">Unit Cost</th>
							<th class="text-end">Subtotal</th>
							<td class="no-print text-end"><button class="btn btn-md btn-success  add-row">Add</button></td>
						</tr>
						<thead>
						<tbody>

							<?php
							$orderdetails = OrdersDetail::findAllByOrder_id($order->id);
							$count = 1;
							$total = 0;
							$nettotal = 0;
							foreach ($orderdetails as $value) {
								$name = Medicine::find($value['medicine_id']);
								$subtotal = $value['unit_price'] * $value['qty'];
								echo "<tr>
				  <td>$count</td>
				  <td>$name->name $name->strength</td>
				  <td>000{$value['id']}</td>
				  <td class=\"text-end\">{$value['qty']}</td>
				  <td class=\"text-end\">{$value['unit_price']}</td>
				  <td class=\"text-end\">$$subtotal</td>
				</tr>";
								$count++;
								$total += $subtotal;
							}
							?>


						</tbody>
				</table>
			</div>
			<!-- /.col -->
		</div>
		<div class="row">
			<div class="col-12 text-end">
				<p class="lead"><b>Payment Due</b><span class="text-danger"> 14/08/2018 </span></p>

				<div>
					<p>Sub - Total amount : $<?= $total ?></p>
					<p>Dicount (18%) : $<?= floor($total * (18 / 100)) ?></p>
					<!-- <p>Shipping  :  $110.44</p> -->
				</div>
				<div class="total-payment">
					<h3><b>Total :</b>$<?= $total - (floor($total * (18 / 100))) ?> </h3>
				</div>

			</div>
			<!-- /.col -->
		</div>
		<div class="row no-print">
			<div class="col-12">
				<button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
				</button>
			</div>
		</div>
	</section>

	<script>
		$(function() {
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

						$(".billAddress").val(data.address)

					},
					error: function(err) {
						console.log(err);

					}


				})



			})
			$("#medicine").on("change", function() {
			  let medicinen_name= 	 $(this).find("option:selected").attr("data-strength");
				$("#strength").text(medicinen_name);
              console.log(medicinen_name);
			  

			})



		})
	</script>