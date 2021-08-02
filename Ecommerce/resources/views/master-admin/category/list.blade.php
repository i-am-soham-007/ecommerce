<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ URL::asset('master-admin/assets/images/favicon-32x32.png') }}" type="image/png" />
	<!--plugins-->
	<link href="{{ URL::asset('master-admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
	<link href="{{ URL::asset('master-admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ URL::asset('master-admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ URL::asset('master-admin/assets/plugins/metismenu/css/metisMenu.min.css')}} " rel="stylesheet" />
	<!-- loader-->
	<link href="{{ URL::asset('master-admin/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ URL::asset('master-admin/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ URL::asset('master-admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{ URL::asset('master-admin/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('master-admin/assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ URL::asset('master-admin/assets/css/dark-theme.css') }}"/>
	<link rel="stylesheet" href="{{ URL::asset('master-admin/assets/css/semi-dark.css') }}"/>
	<link rel="stylesheet" href="{{ URL::asset('master-admin/assets/css/header-colors.css') }}"/>
    <link href="{{ URL::asset('master-admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
		<!-- Sweet Alert-->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<title>Admin </title>
</head>


<body>
	<!--wrapper-->
	<div class="wrapper">
        @include('master-admin.include.sidebar')
        @include('master-admin.include.header')
        <!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

                <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Categories</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">list</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                        <a href="{{ url('admin/add-edit-category')}}" class="btn btn-block btn-success" style="width:150px;float: right;display:inline-block;"><i class="fa fa-plus"></i> New Categoy</a>
                        </div>

                        @if(Session::has('error'))
							   <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:10px">
								 {{Session::get('error')}}
								 <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span>
								</button>
							   </div>
							   @endif
							   @if(Session::has('success'))
							   <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top:10px">
								 {{Session::get('success')}}
								 <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span>
								</button>
							   </div>
							   @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
										<th>Categoy</th>
                                        <th>Url</th>
                                        <th>Status</th>
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($category as $clist)
                                    <tr>
                                        <td>{{ $clist->id }}</td>
										<td>{{ $clist->category_name }}</td>
                                        <td>{{ $clist->url }}</td>
                                        <td>
                                            @if($clist->status ==1)
                                            	<a class="updateCategoryStatus" id="category-{{ $clist->id }}" category_id ="{{ $clist->id }}" href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
											@else 
                                            	<a class="updateCategoryStatus" id="category-{{ $category->id }}"  category_id ="{{ $clist->id }}" href="javascript:void(0)"><i class="fa fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
											@endif
                                        </td>
										<td>
											<a href="{{ url('admin/add-edit-category/'.$clist->id) }}" class="">Edit</a>
											&nbsp; &nbsp;
											<a href="javascript:void(0)" class="confirmDelete" record="Category" recordid="{{ $clist->id }}">delete</a>
										</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Name</th>
                                        <th>Url</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
@include('master-admin.include.footer')
</div>
<!--end wrapper-->

<script src="{{ URL::asset('master-admin/assets/js/jquery.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ URL::asset('master-admin/assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ URL::asset('master-admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('master-admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ URL::asset('master-admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ URL::asset('master-admin/assets/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('master-admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ URL::asset('master-admin/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
<script src="{{ URL::asset('master-admin/assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
<script src="{{ URL::asset('master-admin/assets/js/index.js') }}"></script>
<!--app JS-->
<script src="{{ URL::asset('master-admin/assets/js/app.js') }}"></script>

<script src="{{ URL::asset('master-admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('master-admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ URL::asset('master-admin/assets/js/admin.js') }}"></script>
</body>
</html>
<script>
    $(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
</script>