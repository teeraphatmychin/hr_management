@extends('edit.edit_main')
@section('edit')
    <div class="row justify-content-center" style="padding: 0px 50px;">
        <div class="col-md-12" style="padding: 20px 0px;">
            <div class="col-md-12" style="margin-top: 10px;margin-bottom: 20px">
                {{--<select id="dropdown_admindepartment_kpi">--}}
                    {{--<option value disabled selected>Select department</option>--}}
                    {{--<option value="january">aa</option>--}}
                    {{--<option value="febuary">bb</option>--}}
                    {{--<option value="march">cc</option>--}}
                {{--</select>--}}
            </div>
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Key_Result_Areas</th>
                        <th>Key_Performance_Indicators</th>
                        <th>Weight_of_KPIs</th>
                        <th>Target</th>
                        <th>Control</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($performance_measurement as $performance_measurements)
                    <tr>
                        <td>{{ $performance_measurements->Key_Result_Areas }}</td>
                        <td>{{ $performance_measurements->Key_Performance_Indicators }}</td>
                        <td>{{ $performance_measurements->Weight_of_KPIs }}</td>
                        <td>{{ $performance_measurements->Target }}</td>
                        <td><button type="button" class="btn btn-default load-form-modal" style="border: 1px solid red;color: red;width: 100px;" data-id="{{ $performance_measurements->KPI_Code }}" data-toggle="modal" data-target="#profile" >Edit</button></td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="profile">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="titleModal">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{ route('calKPI') }}" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" id="kpi" name="kpi">
                        <div class="form-group row">
                            <label for="Key_Result_Areas" class="col-sm-4 col-form-label">Key_Result_Areas</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="Key_Result_Areas">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Key_Performance_Indicators" class="col-sm-4 col-form-label">Key_Performance_Indicators</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="Key_Performance_Indicators">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Weight_of_KPIs" class="col-sm-4 col-form-label">Weight_of_KPIs</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="Weight_of_KPIs" name="Weight_of_KPIs">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Target" class="col-sm-4 col-form-label">Target</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="Target" name="Target">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Actual" class="col-sm-4 col-form-label">Actual</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="Actual" name="Actual">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-warning" style="width: 100%;">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>


            </div>
        </div>
    </div>
@endsection
