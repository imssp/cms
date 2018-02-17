@extends('faculty.layouts.dashboard')
@section('page_heading','Syllabus Schema')
@section('section')



    @if(Session::has('inserted'))
        <div class="alert alert-success alert-dismissible text-center animated fadeInDown">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('inserted') }}
        </div>
    @endif
    
    <div class="container-fluid">

        {!! Form::open(['action'=>'SyllabusController@store', 'method'=>'POST']) !!}
            <div class="row">
                <h3 class="text-info">Enter Subject Details:</h3>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="course_code">Course Code:</label>
                        <input type="text" class="form-control" name="course_code" required />
                    </div>             
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="course_name">Course Name:</label>
                        <input type="text" class="form-control" name="course_name" required />
                    </div>             
                </div>
            </div>

            {{-- Internal Test Section --}}
            <div class="col-sm-6">
                <div class="row">
                    <label for="IA">Internal Test</label>
                    {{-- Enable or Disable the IT fields, reset the values on uncheck --}}
                    <input name="IA" type="checkbox" id="checkbox1" onclick="if (this.checked){ 
                        document.getElementById('IA_max').disabled = false;
                        document.getElementById('IA_pass').disabled = false;
                        }else{
                        document.getElementById('IA_max').disabled = true;
                        document.getElementById('IA_pass').disabled = true;
                        document.getElementById('IA_max').value = '';
                        document.getElementById('IA_pass').value = '';
                        }" />
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input class="form-control max" type="number" name="IA_max" id="IA_max" placeholder="Maximum Marks" min="0" step="1" disabled required/>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input class="form-control" type="number" name="IA_pass" id="IA_pass" placeholder="Passing Marks" min="0" step="1" disabled required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- End Sem Exam Section --}}
            <div class="col-sm-6">
                <div class="row">
                    <label for="ESE">End Semester Exam</label>   
                    {{-- Enable or Disable the ES fields, reset the values on uncheck --}} 
                    <input name="ESE" type="checkbox" id="checkbox2" onclick="if (this.checked){ 
                        document.getElementById('ESE_max').disabled = false;
                        document.getElementById('ESE_pass').disabled = false;
                        }else{
                        document.getElementById('ESE_max').disabled = true;
                        document.getElementById('ESE_pass').disabled = true;
                        document.getElementById('ESE_max').value = '';
                        document.getElementById('ESE_pass').value = '';
                        }" />
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input class="form-control max" type="number" name="ESE_max" id="ESE_max" placeholder="Maximum Marks" min="0" step="1" disabled required/>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input class="form-control" type="number" name="ESE_pass" id="ESE_pass" placeholder="Passing Marks" min="0" step="1" disabled required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                           

            {{-- Practical/Oral Section --}}
            {{-- PROR fields are for Prac/Oral only, they are initially hidden --}}
            <div class="col-sm-12">
                <div class="row">
                    <label for="PROR">Practical/Oral</label> 
                    {{-- Enable or Disable the Practical/Oral fields, reset the values on uncheck --}}
                    {{-- Hides the Practical and Oral value fields and shows the Prac/Oral fields --}}
                    <input name="PROR" type="checkbox" id="checkbox3" onclick="if (this.checked){ 
                        document.getElementById('prac').style.display = 'none';
                        document.getElementById('prd1').style.display = 'none';
                        document.getElementById('prd2').style.display = 'none';
                        document.getElementById('prd3').style.display = 'block';
                        
                        document.getElementById('oral').style.display = 'none'; 
                        document.getElementById('ord1').style.display = 'none';
                        document.getElementById('ord2').style.display = 'none';
                        document.getElementById('ord3').style.display = 'block';

                        document.getElementById('PROR_max').disabled = false;
                        document.getElementById('PROR_pass').disabled = false;

                        }else{
                        document.getElementById('prac').style.display = 'block';
                        document.getElementById('prd1').style.display = 'block';
                        document.getElementById('prd2').style.display = 'block';
                        document.getElementById('prd3').style.display = 'none';

                        document.getElementById('oral').style.display = 'block';
                        document.getElementById('ord1').style.display = 'block';
                        document.getElementById('ord2').style.display = 'block';
                        document.getElementById('ord3').style.display = 'none';

                        document.getElementById('PROR_max').disabled = true;
                        document.getElementById('PROR_pass').disabled = true;
                        document.getElementById('PROR_max').value = '';
                        document.getElementById('PROR_pass').value = '';
                        }" />
                </div>
            </div>

            {{-- Practical Marks Section --}}   
            <div class="col-sm-6">
                <div class="row" id="prac">
                    <label for="PR">Practical</label>    
                    {{-- Enable or Disable the Prac fields, reset the values on uncheck --}}
                    <input name="PR" type="checkbox" id="checkbox4" onclick="if (this.checked){ 
                        document.getElementById('PR_max').disabled = false;
                        document.getElementById('PR_pass').disabled = false;
                        }else{
                        document.getElementById('PR_max').disabled = true;
                        document.getElementById('PR_pass').disabled = true;
                        document.getElementById('PR_max').value = '';
                        document.getElementById('PR_pass').value = '';
                        }" />
                </div>
                <div class="row">
                    <div class="row" id="prac_details">
                        <div class="col-sm-5">
                            <div class="form-group" id="prd1">
                                <input class="form-control max" type="number" name="PR_max" id="PR_max" placeholder="Maximum Marks" min="0" step="1" disabled required/>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group" id="prd2">
                                <input class="form-control" type="number" name="PR_pass" id="PR_pass" placeholder="Passing Marks" min="0" step="1" disabled required/>
                            </div>
                        </div>
                        <div class="col-sm-8" style="display: none" id="prd3">
                            <div class="form-group">
                                <input class="form-control max" type="number" name="PROR_max" id="PROR_max" placeholder="Maximum Marks" min="0" step="1" disabled required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Oral Section --}}  
            <div class="col-sm-6">
                <div class="row" id="oral">
                    <label for="OR">Oral</label>    
                    {{-- Enable or Disable the Oral fields, reset the values on uncheck --}}
                    <input name="OR" type="checkbox" id="checkbox5" onclick="if (this.checked){ 
                        document.getElementById('OR_max').disabled = false;
                        document.getElementById('OR_pass').disabled = false;
                        }else{
                        document.getElementById('OR_max').disabled = true;
                        document.getElementById('OR_pass').disabled = true;
                        document.getElementById('OR_max').value = '';
                        document.getElementById('OR_pass').value = '';
                        }" />
                </div>
                <div class="row">
                    <div class="row" id="oral_details">
                        <div class="col-sm-5" id="ord1">
                            <div class="form-group">
                                <input class="form-control max" type="number" name="OR_max" id="OR_max" placeholder="Maximum Marks" min="0" step="1" disabled required/>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group" id="ord2">
                                <input class="form-control" type="number" name="OR_pass" id="OR_pass" placeholder="Passing Marks" min="0" step="1" disabled required/>
                            </div>
                        </div>
                        <div class="col-sm-8" style="display: none" id="ord3">
                            <div class="form-group">
                                <input class="form-control" type="number" name="PROR_pass" id="PROR_pass" placeholder="Passing Marks" min="0" step="1" disabled required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                    

            {{-- Term work section --}}
            <div class="col-sm-6">
                <div class="row">
                    <label for="TW">TermWork</label> 
                    {{-- Enable or Disable the TW fields, reset the values on uncheck --}}   
                    <input name="TW" type="checkbox" id="checkbox6" onclick="if (this.checked){ 
                        document.getElementById('TW_max').disabled = false;
                        document.getElementById('TW_pass').disabled = false;
                        }else{
                        document.getElementById('TW_max').disabled = true;
                        document.getElementById('TW_pass').disabled = true;
                        document.getElementById('TW_max').value = '';
                        document.getElementById('TW_pass').value = '';
                        }" />
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input class="form-control max" type="number" name="TW_max" id="TW_max" placeholder="Maximum Marks" min="0" step="1" disabled required/>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input class="form-control" type="number" name="TW_pass" id="TW_pass" placeholder="Passing Marks" min="0" step="1" disabled required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                    

            {{-- Theory Hours Section --}}  
            <div class="col-sm-6">
                <div class="row">
                    <label for="THTT">Theory Hours</label>    
                    {{-- Enable or Disable the THTT fields, reset the values on uncheck --}}
                    <input name="THTT" type="checkbox" id="checkbox7" onclick="if (this.checked){ 
                        document.getElementById('THT').disabled = false;
                        }else{
                        document.getElementById('THT').disabled = true;
                        document.getElementById('THT').value = '';
                        }" />
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input class="form-control" type="number" name="THT" id="THT" placeholder="Hours" min="0" step="1" disabled required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Practical Hours Section --}}  
            <div class="col-sm-6">
                <div class="row">
                    <label for="PH">Practical Hours</label>  
                    {{-- Enable or Disable the PH fields, reset the values on uncheck --}}  
                    <input name="PH" type="checkbox" id="checkbox8" onclick="if (this.checked){ 
                        document.getElementById('PHT').disabled = false;
                        able('PDB');
                        }else{
                        document.getElementById('PHT').disabled = true;
                        document.getElementById('PHT').value = '';
                        disable('PDB');
                        }" />
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input class="form-control" type="number" name="PHT" id="PHT" placeholder="Hours" min="0" step="1" disabled required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tutorial Hours Section --}} 
            <div class="col-sm-6">
                <div class="row">
                    <label for="TR">Tutorial Hours</label>   
                    {{-- Enable or Disable the TR fields, reset the values on uncheck --}} 
                    <input name="TR" type="checkbox" id="checkbox9" onclick="if (this.checked){ 
                        document.getElementById('TRH').disabled = false;
                        able('TDB');
                        }else{
                        document.getElementById('TRH').disabled = true;
                        document.getElementById('TRH').value = '';
                        disable('TDB');
                        }" />
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input class="form-control" type="number" name="TRH" id="TRH" placeholder="Hours" min="0" step="1" disabled required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Practical Details Section --}} 
            <div class="col-sm-6">
                <div class="row">
                    <label for="PD">Practical Details</label>    
                </div>
                {{-- Enable or Disable the PD fields, reset the values on uncheck --}}
                <div class="row">
                    @for ($i = 0; $i < session('div'); $i++)
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="PDD{{$i}}" id="PDD{{$i}}" value="Division {{chr($i + 65)}}" min="0" step="1" disabled required/>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <input class="form-control" type="number" name="PDB{{$i}}" id="PDB{{$i}}" placeholder="Batches" min="0" step="1" disabled required/>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            {{-- Tutorial Details Section --}} 
            <div class="col-sm-6">
                <div class="row">
                    <label for="TD">Tutorial Details</label>
                </div>
                {{-- Enable or Disable the TD fields, reset the values on uncheck --}}
                @for ($i = 0; $i < session('div'); $i++)
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="TDD{{$i}}" id="TDD{{$i}}" value="Division {{chr($i + 65)}}" min="0" step="1" disabled required/>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <input class="form-control" type="number" name="TDB{{$i}}" id="TDB{{$i}}" placeholder="Batches" min="0" step="1" disabled required/>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>


            {{-- <div class="row">
                <div class="col-sm-12">
                    <div class="input-group">
                        <label class="input-group-btn btn-info">
                        <span class="btn btn-custom">
                            Upload Schema PDF 
                            <input class="form-control" type="file" style="display: none;" name="schema" id="schema"  required >
                        </span>
                        </label>
                        <input type="text" class="form-control" readonly>
                    </div>
                </div>
            </div> --}}
            <div class="col-sm-12">
                <div class="row">
                    <label for="Total">Total Marks</label>
                </div>
                {{-- Display the total of max of all the fields that have been checked --}}
                <div class="row">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input class="form-control" type="number" name="Total" id="total_marks" min="0" step="1" required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">  
                <div class="col-sm-4">
                    <h1>
                        <a href="{{ action("SyllabusController@cancel") }}" class="btn btn-danger form-control" 
                        onclick="return confirm('Are you sure you would like to cancel and go back to dashboard?');">Cancel
                        </a>
                    </h1>
                </div>
                <div class="col-sm-4">
                    <h1>
                        <input type="submit" value="Save And Enter Next Subject" name ="submit" class="form-control btn btn-success" />    
                    </h1>
                </div>
                <div class="col-sm-4">
                    <h1>
                        <input type="submit" value="Save And Finish" name ="submit" class="form-control btn btn-primary" />
                    </h1>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <?php 
        $id = session('div');
    ?>
    <script>
    $("").submit(function() {
        $(this).submit(function() {
            return false;
        });
        return true;
    });
    function able(l){
        var x = '<?php echo $id; ?>';
        var i = 0;
        var id = l;
        for(; i < x; i++){
            id = l + i;
            document.getElementById(id).disabled = false;    
        }
    }
    function disable(l){
        var x = '<?php echo $id; ?>';
        var i = 0;
        var id = l;
        for(; i < x; i++){
            id = l + i;
            document.getElementById(id).disabled = true;    
        }
    }
    $(document).ready(function(){
        $(document).on('change','.max',function(){
            var  IAMax = $('#IA_max').val();
            var  ESEMax = $('#ESE_max').val();
            var  PRMax = $('#PR_max').val();
            var  PRORMax = $('#PROR_max').val();
            var  ORMax = $('#OR_max').val();
            var  TWMax = $('#TW_max').val(); 


            IAMax = parseInt(IAMax);
            if(isNaN(IAMax)){
                IAMax = 0;
            }
            else{
                $("#IA_pass").val((IAMax*4)/10);
            }
            
            ESEMax = parseInt(ESEMax);
            if(isNaN(ESEMax)){
                ESEMax = 0;
            }
            else{
                $("#ESE_pass").val((ESEMax*4)/10);
            }
            
            PRMax = parseInt(PRMax);
            if(isNaN(PRMax)){
                PRMax = 0;
            }
            else{
                $("#PR_pass").val((PRMax*4)/10);
            }
            PRORMax = parseInt(PRORMax);
            if(isNaN(PRORMax)){
                PRORMax = 0;
            }
            else{
                $("#PROR_pass").val((PRORMax*4)/10);
            }
            ORMax = parseInt(ORMax);
            if(isNaN(ORMax)){
                ORMax = 0;
            }
            else{
                $("#OR_pass").val((ORMax*4)/10);
            }
            TWMax = parseInt(TWMax);
            if(isNaN(TWMax)){
                TWMax = 0;
            }
            else{
                $("#TW_pass").val((TWMax*4)/10);
            }



            $("#total_marks").val(IAMax + ESEMax + PRMax + PRORMax + ORMax + TWMax);
            //console.log(IAMax + ESEMax + PRMax + PRORMax + ORMax + TWMax);
        });

        $(document).on('focus','#total_marks',function(){
            var  IAMax = $('#IA_max').val();
            var  ESEMax = $('#ESE_max').val();
            var  PRMax = $('#PR_max').val();
            var  PRORMax = $('#PROR_max').val();
            var  ORMax = $('#OR_max').val();
            var  TWMax = $('#TW_max').val(); 

            IAMax = parseInt(IAMax);
            if(isNaN(IAMax)){
                IAMax = 0;
            }
            ESEMax = parseInt(ESEMax);
            if(isNaN(ESEMax)){
                ESEMax = 0;
            }
            PRMax = parseInt(PRMax);
            if(isNaN(PRMax)){
                PRMax = 0;
            }
            PRORMax = parseInt(PRORMax);
            if(isNaN(PRORMax)){
                PRORMax = 0;
            }
            ORMax = parseInt(ORMax);
            if(isNaN(ORMax)){
                ORMax = 0;
            }
            TWMax = parseInt(TWMax);
            if(isNaN(TWMax)){
                TWMax = 0;
            }

            

            $("#total_marks").val(IAMax + ESEMax + PRMax + PRORMax + ORMax + TWMax);
            console.log(IAMax + ESEMax + PRMax + PRORMax + ORMax + TWMax);
        });
    });
    </script>
@stop