@extends('faculty.layouts.dashboard')
@section('page_heading','Profile')
@section('section')

<div class="page-container">
    <div class="row"> 
        <div class="col-md-6">
            <div class="col-md-12">    
                <div class="imageBox">
                    <div class="thumbBox"></div>
                    <div class="spinner" style="display: none">Loading...</div>
                </div>
                
                <div>
                    <div class="action">  
                        <label class="control-label">Select Image</label>
                        <input class="file" type="file" id="file">
                    </div>
                    <div>
                        <input class="btn btn-primary" type="button" id="btnZoomIn" value="+">
                        <input class="btn btn-primary" type="button" id="btnZoomOut" value="-">
                        <input class="btn btn-danger" type="button" id="btnCrop" value="Crop">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <br>
            <div class="cropped">
            
            </div>
        </div>
    </div>   

    
</div>


<script type="text/javascript">
    window.onload = function() {
        var options =
        {
            imageBox: '.imageBox',
            thumbBox: '.thumbBox',
            spinner: '.spinner',
            imgSrc: 'avatar.png',
        }
        var cropper;
        document.querySelector('#file').addEventListener('change', function(){
            var reader = new FileReader();
            reader.onload = function(e) {
                options.imgSrc = e.target.result;
                cropper = new cropbox(options);
            }
            reader.readAsDataURL(this.files[0]);
            this.files = [];
        })
        

        document.querySelector('#btnCrop').addEventListener('click', function(){
            
            //get the base64 from the JS code
            var b64Data = cropper.getDataURL();

            // Use this api to display cropeed pic
            // Select Pic button to set the profile picture
            document.querySelector('.cropped').innerHTML = '<div class="col-md-3"><form action="/staff/image" method="post"><input name="url" type="hidden" value="'+b64Data+'"><input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /><img src="'+b64Data+'" class="img-rounded"><br><br><input class="btn btn-success  "type="submit" value="Select as Profile Picture"></form></div>';
        })
        document.querySelector('#btnZoomIn').addEventListener('click', function(){
            cropper.zoomIn();
        })
        document.querySelector('#btnZoomOut').addEventListener('click', function(){
            cropper.zoomOut();
        })
    };
</script>

<style>
    .container
    {
        position: absolute;
        top: 10%; left: 10%; right: 0; bottom: 0;
    }
     .action
    {
        /* width: 400px;
        height: 30px; */
        margin: 10px 0;
    } 
    .croppedimg
    {
        margin-right: 10px;
    }

     .imageBox
    {
        position: relative;
        height: 300px;
        width:100%;
        border:1px solid #aaa;
        background: #fff;
        overflow: hidden;
        background-repeat: no-repeat;
        cursor:move;
    } 

    .imageBox .thumbBox
    {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 200px;
        height: 200px;
        margin-top: -100px;
        margin-left: -100px;
        box-sizing: border-box;
        border: 1px solid rgb(102, 102, 102);
        box-shadow: 0 0 0 1000px rgba(0, 0, 0, 0.5);
        background: none repeat scroll 0% 0% transparent;
    }

    .imageBox .spinner
    {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        text-align: center;
        line-height: 400px;
        background: rgba(0,0,0,0.7);
    }
</style>

