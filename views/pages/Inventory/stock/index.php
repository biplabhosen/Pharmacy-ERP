<div class="box  printableArea">
    <div class="box-body">
        <div class="d-flex justify-content-between">
          <!-- <button class="btn btn-primary no-print" onclick="window.print()">Print</button> -->
          <h3 class="box-title">Stock Report</h3>
          <button id="print2" class="btn btn-warning"  type="button"> <span><i class="fa-solid fa-print"></i> Print</span> </button>
        </div>
        <form class="form" action="<?=$base_url?>/stock" method="post">
							<div class="box-body">
								<h4 class="box-title text-info mb-3">Filter by Date</h4>
								<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">From</label>
									  <input type="date" name="from" class="form-control" value="<?=$stock->str?>">
									</div>
								  </div>
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">To</label>
									  <input type="date" name="to"  class="form-control " value="<?=$stock->str?>">
									</div>
								  </div>
								</div>
							
							<div class="mb-3">
								<button type="submit" name="submit" class="btn btn-primary ">
								  <i class="ti-save-alt"></i> Search
								</button>
							</div>  
						</form>
        <div class="table-responsive">
            <table class="table">
                <thead class="bg-success">
                    <tr>
                        <th>#</th>
                        <th>Medicine Name</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($stock->stock_report as $key => $value) {
                        echo "<tr>
                        <td>".($key+1)."</td>
                        <td>$value->medicine</td>
                        <td>$value->qty</td>
                    </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>