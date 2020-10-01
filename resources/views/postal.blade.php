@extends('admin.layout.app')
@push('css')
<link rel="stylesheet" type="text/css"
    href="{{asset('template/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">
<style>
    .swal2-title {
        font-size: 18px !important;
    }

</style>
@endpush

@section('breadcrumb')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">चलानी किताब</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">गृहपृष्ठ</a>
                    </li>
                    <li class="breadcrumb-item active">चलानी
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12 mb-md-0 mb-2">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <div class="btn-group" role="group">
                <button class="btn btn-danger dropdown-toggle dropdown-menu-right shadow" id="btnGroupDrop1"
                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                        class="fa fa-file-excel-o icon-left fa-lg"></i> &nbsp;निर्यात</button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item"
                        href="{{route('admin.dartachalani.chalani.exportexcel', $status = 1)}}">स्वीकृत भएका</a>
                    <a class="dropdown-item"
                        href="{{route('admin.dartachalani.chalani.exportexcel', $status = 0)}}">स्वीकृत
                        नभएका</a>
                    <a class="dropdown-item" href="{{route('admin.dartachalani.chalani.exportexcel')}}">सबै</a>
                </div>
            </div>
            <a class="btn btn-warning shadow" href="#" data-toggle="modal" data-target="#reserveForm">
                <i class="feather icon-pocket"></i> चलानी नं रिजभ
            </a>
            @can('master-policy.perform',['chalani','add'])
            <a class="btn btn-primary shadow" href="{{route('admin.dartachalani.chalani.create')}}"><i
                    class="feather icon-plus icon-left"></i> नयाँ थप्नुहोस
            </a>
            @endcan
        </div>
    </div>
</div>
@endsection

@section('content')

{{-- @if (count($chalani)) --}}
<section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a id="show-hidden-filter"><i class="feather icon-filter text-primary"></i> फिल्टर </a>
                            </li>
                            <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                            <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                            <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Show/Hide div for filter -->
                <div class="row ml-2 mr-2 filter-data" style="display: none;" id="hidden-filter">
                    <x-search-form :reserveNo="'yes'" />
                    <form action="{{ route('admin.dartachalani.chalani.exportexcel', $status = 1) }}"
                        id="exportExcelForm" method="POST">
                        @csrf <div id="exportExcelData"></div>
                    </form>
                </div>

                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <table class="table table-striped table-bordered table-responsive" id="dataTableAjax">
                            <thead class="bg-light">
                                <tr>
                                    <th>चलानी नं.</th>
                                    <th>चलानी मिति</th>
                                    <th>पत्र संख्या</th>
                                    <th>पाउने कार्यालय वा व्यक्तिको विवरण</th>
                                    <th>पत्रको विषय</th>
                                    <th>फाँट र बुझिलिनेको नाम</th>
                                    <th>सम्पादन</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($chalani as $key=>$data)
                                <tr>
                                    <td id="chalani_data_id-{{$data->id}}">
                                        @if ($data->status==0)
                                        <div class="badge badge-pill shadow badge-warning cursor-pointer"><i
                                                class="fa fa-hourglass-end  font-medium-2" style="margin-left: 2px"></i>
                                            <span data-toggle="modal" data-target="#iconModal"
                                                onclick="confirmChalani({{$data->id}})">Pending</span>
                                        </div>
                                        @else
                                        {{ $data->chalani_no }}
                                        @endif
                                    </td>
                                    <td>{{$data->invoice_date}}</td>
                                    <td>{{$data->letter_number}}</td>
                                    <td>{{$data->receiver_name}}</td>
                                    <td>
                                        <p style="width: 200px">{{$data->letter_subject}}</p>
                                    </td>
                                    <td>
                                        <p style="width: 300px">
                                            {!!getChalaniPhatAndReceiver($phatEm=json_decode(@$data->departmentinfo))!!}
                                        </p>
                                    </td>
                                    <td>
                                        @can('master-policy.perform',['chalani','edit'])
                                        <a href="{{route('admin.dartachalani.chalani.edit',$data->id)}}"><i
                                                class="feather icon-edit-1"></i></a>
                                        @endcan
                                        @can('master-policy.perform',['chalani','view'])
                                        <a href="{{route('admin.dartachalani.chalani.detail', $data)}}"><i
                                                class="fa fa-eye"></i></a>
                                        @endcan
                                        @can('master-policy.perform',['chalani','delete'])
                                        <a onClick="deleteData({{$data->id}})" href="javascript:void(0)"><i
                                                class="fa fa-trash"></i></a>
                                        @endcan
                                        <form id="chalani-delete-{{$data->id}}"
                                            action="{{route('admin.dartachalani.chalani.destroy',$data->id)}}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-danger text-center" colspan="8">
                                        <h5 class="font-weight-bold">माफ गर्नुहोला हाल सम्म तपाईले कुनै चलानी
                                            गर्नुभएको छैन | </h5>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- @else
<x-empty-page />
@endif --}}


