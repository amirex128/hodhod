@extends('layouts.app', ['title' =>'مدیریت رنگ ها'])

@section('content')
    @include('layouts.headers.cards')
    @javascript("media",$media)
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">رسانه ها</h3>
                            </div>
                            <div class="col-4 text-right">
                            </div>

                        </div>
                    </div>

                    @status()
                    <div class="card-body" id="media-app">
                        <div class="row">
                            <div class="col-12">
                                <div id="file-drag-drop">
                                    <form ref="fileform" style="cursor: pointer;">

                                        <div onclick="document.getElementById('openChooser').click()"
                                             style="height: 100%;"
                                             class="d-flex flex-column justify-content-center align-items-center  column drop-files">
                                            <div class="text-bold">یک یاچند فایل را به اینجا بکشید</div>
                                            <div class="">یا برای انتخاب یک یا چند فایل کلید کنید</div>

                                        </div>
                                        <input multiple name="fileChooser" ref="openChooser" id="openChooser"
                                               style="opacity: 0;" type='file'/>
                                    </form>
                                </div>
                            </div>

                                <div id="upload-box" v-if="filesUpload.length>0" class="col-12 my-3 file-listing animated fadeIn ">
                                    <h3 class="text-right">لیست آپلود</h3>
                                    <div class="d-flex flex-wrap justify-content-center align-content-center">
                                        <div v-for="(value, key) in filesUpload">
                                            <div style="position:relative;"
                                                 v-on:mouseenter="showDark(key)"
                                                 v-on:mouseleave="hideDark(key)"
                                                 class="m-3">
                                                <img class="preview shadow-sm text-center"
                                                     v-bind:ref="'preview'+parseInt( key )">
                                                <div class="dark-overlay"
                                                     v-bind:id="'cover'+parseInt(key)">
                                                    <div class=" d-flex justify-content-around align-items-center h-100">
                                                        <div class="text-white">
                                                            <i style="cursor:pointer"
                                                               v-on:click="remove(key)"
                                                               v-bind:id="'icon-remove'+parseInt(key)"
                                                               class="far fa-trash-alt"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div v-on:click.prevent="submitFiles()" class="btn btn-block btn-info">آپلود فایل ها
                                    </div>
{{--                                    <div class="progress-wrapper">--}}
{{--                                        <div class="progress-info">--}}
{{--                                            <div class="progress-label">--}}
{{--                                                <span>درحال آپلود</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="progress-percentage">--}}
{{--                                                <span>@{{uploadPercentage}}</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress">--}}
{{--                                            <div id="pro" class="progress-bar bg-primary" role="progressbar" aria-valuenow="0"--}}
{{--                                                 aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>

                            <div class="col-12 my-3 file-listing-media">
                                <h3 class="text-right">رسانه ها</h3>
                                <div class="d-flex flex-wrap justify-content-center align-content-center">
                                    <div v-for="(value, key) in media">
                                        <div style="position:relative;"
                                             v-on:mouseenter="showDarkMedia(key)"
                                             v-on:mouseleave="hideDarkMedia(key)"
                                             class="m-3">
                                            <img class="preview shadow-sm text-center" v-bind:src="value.path"/>

                                            {{--checked--}}
                                            <div v-if="media[key].checked"
                                                 class="dark-overlay-check-media"
                                                 v-bind:id="'cover-media'+parseInt(key)">

                                                <div style="height: 100%;"
                                                     class=" d-flex justify-content-around align-items-center">

                                                    <div class="text-white">
                                                        <i style="cursor:pointer" v-on:click="iconEditClick(key)"
                                                           v-bind:id="'icon-edit'+parseInt(key)"
                                                           class="far fa-edit"></i>
                                                    </div>

                                                    <div class="text-white">
                                                        <i style="cursor:pointer" v-on:click="iconRemoveClick(key)"
                                                           v-bind:id="'icon-remove'+parseInt(key)"
                                                           class="far fa-trash-alt"></i>
                                                    </div>
                                                    <div v-on:click="iconCheckedClick(key)" class="text-white">
                                                        <i style="cursor:pointer"
                                                           v-bind:id="'icon-check'+parseInt(key)"
                                                           class="fas fa-check-circle"
                                                        ></i>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--checked--}}
                                            <div v-if="media[key].checked==false"
                                                 class="dark-overlay-check-media"
                                                 v-bind:id="'cover-media'+parseInt(key)">

                                                <div style="height: 100%;"
                                                     class=" d-flex justify-content-around align-items-center">
                                                    <div class="text-white">
                                                        <i style="cursor:pointer" v-on:click="iconEditClick(key)"
                                                           v-bind:id="'icon-edit'+parseInt(key)"
                                                           class="far fa-edit"></i>
                                                    </div>

                                                    <div class="text-white">
                                                        <i style="cursor:pointer" v-on:click="iconRemoveClick(key)"
                                                           v-bind:id="'icon-remove'+parseInt(key)"
                                                           class="far fa-trash-alt"></i>
                                                    </div>
                                                    <div v-on:click="iconCheckedClick(key)" class="text-white">
                                                        <i style="cursor:pointer"
                                                           v-bind:id="'icon-check'+parseInt(key)"
                                                           class="far fa-check-circle"
                                                        ></i>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-12 row">
                                <div class="col-lg-3 d-flex flex-column justify-content-start align-items-stretch">
                                    <button v-on:click="addLocalStorage()" class="btn btn-sm btn-block btn-success">درج
                                        تصاویر انتخابی
                                    </button>
                                    <button v-on:click="forceDelete()" class=" btn btn-sm btn-block btn-danger">حذف
                                        برای همیشه
                                    </button>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="rtl col-sm-8 d-flex flex-wrap justify-content-start align-content-center">

                                            <div v-for="(value, key) in checkTrue()">
                                                <div style="position:relative;"
                                                     class="m-3">
                                                    <img class="preview shadow-sm text-center" v-bind:src="value.path"/>

                                                    <div
                                                            class="dark-overlay-check-list"
                                                    >

                                                        <div style="height: 100%;"
                                                             class=" d-flex justify-content-around align-items-center">

                                                            <div class="text-white">
                                                                <i style="cursor:pointer"
                                                                   v-on:click="iconRemoveFromList(value)"
                                                                   class="far fa-trash-alt"></i>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-sm-4 row">
                                            <div class="col-sm-12 text-right">
                                                <h3 class="  col-sm-12 text-right">
                                                    : موارد انتخاب شده
                                                </h3>
                                                <h5 v-on:click="clearList()" class="rtl text-right" style="cursor: pointer;">
                                                    پاک سازی لیست انتخاب شده ها
                                                </h5>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@section("script")
    <script src="{{asset("js/vue.js")}}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>

        var vm = new Vue({
            el: "#media-app",
            data() {
                return {
                    dragAndDropCapable: false,
                    files: [],
                    filesUpload: [],
                    checkedFiles: [],
                    uploadPercentage: 0,
                    media: media

                }

            },
            methods: {
                addLocalStorage(){
                    let listAdd=[];
                    this.media.forEach((value,index)=>{
                         if (value.checked === true){
                              listAdd.push(value.id);
                         }
                    });
                    console.log(listAdd)
                    window.localStorage.setItem("listSelected",listAdd);
                    this.clearList()

                },
                forceDelete(){
                    this.media.forEach((value,index)=>{
                        value.checked=false;
                        this.hideDarkMedia(index);

                        axios.delete("media/"+value.id,{}).then( (res)=> {
                            if (res.data==="deleted") {
                                this.media.splice(index,1);
                                this.$forceUpdate();
                            }
                        })


                    })

                },
                clearList(){
                  this.media.forEach((value,index)=>{
                      value.checked=false;
                      this.hideDarkMedia(index);

                  })
                    this.$forceUpdate();
                },
                iconRemoveFromList(value) {
                    this.media.forEach((item, key) => {
                        if (value.id == item.id) {
                            item.checked = false;
                            this.hideDarkMedia(key);
                            this.$forceUpdate();
                        }
                    })

                },
                iconCheckedClick(key) {
                    this.media[key].checked = !this.media[key].checked;
                    this.$forceUpdate()
                },
                submitFiles() {
                    /*
                      Initialize the form data
                    */
                    let formData = new FormData();

                    /*
                      Iteate over any file sent over appending the files
                      to the form data.
                    */
                    for (var i = 0; i < this.filesUpload.length; i++) {
                        let file = this.filesUpload[i].file;

                        formData.append('filesUpload[' + i + ']', file);
                    }
                    /*
                      Make the request to the POST /file-drag-drop URL
                    */
                    var mythis = this;
                    axios.post('/media',
                        formData,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            },
                            onUploadProgress: function (progressEvent) {
                                this.uploadPercentage = parseInt(Math.round((progressEvent.loaded * 100) / progressEvent.total));
                            }.bind(this)
                        },
                    ).then(function (res) {


                        console.log(res)
                        if (res.data.status == "ok") {
                            // mythis.reGetMedia()
                            mythis.media.push(...res.data.new);
                            mythis.filesUpload = []
                            mythis.uploadPercentage=0;
                            mythis.$forceUpdate()
                        }

                    })
                        .catch(function () {
                            console.log('FAILURE!!');
                        });
                },
                reGetMedia() {
                    var mythis = this;

                    axios.get('/media/create').then(function (res) {
                        mythis.media = res.data;
                    })
                        .catch(function () {
                            console.log('FAILURE!!');
                        });

                },
                remove(key) {
                    this.filesUpload.splice(key, 1);
                    this.$forceUpdate()
                },
                removeMedia(key) {
                    this.filesUpload.splice(key, 1);
                    this.$forceUpdate()
                },
                iconEditClick() {
                },
                iconRemoveClick(key) {

                    axios.delete("media/"+this.media[key].id,{}).then( (res)=> {
                        if (res.data==="deleted") {
                            this.media.splice(key,1);
                            this.$forceUpdate();
                        }
                    })
                },
                showDark(key) {
                    $("#cover" + parseInt(key)).css("opacity", "1")
                },
                showDarkList(key) {
                    $("#cover-list" + parseInt(key)).css("opacity", "1")
                },
                showDarkMedia(key) {
                    $("#cover-media" + parseInt(key)).css("display", "block")
                },
                hideDark(key) {
                    $("#cover" + parseInt(key)).css("opacity", "0")
                },
                hideDarkList(key) {
                    $("#cover-list" + parseInt(key)).css("opacity", "0")
                },
                hideDarkMedia(key) {
                    if (!this.media[key].checked) {
                        $("#cover-media" + parseInt(key)).css("display", "none")

                    }
                },
                checkTrue() {
                    return this.media.filter(function (value) {
                        return value.checked === true;
                    })
                },
                determineDragAndDropCapable() {
                    /*
                      Create a test element to see if certain events
                      are present that let us do drag and drop.
                    */
                    var div = document.createElement('div');

                    /*
                      Check to see if the `draggable` event is in the element
                      or the `ondragstart` and `ondrop` events are in the element. If
                      they are, then we have what we need for dragging and dropping files.

                      We also check to see if the window has `FormData` and `FileReader` objects
                      present so we can do our AJAX uploading
                    */
                    return (('draggable' in div)
                        || ('ondragstart' in div && 'ondrop' in div))
                        && 'FormData' in window
                        && 'FileReader' in window;
                },
                getImagePreviews() {
                    /*
                      Iterate over all of the files and generate an image preview for each one.
                    */
                    for (let i = 0; i < this.filesUpload.length; i++) {
                        /*
                          Ensure the file is an image file
                        */
                        if (/\.(jpe?g|png|gif)$/i.test(this.filesUpload[i].file.name)) {
                            /*
                              Create a new FileReader object
                            */
                            let reader = new FileReader();

                            /*
                              Add an event listener for when the file has been loaded
                              to update the src on the file preview.
                            */
                            reader.addEventListener("load", function () {
                                this.$refs['preview' + parseInt(i)][0].src = reader.result;

                            }.bind(this), false);


                            /*
                              Read the data for the file in through the reader. When it has
                              been loaded, we listen to the event propagated and set the image
                              src to what was loaded from the reader.
                            */
                            reader.readAsDataURL(this.filesUpload[i].file);
                        } else {
                            /*
                              We do the next tick so the reference is bound and we can access it.
                            */
                            this.$nextTick(function () {
                                this.$refs['preview' + parseInt(i)][0].src = '/images/file.png';
                            });
                        }
                    }

                },
            },
            updated() {
                this.getImagePreviews();
            },
            mounted() {


                this.$refs.openChooser.addEventListener('change', function (e) {
                    for (let i = 0; i < document.getElementById("openChooser").files.length; i++) {
                        let file = {
                            id: this.filesUpload.length,
                            file: document.getElementById("openChooser").files[i],
                            checked: false
                        };
                        this.filesUpload.push(file);
                    }
                }.bind(this));


                this.dragAndDropCapable = this.determineDragAndDropCapable();


                if (this.dragAndDropCapable) {

                    ['drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop'].forEach(function (evt) {

                        this.$refs.fileform.addEventListener(evt, function (e) {
                            e.preventDefault();
                            e.stopPropagation();
                        }.bind(this), false);
                    }.bind(this));


                    this.$refs.fileform.addEventListener('drop', function (e) {

                        for (let i = 0; i < e.dataTransfer.files.length; i++) {
                            let file = {
                                id: this.filesUpload.length,
                                file: e.dataTransfer.files[i],
                                checked: false
                            };
                            this.filesUpload.push(file);

                        }
                    }.bind(this));
                }
            },
            watch: {
                filesUpload(newFile, oldFile) {
                    this.$forceUpdate();
                },
                media(newFile, oldFile) {
                    this.$forceUpdate();

                }
            }
        })
    </script>


