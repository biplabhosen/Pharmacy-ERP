<div class="row">
				<div class="col-xxl-3 col-lg-4 col-md-6 col-12">
					<div class="box rounded-4 pull-up">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<div class="d-flex align-items-center">
									<div class="me-10 bg-secondary-light w-50 h-50 rounded-circle text-center p-0 align-content-center"><i class="feather-box fs-22"></i></div>
									<div>
										<p class="m-0 fw-600">Total Medicine</p>
										<h1 class="m-0 fw-500"><?=Stock::stock()->qty?></h1>
									</div>
								</div>
								<div class="dropdown">
									<button class="btn btn-secondary bg-none btn-sm p-0 fs-20" data-bs-toggle="dropdown" href="#" aria-expanded="false"><span class="feather-more-vertical"></span></button>
									<div class="dropdown-menu dropdown-menu-end" style="">
									  	<a class="dropdown-item" href="#">Daily</a>
								  		<a class="dropdown-item" href="#">Weekly</a>
								  		<a class="dropdown-item" href="#">Yearly</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxl-3 col-lg-4 col-md-6 col-12">
					<div class="box rounded-4 pull-up">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<div class="d-flex align-items-center">
									<div class="me-10 bg-warning-light w-50 h-50 rounded-circle text-center p-0 align-content-center"><i class="mdi mdi-alert fs-22"></i></div>
									<div>
										<p class="m-0 fw-600">Low Stock</p>
										<h1 class="m-0 fw-500"><?php echo (Stock::low_stock()->low_stock_count)  ?></h1>
									</div>
								</div>
								<div class="dropdown">
									<button class="btn btn-secondary bg-none btn-sm p-0 fs-20" data-bs-toggle="dropdown" href="#" aria-expanded="false"><span class="feather-more-vertical"></span></button>
									<div class="dropdown-menu dropdown-menu-end" style="">
									  	<a class="dropdown-item" href="#">Daily</a>
								  		<a class="dropdown-item" href="#">Weekly</a>
								  		<a class="dropdown-item" href="#">Yearly</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxl-3 col-lg-4 col-md-6 col-12">
					<div class="box rounded-4 pull-up">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<div class="d-flex align-items-center">
									<div class="me-10 bg-danger-light w-50 h-50 rounded-circle text-center p-0 align-content-center"><i class="mdi mdi-close-circle fs-22"></i></div>
									<div>
										<p class="m-0 fw-600">Out Of Stock</p>
										<h1 class="m-0 fw-500"><?php echo (Stock::stock_out()->stock_out_count)  ?></h1>
									</div>
								</div>
								<div class="dropdown">
									<button class="btn btn-secondary bg-none btn-sm p-0 fs-20" data-bs-toggle="dropdown" href="#" aria-expanded="false"><span class="feather-more-vertical"></span></button>
									<div class="dropdown-menu dropdown-menu-end" style="">
									  	<a class="dropdown-item" href="#">Daily</a>
								  		<a class="dropdown-item" href="#">Weekly</a>
								  		<a class="dropdown-item" href="#">Yearly</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxl-3 col-lg-4 col-md-12 col-12">
					<div class="box rounded-4 pull-up">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<div class="d-flex align-items-center">
									<div class="me-10 bg-danger-light w-50 h-50 rounded-circle text-center p-0 align-content-center"><i class="mdi mdi-close-circle fs-22"></i></div>
									<div>
										<p class="m-0 fw-600">Expired Medicine</p>
										<h1 class="m-0 fw-500">80</h1>
									</div>
								</div>
								<div class="dropdown">
									<button class="btn btn-secondary bg-none btn-sm p-0 fs-20" data-bs-toggle="dropdown" href="#" aria-expanded="false"><span class="feather-more-vertical"></span></button>
									<div class="dropdown-menu dropdown-menu-end" style="">
									  	<a class="dropdown-item" href="#">Daily</a>
								  		<a class="dropdown-item" href="#">Weekly</a>
								  		<a class="dropdown-item" href="#">Yearly</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxl-3 col-lg-4 col-md-6 col-12">
					<div class="box rounded-4" style="background: linear-gradient(-60deg, #1b84ff, #7fafff 35%, #1b84ff 37%);">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<p class="m-0 fw-600 text-white">Antibiotics</p>
								<div class="d-flex align-items-center">
									<div>
										
									</div>
									<div class="dropdown">
										<button class="btn btn-secondary bg-none btn-sm p-0 fs-20" data-bs-toggle="dropdown" href="#" aria-expanded="false"><span class="feather-more-vertical text-white"></span></button>
										<div class="dropdown-menu dropdown-menu-end" style="">
										  	<a class="dropdown-item" href="#">Daily</a>
									  		<a class="dropdown-item" href="#">Weekly</a>
									  		<a class="dropdown-item" href="#">Yearly</a>
										</div>
									</div>
								</div>
							</div>
							<div class="mt-15">
								<div class="d-flex justify-content-between align-items-center fw-500">
									<h1 class="my-1 fw-500 text-white">200</h1>
									<div class="bg-primary-light w-60 h-60 rounded-circle text-center p-0 align-content-center">
										<img src="<?=$base_url?>/assets/images/svg-icon/medical/antibiotic.png">
									</div>
								</div>
								<p class="mb-0 mt-10 text-white"> <span class="badge badge-success-light badge-pill"><span class="feather-arrow-up"></span> +3% </span> Since Last Week</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxl-3 col-lg-4 col-md-6 col-12">
					<div class="box rounded-4">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<p class="m-0 fw-600">Pain Relievers</p>
								<div class="d-flex align-items-center">
									<div>
										
									</div>
									<div class="dropdown">
										<button class="btn btn-secondary bg-none btn-sm p-0 fs-20" data-bs-toggle="dropdown" href="#" aria-expanded="false"><span class="feather-more-vertical"></span></button>
										<div class="dropdown-menu dropdown-menu-end" style="">
										  	<a class="dropdown-item" href="#">Daily</a>
									  		<a class="dropdown-item" href="#">Weekly</a>
									  		<a class="dropdown-item" href="#">Yearly</a>
										</div>
									</div>
								</div>
							</div>
							<div class="mt-15">
								<div class="d-flex justify-content-between align-items-center fw-500">
									<h1 class="my-1 fw-500">70</h1>
									<div class="bg-primary-light w-60 h-60 rounded-circle text-center p-0 align-content-center">
										<img src="<?=$base_url?>/assets/images/svg-icon/medical/spray-bottle.png">
									</div>
								</div>
								<p class="mb-0 mt-10"> <span class="badge badge-danger-light badge-pill"><span class="feather-arrow-down"></span> +0.6% </span> Since Last Week</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxl-3 col-lg-4 col-md-6 col-12">
					<div class="box rounded-4">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<p class="m-0 fw-600">Vitomins &amp; Supplements</p>
								<div class="d-flex align-items-center">
									<div>
										
									</div>
									<div class="dropdown">
										<button class="btn btn-secondary bg-none btn-sm p-0 fs-20" data-bs-toggle="dropdown" href="#" aria-expanded="false"><span class="feather-more-vertical"></span></button>
										<div class="dropdown-menu dropdown-menu-end" style="">
										  	<a class="dropdown-item" href="#">Daily</a>
									  		<a class="dropdown-item" href="#">Weekly</a>
									  		<a class="dropdown-item" href="#">Yearly</a>
										</div>
									</div>
								</div>
							</div>
							<div class="mt-15">
								<div class="d-flex justify-content-between align-items-center fw-500">
									<h1 class="my-1 fw-500">90</h1>
									<div class="bg-primary-light w-60 h-60 rounded-circle text-center p-0 align-content-center">
										<img src="<?=$base_url?>/assets/images/svg-icon/medical/pills.png">
									</div>
								</div>
								<p class="mb-0 mt-10"> <span class="badge badge-success-light badge-pill"><span class="feather-arrow-up"></span> +10% </span> Since Last Week</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxl-3 col-lg-4 col-md-6 col-12">
					<div class="box rounded-4">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<p class="m-0 fw-600">Antiviral Drugs</p>
								<div class="d-flex align-items-center">
									<div>
										
									</div>
									<div class="dropdown">
										<button class="btn btn-secondary bg-none btn-sm p-0 fs-20" data-bs-toggle="dropdown" href="#" aria-expanded="false"><span class="feather-more-vertical"></span></button>
										<div class="dropdown-menu dropdown-menu-end" style="">
										  	<a class="dropdown-item" href="#">Daily</a>
									  		<a class="dropdown-item" href="#">Weekly</a>
									  		<a class="dropdown-item" href="#">Yearly</a>
										</div>
									</div>
								</div>
							</div>
							<div class="mt-15">
								<div class="d-flex justify-content-between align-items-center fw-500">
									<h1 class="my-1 fw-500">75</h1>
									<div class="bg-primary-light w-60 h-60 rounded-circle text-center p-0 align-content-center">
										<img src="<?=$base_url?>/assets/images/svg-icon/medical/drug.png">
									</div>
								</div>
								<p class="mb-0 mt-10"> <span class="badge badge-danger-light badge-pill"><span class="feather-arrow-down"></span> +2% </span> Since Last Week</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxl-3 col-lg-4 col-md-6 col-12">
					<div class="box rounded-4">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<p class="m-0 fw-600">Diabetes Care</p>
								<div class="d-flex align-items-center">
									<div>
										
									</div>
									<div class="dropdown">
										<button class="btn btn-secondary bg-none btn-sm p-0 fs-20" data-bs-toggle="dropdown" href="#" aria-expanded="false"><span class="feather-more-vertical"></span></button>
										<div class="dropdown-menu dropdown-menu-end" style="">
										  	<a class="dropdown-item" href="#">Daily</a>
									  		<a class="dropdown-item" href="#">Weekly</a>
									  		<a class="dropdown-item" href="#">Yearly</a>
										</div>
									</div>
								</div>
							</div>
							<div class="mt-15">
								<div class="d-flex justify-content-between align-items-center fw-500">
									<h1 class="my-1 fw-500">30</h1>
									<div class="bg-primary-light w-60 h-60 rounded-circle text-center p-0 align-content-center">
										<img src="<?=$base_url?>/assets/images/svg-icon/medical/insulin.png">
									</div>
								</div>
								<p class="mb-0 mt-10"> <span class="badge badge-success-light badge-pill"><span class="feather-arrow-up"></span> +10% </span> Since Last Week</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxl-3 col-lg-4 col-md-6 col-12">
					<div class="box rounded-4">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<p class="m-0 fw-600">Respiratory Medicines</p>
								<div class="d-flex align-items-center">
									<div>
										
									</div>
									<div class="dropdown">
										<button class="btn btn-secondary bg-none btn-sm p-0 fs-20" data-bs-toggle="dropdown" href="#" aria-expanded="false"><span class="feather-more-vertical"></span></button>
										<div class="dropdown-menu dropdown-menu-end" style="">
										  	<a class="dropdown-item" href="#">Daily</a>
									  		<a class="dropdown-item" href="#">Weekly</a>
									  		<a class="dropdown-item" href="#">Yearly</a>
										</div>
									</div>
								</div>
							</div>
							<div class="mt-15">
								<div class="d-flex justify-content-between align-items-center fw-500">
									<h1 class="my-1 fw-500">60</h1>
									<div class="bg-primary-light w-60 h-60 rounded-circle text-center p-0 align-content-center">
										<img src="<?=$base_url?>/assets/images/svg-icon/medical/health.png">
									</div>
								</div>
								<p class="mb-0 mt-10"> <span class="badge badge-success-light badge-pill"><span class="feather-arrow-up"></span> +10% </span> Since Last Week</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxl-3 col-lg-6 col-md-6 col-12">
					<div class="box rounded-4">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<p class="m-0 fw-600">Allergy Medication</p>
								<div class="d-flex align-items-center">
									<div>
										
									</div>
									<div class="dropdown">
										<button class="btn btn-secondary bg-none btn-sm p-0 fs-20" data-bs-toggle="dropdown" href="#" aria-expanded="false"><span class="feather-more-vertical"></span></button>
										<div class="dropdown-menu dropdown-menu-end" style="">
										  	<a class="dropdown-item" href="#">Daily</a>
									  		<a class="dropdown-item" href="#">Weekly</a>
									  		<a class="dropdown-item" href="#">Yearly</a>
										</div>
									</div>
								</div>
							</div>
							<div class="mt-15">
								<div class="d-flex justify-content-between align-items-center fw-500">
									<h1 class="my-1 fw-500">80</h1>
									<div class="bg-primary-light w-60 h-60 rounded-circle text-center p-0 align-content-center">
										<img src="<?=$base_url?>/assets/images/svg-icon/medical/medical-drops.png">
									</div>
								</div>
								<p class="mb-0 mt-10"> <span class="badge badge-success-light badge-pill"><span class="feather-arrow-up"></span> +10% </span> Since Last Week</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxl-3 col-lg-6 col-md-6 col-12">
					<div class="box rounded-4">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<p class="m-0 fw-600">Cardiovascular</p>
								<div class="d-flex align-items-center">
									<div>
										
									</div>
									<div class="dropdown">
										<button class="btn btn-secondary bg-none btn-sm p-0 fs-20" data-bs-toggle="dropdown" href="#" aria-expanded="false"><span class="feather-more-vertical"></span></button>
										<div class="dropdown-menu dropdown-menu-end" style="">
										  	<a class="dropdown-item" href="#">Daily</a>
									  		<a class="dropdown-item" href="#">Weekly</a>
									  		<a class="dropdown-item" href="#">Yearly</a>
										</div>
									</div>
								</div>
							</div>
							<div class="mt-15">
								<div class="d-flex justify-content-between align-items-center fw-500">
									<h1 class="my-1 fw-500">40</h1>
									<div class="bg-primary-light w-60 h-60 rounded-circle text-center p-0 align-content-center">
										<img src="<?=$base_url?>/assets/images/svg-icon/medical/cardiology.png">
									</div>
								</div>
								<p class="mb-0 mt-10"> <span class="badge badge-success-light badge-pill"><span class="feather-arrow-up"></span> +10% </span> Since Last Week</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxl-12 col-lg-12 col-12">
          <div class="box  printableArea">
              <div class="box-body">
                  <div class="d-flex justify-content-between">
                    <!-- <button class="btn btn-primary no-print" onclick="window.print()">Print</button> -->
                    <h3 class="box-title">Stock List</h3>
                    <!-- <button id="print2" class="btn btn-warning"  type="button"> <span><i class="fa-solid fa-print"></i> Print</span> </button> -->
                  </div>
                  <form class="form" action="<?=$base_url?>/stock" method="post">
                        <div class="box-body">
                          <!-- <h4 class="box-title text-info mb-3">Filter by Date</h4> -->
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
                              <input type="date" name="to"  class="form-control " value="<?=$stock->end?>">
                            </div>
                            </div>
                          </div>
                        
                        <div class="mb-3">
                          <button type="submit" name="submit" class="btn btn-primary ">
                            <i class="ti-save-alt"></i> Filter
                          </button>
                        </div>  
                      </form>
                  <div class="table-responsive">
                      <table class="table">
                          <thead class="bg-success">
                              <tr>
                                  <th>#</th>
                                  <th>Medicine Name</th>
                                  <th>Medicine ID</th>
                                  <th>Quantity</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              foreach ($stock->stock_report as $key => $value) {
                                  echo "<tr>
                                  <td>".($key+1)."</td>
                                  <td>$value->medicine</td>
                                  <td>$value->medicines_id</td>
                                  <td>$value->qty</td>
                              </tr>";
                              }
                              ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
				</div>
			</div>