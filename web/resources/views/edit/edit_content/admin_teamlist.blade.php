@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center" style="border-bottom: 1px solid black;padding: 10px 50px">
            <div class="col-md-12" style="display: inline-flex;">
                <span style="line-height: 85px;"><img src="{{ asset('../img/icon/followers.png') }}" alt="" width="50px"></span>
                <span style="font-size: 35px;font-weight: bold;vertical-align: middle;line-height: 85px;padding-left: 10px;padding-right: 50px;">Team List</span>
            </div>
        </div>
        <div class="row justify-content-center" style="padding: 0px 50px;">
            <div class="col-md-12">
                <table class="table table-bordered" style="margin-top: 50px;text-align: center" id="TableData">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Job</th>
                        <th scope="col">Contact</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teamlist as $teamlists)
                        <tr>
                            <th scope="row" style="vertical-align: middle"><img src="{{ asset('img/icon/June_2017_BNK48_Nayika_Srinian.jpg') }}" alt="" class="pic_intable"></th>
                            <td style="vertical-align: middle">{{ $teamlists->Firstname }} {{ $teamlists->Lastname }}</td>
                            <td style="vertical-align: middle">
                                @foreach($head as $heads)
                                    <?php
                                        $Job_name  = $teamlists->Job_name;
                                        $Job_names = explode(" ", $Job_name);
                                    ?>
                                    @if( $Job_names[0] == 'Head' )
                                        <span style="color: #7914dd;width: 150px !important;text-transform: uppercase">Supervisor</span>
                                    @else
                                        <span style="color: black;width: 150px !important;text-transform: uppercase">EMPLOYEE</span>
                                    @endif
                                @endforeach
                            </td>
                            <td style="vertical-align: middle">{{ $teamlists->Job_name }}</td>
                            <td style="vertical-align: middle">{{ $teamlists->Tel }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection