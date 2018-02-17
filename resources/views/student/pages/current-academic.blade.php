@extends('student.layouts.dashboard')
@section('page_heading','Current Academics')
@section('section')
<ul class="timeline">
    {{-- First Year --}}
    <li><div class="tldate">First Year</div></li>
    <li>{{-- First Sem --}}
        <div class="timeline-badge"><i class="fa fa-check"></i>
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <a href="{{route('report', ['id' => 1])}}"><h4 class="timeline-title">Semester 1</h4>  </a>   
            </div>
            <div class="timeline-body" style="overflow-x:auto;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>KT</th>
                        <th>Reval Application</th>
                        <th>Changes due to Reval</th>
                        <th>Cleared in Reval</th>
                        <th>Pass/Fail</th>
                        <th>CGPA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>0</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </li>
    {{-- Second Sem --}}
    <li class="timeline-inverted">
        <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4 class="timeline-title">Semester 2</h4>
            </div>
            <div class="timeline-body" style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>KT</th>
                    <th>Reval Application</th>
                    <th>Changes due to Reval</th>
                    <th>Cleared in Reval</th>
                    <th>Pass/Fail</th>
                    <th>CGPA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>0</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </li>
    
    {{-- Second Year --}}
    <li>{{-- Third Sem --}}
        <div class="timeline-badge"><i class="fa fa-check"></i>
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4 class="timeline-title">Semester 3</h4>     
            </div>
            <div class="timeline-body" style="overflow-x:auto;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>KT</th>
                        <th>Reval Application</th>
                        <th>Changes due to Reval</th>
                        <th>Cleared in Reval</th>
                        <th>Pass/Fail</th>
                        <th>CGPA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>0</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </li>
    {{-- Fourth Sem --}}
    <li class="timeline-inverted">
        <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4 class="timeline-title">Semester 4</h4>
            </div>
            <div class="timeline-body" style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>KT</th>
                    <th>Reval Application</th>
                    <th>Changes due to Reval</th>
                    <th>Cleared in Reval</th>
                    <th>Pass/Fail</th>
                    <th>CGPA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>0</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </li>

    {{-- Third Year --}}
    <li>{{-- Fifth Sem --}}
        <div class="timeline-badge"><i class="fa fa-check"></i>
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4 class="timeline-title">Semester 5</h4>     
            </div>
            <div class="timeline-body" style="overflow-x:auto;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>KT</th>
                        <th>Reval Application</th>
                        <th>Changes due to Reval</th>
                        <th>Cleared in Reval</th>
                        <th>Pass/Fail</th>
                        <th>CGPA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>0</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </li>
    {{-- Sixth Sem --}}
    <li class="timeline-inverted">
        <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4 class="timeline-title">Semester 6</h4>
            </div>
            <div class="timeline-body" style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>KT</th>
                    <th>Reval Application</th>
                    <th>Changes due to Reval</th>
                    <th>Cleared in Reval</th>
                    <th>Pass/Fail</th>
                    <th>CGPA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>0</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </li>
    {{-- Fourth Year --}}
    <li>{{-- Seventh Sem --}}
        <div class="timeline-badge"><i class="fa fa-check"></i>
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4 class="timeline-title">Semester 7</h4>     
            </div>
            <div class="timeline-body" style="overflow-x:auto;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>KT</th>
                        <th>Reval Application</th>
                        <th>Changes due to Reval</th>
                        <th>Cleared in Reval</th>
                        <th>Pass/Fail</th>
                        <th>CGPA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>0</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </li>
    {{-- Eighth Sem --}}
    <li class="timeline-inverted">
        <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4 class="timeline-title">Semester 8</h4>
            </div>
            <div class="timeline-body" style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>KT</th>
                    <th>Reval Application</th>
                    <th>Changes due to Reval</th>
                    <th>Cleared in Reval</th>
                    <th>Pass/Fail</th>
                    <th>CGPA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>0</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </li>
</ul>
@stop