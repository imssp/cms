@extends('faculty.layouts.dashboard')
@section('page_heading','Update Staff')
@section('section')

<div class="col-sm-8">
    <div class="col-sm-4">
        <input list="EIDs" id="EID" name="EID" class="form-control" placeholder="Enter Employee ID">
        <datalist id="EIDs">
        <?php
            for ($i=1; $i<=999; $i++)
            {
                ?>
                    <option value="<?php echo $i;?>" class="form-group"><?php echo $i;?></option>
                <?php
            }
        ?>
        </datalist>
        </input>
    </div>
    {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
    {{ Form::close() }}
</div>


@stop