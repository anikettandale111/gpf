@extends('Section.app')

@section('content')
<div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="main-header">
							<div class="left_header">
							<h2>डॅशबोर्ड</h2>
							<p>भविष्य निर्वाह निधी  मध्ये आपले स्वागत आहे.</p>
							</div>
							<div class="left_header ml-auto">
								<form><label for="yearChage">वर्ष बदला</label><select id="yearChage" name="yearChage" class="form-control"><option value="2020-2021">2020-2021</option><option value="2019-2020">2019-2020</option><option value="2018-2019">2018-2019</option></select></form>
							</div>
						</div>

						<div class="row">
                            <div class="col-12 col-md-12 col-lg-12 five_coloms mb-3">
						<div class="row">
                            <div class="col-md-4 col-xl-3">
                                <div class="card widget-content">
                                    <a href="#" data-toggle="modal" data-target="#" class="widget-content-wrapper">
										<div class="widget-content-icon"><img src="assets/images/taluka_icon.png"></div>
                                        <div class="widget-content-left">
                                            <div class="widget-numbers"><span>40</span></div>
                                            <!-- <div class="widget-subheading">Last year expenses</div> -->
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-heading">एकूण तालुके</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-xl-3">
                                <div class="card widget-content">
                                    <a href="#" data-toggle="modal" data-target="#" class="widget-content-wrapper">
										<div class="widget-content-icon"><img src="assets/images/department_icon.png"></div>
                                        <div class="widget-content-left">
                                            <div class="widget-numbers"><span>405</span></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-heading">एकूण विभाग</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-xl-3">
                                <div class="card widget-content">
                                    <a href="#" data-toggle="modal" data-target="#" class="widget-content-wrapper">
										<div class="widget-content-icon"><img src="assets/images/employees.png"></div>
                                        <div class="widget-content-left">
                                            <div class="widget-numbers"><span>40000</span></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-heading">एकूण कर्मचारी संख्या</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card widget-content">
                                    <a href="#" data-toggle="modal" data-target="#" class="widget-content-wrapper">
										<div class="widget-content-icon"><img src="assets/images/zp_officer.png"></div>
                                        <div class="widget-content-left">
                                            <div class="widget-numbers"><span>24050</span></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-heading">जिल्हा परिषद कर्मचारी संख्या</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card widget-content">
                                    <a href="#" data-toggle="modal" data-target="#" class="widget-content-wrapper">
										<div class="widget-content-icon"><img src="assets/images/teacher.png"></div>
                                        <div class="widget-content-left">
                                            <div class="widget-numbers"><span>15950</span></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-heading">शिक्षक संख्या</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="row">
							<div class="col-md-12">
								<div class="card mb-4">
									<div class="card-body">
										<div class="d-flex">
											<div class="total_amt">
												<a href="#" data-toggle="modal" data-target="#" class="widget-content-wrapper">
													<div class="widget-content-icon"><img src="assets/images/fund_icon.png"></div>
													<div class="widget-content-left">
														<div class="widget-numbers"><span><i class="fas fa-rupee-sign"></i>15950</span></div>
													</div>
													<div class="widget-content-right">
														<div class="widget-heading"><b>एकूण जमा निधी</b></div>
													</div>
												</a>
											</div>
											<div class="ml-auto right-brn align-self-center"><a href="#" class="btn btn-main"><i class="fas fa-cloud-download-alt"></i> Download Report</a></div>
										</div>
										<div class="row">
											<div class="col-lg-7 col-xl-8">
												<div class="bg-blocks">
													<div class="row">
														<div class="col-md-4">
															<h2 class="number"><i class="fas fa-rupee-sign"></i>46,690</h2>
															<p class="block-heading">एकूण जमा व्याज</p>
														</div>
														<div class="col-md-4">
															<h2 class="number"><i class="fas fa-rupee-sign"></i>46,690</h2>
															<p class="block-heading">एकूण निधी</p>
														</div>
														<div class="col-md-4">
															<h2 class="number"><i class="fas fa-rupee-sign"></i>46,690</h2>
															<p class="block-heading">एकूण अग्रीम</p>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-5 col-xl-4 overallLineChart"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
												<canvas id="overall-anylatic" width="455" height="283" class="chartjs-render-monitor" style="display: block; height: 227px; width: 364px;"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="d-flex">
							<h2 class="heading">वार्षिक गोषवारा</h2>
							<div class="ml-auto right-brn align-self-center"><a href="#" class="btn btn-main"><i class="fas fa-cloud-download-alt"></i> Download Report</a></div>
						</div>
						<div class="row">
							<div class="col-12 col-md-12 col-lg-8 five_coloms mb-3 return_blocks">
						<div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card widget-content">
                                    <a href="#" data-toggle="modal" data-target="#" class="widget-content-wrapper">
										<div class="widget-content-icon"><i class="fas fa-wallet"></i></div>
                                        <div class="widget-content-left">
                                            <div class="widget-numbers"><span>40</span></div>
                                            <!-- <div class="widget-subheading">Last year expenses</div> -->
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-heading">अपेक्षित जमा</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card widget-content">
                                    <a href="#" data-toggle="modal" data-target="#" class="widget-content-wrapper">
										<div class="widget-content-icon"><i class="fas fa-wallet"></i></div>
                                        <div class="widget-content-left">
                                            <div class="widget-numbers"><span>405</span></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-heading">आतापर्यंत जमा निधी</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-xl-4">
                                <div class="card widget-content">
                                    <a href="#" data-toggle="modal" data-target="#" class="widget-content-wrapper">
										<div class="widget-content-icon"><i class="fas fa-wallet"></i></div>
                                        <div class="widget-content-left">
                                            <div class="widget-numbers"><span>40000</span></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-heading">अपेक्षित अग्रीम परतावा</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card widget-content">
                                    <a href="#" data-toggle="modal" data-target="#" class="widget-content-wrapper">
										<div class="widget-content-icon"><i class="fas fa-wallet"></i></div>
                                        <div class="widget-content-left">
                                            <div class="widget-numbers"><span>24050</span></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-heading">आतापर्यंत प्राप्त परतावा</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card widget-content">
                                    <a href="#" data-toggle="modal" data-target="#" class="widget-content-wrapper">
										<div class="widget-content-icon"><i class="fas fa-wallet"></i></div>
                                        <div class="widget-content-left">
                                            <div class="widget-numbers"><span>15950</span></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-heading">ना परतावा </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card widget-content">
                                    <a href="#" data-toggle="modal" data-target="#" class="widget-content-wrapper">
										<div class="widget-content-icon"><i class="fas fa-wallet"></i></div>
                                        <div class="widget-content-left">
                                            <div class="widget-numbers"><span>15950</span></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-heading">अंतिम परतावा</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
							<div class="col-md-6 col-xl-6">
                                <div class="card widget-content bg-primary text-white">
                                    <a href="#" data-toggle="modal" data-target="#" class="widget-content-wrapper">
										<div class="widget-content-icon bg-transparent text-white no-shadow"><i class="fas fa-folder-open"></i></div>
                                        <div class="widget-content-left">
                                            <div class="widget-numbers text-white"><span>15950</span></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-heading text-white">अंतिम परतावा प्रकरणे </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <div class="card widget-content bg-warning">
                                    <a href="#" data-toggle="modal" data-target="#" class="widget-content-wrapper">
										<div class="widget-content-icon bg-transparent text-white no-shadow"><i class="fas fa-folder-open"></i></div>
                                        <div class="widget-content-left">
                                            <div class="widget-numbers text-white"><span>15950</span></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-heading text-white">नापरतावा प्रकरणे </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-12 col-lg-4 pie mb-3"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
							<canvas id="year-analytic" width="471" height="328" class="chartjs-render-monitor" style="display: block; height: 263px; width: 377px;"></canvas>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">
										<h2 class="heading">मासिक गोषवारा</h2>
										<div class="ml-auto right-brn align-self-center"><a href="#" class="btn btn-main"><i class="fas fa-cloud-download-alt"></i> Download Report</a></div>
                                    </div>
									<div class="card-body">
									<div id="exTab1" class="fluid-container tabs">
										<ul class="nav nav-pills">
											<li class="active"><a href="#1a" data-toggle="tab">This Month</a></li>
											<li><a href="#2a" data-toggle="tab">Last Month</a></li>
										</ul>

										<div class="tab-content clearfix">
											<div class="tab-pane active" id="1a">
												<div class="row">
													<div class="col-12">
														<div class="row normal-blocks-wrapper">
															<div class="col-12 col-md-6 col-lg-3">
																<a href="month_listing.html" class="card border-primary normal-blocks">
																	<h2 class="number text-primary"><i class="fas fa-rupee-sign"></i>46,690</h2>
																	<p class="block-heading">अपेक्षित जमा</p>
																</a>
															</div>
															<div class="col-12 col-md-6 col-lg-3">
																<a href="month_listing.html" class="card border-success normal-blocks">
																	<h2 class="number text-success"><i class="fas fa-rupee-sign"></i>46,690</h2>
																	<p class="block-heading">आतापर्यंत जमा निधी</p>
																</a>
															</div>
															<div class="col-12 col-md-6 col-lg-3">
																<a href="month_listing.html" class="card border-warning normal-blocks">
																	<h2 class="number text-warning"><i class="fas fa-rupee-sign"></i>46,690</h2>
																	<p class="block-heading">अपेक्षित अग्रीम परतावा</p>
																</a>
															</div>
															<div class="col-12 col-md-6 col-lg-3">
																<a href="month_listing.html" class="card border-info normal-blocks">
																	<h2 class="number text-info"><i class="fas fa-rupee-sign"></i>46,690</h2>
																	<p class="block-heading">आतापर्यंत प्राप्त परतावा</p>
																</a>
															</div>
														</div>
														<div class="bg-blocks">
															<div class="row">
																<a href="working_employee_listing.html" class="col-md-4">
																	<h2 class="number">46,690</h2>
																	<p class="block-heading">कार्यरत कर्मचारी संख्या</p>
																</a>
																<a href="repayment_employee_listing.html" class="col-md-4">
																	<h2 class="number">46,690</h2>
																	<p class="block-heading">निधी जमा केलेली कर्मचारी संख्या </p>
																</a>
																<a href="nopayment_employee_listing.html" class="col-md-4">
																	<h2 class="number">46,690</h2>
																	<p class="block-heading">निधी जमा न झालेली कर्मचारी संख्या</p>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="2a">
												<div class="row">
													<div class="col-12">
														<div class="row normal-blocks-wrapper">
															<div class="col-12 col-md-6 col-lg-3">
																<a href="month_listing.html" class="card border-primary normal-blocks">
																	<h2 class="number text-primary"><i class="fas fa-rupee-sign"></i>46,690</h2>
																	<p class="block-heading">अपेक्षित जमा</p>
																</a>
															</div>
															<div class="col-12 col-md-6 col-lg-3">
																<a href="month_listing.html" class="card border-success normal-blocks">
																	<h2 class="number text-success"><i class="fas fa-rupee-sign"></i>46,690</h2>
																	<p class="block-heading">आतापर्यंत जमा निधी</p>
																</a>
															</div>
															<div class="col-12 col-md-6 col-lg-3">
																<a href="month_listing.html" class="card border-warning normal-blocks">
																	<h2 class="number text-warning"><i class="fas fa-rupee-sign"></i>46,690</h2>
																	<p class="block-heading">अपेक्षित अग्रीम परतावा</p>
																</a>
															</div>
															<div class="col-12 col-md-6 col-lg-3">
																<a href="month_listing.html" class="card border-info normal-blocks">
																	<h2 class="number text-info"><i class="fas fa-rupee-sign"></i>46,690</h2>
																	<p class="block-heading">आतापर्यंत प्राप्त परतावा</p>
																</a>
															</div>
														</div>
														<div class="bg-blocks">
															<div class="row">
																<div class="col-md-4">
																	<h2 class="number">46,690</h2>
																	<p class="block-heading">कार्यरत कर्मचारी संख्या</p>
																</div>
																<div class="col-md-4">
																	<h2 class="number">46,690</h2>
																	<p class="block-heading">निधी जमा केलेली कर्मचारी संख्या </p>
																</div>
																<div class="col-md-4">
																	<h2 class="number">46,690</h2>
																	<p class="block-heading">निधी जमा न झालेली कर्मचारी संख्या</p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
									</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
							<div class="col-12 col-md-12 col-lg-12">
								<div class="card mb-4">
							<div class="card-header-tab card-header">
								<div class="card-header-title">
									तालुका निहाय मासिक गोषवारा
								</div>
							</div>
							<div class="card-body">
								<div id="talukaFund" class="fluid-container tabs with_bg">
									<ul class="nav nav-pills">
										<li class="active"><a href="#zpOfficer" data-toggle="tab">जिल्हा परिषद कर्मचारी</a></li>
										<li><a href="#zpTeacher" data-toggle="tab">जिल्हा परिषद शिक्षक</a></li>
									</ul>

									<div class="tab-content clearfix">
										<div class="tab-pane active" id="zpOfficer">
											<div class="tbl-sticky" style="max-height:370px;">
											  <table class="table table-hover">
												<thead>
												  <tr>
													<th scope="col">तालुका</th>
													<th scope="col"> पंचायत समिती</th>
													<th scope="col">कर्मचारी संख्या</th>
													<th scope="col">अपेक्षित जमा</th>
													<th scope="col">आतापर्यंत जमा निधी</th>
													<th scope="col">अपेक्षित अग्रीम परतावा</th>
													<th scope="col">आतापर्यंत प्राप्त परतावा</th>
													<th scope="col">निधी जमा केलेली कर्मचारी संख्या</th>
													<th scope="col">निधी जमा न झालेली कर्मचारी संख्या</th>
												  </tr>
												</thead>
												<tbody>
													<tr>
														<td>नाशिक</td>
														<td>नाशिक पंचायत समिती</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>त्र्यंबकेश्वर</td>
														<td>त्र्यंबकेश्वर पंचायत समिती</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>इगतपुरी</td>
														<td>इगतपुरी पंचायत समिती</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>पेठ</td>
														<td>पेठ पंचायत समिती</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>दिडोरी</td>
														<td>दिडोरी पंचायत समिती</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>कळवण</td>
														<td>कळवण पंचायत समिती</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>देवळा</td>
														<td>देवळा पंचायत समिती</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>सटाणा</td>
														<td>सटाणा पंचायत समिती</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>सुरगाणा</td>
														<td>सुरगाणा पंचायत समिती</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>निफाड</td>
														<td>निफाड पंचायत समिती</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>येवला</td>
														<td>येवला पंचायत समिती</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>सिन्नर</td>
														<td>सिन्नर पंचायत समिती</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>मालेगाव</td>
														<td>मालेगाव पंचायत समिती</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>नांदगाव</td>
														<td>नांदगाव पंचायत समिती</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>चांदवड</td>
														<td>चांदवड पंचायत समिती</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
												</tbody>
											  </table>
											</div>
										</div>

										<div class="tab-pane" id="zpTeacher">
											<div class="tbl-sticky" style="max-height:370px;">
											  <table class="table table-hover">
												<thead>
												  <tr>
													<th scope="col">तालुका</th>
													<th scope="col"> पंचायत समिती</th>
													<th scope="col">कर्मचारी संख्या</th>
													<th scope="col">अपेक्षित जमा</th>
													<th scope="col">आतापर्यंत जमा निधी</th>
													<th scope="col">अपेक्षित अग्रीम परतावा</th>
													<th scope="col">आतापर्यंत प्राप्त परतावा</th>
													<th scope="col">निधी जमा केलेली कर्मचारी संख्या</th>
													<th scope="col">निधी जमा न झालेली कर्मचारी संख्या</th>
												  </tr>
												</thead>
												<tbody>
													<tr>
														<td>नाशिक</td>
														<td>नाशिक पंचायत समिती</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>त्र्यंबकेश्वर</td>
														<td>त्र्यंबकेश्वर पंचायत समिती</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>इगतपुरी</td>
														<td>इगतपुरी पंचायत समिती</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>पेठ</td>
														<td>पेठ पंचायत समिती</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>दिडोरी</td>
														<td>दिडोरी पंचायत समिती</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>कळवण</td>
														<td>कळवण पंचायत समिती</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>देवळा</td>
														<td>देवळा पंचायत समिती</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>सटाणा</td>
														<td>सटाणा पंचायत समिती</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>सुरगाणा</td>
														<td>सुरगाणा पंचायत समिती</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>निफाड</td>
														<td>निफाड पंचायत समिती</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>येवला</td>
														<td>येवला पंचायत समिती</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>सिन्नर</td>
														<td>सिन्नर पंचायत समिती</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>मालेगाव</td>
														<td>मालेगाव पंचायत समिती</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>नांदगाव</td>
														<td>नांदगाव पंचायत समिती</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>चांदवड</td>
														<td>चांदवड पंचायत समिती</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
												</tbody>
											  </table>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>

                        </div>


						<div class="col-12 col-md-12 col-lg-12">
								<div class="card mb-4">
							<div class="card-header-tab card-header">
								<div class="card-header-title">
									विभाग निहाय मासिक गोषवारा
								</div>
							</div>
							<div class="card-body">
								<div id="DepartmentFund" class="fluid-container tabs with_bg">
									<ul class="nav nav-pills">
										<li class="active"><a href="#dzpOfficer" data-toggle="tab">जिल्हा परिषद कर्मचारी</a></li>
										<li><a href="#dzpTeacher" data-toggle="tab">जिल्हा परिषद शिक्षक</a></li>
									</ul>

									<div class="tab-content clearfix">
										<div class="tab-pane active" id="dzpOfficer">
											<div class="tbl-sticky" style="max-height:370px;">
											  <table class="table table-hover">
												<thead>
												  <tr>
													<th scope="col">विभाग</th>
													<th scope="col">कर्मचारी संख्या</th>
													<th scope="col">अपेक्षित जमा</th>
													<th scope="col">आतापर्यंत जमा निधी</th>
													<th scope="col">अपेक्षित अग्रीम परतावा</th>
													<th scope="col">आतापर्यंत प्राप्त परतावा</th>
													<th scope="col">निधी जमा केलेली कर्मचारी संख्या</th>
													<th scope="col">निधी जमा न झालेली कर्मचारी संख्या</th>
												  </tr>
												</thead>
												<tbody>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1000</a></td>
														<td>450600</td>
														<td>400000</td>
														<td>44000</td>
														<td>444000</td>
														<td>850</td>
														<td>150</td>
													</tr>
												</tbody>
											  </table>
											</div>
										</div>

										<div class="tab-pane" id="dzpTeacher">
											<div class="tbl-sticky" style="max-height:370px;">
											  <table class="table table-hover">
												<thead>
												  <tr>
													<th scope="col">विभाग</th>
													<th scope="col">कर्मचारी संख्या</th>
													<th scope="col">अपेक्षित जमा</th>
													<th scope="col">आतापर्यंत जमा निधी</th>
													<th scope="col">अपेक्षित अग्रीम परतावा</th>
													<th scope="col">आतापर्यंत प्राप्त परतावा</th>
													<th scope="col">निधी जमा केलेली कर्मचारी संख्या</th>
													<th scope="col">निधी जमा न झालेली कर्मचारी संख्या</th>
												  </tr>
												</thead>
												<tbody>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
													<tr>
														<td>विभाग</td>
														<td><a href="employee_list.html">1350</a></td>
														<td>1050600</td>
														<td>1000000</td>
														<td>50000</td>
														<td>1050000</td>
														<td>1200</td>
														<td>150</td>
													</tr>
												</tbody>
											  </table>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>

                        </div>


					</div>
                    <div class="app-wrapper-footer">
                        <div class="app-footer">
                            <div class="app-footer__inner">
                                <div class="app-footer-left">
                                    © 2021. All rights reserved.
                                </div>
                            </div>
                        </div>
                    </div>    </div>
        </div>

@endsection
