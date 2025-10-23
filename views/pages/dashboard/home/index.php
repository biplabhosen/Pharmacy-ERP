<div class="row">
				<div class="col-xxl-6">
					<div class="row">
						<div class="col-xxl-6 col-xl-3 col-md-6 col-12">
							<div class="box rounded-4">
								<div class="box-body">
									<div class="me-10 bg-primary-light w-50 h-50 rounded-circle text-center p-0 align-content-center"><i class="feather-users fs-22"></i></div>
									<div class="mt-15">
										<p class="m-0 fw-600">Total Customers</p>
										<h1 class="my-1 fw-500"><?=Customer::count()?></h1>
										<span class="text-success fw-500"><span class="feather-arrow-up"></span> + 5.5% Since Last Week</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-6 col-xl-3 col-md-6 col-12">
							<div class="box rounded-4">
								<div class="box-body">
									<div class="me-10 bg-success-light w-50 h-50 rounded-circle text-center p-0 align-content-center"><i class="feather-box fs-22"></i></div>
									<div class="mt-15">
										<p class="m-0 fw-600">Completed Orders</p>
										<h1 class="my-1 fw-500"><?=Order::count()?></h1>
										<span class="text-success fw-500"><span class="feather-arrow-up"></span> + 4.1% Since Last Week</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-6 col-xl-3 col-md-6 col-12">
							<div class="box rounded-4">
								<div class="box-body">
									<div class="me-10 bg-warning-light w-50 h-50 rounded-circle text-center p-0 align-content-center"><img src="<?=$base_url?>/assets/images/svg-icon/medical/antibiotic.png"></div>
									<div class="mt-15">
										<p class="m-0 fw-600">Total Medicine</p>
										<h1 class="my-1 fw-500"><?=Medicine::count()?></h1>
										<span class="text-success fw-500"><span class="feather-arrow-up"></span> + 3% Since Last Week</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-6 col-xl-3 col-md-6 col-12">
							<div class="box rounded-4">
								<div class="box-body">
									<div class="me-10 bg-danger-light w-50 h-50 rounded-circle text-center p-0 align-content-center"><i class="feather-x-circle fs-22"></i></div>
									<div class="mt-15">
										<p class="m-0 fw-600">Cancelled Orders</p>
										<h1 class="my-1 fw-500">1,500</h1>
										<span class="text-success fw-500"><span class="feather-arrow-up"></span> + 2.2% Since Last Week</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-xxl-6">
					<div class="box rounded-4">
						<div class="box-header with-border d-flex justify-content-between align-items-center">
							<h3 class="fw-600 m-0">User Reviews</h3>
							<h5 class="m-0 hover-primary">All Reviews <span class="feather-arrow-right fs-14"></span></h5>
						</div>
						<div class="box-body">
							<div class="review-box">
								<div class="mb-30">
									<div class="d-flex align-items-center">
										<div class="me-15 bg-lightest h-50 w-50 l-h-50 rounded text-center">
											  <img src="<?=$base_url?>/assets/images/svg-icon/medical/m1.png" class="img-fluid rounded" alt="">
										</div>
										<div class="d-flex flex-column flex-grow-1 me-2 fw-500">
											<a href="#" class="text-dark hover-primary mb-1 fs-16">Freqlinty Alooe</a>
											<span class="text-fade text-warning">4.5 
												<i class="mdi mdi-star"></i>
												<i class="mdi mdi-star"></i>
												<i class="mdi mdi-star"></i>
												<i class="mdi mdi-star"></i>
												<i class="mdi mdi-star-half"></i>
											</span>
										</div>
									</div>
									<p class="text-muted mb-0 pt-10">
										Neque porro quisquam est qui doSimple text quia dolor sit amet, consectetur, adipisci velit...
									</p>
								</div>
								<div class="mb-30">
									<div class="d-flex align-items-center">
										<div class="me-15 bg-lightest h-50 w-50 l-h-50 rounded text-center">
											  <img src="<?=$base_url?>/assets/images/svg-icon/medical/m2.png" class="img-fluid rounded" alt="">
										</div>
										<div class="d-flex flex-column flex-grow-1 me-2 fw-500">
											<a href="#" class="text-dark hover-danger mb-1 fs-16">Lifitect Dospais</a>
											<span class="text-fade text-warning">4.5 
												<i class="mdi mdi-star"></i>
												<i class="mdi mdi-star"></i>
												<i class="mdi mdi-star"></i>
												<i class="mdi mdi-star"></i>
												<i class="mdi mdi-star-half"></i>
											</span>
										</div>
									</div>
									<p class="text-muted mb-0 pt-10">
										Neque porro quisquam est qui doSimple text quia dolor sit amet, consectetur, adipisci velit...
									</p>
								</div>
								<div class="mb-0">
									<div class="d-flex align-items-center">
										<div class="me-15 bg-lightest h-50 w-50 l-h-50 rounded text-center">
											  <img src="<?=$base_url?>/assets/images/svg-icon/medical/m3.png" class="img-fluid rounded" alt="">
										</div>
										<div class="d-flex flex-column flex-grow-1 me-2 fw-500">
											<a href="#" class="text-dark hover-success mb-1 fs-16">Rarlie Mebcream</a>
											<span class="text-fade text-warning">4.5 
												<i class="mdi mdi-star"></i>
												<i class="mdi mdi-star"></i>
												<i class="mdi mdi-star"></i>
												<i class="mdi mdi-star"></i>
												<i class="mdi mdi-star-half"></i>
											</span>
										</div>
									</div>
									<p class="text-muted mb-0 pt-10">
										Neque porro quisquam est qui doSimple text quia dolor sit amet, consectetur, adipisci velit...
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxl-8">
					<div class="row">
						<div class="col-lg-4">
							<div class="box rounded-4">
								<div class="box-body last-weekchart">
									<h3 class="box-title fw-600 m-0">Delivery Rate</h3>
									<div id="delivery-chart"></div>
									<div class="text-center"><span class="text-success fw-500"><span class="feather-arrow-up"></span> + 5.5% Since Last Week</span></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="box rounded-4">
								<div class="box-body last-weekchart">
									<h3 class="box-title fw-600 m-0">Return Rate</h3>
									<div id="return-chart"></div>
									<div class="text-center"><span class="text-danger fw-500"><span class="feather-arrow-down"></span> + 5.5% Since Last Week</span></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="box rounded-4">
								<div class="box-body last-weekchart">
									<h3 class="box-title fw-600 m-0">Cancel Rate</h3>
									<div id="cancel-chart"></div>
									<div class="text-center"><span class="text-danger fw-500"><span class="feather-arrow-down"></span> + 5.5% Since Last Week</span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxl-4 col-lg-12">
					<div class="box rounded-4 b-1">
						<div class="box-header b-0 pb-0 d-flex justify-content-between align-items-center">
							<div>
								<h5 class="fw-600 mt-0 mb-5">Total Revenue</h5>
								<h2 class="m-0 fw-500">$1,05,455.86</h2>
							</div>
							<div class="dropdown">
								<button class="btn btn-secondary btn-outline btn-sm rounded-pill dropdown-toggle" data-bs-toggle="dropdown" href="#" aria-expanded="false"> Today	</button>
								<div class="dropdown-menu dropdown-menu-end" style="">
								  	<a class="dropdown-item" href="#">Daily</a>
							  		<a class="dropdown-item" href="#">This Weekly</a>
							  		<a class="dropdown-item" href="#">This Yearly</a>
								</div>
							</div>
						</div>
						<div class="box-body pb-10 pt-0 ps-10">
							<div id="chart-revenue"></div>
						</div>
					</div>
				</div>
				<div class="col-xxl-7 col-lg-6">
					<div class="box rounded-4 b-1">
						<div class="box-header b-0 pb-0 d-flex justify-content-between align-items-center">
							<h3 class="fw-600 m-0">Sales Analytics</h3>
							<div class="dropdown">
								<button class="btn btn-secondary btn-outline btn-sm rounded-pill dropdown-toggle" data-bs-toggle="dropdown" href="#" aria-expanded="false"> 7 Year</button>
								<div class="dropdown-menu dropdown-menu-end" style="">
									<a class="dropdown-item" href="#">5 Year</a>
								  	<a class="dropdown-item" href="#">5 Year</a>
								  	<a class="dropdown-item" href="#">5 Year</a>
								</div>
							</div>
						</div>
						<div class="box-body">
							<div id="sale-container"></div>
						</div>
					</div>
				</div>				
				<div class="col-xxl-5 col-lg-6 col-12">
				    <div class="box rounded-4">
				        <div class="box-header no-border">
				            <h3 class="fw-600 m-0">Top Selling Products</h3>
				        </div>
				        <div class="box-body p-0">
				            <div class="media-list media-list-hover">
				                <div class="media py-10">
				                    <a class="align-self-center me-0 ms-10" href="#"><img class="avatar avatar-lg bg-success-light rounded" src="<?=$base_url?>/assets/images/svg-icon/medical/m1.png" alt="..."></a>
				                    <div class="media-body fw-500">
				                        <p>
				                            <a class="hover-success" href="#"><strong>Freqlinty Alooe</strong></a>
				                            <span class="float-end text-fade">$356</span>
				                        </p>
				                        <p class="text-fade">350 Sold</p>
				                    </div>
				                </div>
				                <div class="media py-10">
				                    <a class="align-self-center me-0 ms-10" href="#"><img class="avatar avatar-lg bg-success-light rounded" src="<?=$base_url?>/assets/images/svg-icon/medical/m2.png" alt="..."></a>
				                    <div class="media-body">
				                        <p>
				                            <a class="hover-success" href="#"><strong>Lifitect Dospais</strong></a>
				                            <span class="float-end">$266</span>
				                        </p>
				                        <p class="text-fade">145 Sold</p>
				                    </div>
				                </div>
				                <div class="media py-10">
				                    <a class="align-self-center me-0 ms-10" href="#"><img class="avatar avatar-lg bg-success-light rounded" src="<?=$base_url?>/assets/images/svg-icon/medical/m3.png" alt="..."></a>
				                    <div class="media-body">
				                        <p>
				                            <a class="hover-success" href="#"><strong>Rarlie Mebcream</strong></a>
				                            <span class="float-end">$154</span>
				                        </p>
				                        <p class="text-fade">256 Sold</p>
				                    </div>
				                </div>
				                <div class="media py-10">
				                    <a class="align-self-center me-0 ms-10" href="#"><img class="avatar avatar-lg bg-success-light rounded" src="<?=$base_url?>/assets/images/svg-icon/medical/m4.png" alt="..."></a>
				                    <div class="media-body">
				                        <p>
				                            <a class="hover-success" href="#"><strong>Sin Fard</strong></a>
				                            <span class="float-end">$568</span>
				                        </p>
				                        <p class="text-fade">365 Sold</p>
				                    </div>
				                </div>
				                <div class="media py-10">
				                    <a class="align-self-center me-0 ms-10" href="#"><img class="avatar avatar-lg bg-success-light rounded" src="<?=$base_url?>/assets/images/svg-icon/medical/m5.png" alt="..."></a>
				                    <div class="media-body">
				                        <p>
				                            <a class="hover-success" href="#"><strong>Orlarice</strong></a>
				                            <span class="float-end">$365</span>
				                        </p>
				                        <p class="text-fade">456	 Sold</p>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
				<div class="col-xxl-12 col-lg-12 col-12">
				    <div class="box rounded-4 b-1">
				        <div class="box-header no-border pb-0 d-flex justify-content-between align-items-center">
				            <h3 class="fw-600 m-0">Transaction Overview</h3>
				            <h5 class="m-0 hover-primary">Export <span class="feather-download fs-14"></span></h5>
				        </div>
				        <div class="box-body">
				        	<div class="table-responsive">
					        	<table id="example-trn" class="table table-hover rounded-4 overflow-hidden b-1 text-nowrap">
									<thead class="bg-light mt-5">
									    <tr>
									        <th>Order ID</th>
									        <th>Customer Name</th>
									        <th>Order Date</th>
									        <th>Product Ordered</th>
									        <th>Total Price</th>
									        <th>Transaction ID</th>
									        <th>Order Status</th>
									        <th>Action</th>
									    </tr>
									</thead>
									<tbody>
									    <tr>
									        <td>#ORD121</td>
									        <td>Jhon</td>
									        <td>27/08/25</td>
									        <td>Nullacin (10)</td>
									        <td>$50</td>
									        <td>#TX121</td>
									        <td><span class="badge badge-pill badge-success-light">Completed</span></td>
									        <td>
				                            	<a href="#" class="text-dark"><i class="feather-eye fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="feather-trash-2 fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="fa fa-share fs-20" aria-hidden="true"></i></a>
				                            </td>
									    </tr>
									    <tr>
									        <td>#ORD122</td>
									        <td>Emily</td>
									        <td>26/08/25</td>
									        <td>Theralief (4)</td>
									        <td>$20</td>
									        <td>#TX122</td>
									        <td><span class="badge badge-pill badge-warning-light">In progress</span></td>
									        <td>
				                            	<a href="#" class="text-dark"><i class="feather-eye fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="feather-trash-2 fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="fa fa-share fs-20" aria-hidden="true"></i></a>
				                            </td>
									    </tr>
									    <tr>
									        <td>#ORD123</td>
									        <td>Michael</td>
									        <td>26/08/25</td>
									        <td>CP-0004 (4)</td>
									        <td>$10</td>
									        <td>#TX123</td>
									        <td><span class="badge badge-pill badge-warning-light">Pending</span></td>
									        <td>
				                            	<a href="#" class="text-dark"><i class="feather-eye fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="feather-trash-2 fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="fa fa-share fs-20" aria-hidden="true"></i></a>
				                            </td>
									    </tr>
									    <tr>
									        <td>#ORD124</td>
									        <td>Brown</td>
									        <td>26/08/25</td>
									        <td>Medicanox (4)</td>
									        <td>$20</td>
									        <td>#TX124</td>
									        <td><span class="badge badge-pill badge-success-light">Completed</span></td>
									        <td>
				                            	<a href="#" class="text-dark"><i class="feather-eye fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="feather-trash-2 fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="fa fa-share fs-20" aria-hidden="true"></i></a>
				                            </td>
									    </tr>
									    <tr>
									        <td>#ORD125</td>
									        <td>Lisa</td>
									        <td>25/08/25</td>
									        <td>INV-251 (4)</td>
									        <td>$8</td>
									        <td>#TX125</td>
									        <td><span class="badge badge-pill badge-danger-light">Cancelled</span></td>
									        <td>
				                            	<a href="#" class="text-dark"><i class="feather-eye fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="feather-trash-2 fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="fa fa-share fs-20" aria-hidden="true"></i></a>
				                            </td>
									    </tr>
									    <tr>
									        <td>#ORD126</td>
									        <td>Paul</td>
									        <td>24/08/25</td>
									        <td>Simupril (4)</td>
									        <td>$32</td>
									        <td>#TX126</td>
									        <td><span class="badge badge-pill badge-success-light">Completed</span></td>
									        <td>
				                            	<a href="#" class="text-dark"><i class="feather-eye fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="feather-trash-2 fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="fa fa-share fs-20" aria-hidden="true"></i></a>
				                            </td>
									    </tr>
									    <tr>
									        <td>#ORD127</td>
									        <td>Martinez</td>
									        <td>23/08/25</td>
									        <td>CP-0004 (4)</td>
									        <td>$12</td>
									        <td>#TX127</td>
									        <td><span class="badge badge-pill badge-success-light">Completed</span></td>
									        <td>
				                            	<a href="#" class="text-dark"><i class="feather-eye fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="feather-trash-2 fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="fa fa-share fs-20" aria-hidden="true"></i></a>
				                            </td>
									    </tr>
									    <tr>
									        <td>#ORD128</td>
									        <td>Wiliams</td>
									        <td>23/08/25</td>
									        <td>Simupril (5)</td>
									        <td>$5</td>
									        <td>#TX128</td>
									        <td><span class="badge badge-pill badge-success-light">Completed</span></td>
									        <td>
				                            	<a href="#" class="text-dark"><i class="feather-eye fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="feather-trash-2 fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="fa fa-share fs-20" aria-hidden="true"></i></a>
				                            </td>
									    </tr>
									    <tr>
									        <td>#ORD129</td>
									        <td>Moore</td>
									        <td>22/08/25</td>
									        <td>Theralief (14)</td>
									        <td>$56</td>
									        <td>#TX129</td>
									        <td><span class="badge badge-pill badge-success-light">Completed</span></td>
									        <td>
				                            	<a href="#" class="text-dark"><i class="feather-eye fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="feather-trash-2 fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="fa fa-share fs-20" aria-hidden="true"></i></a>
				                            </td>
									    </tr>
									    <tr>
									        <td>#ORD130</td>
									        <td>Jhon</td>
									        <td>21/08/25</td>
									        <td>Simupril (9)</td>
									        <td>$10</td>
									        <td>#TX130</td>
									        <td><span class="badge badge-pill badge-success-light">Completed</span></td>
									        <td>
				                            	<a href="#" class="text-dark"><i class="feather-eye fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="feather-trash-2 fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="fa fa-share fs-20" aria-hidden="true"></i></a>
				                            </td>
									    </tr>
									    <tr>
									        <td>#ORD131</td>
									        <td>Anna Taylor</td>
									        <td>21/08/25</td>
									        <td>Medicanox (10)</td>
									        <td>$25</td>
									        <td>#TX131</td>
									        <td><span class="badge badge-pill badge-success-light">Completed</span></td>
									        <td>
				                            	<a href="#" class="text-dark"><i class="feather-eye fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="feather-trash-2 fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="fa fa-share fs-20" aria-hidden="true"></i></a>
				                            </td>
									    </tr>
									    <tr>
									        <td>#ORD132</td>
									        <td>Wiliams</td>
									        <td>20/08/25</td>
									        <td>Nullacin(5)</td>
									        <td>$36</td>
									        <td>#TX132</td>
									        <td><span class="badge badge-pill badge-danger-light">Cancelled</span></td>
									        <td>
				                            	<a href="#" class="text-dark"><i class="feather-eye fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="feather-trash-2 fs-20 me-5" aria-hidden="true"></i></a>
				                            	<a href="#" class="text-dark"><i class="fa fa-share fs-20" aria-hidden="true"></i></a>
				                            </td>
									    </tr>
									</tbody>
								</table>
							</div>
				        </div>
				    </div>
				</div>
			</div>