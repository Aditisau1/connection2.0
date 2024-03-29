@php
use Illuminate\Support\Facades\Vite;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>
        {!! Vite::content('resources/js/app.js') !!}
    </script>
</head>
<body>
    <div id="name-sec">
    <form>
        <label for="lname">Name:</label>
        <input type="text" id="lname" name="lname">
        <input type="submit" value="Let's chat">
    </form>
    </div>
    <div id= "chat-sec">
    <form id="send-chat">
        @csrf
        <input type="hidden" id="name" name="name">
        <label for="message">Message:</label>
        <input type="text" id="messages" name="messages">
        <input type="submit" id='submit2' value="Send">
    </form>
    </div>
    <div id= "chat-content"></div>


<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"> </script>
    <script>
        $('#chat-sec').hide();
        $('#name-sec').submit(function(e){
         e.preventDefault();
         $('#name').val($('#lname').val());
         $('#chat-sec').show();
        $('#name-sec').hide();

        });

        $('#send-chat').submit(function(e){
         e.preventDefault();
        
         let formData = $(this).serialize();
         $.ajax({
            url: "{{ route('event') }}",
            data: formData,
            type:"POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType:"JSON",
          
         })
         $('#messages').val('');
        });
        Echo.channel('chat').listen('Chatevent',(data)=>{
            console.log(data);
            let html =`<br><b>`+data.name+`</b><span>:`+data.messages+` </span>`;
            $('#chat-content').append(html);
        });
    </script>
</body>
</html>
</html>