@extends('admin.layouts.app')

@section('title', 'Companies')

@section('subheader')
<!--begin::Content-->

<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">

            <!--begin::Page Title-->
            <a href="{{route('admin.home')}}"><h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                Dashboard                            </h5></a>
            <!--end::Page Title-->

            <!--begin::Actions-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

            <span class="text-muted font-weight-bold mr-4">Companies</span>

           
            <!--end::Actions-->
        </div>
        <!--end::Info-->

        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
        <!-- toolbar -->
       
        </div>
        <!--end::Toolbar-->
    </div>
</div>
 <!--end::Subheader-->
@endsection

@section('content')

<!-- begin:: Content -->

	<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Notice-->
		
    
								<div class="card card-custom">
									<div class="card-header flex-wrap py-5">
										<div class="card-title">
											<h3 class="card-label">Companies
										
										</div>
										<div class="card-toolbar">
											<a href="{{route('admin.company.create')}}" class="btn btn-primary font-weight-bolder">
											  <i class="la la-plus"></i>Add
											</a>
									    </div>
									</div>
									<div class="card-body">
								
    										<table class="table table-responsive  table-separate table-head-custom table-checkable" id="company-table">
    											<thead>
    												<tr>
													  <th>Logo</th>	
				                                      <th>Name</th>
				                                      <th>Description</th>
												      <th>Contact Number</th>
			                                          <th>Annual Turnover</th>
													  <th>Created By</th>
													  <th>Updated By</th>
													  <th>Created At</th>
													  <th>Updated At</th>
				                                      <th>Actions</th>
    												</tr>
    											</thead>
    											<tbody>
    										
    				
    											</tbody>
    										</table>
								
										<!--end: Datatable-->
									</div>
								</div>
								<!--end::Card-->
									</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->


        
        <div class="modal fade" id="delete-company" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        
            <div class="modal-dialog" role="document">
        
                <div class="modal-content">
        
                    <div class="modal-header">
        
                        <h5 class="modal-title" id="">Delete</h5>
        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        
                        </button>
        
                    </div>
        
                    <div class="modal-body">
        
                        <p>Do you want to delete selected Data ?<br/>This Process cannot be Rolled Back</p>
        
                    </div>
        
                    <div class="modal-footer">
                     <button type="button" class="btn btn-danger btn_delete_company "><i class="flaticon-delete-1"></i>Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
                       
        
                    </div>
        
                </div>
        
            </div>
        
        </div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script type="text/javascript">

   $(function() {

     $companyTable= $('#company-table').DataTable({

         processing: true,
         serverSide: true,

         ajax: '{{ route("admin.company.index") }}',

         columns: [

	      	{ data: 'logo', name: 'logo'  },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
			{ data: 'contact_number', name: 'contact_number' },
            { data: 'annual_turnover', name: 'annual_turnover' },
			{ data: 'created_by.name', name: 'createdBy.name' },
            { data: 'updated_by.name', name: 'updatedBy.name' },
			{
            data: 'created_at',
            name: 'created_at',
            render: function (data) {
                return moment(data).format('YYYY-MM-DD h:mm A');
            }
			},
			{
				data: 'updated_at',
				name: 'updated_at',
				render: function (data) {
					return moment(data).format('YYYY-MM-DD h:mm A');
				}
			},
            { data: 'action', orderable: false}

         ],
         order: [[ 0, "desc" ]]

     });
 


     $('table').on('click','.company-delete', function(e){

        var option_href=$(this).data('href');

            $('.btn_delete_company').off().click(function() {
        	     console.log(option_href)

		      $.ajax({

			          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
			          type: 'DELETE',
			          //data:{},
			          dataType : 'JSON', 
			          url : option_href,
			          success: function(response){
			              $('#delete-company').modal('hide');
			              if(response.status=='success')
			              {
				               $('#company-table').DataTable().ajax.reload();
				               toastr.success("Data deleted successfully", "Success"); 
			            
			              }
			              else if(response.status=='fail')
			              {
				                $('#company-table').DataTable().ajax.reload();
				              	toastr.warning("You can't remove this data", "Warning");   
			              }
			          } 
		        }); 



   		 });
    });

   });



</script>

@endpush