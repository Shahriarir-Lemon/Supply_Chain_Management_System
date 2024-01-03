<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Chat Box</title>
    <style>

        .card-header{
            border-radius: 30px solid black;
        }
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .chat li {
            margin-bottom: 40px;
            padding-bottom: 5px;
            /* border-bottom: 1px dotted #B3A9A9; */
            margin-top: 10px;
            width: 80%;
        }


        .chat li .chat-body p {
            margin: 0;
            /* color: #777777; */
        }


        .chat-care {
            overflow-y: scroll;
            height: 350px;
        }

        .chat-care .chat-img {
            width: 50px;
            height: 50px;
        }

        .chat-care .img-circle {
            border-radius: 50%;
        }

        .chat-care .chat-img {
            display: inline-block;
        }

        .chat-care .chat-body {
            display: inline-block;
            max-width: 90%;
            background-color: #d1c4bc;
            border-radius: 12.5px;
            padding: 15px;
        }
        .chat-care .chat-body1 {
            display: inline-block;
            max-width: 90%;
            background-color: rgb(102, 202, 102);
            border-radius: 12.5px;
            padding: 15px;
        }

        .chat-care .chat-body strong {
            color: #0169DA;
        }

        .chat-care .admin {
            text-align: right;
            float: right;
        }

        .chat-care .admin p {
            text-align: left;
        }

        .chat-care .agent {
            text-align: left;
            float: left;
        }

        .chat-care .left {
            float: left;
        }

        .chat-care .right {
            float: right;
        }

        .clearfix {
            clear: both;
        }




        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #555;
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>
<body>
    <br>


    @php
    $user_id = auth()->user()->id;
    $sms = App\Models\Chat::all();
    @endphp

<div id="message-container"></div>
    <form id="frm" method="POST">
        @csrf
        <div class="container">
            

            <div class="row">
                <div class="col-md-14 mx-auto">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header text-center">
                            <span>Chat Box</span>
                        </div>
                        
                        <div class="card-body chat-care">
                            <ul class="chat">
                              

                        @foreach($messages as $message)
                        @if($message->user_id != $user_id)

                                <li class="agent clearfix" id="tr_{{ $message->id }}">
                                    <span class="chat-img left clearfix mx-2">
                                        <img src="{{ asset('Main1/img/navigator.png') }}" alt="Agent" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header clearfix">
                                            <strong class="primary-font">{{ $message->role }}</strong> <small class="right text-muted">
                                                <span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $message->created_at->diffForHumans() }}</small>
                                        </div>
                                        <p>
                                            {{ $message->sms }}
                                        </p>
                                        
                                    </div>


                               @if(auth()->user()->Role == 'Admin')
                                    <a href="javascript:void(0)" onclick="deletesms({{ $message->id }})">
                                        <i style="color: red;" class="bi bi-trash delete-message"></i>
                                    </a>
                                    @endif
                                     



                                </li>
                                @endif

                        @if($message->user_id == $user_id )
                                
                        
                                <li class="admin clearfix" id="tr_{{ $message->id }}">
                                    <span class="chat-img right clearfix  mx-2">
                                        <img src="{{ asset('Main1/img/navigator.png') }}" alt="Admin" class="img-circle" />
                                    </span>



                            <a href="javascript:void(0)" onclick="deletesms({{ $message->id }})">
                                    <i style="color: red;" class="bi bi-trash delete-message"></i>
                            </a>




                                    <div class="chat-body1 clearfix">
                                        <div class="header clearfix">
                                            <small class="left text-muted"><span class="glyphicon glyphicon-time"></span>{{ $message->created_at->diffForHumans() }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>
                                            <strong class="right primary-font">{{ $message->role  }}</strong>
                                        </div>
                                        <p>
                                            {{ $message->sms }}
                                        </p>
                                    </div>
                                    
                                </li>
                      @endif
                          

                        @endforeach

                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="input-group">
                                <input type="text" required name="sms" class="form-control" placeholder="Type your message here..." />
                                <div class="input-group-append">
                                    <button type="submit" name="submit" class="btn btn-success" id="frmsubmit">Send</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>


            $(document).ready(function () {
                function updateChat() {
                    console.log('Updating chat...');
                    $.ajax({
                        url: "{{ url('/get_chat') }}",
                        type: 'get',
                        success: function (result) {
                            console.log('Received response:', result);
                            $('#message-container').html(result);
                        },
                        error: function (error) {
                            console.error('Error updating chat:', error);
                        }
                    });
                }

                $('#frm').submit(function (e) {
                    e.preventDefault();
                    console.log('Submitting chat...');
                    $.ajax({
                        url: "{{ url('/submit_chat') }}",
                        data: $('#frm').serialize(),
                        type: 'post',
                        success: function (result) {
                            console.log('Received response:', result);
                            $('#message-container').html(result);
                            $('#frm')[0].reset();
                        },
                        error: function (error) {
                            console.error('Error submitting chat:', error);
                        }
                    });
                });

                // Update the chat every 5 seconds
                setInterval(updateChat, 5000);
            });
    </script>

    <script type="text/javascript">
         
         function deletesms(id)

         {

            $.ajaxSetup({

                    headers:
                        {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }

                     });


              if(confirm("Are yu sure to delete this message"))
              {
                $.ajax({
                         url:'delete_sms/'+id,
                         type:'DELETE',

                         success:function(result)
                         {
                            $("#"+result['tr']).slideUp("slow");

                         }
        
                });
              }
         }
    
    
    </script>

</body>
</html>

