@extends('faculty.layouts.dashboard')
@section('page_heading','Book Event')

@section('section')
    
    <div class="col-md-7">

        <ul class="nav nav-pills">
            <li class="active"><a data-toggle="pill" class="btn " href="#time">Time Slots</a></li>
            <li><a data-toggle="pill" class="btn " href="#resource">Resources</a></li>
            <li><a data-toggle="pill" class="btn " href="#details">Details</a></li>
            <!--<li><a data-toggle="tab" href="#menu3">Menu 3</a></li>-->
        </ul>

        <div class="tab-content">
            <div id="time" class="tab-pane fade in active">
                <h3></h3>
                <form method="POST" action="#" class="form-group">
                    <fieldset>

                    </fieldset>
            </div>
            <div id="resource" class="tab-pane fade">
                <h3></h3>
                    <fieldset>
                        <label for="floorselect">Choose Floor : </label>
                        <select>
                            <option>Ground</option>
                            <option>First</option>
                            <option>Second</option>
                            <option>Third</option>
                            <option>Fourth</option>
                            <option>Fifth</option>
                        </select><br>

                    </fieldset>
            </div>
            <div id="details" class="tab-pane fade">
                <h3></h3>
                    <fieldset>
                        <label for="EventName">Name of Event : </label>
                        <input type="text" class="form control" name="EventName" required="true" placeholder="Event Name"><br>
                    <!--<p style="vertical-align:top;">-->
                        <label for="EventDetails">Event Details : </label>
                        <textarea class="form control" name="EventDetails" required="false" placeholder="If any" rows="5" cols="60"></textarea><br>
                    <!--</p>    -->
                        <label for="Crowd">Estimated Crowd : </label>
                        <input type="number" class="form control" name="Crowd" min="20" max="300" required="true" placeholder="eg: 100"><br>

                        <input type="submit" class="btn btn-success" name="submit" value="Submit"/>
                    </fieldset>
                </form>
            </div>
            <!--<div id="menu3" class="tab-pane fade">
                
            </div>-->
        </div>

    </div>

@include('faculty.layouts.right_side_navbar')

@stop