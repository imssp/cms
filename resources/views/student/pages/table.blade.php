    <!--<div class="container">
        <div class="row">
            <div class="col-sm-8">
                <ul>
                {{-- Basic first glance details of a student. --}}
                    <h4><strong>UID:</strong> #{{$students->uid}}</h4>
                    <h2>{{$students->full_name}}</h2>
                    <p><strong>EmailId:</strong> {{$students->email_id}}</p>
                    <p><strong>PhoneNumber:</strong> {{$students->mobile_no}}</p>
                    <p><strong>Class:</strong> {{$students->class}}
                    {{$students->branch}}
                    </p>
                    <p><strong>Admission Type:</strong> 
                    @if($students->type_of_admission == 0)
                        FE
                    @else
                        DSE    
                    @endif    
                    </p>
                </ul>
            </div>
            <div class="col-sm-4">
               <img src="{{$students->image}}" class="rounded" style=" width: 150px; height: 150px;">
               {{$students->image}}
            </div>
        </div>
        <br><hr>
        <div class="row">
            <div class="col-sm-4">
                <h3>Personal details</h3>
            </div>
            {{-- The display is in disabled-form format. This is done to keep a general feel of the site. When editable the feel will
            still be the same. --}}
            <div class="col-sm-8"><br>
            {{-- Form submit returs to the same page --}}
                {!! Form::open(['action' => 'StudentController@home']) !!}
                    <div class="form-group">
                        {{ Form::label('aadhar_no', 'Aadhar Card Number') }}
                        {{Form::text('aadhar_no',$students->aadhar_id,['class'=>'form-control', 'disabled'=>'true'])}}<br>
                        
                        {{ Form::label('gender', 'Gender') }}
                        @if($students->gender == 0)
                            {{Form::text('gender','FEMALE',['class'=>'form-control', 'disabled'=>'true'])}}<br>
                        @else
                            {{Form::text('gender','MALE',['class'=>'form-control', 'disabled'=>'true'])}}<br>
                        @endif

                        {{ Form::label('dob', 'Date Of Birth') }}
                        {{Form::date('dob',$students->date_of_birth,['class'=>'form-control', 'disabled'=>'true'])}}<br>
                        
                        {{ Form::label('p_address', 'Permanent Address') }}
                        {{Form::textarea('p_address',$students->permanent_address,['class'=>'form-control', 'disabled'=>'true',  'rows' => 3])}}<br>
                        
                        @if( !empty ($students->temp_address))
                        {{ Form::label('t_address', 'Temporary Address') }}
                        {{Form::textarea('t_address',$students->temp_address,['class'=>'form-control', 'disabled'=>'true',  'rows' => 3])}}<br>
                        @endif

                        {{ Form::label('blood_group', 'Blood Group') }}
                        {{Form::text('blood_group',$students->blood_group,['class'=>'form-control', 'disabled'=>'true'])}}<br>
                        
                        {{ Form::label('sec_email', 'Secondary Email Address') }}
                        {{Form::text('sec_email',$students->sec_email_id,['class'=>'form-control', 'disabled'=>'true'])}}<br>
                        
                        {{ Form::label('landline', 'Landline Number') }}
                        {{Form::text('landline',$students->std_code.'-'.$students->landline_no,['class'=>'form-control', 'disabled'=>'true'])}}<br>
                        
                        <h4><strong>Father's Details:</strong></h4>
                        {{ Form::label('father_name', 'Father\'s Name') }}
                        {{Form::text('father_name',$students->fathers_name.' '.$students->last_name,['class'=>'form-control', 'disabled'=>'true'])}}<br>
                        {{ Form::label('father_phone', 'Phone Number') }}
                        {{Form::text('father_phone',$students->fathers_no,['class'=>'form-control', 'disabled'=>'true'])}}<br>
                        <hr>
                        <h4><strong>Mother's Details</strong></h4>
                        {{ Form::label('mother_name', 'Mother\'s Name') }}
                        {{Form::text('mother_name',$students->mothers_name.' '.$students->last_name,['class'=>'form-control', 'disabled'=>'true'])}}<br>
                        {{ Form::label('mother_phone', 'Phone Number') }}
                        {{Form::text('mother_phone',$students->mothers_no,['class'=>'form-control', 'disabled'=>'true'])}}<br>
                        <hr>
                        
                        {{ Form::label('category', 'Category') }}
                        @if( !empty ($student->add_category))
                            {{Form::text('category',$students->category.'/'.$students->add_category,['class'=>'form-control', 'disabled'=>'true'])}}<br>
                        @else
                            {{Form::text('category',$students->category,['class'=>'form-control', 'disabled'=>'true'])}}<br>
                        @endif
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>-->
