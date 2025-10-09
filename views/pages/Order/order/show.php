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
				<h2 class="d-inline"><span class="fs-30">Invoice</span></h2>
				<div class="pull-right text-end">
					<h3><?php
				  echo date("d M Y H:i:s",time());
				  
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
			<div class="col-md-6 invoice-col text-end">
			  <strong>To</strong>
			  <address>
				<strong class="text-blue fs-24"><?php
				echo (Customer::find($order->customer_id)->name);
				?></strong><br>
				<?php echo Customer::find($order->customer_id)->address?><br>
				<strong>Phone: <?php
				echo (Customer::find("$order->customer_id")->phone);
				?> &nbsp;&nbsp;&nbsp;&nbsp; Email: <?php
				echo (Customer::find("$order->customer_id")->email);
				?></strong>
			  </address>
			</div>
			<!-- /.col -->
			<div class="col-sm-12 invoice-col mb-15">
				<div class="invoice-details row no-margin">
				  <div class="col-md-6 col-lg-3"><b>Invoice </b>#0154879</div>
				  <div class="col-md-6 col-lg-3"><b>Order ID:</b>000<?php
				  echo $order->id
				  ?></div>
				  <div class="col-md-6 col-lg-3"><b>Payment Due:</b> 14/08/2018</div>
				  <div class="col-md-6 col-lg-3"><b>Account:</b> 00215487541296</div>
				</div>
			</div>
		  <!-- /.col -->
		  </div>
		  <div class="row">
			<div class="col-12 table-responsive">
			  <table class="table table-bordered">
				<thead>
				<tr>
				  <th>#</th>
				  <th>Description</th>
				  <th>Serial #</th>
				  <th class="text-end">Quantity</th>
				  <th class="text-end">Unit Cost</th>
				  <th class="text-end">Subtotal</th>
				</tr>
				<thead>
				<tbody>

				<?php
				$orderdetails=OrdersDetail::findAllByOrder_id($order->id);
				$count=1;
				$total=0;
				$nettotal=0;
				foreach ($orderdetails as $value) {
					$name=Medicine::find($value['medicine_id']);
					$subtotal=$value['unit_price']*$value['qty'];
				echo "<tr>
				  <td>$count</td>
				  <td>$name->name $name->strength</td>
				  <td>000{$value['id']}</td>
				  <td class=\"text-end\">{$value['qty']}</td>
				  <td class=\"text-end\">{$value['unit_price']}</td>
				  <td class=\"text-end\">$$subtotal</td>
				</tr>";
				$count++;
				$total+=$subtotal;
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
					<p>Sub - Total amount  :  $<?=$total?></p>
					<p>Dicount (18%)  :  $<?=floor($total*(18/100))?></p>
					<!-- <p>Shipping  :  $110.44</p> -->
				</div>
				<div class="total-payment">
					<h3><b>Total :</b>$<?=$total-(floor($total*(18/100)))?> </h3>
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