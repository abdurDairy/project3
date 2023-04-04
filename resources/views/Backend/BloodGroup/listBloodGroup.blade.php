@extends('Admin.adminMaster')
@section('general-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div style="background: #600585; margin-bottom:10px;" class="card-header text-light py-3">
                            <h1 style="font-weight:bold;">Blood List</h1>
                        </div>
                        <div class="card-body">
                            <div class="list mx-auto">
                                <a href="#" class="blood_grp_btn btn  px-5 mb-3" data-id="1"  class="">A+(ve)</a>
                                <a href="#" class="blood_grp_btn btn  px-5 mb-3" data-id="2"  class="">A-(ve)</a>
                                <a href="#" class="blood_grp_btn btn  px-5 mb-3" data-id="3"  class="">B+(ve)</a>
                                <a href="#" class="blood_grp_btn btn  px-5 mb-3" data-id="4"  class="">B-(ve)</a>
                                <a href="#" class="blood_grp_btn btn  px-5 mb-3" data-id="5"  class="">AB+(ve)</a>
                                <a href="#" class="blood_grp_btn btn  px-5 mb-3" data-id="6"  class="">AB-(ve)</a>
                                <a href="#" class="blood_grp_btn btn  px-5 mb-3" data-id="7"  class="">O+(ve)</a>
                                <a href="#" class="blood_grp_btn btn  px-5 mb-3" data-id="8"  class="">O-(ve)</a>
                            </div>

                            {{-- INSERT SUCCESS MESSAGE  --}}
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                            @endif
                            @if(Session::has('error'))
                                <div class="alert alert-danger">
                                    {{Session::get('error')}}
                                </div>
                            @endif
                            {{-- blood group table  --}}
                            <table class="table table-info bg-light table-responsive mt-5 table-striped">
                                <thead>
                                <tr>
                                    <td>SN</td>
                                    <td>Donor Name</td>
                                    <td>Birth Date</td>
                                    <td>Phone</td>
                                    <td>Department</td>
                                    <td>Action</td>
                                </tr>
                               
                                </thead>
                                    
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('jquery')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    @endpush



    @push('customJS')
        <script>
            $('.blood_grp_btn').on('click', function(){
                $('.blood_grp_btn').removeClass('activeForBlood')
                $(this).addClass('activeForBlood')

                let id = $(this).data('id');
                let url = `{{ route('blood.detail', "::id") }}`
                let replaceUrl = url.replace("::id",id)


                $.ajax({
                    url: replaceUrl,
                    method: 'GET',
                    data:{
                         id:id
                    },
                    success: function(res){
                       let bloodDetails = JSON.parse(res)
                       let tr = [];

                       bloodDetails.forEach((bloodDetail,index) => {

                        let editUrl = `{{ route('edit.blood.group', "::id") }}`
                        let editedReplecrUrl = editUrl.replace("::id",bloodDetail.id)

                        let deleteUrl = `{{ route('bloodGroup.delete', "::id") }}`
                        let deleteReplaceUrl = deleteUrl.replace("::id",bloodDetail.id)
                        
                          let tableDetails =`
                                    <tr>
                                        <td>${++index}</td>
                                        <td>${bloodDetail.bloddonor_name}</td>
                                        <td>${bloodDetail.birth_date}</td>
                                        <td>${bloodDetail.contact_number}</td>
                                        <td>${bloodDetail.department_name}</td>
                                        <td>
                                                <a href="${editedReplecrUrl}" class="btn-primary btn-sm ">Edit</a>
                                                <a href="${deleteReplaceUrl}" class="btn-danger btn-sm ">Delete</a>
                                        </td>
                                    </tr>`
                          tr.push(tableDetails)

                       });
                       $('.table-info tbody').html(tr)
                    
                    },
                    error: function(err){
                        console.log(err)
                    },
                });
            });
        </script>
    @endpush
@endsection