@extends($view)
@section('content')
<div class="container-fluid">
  <div class="fade-in">
    <div class="card">
      <div class="card-body">
        <div id="chat" style="position: relative;border: 2px solid black;height: 400px;width: 100%;margin: auto;">
          <div id="chatframe">
              <div id="chat{{$channel}}" style="position: relative;overflow: hidden;height: 378px;overflow-y: scroll;">
                  <ul id="chat">
                    @foreach($chats as $chat)
                    @if ( !isset($timecheck) OR $timecheck != $chat['created_at']->format('Y-m-d'))
                    <? $timecheck = $chat['created_at']->format('Y-m-d'); ?>
                        <i style="color:red;"><center>{{$chat['created_at']->format('d.m.Y')}}</center></i>
                    @endif
                    <li style="display:flex;">
                      <i title="{{ $chat['created_at'] }}"></i>{{ $chat['created_at']->format('G:i') }} <b>{{ $chat['username'] }}</b>: {{ $chat['text'] }}
                      <span style="margin-left:auto;color:white;">
                        <i class="bi-caret-down-fill" style="margin-right: 20px;font-size:1.2rem;color:white;width:32px;"></i>
                      </span>
                    </li>
                    @endforeach
                  </ul>
              </div>
          </div>
          <form method="post" action="/chat/send.php?usr={{ Auth::user()->email }}&pass={{ Auth::user()->password }}&channel={{$channel}}" class="ajaxform" style="position: absolute;border-top: 1px solid black;width: 100%;bottom: 0;background: white;margin: 0;">
              <input type="text" name="text" placeholder="sag was" style="width: calc(100% - 63px);">
              <div style="float:right;">
                <button class="btn btn-sm btn-primary" type="submit">Senden</button>
              </div>
          </form>
      </div>
      <script>
       document.addEventListener('DOMContentLoaded', function () {
          const textField = document.querySelector('.ajaxform input[name="text"]');

          const chatField = document.querySelector('#chat{{$channel}} ul');
          const chatFrame = document.getElementById('chat{{$channel}}');

          document.querySelector('.ajaxform')
          .addEventListener('submit', function (event) {
                  event.preventDefault();
                  const formData = new FormData(this);
                  const url = this.action;
                  const method = this.method;

                  if (textField.value.length === 0) {
                      return;
                  }
                  fetch(url, {
                      method: method,
                      body: formData
                  })
                      .then(response => response.json())
                      .then(data => {
                          if (data.status === "failed") {
                              throw Error(data.message);
                          }
                          textField.value = "";
                      })
                      .catch((error) => {
                          textField.value = "";
                      });
          });


          if (typeof (EventSource) !== "undefined") {
              const source = new EventSource("https://newproject.suizide.net/chat/read.php?channel={{$channel}}");
              source.addEventListener('updateText',function(event){
                  const data = JSON.parse(event.data);
                  const newElement = document.createElement("li");
                  newElement.innerHTML = data.message;

                  chatField.appendChild(newElement);
                  chatFrame.scrollTop = chatFrame.scrollHeight;

              });
          } else {
                  alert("Please use another browser");
          }


       });
        window.onload=function () {
             var objDiv = document.getElementById("chat{{$channel}}");
             objDiv.scrollTop = objDiv.scrollHeight;
        }
      </script>
    </div>

  </div>
</div>

@endsection
