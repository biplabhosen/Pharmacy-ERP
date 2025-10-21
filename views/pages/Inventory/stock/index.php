<div class="box">
    <div class="box-body">
        
        <h3 class="box-title">Stock Report</h3>
        <form class="form" action="<?=$base_url?>/stock" method="post">
							<div class="box-body">
								<h4 class="box-title text-info mb-3">Filter by Date</h4>
								<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">From</label>
									  <input type="date" name="from" class="form-control">
									</div>
								  </div>
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">To</label>
									  <input type="date" name="to" class="form-control">
									</div>
								  </div>
								</div>
							
							<div class="mb-3">
								<button type="submit" class="btn btn-primary ">
								  <i class="ti-save-alt"></i> Search
								</button>
							</div>  
						</form>
        <div class="table-responsive">
            <!-- <form action="<?=$base_url?>/stock" method="post">
  <label for="">From</label>
  <input type="date" class="form-control form-control-sm"  name="from">
  <label for="">To</label>
  <input type="date" class="form-control form-control-sm" name="to">
  <button type="submit" name="btn_submit">Submit</button>
</form> -->
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
                    foreach ($stock as $key => $value) {
                        echo "<tr>
                        <td>{$key}</td>
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