<!-- START: Chalani Number Reserve Modal  -->
<div class="modal fade text-left" id="reserveForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel34">आजको मितिमा कति वोटा चलानी नं रिजर्भ गर्न चाहानुहुन्छ ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form form-horizontal" action="{{ route('admin.dartachalani.chalani.chalani_no_reserve') }}"
                method="POST">
                @csrf
                <div class="modal-body">
                    <label for="invoice_date">मिति: </label>
                    <div class="form-group position-relative has-icon-left">
                        <input name="date-disabled" type="text" id="date-disabled" placeholder="Choose Date"
                            class="form-control date-picker" disabled>
                        {{-- Because disabled input will not submitted so hidden value willbe submitted --}}
                        <input name="invoice_date" type="text" id="invoice_date" placeholder="Choose Date"
                            class="form-control date-picker" hidden>
                        @error('invoice_date')
                        <p class="my-1" style="color:red; ">
                            {{$message}}</p>
                        @enderror
                        <div class="form-control-position">
                            <i class="fa fa-calendar font-medium-5 line-height-1 text-muted icon-align"></i>
                        </div>
                    </div>

                    <label for="chalani_no">संख्या: </label>
                    <div class="form-group">
                        <div class="input-group">
                            <input name="chalani_no" id="chalani_no" type="number" placeholder="संख्या लेख्नुहोस्"
                                class="touchspin" value="1" />
                        </div>
                        @error('chalani_no')
                        <p class="my-1" style="color:red; ">
                            {{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-danger btn-md" data-dismiss="modal" value="बन्द">
                    <input type="submit" class="btn btn-outline-primary btn-md" value="रिजर्भ">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END: Chalani Number Reserve Modal  -->
@endsection

@push('js')
@if(session('success'))
<script>
    toastr.success('{{session('success')}}', 'धन्याबाद !');
</script>
@endif

@if(session('errors'))
<script>
    toastr.error('माफ गर्नुहोला, कृपया फम पुन:सच्चाएर मात्र पेश गर्नुहोला', 'गल्ती भयो!');
</script>
@endif
<script src="{{asset('template/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {

    $(".touchspin").TouchSpin();

    // $.load_data=function(query=""){
    //     $('#dataTableAjax').DataTable({
    //         "language": {
    //             search: 'खोज्नुहोस्',
    //             processing: '<div class="spinner-grow spinner-grow-xl text-primary mt-n4" role="status"></div><div>डाटा लोड हुदै छ...</div>',
    //             "zeroRecords": "माफ गर्नुहोला तपाईले खोज्नुभएको डाटा उपलब्ध छैन",
    //             "emptyTable": "माफ गर्नुहोला अहिले डाटाबेसमा कुनै डाटा उपलब्ध छैन"
    //         },
    //         processing: true,
    //         autoWidth: false,
    //         serverSide: true,
    //         ajax:{
    //             url:'{{ route("admin.dartachalani.chalani.index") }}',
    //             data:query?query:{query}
    //         },
    //         columns: [
    //             {data: 'status_action', name: 'status_action', searchable: false},
    //             {data: 'invoice_date', name: 'invoice_date',searchable: true},
    //             {data: 'letter_number', name: 'letter_number',searchable: true},
    //             {data: 'receiver_name', name: 'receiver_name',searchable: true},
    //             {data: 'letter_subject', name: 'letter_subject',searchable: true},
    //             {data: 'phatReceiverInfo', name: 'phatReceiverInfo',searchable: true},
    //             {data: 'action', name: 'action', orderable: false, searchable: false},
    //         ]
    //     });
    // }
    // $.load_data();

    $.data_export=function(query=""){
        let form="";
        Object.keys(query).map(key=>{
        form+=`<input type='hidden' name="${key}" value="${query[key]}" />`;
        });
    $('#exportExcelData').html(form);
    $('#exportExcelForm').submit();
    }
});

// Delete Confirmation Modal
const deleteData = (id) => {
    Swal.fire({
        title: "के तपाई निश्चित हुनुहुन्छ?",
        text: "तपाई डाटा हटाउदै हुनुहुन्छ ",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "हो",
        cancelButtonText: "हैन",
        confirmButtonClass: "btn btn-primary",
        cancelButtonClass: "btn btn-danger ml-1",
        buttonsStyling: false
    }).then((result) => {
        if (result.value) {
            $('#chalani-delete-' + id).submit();
        }
    });
};

// Confirm for chalani active modal
function confirmChalani(id) {
    Swal.fire({
        text: "निश्चित हुनुहुन्छ भने स्वीकृत गर्नुहोस् अन्यथा बन्द गर्नुहोस्।",
        title: "तपाई अहिले अन्य फाँटबाट आएको चलानी स्वीकृत गर्दै हुनुहुन्छ।",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "स्वीकृत",
        cancelButtonText: "बन्द",
        confirmButtonClass: "btn btn-primary",
        cancelButtonClass: "btn btn-danger ml-1",
        buttonsStyling: false
    }).then(function(result) {
        if (result.value) {
            $.ajax("{{url('darta-chalani/chalani')}}/" + id + "/activechalani", {
                method: 'GET',
                data: {},
                success(data) {
                    $('#chalani_data_id-'+id).text(data);
                    toastr.success('चलानी सफल भयो |', 'धन्याबाद !');
                },
                error() {
                    toastr.error('माफ गर्नुहोला, अहिले चलानी गर्न सकिएन कृपया रि-फ्रेश गरि पुन:प्रयास गर्नुहोस् |', 'गल्ती भयो!');
                },
            });
        }
    })
}
</script>

@endpush