@endsection
@section("style")
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/animate.css")}}">
    <style>
        form {
            display: block;
            height: 200px;
            width: 100%;
            margin: auto;
            margin-top: 40px;
            text-align: center;
            border-radius: 4px;
            border: 2px dashed #CCCCCC;
        }


        .preview {
            border-radius: 5px;
            width: 110px;
            height: 110px;
        }


        .dark-overlay {
            background: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 0px;
            left: 0px;
            border-radius: 5px;
            width: 110px;
            height: 110px;
            transition: all 0.1s ease-in-out;
            opacity: 0;
        }

        .dark-overlay-check-list {
            background: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 0px;
            left: 0px;
            border-radius: 5px;
            width: 110px;
            height: 110px;
            transition: all 0.1s ease-in-out;
            opacity: 1;
        }

        .dark-overlay-check-media {
            background: rgba(0, 0, 0, 0.6);
            display: none;

            position: absolute;
            top: 0px;
            left: 0px;
            border-radius: 5px;
            width: 110px;
            height: 110px;
            transition: all 0.1s ease-in-out;
            opacity: 1;
        }

        div.file-listing {
            width: 400px;
            margin: auto;
            padding: 10px;
            border: 1px solid #ddd;

        }

        div.file-listing-media {
            width: 400px;
            margin: auto;
            padding: 10px;
            border: 1px solid #ddd;
        }

        html {
            overflow: scroll;
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 0px; /* Remove scrollbar space */
            background: transparent; /* Optional: just make scrollbar invisible */
        }

        /* Optional: show position indicator in red */
        ::-webkit-scrollbar-thumb {
            background: #FF0000;
        }

        progress {
            width: 400px;
            margin: auto;
            display: block;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        #upload-box{
            animation-duration: 2s;
            animation-delay: 1s;

        }
    </style>
@endsection