<script type="text/javascript">
    /**
     * Created by ezgoing on 14/9/2014.
     */
    'use strict';
    var cropbox = function(options){
        var el = document.querySelector(options.imageBox),
        obj =
        {
            state : {},
            ratio : 1,
            options : options,
            imageBox : el,
            thumbBox : el.querySelector(options.thumbBox),
            spinner : el.querySelector(options.spinner),
            image : new Image(),
            getDataURL: function ()
            {
                var width = this.thumbBox.clientWidth,
                    height = this.thumbBox.clientHeight,
                    canvas = document.createElement("canvas"),
                    dim = el.style.backgroundPosition.split(' '),
                    size = el.style.backgroundSize.split(' '),
                    dx = parseInt(dim[0]) - el.clientWidth/2 + width/2,
                    dy = parseInt(dim[1]) - el.clientHeight/2 + height/2,
                    dw = parseInt(size[0]),
                    dh = parseInt(size[1]),
                    sh = parseInt(this.image.height),
                    sw = parseInt(this.image.width);

                canvas.width = width;
                canvas.height = height;
                var context = canvas.getContext("2d");
                context.drawImage(this.image, 0, 0, sw, sh, dx, dy, dw, dh);
                var imageData = canvas.toDataURL('image/png');
                return imageData;
            },
            getBlob: function()
            {
                var imageData = this.getDataURL();
                var b64 = imageData.replace('data:image/png;base64,','');
                var binary = atob(b64);
                var array = [];
                for (var i = 0; i < binary.length; i++) {
                    array.push(binary.charCodeAt(i));
                }
                return  new Blob([new Uint8Array(array)], {type: 'image/png'});
            },
            zoomIn: function ()
            {
                this.ratio*=1.1;
                setBackground();
            },
            zoomOut: function ()
            {
                this.ratio*=0.9;
                setBackground();
            }
        },
        attachEvent = function(node, event, cb)
        {
            if (node.attachEvent)
                node.attachEvent('on'+event, cb);
            else if (node.addEventListener)
                node.addEventListener(event, cb);
        },
        detachEvent = function(node, event, cb)
        {
            if(node.detachEvent) {
                node.detachEvent('on'+event, cb);
            }
            else if(node.removeEventListener) {
                node.removeEventListener(event, render);
            }
        },
        stopEvent = function (e) {
            if(window.event) e.cancelBubble = true;
            else e.stopImmediatePropagation();
        },
        setBackground = function()
        {
            var w =  parseInt(obj.image.width)*obj.ratio;
            var h =  parseInt(obj.image.height)*obj.ratio;

            var pw = (el.clientWidth - w) / 2;
            var ph = (el.clientHeight - h) / 2;

            el.setAttribute('style',
                    'background-image: url(' + obj.image.src + '); ' +
                    'background-size: ' + w +'px ' + h + 'px; ' +
                    'background-position: ' + pw + 'px ' + ph + 'px; ' +
                    'background-repeat: no-repeat');
        },
        imgMouseDown = function(e)
        {
            stopEvent(e);

            obj.state.dragable = true;
            obj.state.mouseX = e.clientX;
            obj.state.mouseY = e.clientY;
        },
        imgMouseMove = function(e)
        {
            stopEvent(e);

            if (obj.state.dragable)
            {
                var x = e.clientX - obj.state.mouseX;
                var y = e.clientY - obj.state.mouseY;

                var bg = el.style.backgroundPosition.split(' ');

                var bgX = x + parseInt(bg[0]);
                var bgY = y + parseInt(bg[1]);

                el.style.backgroundPosition = bgX +'px ' + bgY + 'px';

                obj.state.mouseX = e.clientX;
                obj.state.mouseY = e.clientY;
            }
        },
        imgMouseUp = function(e)
        {
            stopEvent(e);
            obj.state.dragable = false;
        },
        zoomImage = function(e)
        {
            var evt=window.event || e;
            var delta=evt.detail? evt.detail*(-120) : evt.wheelDelta;
            delta > -120 ? obj.ratio*=1.1 : obj.ratio*=0.9;
            setBackground();
        }

        obj.spinner.style.display = 'block';
        obj.image.onload = function() {
            obj.spinner.style.display = 'none';
            setBackground();

            attachEvent(el, 'mousedown', imgMouseDown);
            attachEvent(el, 'mousemove', imgMouseMove);
            attachEvent(document.body, 'mouseup', imgMouseUp);
            var mousewheel = (/Firefox/i.test(navigator.userAgent))? 'DOMMouseScroll' : 'mousewheel';
            attachEvent(el, mousewheel, zoomImage);
        };
        obj.image.src = options.imgSrc;
        attachEvent(el, 'DOMNodeRemoved', function(){detachEvent(document.body, 'DOMNodeRemoved', imgMouseUp)});

        return obj;
    };

</script>
@stop
